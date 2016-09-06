<?php

class SaleModel extends Model
{
    public $excluded = array("excluded", "sale_id", "mysqli", "results");
    public $sale_id=NULL;
    public $sale_timestamp=NULL;
    public $sale_cart_json=NULL;
    public $sale_total=NULL;
    public $payment_status=NULL;
    public $shipping_status=NULL;
    public $fk_user_id=NULL;
    public $fk_payment_id=NULL;
    public $fk_shipping_id=NULL;
    
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
            $this->sale_id = $res;
            return $res;
        }
    }
    
}
