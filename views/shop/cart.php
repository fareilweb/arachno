<div class="cart container-fluid">
    
    <div class="row">
        
        <h2><?=Lang::$cart;?></h2>
        
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php if(!$this->cart):?>
            
                <?=Lang::$empty_cart;?>
            
            <?php else:?>
                
            <?php foreach($this->cart->items as $item_key => $item_val):?> 
            
                <!--<?=$item_val->item_id;?>-->
                <!--<?=$item_val->item_code;?>-->
                <!--?=$item_val->item_categories;?-->
                <!--<?=$item_val->item_status;?>-->
                <!--<?=$item_val->item_stock;?>-->
                <!--<?=$item_val->item_price;?>-->
                <!--<?=$item_val->item_title;?>-->
                <!--<?=$item_val->item_weight;?>-->
                <!--<?=$item_val->item_colors;?>-->
                <!--<?=$item_val->item_short_desc;?>-->
                <!--<?=$item_val->item_long_desc;?>-->
                <!--<?=$item_val->item_meta_keywords;?>-->
                <!--<?=$item_val->item_meta_description;?>-->
                <!--<?=$item_val->fk_lang_id;?>-->
                <!--?=$item_val->item_images;?-->
            
            <?php endforeach;?>
                
            <?php endif;?>
        </div>
        
    </div>
    
</div>