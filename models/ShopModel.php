<?php

class ShopModel extends Model
{
    
    function getCategories($lang_id=NULL)
    {
        $query = "SELECT * FROM #_shop_categories ";
        $query.= "LEFT JOIN #_languages ON #_shop_categories.fk_lang_id = #_languages.lang_id";
        
        // Add Language Filter
        if($lang_id!==NULL){
            $query .= " WHERE #_shop_categories.fk_lang_id = '$lang_id' ";
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
    
    
    function getItems($lang_id=NULL)
    {
        $query = "SELECT * FROM #_shop_items ";
        $query.= "LEFT JOIN #_shop_categories ON #_shop_items.fk_category_id = #_shop_categories.category_id ";
        $query.= "LEFT JOIN #_languages ON #_shop_items.fk_lang_id = #_languages.lang_id";        
        // Add Language Filter
        if($lang_id!==NULL){
            $query .= " WHERE #_shop_items.fk_lang_id = '$lang_id' ";
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
    
    function getItemsByCategory($category_id, $lang_id=NULL)
    {
        $query = "SELECT * FROM #_shop_items ";
        $query.= "LEFT JOIN #_shop_categories ON #_shop_items.fk_category_id = #_shop_categories.category_id ";
        $query.= "LEFT JOIN #_languages ON #_shop_items.fk_lang_id = #_languages.lang_id";
        $query .= " WHERE #_shop_items.fk_category_id = $category_id ";
        // Add Language Filter
        if($lang_id!==NULL){
            $query .= " AND #_shop_items.fk_lang_id = '$lang_id' ";
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