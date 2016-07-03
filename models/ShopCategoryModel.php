<?php

class ShopCategoryModel extends Model
{
    /* Class Private Internal State Proprierties */
    private $category_id = NULL;
    private $category_name = NULL;
    private $category_status = NULL;
    private $fk_lang_id = NULL;
    private $fk_parent_id = NULL;
    private $category_parent_name = NULL;

    /* Getter/Setter Magic Methods */
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
    
    
    /* Populate Proprierties From DB Data By Item ID */
    public function loadById($category_id=NULL, $lang=NULL)
    {
        $query = "SELECT * FROM #_shop_categories ";
        $query.= "LEFT JOIN #_languages ON #_languages.lang_id = #_shop_categories.fk_lang_id ";
        $query.= "WHERE #_shop_categories.category_id = $category_id ";
        if($lang!=NULL){
            $query.="AND #_shop_categories.fk_lang_id = " . Lang::$lang_id;
        }
        $query.= ";";
        
        $item_data = $this->getObjectData($query);
        if($item_data!=FALSE){
            foreach($item_data as $item_key => $item_val){
                $this->$item_key = $item_val;
            }
        }
    }
    
    /* Insert Current Category To DB *==========================================*/
    public function insertCategory()
    {
        // Collect Current Field And Data
        $excluded_fields = array("mysqli");
        $fields = array();
        $values = array();
        foreach($this as $field_name => $field_val){
            if(!in_array($field_name, $excluded_fields)){
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
        $query = "INSERT INTO #_shop_categories( $fields_string ) "
               . "VALUES ( $values_string ); ";
        // Exec Query
        if(!$this->queryExec($query)){
            return FALSE;
        }else{
            //$this->cleanAndClose();
            return TRUE;
        }
    }
    
    /* Insert Current Category To DB *==========================================*/
    public function updateCategory()
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
        $query = "UPDATE #_shop_categories ";
        $query.= "SET $set_string ";
        $query.= "WHERE #_shop_categories.category_id = '$this->category_id';";
        
        // Exec Query
        if(!$this->queryExec($query)){
            return FALSE;
        }else{
            //$this->cleanAndClose();
            return TRUE;
        }
    }
    
    public function deleteCategory($category_id=NULL)
    {
        // Compose Query
        $query = "DELETE FROM #_shop_categories WHERE `category_id`='$category_id';";
        // Exec Query
        if(!$this->queryExec($query)){
            return FALSE;
        }else{
            //$this->cleanAndClose();
            return TRUE;
        }      
    }
    
    
    
}
