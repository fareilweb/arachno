<?php

class SaleModel extends Model
{
    public $excluded = array("excluded", "excluded_from_loading", "sale_id", "mysqli", "results");

    public $sale_id=NULL;
    public $sale_timestamp=NULL;
    public $sale_cart_json=NULL;
    public $sale_total=NULL;
    public $payment_status=NULL;
    public $shipping_status=NULL;
    public $fk_user_id=NULL;
    public $fk_payment_id=NULL;
    public $fk_shipping_id=NULL;
    public $shipping_address=NULL;
    public $shipping_zip=NULL;
    public $shipping_city=NULL;
    public $shipping_province=NULL;
    public $shipping_state=NULL;
    
    function insert()
    {
        $fields = "";
        $values = "";
        $count = 0;
        foreach((array)$this as $field => $value){
            if(!in_array($field, $this->excluded)){
                $fields.= $field;
                $values.= "'".$value."'"; 
                if($count < (count((array)$this) - (count($this->excluded))-1)){
                    $fields.= ", ";
                    $values.= ", ";
                    $count++;
                }
            }
        }
        $query = "INSERT INTO #_sales ($fields) VALUES ($values);";
        $res = $this->queryExec($query);
        if(!$res){
            return FALSE;
        }else{
            $this->sale_id = $this->mysqli->insert_id;
            return $this->sale_id;
        }
    }
    
    
    function load($sale_id)
    {
        $this->sale_id = $sale_id; 
        
        $query = "SELECT * FROM #_sales WHERE sale_id = '$sale_id'";
        $data = $this->getObjectData($query);
        if(!$data){
            return FALSE;
        }else{
            foreach((array)$this as $field => $value){
                if(!in_array($field, $this->excluded)){
                    $this->$field = $data->$field;
                }
            }
        }
    }
    
}
