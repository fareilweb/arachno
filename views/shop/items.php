<div class="container-fluid items">
    
    <h2><?=Lang::$products?></h2>
    <hr/>

    <div class="items_list">
        <div class="row">
        <?php if(count($this->items) > 0):?>
            
            <?php foreach($this->items as $curr_item):?>
                <!--
                <?=$curr_item->item_status;?>
                <?=$curr_item->item_stock;?>
                <?=$curr_item->item_short_desc;?>
                -->
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 current_item_wrapper">
                    <div class="current_item">
                        <a href="<?=Config::$web_path?>/Shop/showItem/<?=$curr_item->item_id;?>">
                            
                            <div class="current_item_title">
                                <?=$curr_item->item_title;?>
                            </div>    
                            
                            <div class="current_item_image">
                                <?php foreach($curr_item->item_images as $curr_img_key => $curr_img_obj):?>
                                    <?php if($curr_img_obj->is_main):?>
                                        <img src="<?=Config::$web_path . $curr_item->item_images[$curr_img_key]->image_src;?>" alt="<?=$curr_item->item_images[$curr_img_key]->image_alt;?>" title="<?=$curr_item->item_images[$curr_img_key]->image_title;?>" />
                                    <?php endif;?>
                                <?php endforeach;?>
                            </div>
                            
                            <div class="current_item_price">
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