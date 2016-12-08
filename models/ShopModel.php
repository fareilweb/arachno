<?php

class ShopModel extends Model
{
    
 
    
    
     
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