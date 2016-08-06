<div class="item container-fluid">
    
    <?php if(isset($this->item) && $this->item->item_id!==NULL): ?>
    <div class="item_wrapper">
        <div class="row">
            <!-- ===============================================================
                FIRST COL 
            ================================================================ -->
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="item_id">
                    <label><?=Lang::$id;?> </label>
                    <?=$this->item->item_id;?>
                </div>
                <div class="item_code">
                    <label><?=Lang::$item_code;?> </label>
                    <?=$this->item->item_code;?>    
                </div>
                <div class="category_name">
                    <label><?=Lang::$item_category;?> </label>
                    <?=$this->item->category_name;?>
                </div>
                <div class="item_status">
                    <label><?=Lang::$status;?> </label>
                    <?=$this->item->item_status ? Lang::$available : Lang::$unavailable;?>
                </div>
                <div class="item_stock">
                    <label><?=Lang::$item_stock;?> </label>
                    <?=$this->item->item_stock;?>
                </div>
                <div class="item_price">
                    <label><?=Lang::$item_price;?> </label>
                    <?=$this->item->item_price;?>
                </div>
                <div class="item_title">
                    <label><?=Lang::$item_title;?> </label>
                    <?=$this->item->item_title;?>
                </div>
                <div class="item_weight">
                    <label><?=Lang::$item_weight;?> </label>
                    <?=$this->item->item_weight;?>
                </div>
                <div class="item_colors">
                    <label><?=Lang::$item_colors;?> </label>
                    <?=$this->item->item_colors;?>
                </div>
                <div class="item_short_desc">
                    <label><?=Lang::$item_short_desc;?> </label>
                    <?=$this->item->item_short_desc;?>
                </div>
                <div class="item_long_desc">
                    <label><?=Lang::$item_long_desc;?> </label>
                    <?=$this->item->item_long_desc;?>
                </div>
                <hr/>
                
                <div class="buy_item">    
                    <a href="<?=Config::$web_path;?>/Shop/addToCart/<?=$this->item->item_id?>" class="btn btn-info">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                        <?=Lang::$add_to_cart;?>
                    </a>
                </div>
                
            </div>
            
            <!-- ===============================================================
                SECOND COL 
            ================================================================ -->
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="item_images">
                    <!-- Main Image ====================================== -->
                    <?php foreach($this->item->item_images as $item_image): ?>
                        <?php if($item_image->is_main==TRUE):?>
                        <div class="row">
                            <div class="item_main_image col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <img src="<?=Config::$web_path . $item_image->image_src;?>" alt="<?=$item_image->image_alt;?>" title="<?=$item_image->image_title;?>" />
                            </div>
                        </div>
                        <?php endif;?>
                    <?php endforeach;?>
                    
                    <!-- Images ========================================== -->
                    <div class="row"><hr/>
                    <?php foreach($this->item->item_images as $item_image): ?>
                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="item_image_wrapper">
                                <div class="item_image">
                                    <img src="<?=Config::$web_path . $item_image->image_src;?>" alt="<?=$item_image->image_alt;?>" title="<?=$item_image->image_title;?>" />
                                </div>
                                <div class="item_image_title">
                                    <?=$item_image->image_title;?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
    <!--div>
        <label></label>
        <?=$this->item->item_meta_keywords;?>
    </div-->
    <!--div>
        <label></label>
        <?=$this->item->item_meta_description;?>
    </div-->
        
    <?php endif; ?>
    
</div>


<!--JavaScript-->
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

});
</script>