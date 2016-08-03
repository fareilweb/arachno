<?php

class ShopImageModel extends Model
{
    private $excluded_fields = array("excluded_fields", "mysqli", "results");

    private $image_id = NULL;
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
    function load($image_id=NULL)
    {
        if($image_id!==NULL){
            $query = "SELECT * FROM #_shop_items_images WHERE image_id = '$image_id'";
            $img_data = $this->getObjectData($query);
            if(!$img_data){
                return FALSE;
            }else{
                $this->image_id = $img_data->image_id;
                $this->image_src = $img_data->image_src;
                $this->image_path = $img_data->image_path;
                $this->image_name = $img_data->image_name;
                $this->image_title = $img_data->image_title;
                $this->image_alt = $img_data->image_alt;
                $this->is_main = $img_data->is_main;
                $this->fk_item_id = $img_data->fk_item_id;
                return TRUE;
            }
        }
    }
    
    // Insert
    function insert()
    {
        $this->image_src = $this->escape($this->image_src);
        $this->image_path = $this->escape($this->image_path);
        $this->image_name = $this->escape($this->image_name);
        $this->image_title = $this->escape($this->image_title);
        $this->image_alt = $this->escape($this->image_alt);
        
        $query_insert = "INSERT INTO #_shop_items_images ";
        $query_insert.= "(image_src, image_path, image_name, image_title, image_alt, is_main, fk_item_id) ";
        $query_insert.= "VALUES (
            '$this->image_src', 
            '$this->image_path',
            '$this->image_name',
            '$this->image_title',
            '$this->image_alt',
            '$this->is_main',
            '$this->fk_item_id'
        );";
        
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
        $query_update = "UPDATE #_shop_items_images ";
        $query_update.= "SET $set_string ";
        $query_update.= "WHERE #_shop_items_images.fk_item_id = '$fk_item_id'; ";
        
        // TODO -----
    }
    
    
    // Set As Main
    function setAsMain(){
        
        $this->image_id;
        $this->fk_item_id;
        
        // TODO -----
    }
    
    
    public function deleteFile($file_path=NULL)
    {
        if($file_path===NULL){
            $file_path = $this->image_path;
        }
        
        if($file_path!==NULL && file_exists($file_path)){
            return unlink($file_path);
        }
    }
    
    // Delete
    function delete($image_id=NULL)
    {
        if($image_id===NULL){
            $image_id = $this->image_id;
        }
        
        if($image_id!==NULL)
        {
            // Delete The File From Disk And Database
            $query_delete = "DELETE FROM #_shop_items_images WHERE #_shop_items_images.image_id = '$image_id'";
            if(!$this->queryExec($query_delete)){
                return FALSE;
            }else{
                return TRUE;
            }

        }        
    }
    
}
