<div class="container-fluid item">
    
    <?php if(isset($this->item) && $this->item->item_id!==NULL): ?>
    <div class="item_wrapper">
        <div class="row">

            <!-- ===============================================================
                BEGIN OF: Left Column
            ================================================================ -->
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                
                <div class="item_images">
                    <!-- Main Image ====================================== -->
                    <div class="row">
                        <div class="item_main_image col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            <?php
                                if(count($this->item->item_images) > 0)
                                {
                                    $main_image_found = FALSE;

                                    foreach($this->item->item_images as $item_image)
                                    {
                                        if($item_image->is_main==TRUE):
                                            ?>
                                                <!-- Use Main Image -->
                                                <img src="<?=Config::$web_path . $item_image->image_src;?>" alt="<?=$item_image->image_alt;?>" title="<?=$item_image->image_title;?>" />
                                            <?php
                                            $main_image_found = TRUE;
                                        endif;
                                    }

                                    if(!$main_image_found):
                                    endif;

                                } else { 
                            ?>
                                <!-- Use Default Image -->
                                <img src="<?=Config::$web_path;?>/views/images/shop/items/default.png" alt="" title="" />
                            <?php 
                                } 
                            ?>

                        </div>
                    </div>                    
                    <!-- Images ========================================== -->
                    <div class="row"><hr/>
                    <?php foreach($this->item->item_images as $item_image): ?>
                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 item_image_col">
                            <div class="item_image_wrapper">
                                <div class="item_image">
                                    <img src="<?=Config::$web_path . $item_image->image_src;?>" 
                                        alt="<?=$item_image->image_alt;?>" 
                                        title="<?=$item_image->image_title;?>" />
                                </div>
                                <div class="item_image_title">
                                    <?=$item_image->image_title;?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <a href="<?=Config::$web_path;?>/Shop/categoryItems/<?=$this->return_category_id;?>">
                        <h3>
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <?=Lang::$back_to_category;?> "<?=$this->return_category_name;?>"
                        </h3>
                    </a>
                </div>

            </div>
            <!-- ===============================================================
                END OF - Left Column
            ================================================================ -->



            <!-- ===============================================================
                BEGIN OF: Right Column
            ================================================================ -->
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="box">
                    <?php if($this->item->item_title): ?>
                    <div class="item_title">
                        <h2><?=$this->item->item_title;?></h2>
                    </div><hr/>
                    <?php endif;?>
                    <!--
                    <?php if($this->item->item_id): ?>
                    <div class="item_id field">
                        <label><?=Lang::$id;?>: </label>
                        <div><?=$this->item->item_id;?></div>
                    </div>
                    <?php endif;?>
                    -->
                    <!--
                    <?php if($this->item->item_status !== ""): ?>
                    <div class="item_status field">
                        <label><?=Lang::$status;?>: </label>
                        <div><?=$this->item->item_status ? Lang::$available : Lang::$unavailable;?></div>
                    </div> 
                    <?php endif;?>
                    -->
                    <!--
                    <?php if($this->item->item_stock): ?>
                    <div class="item_stock field">
                        <label><?=Lang::$item_stock;?>: </label>
                        <div><?=$this->item->item_stock;?></div>
                    </div>
                    <?php endif;?>
                    -->
                    <?php if($this->item->item_price): ?>
                    <div class="item_price field">
                        <label><?=Lang::$item_price;?>: </label>
                        <div><?=$this->item->item_price;?></div>
                    </div>
                    <?php endif;?>
                    <?php if($this->item->item_code): ?>
                    <div class="item_code field">
                        <label><?=Lang::$item_code;?>: </label> 
                        <div><?=$this->item->item_code;?></div>   
                    </div>
                    <?php endif;?>
                    <?php if($this->item->item_weight): ?>
                    <div class="item_weight field">
                        <label><?=Lang::$item_weight;?>: </label>
                        <div><?=$this->item->item_weight;?></div>
                    </div>
                    <?php endif;?>
                    <?php if($this->item->item_colors): ?>
                    <div class="item_colors field">
                        <label><?=Lang::$item_colors;?>: </label>
                        <div><?=$this->item->item_colors;?></div>
                    </div>
                    <?php endif;?>
                    <?php if($this->item->item_short_desc): ?>
                    <div class="item_short_desc field">
                        <label><?=Lang::$item_short_desc;?>: </label>
                        <div><?=$this->item->item_short_desc;?></div>
                    </div>
                    <?php endif;?>
                    <?php if($this->item->item_long_desc): ?>
                    <div class="item_long_desc field">
                        <label><?=Lang::$item_long_desc;?>: </label>
                        <div><?=$this->item->item_long_desc;?></div>
                    </div>
                    <?php endif;?>
                    <?php if(count($this->item->item_categories) > 0):?>
                    <div class="item_categories field">
                        <label><?=Lang::$categories;?>:</label>
                        <div>
                            <?php
                                $i=0; 
                                foreach($this->item->item_categories as $category):
                            ?>
                                <a href="<?=Config::$web_path?>/Shop/categoryItems/<?=$category->shop_category_id?>">
                                    <?=$category->shop_category_name;
                                    if(($i+1)<count($this->item->item_categories)) echo ", ";?>
                                </a>
                            <?php
                                $i++;
                                endforeach;
                            ?>
                        </div>
                    </div>
                    <?php endif;?>

                    <!-- Buy Item -->
                    <div class="buy_item">
                        <br>
                        <a href="<?=Config::$web_path;?>/Shop/addToCart/<?=$this->item->item_id?>">
                            <h3 style="padding: 0;">
                                <img src="<?=Config::$web_path;?>/themes/<?=Config::$theme;?>/images/icon-cart.png" class="icon32" />
                                <?=Lang::$add_to_cart;?>
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </h3>
                        </a>
                    </div>
                
                </div>
            </div>
            <!-- ===============================================================
                END OF - Right Column
            ================================================================ -->

        </div><!-- EMD OF: .row-->
    </div><!-- END OF: .item_wrapper -->
    
    <!--div>
        <label></label>
        <?=$this->item->item_meta_keywords;?>
    </div-->
    <!--div>
        <label></label>
        <?=$this->item->item_meta_description;?>
    </div-->
        
    <?php endif; ?>
    
</div><!-- END OF: .container-fluid.item -->


<!-- =============================
    JavaScript
 ============================= -->
<script>
jQuery(document).ready(function(){

    jQuery(".item_image img").click(function(e){
        var img_src = jQuery(this).attr("src");
        var img_title = jQuery(this).attr("title");
        var img_alt = jQuery(this).attr("alt");
        jQuery(".item_main_image img").attr("src", img_src);
        jQuery(".item_main_image img").attr("title", img_title);
        jQuery(".item_main_image img").attr("alt", img_alt);
    });

    // Fix Image Error
    var defCatImg = "<?=Config::$web_path;?>/views/images/shop/default.png";
    jQuery(".item_main_image img").error(function(e){
        jQuery(this).attr("src", defCatImg);
    });

});
</script>