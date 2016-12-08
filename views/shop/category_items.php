<?php include dirname(__FILE__) . "/category_header.php";?>

<div class="container-fluid items">
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
                        <a href="<?=Config::$web_path?>/Shop/item/<?=$curr_item->item_id;?>/category_name/<?=$this->category->shop_category_name;?>/category_id/<?=$this->category->shop_category_id;?>">
                            
                            <div class="current_item_image">
                            <?php 
                                if(count($curr_item->item_images) > 0):
                                    foreach($curr_item->item_images as $image_key=>$image_obj):
                                        if($image_obj->is_main):
                                        ?>
                                            <img src="<?=Config::$web_path . $curr_item->item_images[$image_key]->image_src;?>" alt="<?=$curr_item->item_images[$image_key]->image_alt;?>" title="<?=$curr_item->item_images[$image_key]->image_title;?>" />
                                        <?php 
                                        endif;
                                    endforeach;
                                else:
                            ?>
                                <img src="<?=Config::$web_path;?>/views/images/shop/default.png" alt="<?=Lang::$category;?>" title="<?=Lang::$category;?>" />
                            <?php endif;?>

                            </div>

                            <div class="current_item_title">
                                <?=$curr_item->item_title;?>
                            </div>
                            
                            <div class="current_item_price">
                                <label><!--?=Lang::$item_price?-->&euro; </label>
                                <strong><?=$curr_item->item_price;?> + <?=Lang::$vat;?></strong>
                            </div>
                            
                        </a>
                    </div>
                </div>

            <?php endforeach;?>
        <?php else:?>
            <strong><?=Lang::$category_is_empty;?></strong>
        <?php endif;?>
        </div>
    </div>
    
    <!-- Sub Categories -->
    <br/>
    <?php if(count($this->category->children)>0):?>
    <div class="category_children_list">
        <h3><?=Lang::$subcategories;?></h3>
        <?php
            $i=0; 
            foreach($this->category->children as $category):
            $raw_url = Config::$web_path . "/Shop/categoryItems/" . $category->shop_category_id . "/category_name/" . $this->category->shop_category_name . "/category_id/" . $this->category->shop_category_id;
            $url_encoded = $raw_url; //rawurlencode($raw_url);
        ?>
            <a href="<?=$url_encoded;?>">
                <strong><?=$category->shop_category_name;
                if(($i+1)<count($this->category->children)) echo ", ";?></strong>
            </a>
        <?php
            $i++;
            endforeach;
        ?>
    </div>
    <?php endif;?>

    <!-- Return to Another Position -->
    <br/>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
        <a href="<?=$this->return_url;?>">
            <h3>
                <span class="glyphicon glyphicon-chevron-left"></span>
                <?=$this->return_string;?>
            </h3>
        </a>
    </div>

</div>

<script>
    var defCatImg = "<?=Config::$web_path;?>/views/images/shop/default.png";
    jQuery(".categories_list img").error(function(e){
        jQuery(this).attr("src", defCatImg);
    });
</script>