<?php

class ShopModel extends Model
{
    
    function getData()
    {
        $data = [];
        return $data;
    }
    
    
    function getCategories()
    {
        $query = "SELECT * FROM #_shop_categories";
        $results = $this->queryExec($query);
        if(!$results){
            return FALSE;
        }else{
            $data = [];
            while($row = $results->fetch_object()){
                array_push($data, $row); 
            }
            $results->free();
            $this->mysqli->close();
            return $data;
        }
    }
    
    
    function getItems($fk_category_id=NULL, $item_code=NULL)
    {
        $query = "SELECT * FROM #_shop_items ";
        
        if($fk_category_id!==NULL){
            $query .= " WHERE #_shop_items.fk_category_id = $fk_category_id ";
        }
        
        if($item_code!==NULL){
            $query .= " WHERE #_shop_items.item_code = '$item_code' ";
        }
        
        $result = $this->queryExec($query);
           
        $data = array();
        while($row = $result->fetch_object()){
            array_push($data, $row);
        }
        
        if(!$result){
            return FALSE;
        }else{
            return $data;
        }   
    }
    
    
}