<?php

class ShopItemModel extends Model
{
    // Class Proprierties
    private $item_id                = NULL;
    private $item_code              = NULL;
    private $fk_category_id         = NULL;
    private $item_status            = NULL; 
    private $item_stock             = NULL; 
    private $item_price             = NULL; 
    private $item_title             = NULL; 
    private $item_weight            = NULL;
    private $item_color             = NULL; 
    private $item_short_desc        = NULL; 
    private $item_long_desc         = NULL; 
    private $item_meta_keywords     = NULL;
    private $item_meta_description  = NULL;
    private $fk_lang_id             = NULL;
    private $category_name          = NULL;
    private $category_status        = NULL;
    
    // Getter Magin Method
    public function __get($property){
        if (property_exists($this, $property)){
            return $this->$property;
        }
    }

    // Setter Magic Method
    public function __set($property, $value){
        if (property_exists($this, $property)){
            $this->$property = $value;
        }
        return $this;
    }
    
    // Populate Proprierties By Item ID
    public function loadById($item_id = NULL)
    {
        Lang::$lang_id;
        
        $query = 
            "SELECT * FROM #_shop_items 
            LEFT JOIN #_shop_categories ON category_id = #_shop_items.fk_category_id 
            WHERE item_id = $item_id 
            AND #_shop_items.fk_lang_id = " . Lang::$lang_id . ";";
        
        $item_data = $this->getObjectData($query);
        if($item_data){
            foreach($item_data as $item_key => $item_val)
            {
                $this->$item_key = $item_val;
            }
        }
        
    }
    
    
    public function insert(){
        $fields = "`item_code`,";
        $fields.= "`fk_category_id`,";
        $fields.= "`item_status`,";
        $fields.= "`item_stock`,";
        $fields.= "`item_price`,";
        $fields.= "`item_title`,";
        $fields.= "`item_weight`,";
        $fields.= "`item_color`,";
        $fields.= "`item_short_desc`,";
        $fields.= "`item_long_desc`,";
        $fields.= "`item_meta_keywords`,";
        $fields.= "`item_meta_description`,";
        $fields.= "`fk_lang_id`";
        $values = "'" . $this->item_code .     "',";
        $values.= "'" . $this->fk_category_id ."',";
        $values.= "'" . $this->item_status .   "',";
        $values.= "'" . $this->item_stock .    "',";
        $values.= "'" . $this->item_price .    "',";
        $values.= "'" . $this->item_title .    "',";
        $values.= "'" . $this->item_weight .   "',";
        $values.= "'" . $this->item_color .    "',";
        $values.= "'" . $this->item_short_desc . "',";
        $values.= "'" . $this->item_long_desc . "',";
        $values.= "'" . $this->item_meta_keywords . "',";
        $values.= "'" . $this->item_meta_description . "',";
        $values.= "'" . $this->fk_lang_id . "'";     
        $query = "INSERT INTO #_shop_items( $fields ) VALUES ( $values );";
        if(!$this->queryExec($query)){ return FALSE; }else{ return TRUE; }
    }
    
    
    public function iteratedInsert()
    {
        $fields = "";
        $values = "";
        $count = 0;
        foreach($this as $item_key=>$item_val)
        {
            $fields.= "`" .$item_key . "`";
            $values.= "'" .$item_val . "'";
            if($count < count($this->post)){ $fields.= ", "; $values.= ", "; }
            $count++;
        }
        
        $query = 
            "INSERT INTO #_shop_items"
            . "( $fields )"
            . "VALUES( $values );";
        
        
        if(!$this->queryExec($query)){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    
    
    public function update()
    {
    
        
        
    }
    
    
    
}