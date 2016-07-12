<div class="items">
    
    <h1><?=Lang::$products?></h1>
    
    <div class="items_list">
        <div class="row">
        <?php if(count($this->items) > 0):?>
            
            <?php foreach($this->items as $curr_item):?>
                <!--
                <?=$curr_item->item_status;?>
                <?=$curr_item->item_stock;?>
                <?=$curr_item->item_short_desc;?>
                -->
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 item_wrapper">
                    <div class="item">
                        <a href="<?=Config::$web_path?>/Shop/showItem/<?=$curr_item->item_id;?>">
                            <div class="item_title">
                                <?=$curr_item->item_title;?>
                            </div>    
                            <div class="item_image">
                                <img src="<?=$curr_item->item_images[0]->image_src;?>" alt="" title="" />
                            </div>
                            <div class="item_price">
                                <label><?=Lang::$item_price?>: </label>
                                <?=$curr_item->item_price;?>
                            </div>
                        </a>
                    </div>
                </div>

            <?php endforeach;?>
            
        <?php endif;?>
        </div>
    </div>
    
</div>