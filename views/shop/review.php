<div class="container-fluid review">

    <h2>
        <span class="glyphicon glyphicon-pushpin"></span>
        <strong><?=Lang::$review;?></strong> <?=Lang::$purchase;?>
    </h2>
    
    <hr/>

        <h3><?=Lang::$products;?></h3>

        <div class="row">
            <?php foreach($this->cart->items as $item):?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <h4>
                        <strong><?=Lang::$id;?></strong>
                        <?=$item->item_id;?>
                    </h4>
                    <h4>
                        <strong><?=Lang::$item_code;?></strong>                        
                        <?=$item->item_code;?>
                    </h4>
                    <h4>
                        <strong><?=Lang::$item_price;?></strong>
                        <?=$item->item_price;?>
                    </h4>
                    <h4>
                        <strong><?=Lang::$item_title;?></strong>
                        <?=$item->item_title;?>
                    </h4>
                    <h4>
                        <strong><?=Lang::$item_short_desc;?></strong>
                        <?=$item->item_short_desc;?>
                    </h4>
                    <h4>
                        <strong><?=Lang::$quantity;?></strong>
                        <?=$item->quantity;?>
                    </h4>
                    <h4>
                        <strong><?=Lang::$image;?></strong>
                        <?php foreach($item->item_images as $image): ?>
                            <?php if($image->is_main): ?>
                                <div style="width: 100%;">
                                    <img style="width: 80%; margin: 10%;" src="<?=Config::$web_path.$image->image_src;?>" alt="<?=$image->image_alt;?>" title="<?=$image->image_title;?>" />
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    </h4>
                </div>
            <?php endforeach;?>
        </div>

        <?php
            //$this->cart->shipping_id
            //$this->cart->payment_id
        ?>

    <hr/>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <a href="" class="btn btn-info">
                <span class="glyphicon glyphicon-ok"></span>
                <?=Lang::$confirm_and_pay;?>
            </a>
        </div>
    </div>

</div>