<?php

class ShopCategoryModel extends Model
{
    /* Class Private Internal State Proprierties */
    private $shop_category_id = NULL;
    private $shop_category_name = NULL;
    private $shop_category_slug = NULL;
    private $shop_category_status = NULL;
    private $shop_category_image_src = NULL;
    private $fk_lang_id = NULL;
    private $fk_parent_id = NULL;
    private $parent = NULL;
    private $children = array();

    public function __construct(){
        parent::__construct();
        array_push($this->excluded_from_loading, "items");
        array_push($this->excluded_from_loading, "children");
        array_push($this->excluded_from_loading, "parents");
    }

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
    public function loadById($category_id=NULL, $lang=NULL)
    {
        $query = "SELECT * FROM #_shop_categories ";
        $query.= "LEFT JOIN #_languages ON #_languages.lang_id = #_shop_categories.fk_lang_id ";
        $query.= "WHERE #_shop_categories.shop_category_id = $category_id ";
        if($lang!=NULL){
            $query.="AND #_shop_categories.fk_lang_id = " . Lang::$lang_id;
        }
        $query.= ";";
        $data_obj = $this->getObjectData($query);
        $this->loadByObject($data_obj);

        $this->children = $this->loadChildren($category_id);
        $this->parent = $this->loadParent($category_id);
    }

    // Populate Proprierties From DB Data By Item ID 
    public function getById($category_id=NULL, $lang=NULL)
    {
        $query = "SELECT * FROM #_shop_categories ";
        $query.= "LEFT JOIN #_languages ON #_languages.lang_id = #_shop_categories.fk_lang_id ";
        $query.= "WHERE #_shop_categories.shop_category_id = $category_id ";
        if($lang!=NULL){
            $query.="AND #_shop_categories.fk_lang_id = " . Lang::$lang_id;
        }
        $query.= ";";
        $data_obj = $this->getObjectData($query);
        
        $shop_category_model = new ShopCategoryModel();
        $shop_category_model->loadById($category_id);
    }

    

    // Category Children
    function loadChildren($category_id=NULL)
    {
        $query = 
         "SELECT * FROM #_shop_categories 
          LEFT JOIN #_languages ON #_shop_categories.fk_lang_id = #_languages.lang_id 
          WHERE #_shop_categories.fk_parent_id = $category_id;";
          
        $this->results = $this->queryExec($query);
        
        if(!$this->results){
            return FALSE;
        }else{
            $data = array();
            while($row_obj = $this->results->fetch_object()){
                array_push($data, $row_obj); 
            }
            //$this->cleanAndClose();
            return $data;
        }          
    }


    // Load Parent Category
    function loadParent($category_id=NULl)
    {

    }

    
    // Insert Current Category To DB
    public function insertCategory()
    {
        // Collect Current Field And Data
        $fields = array();
        $values = array();
        foreach($this as $field_name => $field_val){
            if(!in_array($field_name, $this->excluded_from_loading)){
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
            return TRUE;
        }
    }
    
    // Insert Current Category To DB
    public function updateCategory()
    {
        // Collect Current Field And Data
        $set_string = "";
        $counter = 0;
        $fields_count = ((count((array)$this)) - count($this->excluded_from_loading));
        
        foreach($this as $field_name => $field_val){
            if(!in_array($field_name, $this->excluded_from_loading)){
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
        $query.= "WHERE #_shop_categories.shop_category_id = '$this->category_id';";
        
        // Exec Query
        if(!$this->queryExec($query)){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    
    // Delete Category
    public function deleteCategory($category_id=NULL)
    {
        // Compose Query
        $query = "DELETE FROM #_shop_categories WHERE `shop_category_id`='$category_id';";
        // Exec Query
        if(!$this->queryExec($query)){
            return FALSE;
        }else{
            return TRUE;
        }      
    }

    
    // Get Main Categories
    function getMainCategories($lang_id=NULL, $status=NULL)
    {
        $query = "SELECT * FROM #_shop_categories 
                  LEFT JOIN #_languages ON #_shop_categories.fk_lang_id = #_languages.lang_id 
                  WHERE #_shop_categories.fk_parent_id = 0 ";
        
        // Add Language Filter
        if($lang_id !== NULL){
            $query .= "AND #_shop_categories.fk_lang_id = '$lang_id' ";
        }
        
        // Add Status Filter
        if($status !== NULL){
            $query .= "AND #_shop_categories.shop_category_status = '$status' ";
        }
        
        $this->results = $this->queryExec($query);
        if(!$this->results){
            return FALSE;
        }else{
            $data = array();
            while($row_obj = $this->results->fetch_object()){
                array_push($data, $row_obj); 
            }
            return $data;
        }
    }


    // All Categories
    function getAll($lang_id=NULL, $status=NULL)
    {
        $query = "SELECT * FROM #_shop_categories ";
        $query.= "LEFT JOIN #_languages ON #_shop_categories.fk_lang_id = #_languages.lang_id ";
        
        // Add Language Filter
        if($lang_id !== NULL){
            $query .= "WHERE #_shop_categories.fk_lang_id = '$lang_id' ";
        }
        
        // Add Status Filter
        if($status !== NULL){
            $query .= "AND #_shop_categories.shop_category_status = '$status' ";
        }
        
        $this->results = $this->queryExec($query);
        if(!$this->results){
            return FALSE;
        }else{
            $data = [];
            while($row_obj = $this->results->fetch_object()){
                array_push($data, $row_obj); 
            }
            return $data;
        }
    }
   
    
    
}
