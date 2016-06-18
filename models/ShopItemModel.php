<?php

class ShopItemModel extends Model
{
    
    // Class Proprerties
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
    
    
    // Populate Propriesties By Item ID
    public function loadById($item_id = NULL)
    {
        $query = "SELECT * FROM #_shop_items WHERE item_id = $item_id";
        $item_data = $this->getObjectData($query);
        if($item_data){
            foreach($item_data as $item_key => $item_val)
            {
                $this->$item_key = $item_val;
            }
        }
        
    }
    
    // Populate Proprieties From Gived OBJECT
    public function loadFromObject($item_obj = NULL)
    {
        
    }
    
    // Populate Proprieties From Gived ARRAY
    public function loadFromArray($item_array = NULL)
    {
        foreach ($item_array as $item_key => $item_val)
        {
            $this->$item_key = $item_val;
        }
    }
    
    
    
    
}