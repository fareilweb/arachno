<?php

class ShopItemModel extends Model
{
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
    
    public function __construct(){
        parent::__construct();
        array_push($this->excluded_from_loading, "item_images");
        array_push($this->excluded_from_loading, "item_categories");
    }

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

    
    // Populate Proprierties From DB Data By Item ID
    public function loadById($item_id=NULL, $lang_id=NULL)
    {
        $query = 
            "SELECT * FROM #_shop_items 
             LEFT JOIN #_items_has_categories ON #_items_has_categories.fk_item_id = #_shop_items.item_id  
             LEFT JOIN #_shop_categories ON #_shop_categories.shop_category_id = #_items_has_categories.fk_shop_category_id   
             LEFT JOIN #_languages ON #_languages.lang_id = #_shop_items.fk_lang_id 
             WHERE #_shop_items.item_id = '$item_id' ";
        if($lang_id!=NULL){
            $query.="AND #_shop_items.fk_lang_id = " . $lang_id;
        }
        $query.= ";";

        $item_data_obj = $this->getObjectData($query);

        if(!$item_data_obj){
            return FALSE;
        }else{

            $this->loadByObject($item_data_obj);

            // Load Item Categories
            $this->item_categories = $this->getItemCategories($item_data_obj->item_id); 

            // Load Item Images
            $images_query = 
                "SELECT * FROM #_shop_items_images 
                 WHERE #_shop_items_images.fk_item_id = '$item_id';";
            
            $this->results = $this->queryExec($images_query);
            while($img_row_obj = $this->results->fetch_object()){
                array_push($this->item_images, $img_row_obj);
            }

            return TRUE;
        }  
    }


    // Get Item Categories
    public function getItemCategories($item_id=NULL)
    {
        $query = 
            "SELECT * FROM #_shop_categories 
             JOIN #_items_has_categories ON #_items_has_categories.fk_shop_category_id = #_shop_categories.shop_category_id 
             WHERE #_items_has_categories.fk_item_id = '$item_id';";
        
        $results = $this->queryExec($query);
        $data = array();
        while($cat_obj = $results->fetch_object()){
            $data[$cat_obj->shop_category_id] = $cat_obj;
        }
        return $data;
    }
    
    // Set Item Categories
    public function setItemCategories($item_id=NULL)
    {
        // Insert Category/Item if is Not There Already
        foreach ($this->item_categories as $cat_key => $cat_val)
        {
            $category_id = $cat_key;
            
            $check_categories_query = 
                "SELECT * FROM #_items_has_categories WHERE fk_item_id = '$item_id' 
                 AND fk_shop_category_id = '$category_id';";
            
            $check_result = $this->queryExec($check_categories_query);
        
            if($check_result->num_rows == 0){
                $insert_query = 
                   "INSERT INTO `#_items_has_categories` (`fk_item_id`, `fk_shop_category_id`) 
                    VALUES ('$item_id', '$cat_key');";
                
                if(!$this->queryExec($insert_query)){
                    return FALSE;
                }
            }
        }

        // Remove Categories/Items That Are Not Sended From Form
        $item_cats_query = "SELECT * FROM #_items_has_categories WHERE #_items_has_categories.fk_item_id = '$item_id'";
        $cats_results = $this->queryExec($item_cats_query);
        while($cat_obj = $cats_results->fetch_object()){
            if(!array_key_exists($cat_obj->fk_shop_category_id, $this->item_categories)){
                $delete_query = 
                    "DELETE FROM #_items_has_categories 
                     WHERE `fk_item_id`='$cat_obj->fk_item_id' 
                     AND `fk_shop_category_id`='$cat_obj->fk_category_id';";
                if(!$this->queryExec($delete_query)){
                    return FALSE;
                }
            }
        }

        return TRUE;
    }
   
    
    // Insert Current Item To DB
    public function insertItem()
    {
        // Collect Current Field And Data
        $fields = array();
        $values = array();
        foreach($this as $field_name => $field_val)
        {
            if(!in_array($field_name, $this->excluded_from_loading) 
                    && property_exists($this, $field_name))
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
        $query = 
            "INSERT INTO #_shop_items( $fields_string ) VALUES ( $values_string ); ";

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
        $fields_count = ((count((array)$this)) - count($this->excluded_from_loading)) - 1;
        
        foreach($this as $field_name => $field_val){
            if(!in_array($field_name, $this->excluded_from_loading) 
                    && property_exists($this, $field_name)){
                
                $set_string.= "`$field_name`='$field_val'";
                
                if( $counter < $fields_count ){
                    $set_string.= ", ";
                }
                $counter++;
            }
        }
        
        // Compose Query
        $query = 
            "UPDATE #_shop_items SET $set_string 
             WHERE #_shop_items.item_id = '$this->item_id';";
        
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
            return TRUE;
        }      
    }
    
    // All Items
    function getAll($lang_id=NULL, $status=NULL)
    {
        $query = "SELECT * FROM #_shop_items ";
        $query.= "LEFT JOIN #_languages ON #_languages.lang_id = #_shop_items.fk_lang_id ";
        
        // Add Language Filter
        if($lang_id!==NULL){
            $query .= " WHERE #_shop_items.fk_lang_id = '$lang_id' ";
        }
        
        // Add Status Filter
        if($status!==NULL){
            $query .= "AND #_shop_items.item_status = '$status' ";
        }
        
        $this->results = $this->queryExec($query);
           
        $data = array();
        while($row = $this->results->fetch_object()){
            array_push($data, $row);
        }
        
        if(!$this->results){
            return FALSE;
        }else{
            return $data;
        }   
    }

    
    // Category Items
    function getItemsByCategory($category_id, $status=NULL, $lang_id=NULL)
    {
        $query = 
           "SELECT * FROM #_shop_items 
            JOIN #_items_has_categories ON #_shop_items.item_id = #_items_has_categories.fk_item_id 
            WHERE #_items_has_categories.fk_shop_category_id = '$category_id' ";
        
        // Add Language Filter
        if($lang_id!==NULL){
            $query .= "AND #_shop_items.fk_lang_id = '$lang_id' ";
        }
        
        // Add Status Filter
        if($status!==NULL){
            $query .= "AND #_shop_items.item_status = '$status' ";
        }
        
        // Exec Query Form Items
        $this->results = $this->queryExec($query);
        
        // Get Data From Items Result
        $data = array();
        while($item_obj = $this->results->fetch_object()){
            array_push($data, $item_obj);/*<--Add The Complete Item To Data*/
        }
        
        // Add Images To Every Item
        foreach($data as $item_obj){
            $item_obj->item_images = array();
            $query_images = "SELECT * FROM #_shop_items_images WHERE #_shop_items_images.fk_item_id = '$item_obj->item_id'";
            $item_images_results = $this->queryExec($query_images);
            while($img_obj = $item_images_results->fetch_object()){
                array_push($item_obj->item_images, $img_obj);
            }
        }
        
        // Return Data or FALSE
        if(!$this->results){
            return FALSE;
        }else{
            return $data;
        }
    }
    



}
