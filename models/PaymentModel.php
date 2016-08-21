<?php

class PaymentModel extends Model
{
    /* Properties */
    private $payment_id = NULL;
    private $payment_name = NULL;
    private $payment_cost = NULL;
    private $payment_status = NULL;
    private $payment_details = NULL;

    /* Getter/Setter Magic Methods */
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
    
    
    // Load
    public function load($payment_id=NULL)
    {
        if($payment_id !== NULL){
            $query = "SELECT * FROM #_payments WHERE payment_id = $payment_id; ";
            $data = $this->getArrayData($query);
            if($data!==FALSE AND $data!==0){
                foreach($data as $ship_k => $ship_v){
                    if(property_exists($this, $ship_k)){
                        $this->$ship_k = $ship_v;
                    }
                }
            }else{
                return FALSE;
            }
        }
    }
    
    
    // Insert
    public function insert($data)
    {
        foreach($data as $key => $val){
            if(property_exists($this, $key)){
                $this->$key = $val;
            }
        }
        
        $query = 
            "INSERT INTO #_payments (
                payment_name, 
                payment_cost, 
                payment_details, 
                payment_status
            ) VALUES (
                '$this->payment_name', 
                '$this->payment_cost', 
                '$this->payment_details', 
                '$this->payment_status'
            ); ";
        
        if(!$this->queryExec($query)){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    
    
    // Update
    public function update($data)
    {
        foreach($data as $key => $val){
            if(property_exists($this, $key)){
                $this->$key = $val;
            }
        }

        $query = 
            "UPDATE #_payments 
             SET " .
                "payment_name      = '" . $data['payment_name'] . "'," . 
                "payment_cost      = '" . $data['payment_cost'] . "'," . 
                "payment_details   = '" . $data['payment_details'] . "'," . 
                "payment_status    = '" . $data['payment_status'] . "'" .
             "WHERE payment_id = " . $data['payment_id'] . "; ";

        if(!$this->queryExec($query)){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    
    
    // Delete A Shipping Method From DB
    function delete($payment_id=NULL)
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
}