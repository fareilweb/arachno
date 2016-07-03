<?php

class ShopItemModel extends Model
{
    
    // Class Private Internal State Proprierties
    private $item_id = NULL;
    private $item_code = NULL;
    private $fk_category_id = NULL;
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
        $query = "SELECT * FROM #_shop_items ";
        $query.= "LEFT JOIN #_shop_categories ON #_shop_categories.category_id = #_shop_items.fk_category_id ";
        $query.= "LEFT JOIN #_languages ON #_languages.lang_id = #_shop_items.fk_lang_id ";
        $query.= "WHERE #_shop_items.item_id = '$item_id' ";
        if($lang_id!=NULL){
            $query.="AND #_shop_items.fk_lang_id = " . $lang_id;
        }
        $query.= ";";
        $item_data = $this->getObjectData($query);
        if($item_data!=FALSE){
            foreach($item_data as $item_key => $item_val){
                $this->$item_key = $item_val;
            }
        }
        
        // Load Item Images
        //$images_query = "SELECT * FROM #_shop_images WHERE #_shop_images.fk_item_id = '$item_id';";
        //$this->results = $this->queryExec($images_query);
        //while($img_row_obj = $this->results->fetch_object()){
        //    array_push($this->item_images, $img_row_obj);
        //}
        //$this->cleanAndClose();
    }
    
    // Insert Current Item To DB
    public function insertItem()
    {
        // Collect Current Field And Data
        $excluded_fields = array("mysqli", "results");
        $fields = array();
        $values = array();
        foreach($this as $field_name => $field_val){
            if(!in_array($field_name, $excluded_fields) && property_exists($this, $field_name)){
                array_push($fields, $field_name);
                array_push($values, $field_val);
            }
        }
        // Compose Fields String
        $fields_string = "";
        foreach($fields as $key=>$val){
            $fields_string .= "`$val`";
            if($key < count($fields)-1){
                $fields_string .= ", ";
            }
        }
        // Compose Values String
        $values_string = "";
        foreach($values as $key => $val){
            $values_string .= "'$val'";
            if($key < count($values)-1){
                $values_string .= ", ";
            }
        }
        // Compose Query
        $query = "INSERT INTO #_shop_items( $fields_string ) "
               . "VALUES ( $values_string ); ";
        // Exec Query
        if(!$this->queryExec($query)){
            return FALSE;
        }else{
            $this->cleanAndClose();
            return TRUE;
        }
    }
    
    // Update Item
    public function updateItem($item_id=NULL)
    {
        // Collect Current Field And Data
        $excluded_fields = array("mysqli", "results");
        $set_string = "";
        $counter = 0;
        $fields_count = ((count((array)$this)) - count($excluded_fields)) - 1;
        
        foreach($this as $field_name => $field_val){
            if(!in_array($field_name, $excluded_fields)){
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
        
        // Exec Query
        if(!$this->queryExec($query)){
            return FALSE;
        }else{
            $this->cleanAndClose();
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
            $this->cleanAndClose();
            return TRUE;
        }      
    }
    
}
