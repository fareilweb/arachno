<?php

class ShopModel extends Model
{
    
    /* =========================================================================
     * All Categories
     * =========================================================================*/
    function getAllCategories($lang_id=NULL, $status=NULL)
    {
        $query = "SELECT * FROM #_shop_categories ";
        $query.= "LEFT JOIN #_languages ON #_shop_categories.fk_lang_id = #_languages.lang_id ";
        
        // Add Language Filter
        if($lang_id !== NULL){
            $query .= "WHERE #_shop_categories.fk_lang_id = '$lang_id' ";
        }
        
        // Add Status Filter
        if($status !== NULL){
            $query .= "AND #_shop_categories.category_status = '$status' ";
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
    
    /* =========================================================================
     * Main Categories
     * =========================================================================*/
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
            $query .= "AND #_shop_categories.category_status = '$status' ";
        }
        
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
    
    /* =========================================================================
     * Category Children
     * =========================================================================*/
    function getCategoryChildren($category_id=NULL)
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
    
    /* =========================================================================
     * All Items
     * =========================================================================*/
    function getItems($lang_id=NULL, $status=NULL)
    {
        $query = "SELECT * FROM #_shop_items ";
        $query.= "LEFT JOIN #_languages ON #_languages.lang_id = #_shop_items.fk_lang_id ";
        
        // Add Language Filter
        if($lang_id!==NULL){
            $query .= " WHERE #_shop_items.fk_lang_id = '$lang_id' ";
        }
        
        // Add Status Filter
        if($status!==NULL){
            $query .= "AND #_shop_items.item_status = '$status' ";
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
    
    /* =========================================================================
     * Category Items
     * =========================================================================*/
    function getItemsByCategory($category_id, $status=NULL, $lang_id=NULL)
    {
        $query = 
           "SELECT * FROM #_shop_items 
            JOIN #_items_has_categories ON #_shop_items.item_id = #_items_has_categories.item_id 
            WHERE #_items_has_categories.category_id = '$category_id' ";
        
        // Add Language Filter
        if($lang_id!==NULL){
            $query .= "AND #_shop_items.fk_lang_id = '$lang_id' ";
        }
        
        // Add Status Filter
        if($status!==NULL){
            $query .= "AND #_shop_items.item_status = '$status' ";
        }
        
        // Exec Query Form Items
        $this->results = $this->queryExec($query);
        
        // Get Data From Items Result
        $data = array();
        while($item_obj = $this->results->fetch_object()){
            array_push($data, $item_obj);/*<--Add The Complete Item To Data*/
        }
        
        // Add Images To Every Item
        foreach($data as $item_obj){
            $item_obj->item_images = array();
            $query_images = "SELECT * FROM #_shop_items_images WHERE #_shop_items_images.fk_item_id = '$item_obj->item_id'";
            $item_images_results = $this->queryExec($query_images);
            while($img_obj = $item_images_results->fetch_object()){
                array_push($item_obj->item_images, $img_obj);
            }
        }
        
        // Return Data or FALSE
        if(!$this->results){
            return FALSE;
        }else{
            return $data;
        }
    }
    
    /* =========================================================================
     * Shipping Methods
     * =========================================================================*/
    function getShipMethods()
    {
        $query = "SELECT * FROM #_shippings; ";
        $this->results = $this->queryExec($query);
        
        // Get Data From Result
        $data = array();
        while($item_obj = $this->results->fetch_object()){
            array_push($data, $item_obj);/*<--Add The Complete Item To Data*/
        }
        
        return $data;
    }
    
    // Delete A Shipping Method From DB
    function deleteShipping($shipping_id=NULL)
    {
        if($shipping_id != NULL){
            $query = "DELETE FROM #_shippings WHERE shipping_id = $shipping_id; ";
            if(!$this->queryExec($query)){
                return FALSE;
            }else{
                return TRUE;
            }
        }
    }
    
    // Edit A Shipping Method
    function updateShipping()
    {
        
    }
    
    
     
    /* =========================================================================
     * Payment Methods
     * =========================================================================*/
    function getPayMethods()
    {
        $query = "SELECT * FROM #_payments;";
        $this->results = $this->queryExec($query);
        
        // Get Data From Result
        $data = array();
        while($item_obj = $this->results->fetch_object()){
            array_push($data, $item_obj);/*<--Add The Complete Item To Data*/
        }
        
        return $data;
    }
    
    // Delete A Pay Method From DB
    function deletePayMethod($payment_id=NULL)
    {
        if($payment_id != NULL){
            $query = "DELETE FROM #_payments WHERE payment_id = $payment_id; ";
            if(!$this->queryExec($query)){
                return FALSE;
            }else{
                return TRUE;
            }
        }
    }
    
    // Edit A Pay Method
    function updatePayMethod(){}
    
}