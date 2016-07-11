<?php

class ShopImageModel extends Model
{
    private $excluded_fields = array("excluded_fields", "mysqli", "results");

    private $image_src = NULL;
    private $image_path = NULL;
    private $image_name = NULL;
    private $image_title = NULL;
    private $image_alt = NULL;
    private $is_main = NULL;
    private $fk_item_id = NULL;
    
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
        $query_insert.= "(image_src, image_path, image_name, image_title, image_alt, is_main, fk_item_id) ";
        $query_insert.= "VALUES ('$this->image_src', '$this->image_path', '$this->image_name', '$this->image_title', '$this->image_alt', '$this->is_main', '$this->fk_item_id');";
        if(!$this->queryExec($query_insert)){
            return FALSE;
        }else{
            return $this->mysqli->insert_id;
        }
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
    function delete($image_id=NULL)
    {
        $query_delete = "DELETE FROM #_shop_images WHERE #_shop_images.image_id = '$image_id'";
        if(!$this->queryExec($query_delete)){
            return FALSE;
        }else{
            return TRUE;
        }        
    }
    
}
