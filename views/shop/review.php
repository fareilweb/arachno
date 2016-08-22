<div class="container-fluid review">

    <h3>
        <span class="glyphicon glyphicon-pushpin"></span>
        <strong><?=Lang::$review;?></strong> <?=Lang::$purchase;?>
    </h3>
    
        <h3><?=Lang::$products;?></h3>

        <div class="row">
            <?php foreach($this->cart->items as $item):?>
                <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2">
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <th><?=Lang::$id;?></th>
                                <td><?=$item->item_id;?></td>
                            </tr>
                            <tr>
                                <th><?=Lang::$item_code;?></th>
                                <td><?=$item->item_code;?></td>
                            </tr>
                            <tr>
                                <th><?=Lang::$item_price;?></th>
                                <td><?=$item->item_price;?></td>
                            </tr>
                            <tr>
                                <th><?=Lang::$item_title;?></th>
                                <td><?=$item->item_title;?></td>
                            </tr>
                            <tr>
                                <th><?=Lang::$item_short_desc;?></th>
                                <td><?=$item->item_short_desc;?></td>
                            </tr>
                            <tr>
                                <th><?=Lang::$quantity;?></th>
                                <td><?=$item->quantity;?></td>
                            </tr>
                            <tr>
                                <th><?=Lang::$image;?></th>
                                <td>
                                    <?php foreach($item->item_images as $image): ?>
                                        <?php if($image->is_main): ?>
                                            <img src="<?=Config::$web_path.$image->image_src;?>" />
                                            <?=$image->image_title;?>
                                            <?=$image->image_alt;?>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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