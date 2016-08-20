<?php

class ShippingModel extends Model
{
    /* Properties */
    private $shipping_id = NULL;
    private $shipping_name = NULL;
    private $shipping_cost = NULL;
    private $shipping_status = NULL;
    private $shipping_details = NULL;

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
    public function load($shipping_id=NULL)
    {
        if($shipping_id !== NULL){
            $query = "SELECT * FROM #_shippings WHERE shipping_id = $shipping_id; ";
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
            "INSERT INTO #_shippings (
                shipping_name, 
                shipping_cost, 
                shipping_details, 
                shipping_status
            ) VALUES (
                '$this->shipping_name', 
                '$this->shipping_cost', 
                '$this->shipping_details', 
                '$this->shipping_status'
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
            "UPDATE #_shippings 
             SET " .
                "shipping_name      = '" . $data['shipping_name'] . "'," . 
                "shipping_cost      = '" . $data['shipping_cost'] . "'," . 
                "shipping_details   = '" . $data['shipping_details'] . "'," . 
                "shipping_status    = '" . $data['shipping_status'] . "'" .
             "WHERE shipping_id = " . $data['shipping_id'] . "; ";

        if(!$this->queryExec($query)){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    
    
    // Delete A Shipping Method From DB
    function delete($shipping_id=NULL)
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
}