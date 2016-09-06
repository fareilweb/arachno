<?php

class SaleModel extends Model
{
    
    public $sale_id=NULL;
    public $sale_timstamp=NULL;
    public $sale_cart_json=NULL;
    public $sale_total=NULL;
    public $payment_status=NULL;
    public $shipping_status=NULL;
    public $fk_user_id=NULL;
    public $fk_payment_id=NULL;
    public $fk_shipping_id=NULL;

    
    function insert()
    {
        
        
    }
    
    
}
