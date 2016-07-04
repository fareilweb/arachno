<?php

class ShopImage extends Model
{
    
    private $image_src;
    private $image_name;
    private $image_title;
    private $image_alt;
    private $is_main;
    private $fk_item_id;
    
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
    
    
    // Load Image
    function load()
    {
        
    }
    
    // Insert
    function insert()
    {
        $query_insert = "INSERT INTO #_shop_images ";
        $query_insert.= "(image_src, image_name, image_title, image_alt, is_main, fk_item_id) ";
        $query_insert.= "VALUES (image_src, image_name, image_title, image_alt, is_main, fk_item_id);";
    }
     
    // Update
    function update()
    {
        // Compose Query
        $fk_item_id = 0;
        $set_string = "";
        $query_update = "UPDATE #_shop_images ";
        $query_update.= "SET $set_string ";
        $query_update.= "WHERE #_shop_images.fk_item_id = '$fk_item_id'; ";
    }
    
    // Delete
    function delete()
    {
        
    }
    
}
