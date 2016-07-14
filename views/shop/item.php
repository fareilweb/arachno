<div class="item">
    
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
            </div>
            
            <!-- ===============================================================
                SECOND COL 
            ================================================================ -->
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="item_images">
                    <!-- Main Image ====================================== -->
                    <?php foreach($this->item->item_images as $item_image): ?>
                        <?php if($item_image->is_main==TRUE):?>
                            <div class="item_main_image">
                                <img src="<?=$item_image->image_src;?>" alt="<?=$item_image->image_alt;?>" title="<?=$item_image->image_title;?>" />
                            </div>
                        <?php endif;?>
                    <?php endforeach;?>
                    
                    <!-- Images ========================================== -->
                    <div class="row">
                    <?php foreach($this->item->item_images as $item_image): ?>
                        <?php if($item_image->is_main==FALSE):?>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                <div class="item_image_wrapper">
                                    <div class="item_image">
                                        <img src="<?=$item_image->image_src;?>" alt="<?=$item_image->image_alt;?>" title="<?=$item_image->image_title;?>" />
                                    </div>
                                    <div class="item_image_title">
                                        <?=$item_image->image_title;?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
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
