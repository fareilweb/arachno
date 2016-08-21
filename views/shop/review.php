<div class="container-fluid review">

    <h3>
        <span class="glyphicon glyphicon-pushpin"></span>
        <strong><?=Lang::$review;?></strong> <?=Lang::$purchase;?>
    </h3>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php
                //$this->cart->items
                //$this->cart->shipping_id
                //$this->cart->payment_id
            ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <a href="" class="btn btn-info">
                <span class="glyphicon glyphicon-ok"></span>
                <?=Lang::$confirm_and_pay;?>
            </a>
        </div>
    </div>

</div>