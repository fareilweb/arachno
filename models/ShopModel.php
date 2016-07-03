<?php

class ShopModel extends Model
{
    
    function getCategories($fk_lang_id=NULL)
    {
        $query = "SELECT * FROM #_shop_categories ";
        $query.= "LEFT JOIN #_languages ON #_shop_categories.fk_lang_id = #_languages.lang_id";
        
        // Optional Conditions
        if($fk_lang_id!==NULL){
            $query .= " WHERE #_shop_items.fk_lang_id = '$fk_lang_id' ";
        }
        
        $this->results = $this->queryExec($query);
        if(!$this->results){
            return FALSE;
        }else{
            $data = [];
            while($row_obj = $this->results->fetch_object()){
                array_push($data, $row_obj); 
            }
            //$this->cleanAndClose();
            return $data;
        }
    }
    
    
    function getItems($fk_category_id=NULL, $item_code=NULL, $fk_lang_id=NULL)
    {
        $query = "SELECT * FROM #_shop_items ";
        $query.= "LEFT JOIN #_shop_categories ON #_shop_items.fk_category_id = #_shop_categories.category_id ";
        $query.= "LEFT JOIN #_languages ON #_shop_items.fk_lang_id = #_languages.lang_id";
        
        // Optional Conditions
        if($fk_category_id!==NULL){
            $query .= " WHERE #_shop_items.fk_category_id = $fk_category_id ";
        }
        
        if($item_code!==NULL){
            $query .= " WHERE #_shop_items.item_code = '$item_code' ";
        }
        
        if($fk_lang_id!==NULL){
            $query .= " WHERE #_shop_items.fk_lang_id = '$fk_lang_id' ";
        }
        
        $this->results = $this->queryExec($query);
           
        $data = array();
        while($row = $this->results->fetch_object()){
            array_push($data, $row);
        }
        
        if(!$this->results){
            return FALSE;
        }else{
            return $data;
        }   
    }
    
    
}