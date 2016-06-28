<div class="items_list">
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2>Lista Prodotti</h2>
        </div>
    </div><hr/>
    
    <?php if(isset($this->items) && $this->items!==FALSE):?>
        <?php foreach($this->items as $item_val):?>

                 <!--?=$item_val->item_id;?-->
                 <!--?=$item_val->item_code;?-->
                 <!--?=$item_val->fk_category_id;?-->
                 <!--?=$item_val->item_status;?-->
                 <!--?=$item_val->item_stock;?-->
                 <!--?=$item_val->item_price;?-->
                 <!--?=$item_val->item_title;?-->
                 <!--?=$item_val->item_weight;?-->
                 <!--?=$item_val->item_color;?-->
                 <!--?=$item_val->item_short_desc;?-->
                 <!--?=$item_val->item_long_desc;?-->
                 <!--?=$item_val->item_meta_keywords;?v>
                 <!--?=$item_val->item_meta_description;?-->
                 <!--?=$item_val->fk_lang_id;?-->
                 <!--?=$item_val->category_name;?-->
                 <!--?=$item_val->category_status;?-->

        <?php endforeach;?>
    <?php endif;?>
</div>