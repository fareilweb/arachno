<div class="pay container-fluid">
    
    <h2><?=Lang::$payment;?> <?=$this->payment->payment_name;?></h2>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            
            <table>
                <tbody>
                    <tr>
                        <th><?=Lang::$details;?></th>
                        <td><?=$this->payment->payment_details;?></td>
                    </tr>
                    <tr>
                        <th><?=Lang::$total;?></th>
                        <td><?=$this->sale->sale_total;?></td>
                    </tr>
                </tbody>
            </table>

            <!--?=$this->sale->sale_id;?-->
            <!--?=$this->sale->sale_timestamp;?-->
            <!--?=$this->sale->sale_cart_json;?-->
            <!--?=$this->sale->sale_total;?-->
            <!--?=$this->sale->payment_status;?-->
            <!--?=$this->sale->shipping_status;?-->
            <!--?=$this->sale->fk_user_id;?-->
            <!--?=$this->sale->fk_payment_id;?-->
            <!--?=$this->sale->fk_shipping_id;?-->
            
            <!--?=$this->payment->payment_id;?-->
            <!--?=$this->payment->payment_slug;?-->
            <!--?=$this->payment->payment_name;?-->
            <!--?=$this->payment->payment_cost;?-->
            <!--?=$this->payment->payment_status;?-->
            <!--?=$this->payment->payment_details;?-->
                
        </div>
    </div>
    
</div>