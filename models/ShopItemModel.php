<?php

class ShopItemModel extends Model
{
    private $excluded_fields = array("excluded_fields", "mysqli", "results", "item_images", "item_categories");
    
    // Class Private Internal State Proprierties
    private $item_id = NULL;
    private $item_code = NULL;
    private $item_categories = array();
    private $item_status = NULL; 
    private $item_stock = NULL; 
    private $item_price = NULL; 
    private $item_title = NULL; 
    private $item_weight = NULL;
    private $item_colors = NULL; 
    private $item_short_desc = NULL; 
    private $item_long_desc = NULL; 
    private $item_meta_keywords = NULL;
    private $item_meta_description = NULL;
    private $fk_lang_id = NULL;
    private $item_images = array();
    
    
    // Getter/Setter Magic Methods
    public function __get($property){
        if (property_exists($this, $property)){
            return $this->$property;
        }
    }
    public function __set($property, $value){
        if (property_exists($this, $property)){
            $this->$property = $value;
        }
        return $this;
    }
    
    
    public function getItemCategories($item_id=NULL)
    {
        $query = 
            "SELECT * FROM #_shop_categories 
             JOIN #_items_has_categories ON #_items_has_categories.category_id = #_shop_categories.category_id 
             WHERE #_items_has_categories.item_id = '$item_id';";
        
        $results = $this->queryExec($query);
        $data = array();
        while($cat_obj = $results->fetch_object()){
            array_push($data, $cat_obj);
        }
        return $data;
    }
    
    
    public function setItemCategories($item_id=NULL)
    {
        foreach ($this->item_categories as $item_cat)
        {
            $category_id = $item_cat->category_id;
            
            $check_query = 
                "SELECT * FROM #_items_has_categories WHERE item_id = '$item_id' 
                 AND category_id = '$category_id';";
            
            $check_result = $this->queryExec($check_query);
            
            if($check_result->num_rows == 0){
                $insert_query = 
                   "INSERT INTO `#_items_has_categories` (`item_id`, `category_id`) 
                    VALUES ('$item_id', '$item_cat->category_id');";
                
                if(!$this->queryExec($insert_query)){
                    return FALSE;
                }
            }
        }
    }
    
    
    // Populate Proprierties From DB Data By Item ID
    public function loadById($item_id=NULL, $lang_id=NULL)
    {
        $query = "SELECT * FROM #_shop_items ";
        $query.= "LEFT JOIN #_languages ON #_languages.lang_id = #_shop_items.fk_lang_id ";
        $query.= "WHERE #_shop_items.item_id = '$item_id' ";
        if($lang_id!=NULL){
            $query.="AND #_shop_items.fk_lang_id = " . $lang_id;
        }
        $query.= ";";
        $item_data = $this->getObjectData($query);
        if(!$item_data){
            return FALSE;
        }else{

            // Populate Item Proprierties
            foreach($item_data as $item_key => $item_val){
                $this->$item_key = $item_val;
            }
            
            // Load Item Categories
            $this->item_categories = $this->getItemCategories($item_data->item_id); 

            // Load Item Images
            $images_query = "SELECT * FROM #_shop_items_images WHERE #_shop_items_images.fk_item_id = '$item_id';";
            $this->results = $this->queryExec($images_query);
            while($img_row_obj = $this->results->fetch_object()){
                array_push($this->item_images, $img_row_obj);
            }
        
            //$this->cleanAndClose();

            return TRUE;
        }  
    }

    
    // Insert Current Item To DB
    public function insertItem()
    {
        // Collect Current Field And Data
        $fields = array();
        $values = array();
        foreach($this as $field_name => $field_val)
        {
            if(!in_array($field_name, $this->excluded_fields) && property_exists($this, $field_name))
            {
                array_push($fields, $field_name);
                array_push($values, $field_val);
            }
        }
        
        // Compose Fields String
        $fields_string = "";
        foreach($fields as $key=>$val)
        {
            $fields_string .= "`$val`";
            if($key < count($fields)-1){
                $fields_string .= ", ";
            }
        }
        
        // Compose Values String
        $values_string = "";
        foreach($values as $key => $val)
        {
            $values_string .= "'$val'";
            if($key < count($values)-1){
                $values_string .= ", ";
            }
        }
        
        // Compose Query for Item
        $query = "INSERT INTO #_shop_items( $fields_string ) ";
        $query.= "VALUES ( $values_string ); ";

        // Exec Queries
        $item_res = $this->queryExec($query);
        if(!$item_res){
            return FALSE;
        }else{
            $insert_id = $this->mysqli->insert_id;
            if(!$this->setItemCategories($insert_id)){ // Item categories
                return FALSE;
            }else{
                return TRUE;
            }
        }
    }
    
    
    
    // Update Item
    public function updateItem()
    {
        // Collect Current Field And Data
        $set_string = "";
        $counter = 0;
        $fields_count = ((count((array)$this)) - count($this->excluded_fields)) - 1;
        
        foreach($this as $field_name => $field_val){
            if(!in_array($field_name, $this->excluded_fields) && property_exists($this, $field_name)){
                
                $set_string.= "`$field_name`='$field_val'";
                
                if( $counter < $fields_count ){
                    $set_string.= ", ";
                }
                $counter++;
            }
        }
        
        // Compose Query
        $query = "UPDATE #_shop_items ";
        $query.= "SET $set_string ";
        $query.= "WHERE #_shop_items.item_id = '$this->item_id';";
        
        // Exec Queries
        $item_res = $this->queryExec($query);
        
        if(!$item_res || !$this->setItemCategories($this->item_id)){
            return FALSE;
        }else{
            return TRUE;
        }      
    }
    
    public function deleteItem($item_id=NULL)
    {
        // Compose Query
        $query = "DELETE FROM #_shop_items WHERE `item_id`='$item_id';";
        // Exec Query
        if(!$this->queryExec($query)){
            return FALSE;
        }else{
            //$this->cleanAndClose();
            return TRUE;
        }      
    }
    
}
