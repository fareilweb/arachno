<div class="shipping container-fluid">
    
    <h3><?=Lang::$select;?> <?=Lang::$payment;?></h3>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php foreach($this->shippings as $ship_val):?>
                <?php if($ship_val->shipping_status):?>
                <hr/>
                <label>
                    <?=$ship_val->shipping_status?>
                    <input type="radio" name="shipping" value="<?=$ship_val->shipping_id;?>" />
                    <?=$ship_val->shipping_name;?>
                     - &euro; <?=$ship_val->shipping_cost;?>
                     - <?=$ship_val->shipping_details;?>
                </label>
                <?php endif;?>
            <?php endforeach;?>
        </div>
    </div>

</div>