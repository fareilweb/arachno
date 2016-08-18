<div class="container-fluid edit_shipping">
    
    <h2><?=Lang::$edit_shipping;?></h2>

    <form method="post" action="<?=Config::$web_path;?>/Admin/updateShipping">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <!--
                <?=$this->shipping->shipping_id;?>
                <?=$this->shipping->shipping_name;?>
                <?=$this->shipping->shipping_cost;?>
                <?=$this->shipping->shipping_status;?>
                <?=$this->shipping->shipping_details;?>
                -->
            </div>
        </div>
    </form>

</div>
