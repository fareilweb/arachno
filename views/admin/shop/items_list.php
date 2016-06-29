<div class="items_list">
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2>Lista Prodotti</h2>
        </div>
    </div><hr/>
    
    <div class="row">
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
            <label>ID</label>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <label>Codice</label>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <label>Categoria</label>    
        </div>
    </div>
    
    <?php if(isset($this->items) && $this->items!==FALSE):?>
        <?php foreach($this->items as $item_val):?>
            
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <?=$item_val->item_id;?>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    <?=$item_val->item_code;?>
                </div>
                <div>
                    <?=$item_val->fk_category_id;?>
                </div>
                    <!--?=$item_val->item_status;?-->
                    <!--?=$item_val->item_stock;?-->
                    <!--?=$item_val->item_price;?-->
                    <!--?=$item_val->item_title;?-->
                    <!--?=$item_val->item_weight;?-->
                    <!--?=$item_val->item_color;?-->
                    <!--=$item_val->item_short_desc;?-->
                    <!--?=$item_val->item_long_desc;?-->
                    <!--?=$item_val->item_meta_keywords;?-->
                    <!--?=$item_val->item_meta_description;?-->
                    <!--?=$item_val->fk_lang_id;?-->
                    <!--?=$item_val->category_name;?-->
                    <!--?=$item_val->category_status;?-->
                
            </div>
        <?php endforeach;?>
    <?php endif;?>
</div>