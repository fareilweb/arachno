<div class="container-fluid review">
    <h2>
        <span class="glyphicon glyphicon-pushpin"></span>
        <strong><?=Lang::$review;?></strong> <?=Lang::$purchase;?>

        <a href="<?=Config::$web_path;?>/Shop/buy" class="btn btn-info">
            <span class="glyphicon glyphicon-ok"></span>
            <?=Lang::$confirm_and_pay;?>
        </a>
    </h2>

    <div class="row">
        <h3><strong><?=Lang::$products;?></strong></h3>
        <hr/>
        
        <?php foreach($this->cart->items as $item):?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                
                <h4><?=$item->item_title;?></h4>
                
                <table>
                <tbody>
                    <tr>
                        <th><strong><?=Lang::$item_code;?></strong></th>                        
                        <td><?=$item->item_code;?></td>
                    </tr>
                    <tr>
                        <th><strong><?=Lang::$item_price;?></strong></th>
                        <td><?=$item->item_price;?></td>
                    </tr>
                    <tr>
                        <th><strong><?=Lang::$quantity;?></strong></th>
                        <td><?=$item->quantity;?></td>
                    </tr>
                    <tr>
                        <th><strong><?=Lang::$image;?></strong></th>
                        <td><?php foreach($item->item_images as $image): ?>
                            <?php if($image->is_main): ?>
                                <div style="width: 100%;">
                                    <img style="width: 80%; margin: 10%;" src="<?=Config::$web_path.$image->image_src;?>" alt="<?=$image->image_alt;?>" title="<?=$image->image_title;?>" />
                                </div>
                            <?php endif;?>
                        <?php endforeach;?></td>
                    </tr>
                </tbody>
                </table>
            </div>
        <?php endforeach;?>
        
    </div>
    
    <br/>
    <div class="row">   
        <br/><h3><strong><?=Lang::$shipping;?></strong></h3>
        <hr/>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <!--$this->cart->shipping_id-->
            <h4><?=$this->shipping->shipping_name;?></h4>
        </div>
    </div>

    <br/>
    <div class="row">
        <br/><h3><strong><?=Lang::$payment;?></strong></h3>
        <hr/>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <!--$this->cart->payment_id-->
            <h4><?=$this->payment->payment_name;?></h4>
        </div>
    </div>

</div>