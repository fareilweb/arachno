<div class="pay container-fluid">
    
    <h2><?=Lang::$payment;?> PostePay</h2>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?=$this->debug($this->sale);?>
            <!--
            [sale_id] => 39
            [sale_timestamp] => 2016-09-09 19:54:04
            [sale_cart_json]
            [sale_total] => 95
            [payment_status] => 0
            [shipping_status] => 0
            [fk_user_id] => 41
            [fk_payment_id] => 2
            [fk_shipping_id] => 4
            -->

            <?=$this->debug($this->payment);?>
            <!--
            [payment_id:PaymentModel:private] => 2
            [payment_slug:PaymentModel:private] => postepay
            [payment_name:PaymentModel:private] => PostePay
            [payment_cost:PaymentModel:private] => 1
            [payment_status:PaymentModel:private] => 1
            [payment_details:PaymentModel:private] => Nessuno Dettaglio
            -->
                
        </div>
    </div>
    
</div>