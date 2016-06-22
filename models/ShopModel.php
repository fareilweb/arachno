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
    
    
}