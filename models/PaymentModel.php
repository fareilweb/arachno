<?php

class PaymentModel extends Model
{
    /* Properties */
    private $payment_id = NULL;
    private $payment_slug = NULL;
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
                foreach($data as $key => $val){
                    if(property_exists($this, $key)){
                        $this->$key = $val;
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
                payment_slug,
                payment_cost, 
                payment_details, 
                payment_status
            ) VALUES (
                '$this->payment_name', 
                '$this->payment_slug', 
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
                "payment_name      = '$this->payment_name', " . 
                "payment_slug      = '$this->payment_slug', " . 
                "payment_cost      = '$this->payment_cost', " . 
                "payment_details   = '$this->payment_details'," . 
                "payment_status    = '$this->payment_status'" .
             "WHERE payment_id = '$this->payment_id';";

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