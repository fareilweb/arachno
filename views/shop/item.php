<div class="item">
    
    <?php if(isset($this->item) && $this->item->item_id!==NULL): ?>
        <div>
            <div>
                <label><?=Lang::$lbl_item_id;?> </label>
                <?=$this->item->item_id;?>
            </div>
            <div>
                <label><?=Lang::$lbl_item_code;?> </label>
                <?=$this->item->item_code;?>    
            </div>
            <div>
                <label><?=Lang::$lbl_item_category;?> </label>
                <?=$this->item->category_name;?>
            </div>
            <div>
                <label><?=Lang::$lbl_item_status;?> </label>
                <?=$this->item->item_status ? Lang::$item_status_true : Lang::$ite_status_false;?>
            </div>
            <div>
                <label><?=Lang::$lbl_item_stock;?> </label>
                <?=$this->item->item_stock;?>
            </div>
            <div>
                <label><?=Lang::$lbl_item_price;?> </label>
                <?=$this->item->item_price;?>
            </div>
            <div>
                <label><?=Lang::$lbl_item_title;?> </label>
                <?=$this->item->item_title;?>
            </div>
            <div>
                <label><?=Lang::$lbl_item_weight;?> </label>
                <?=$this->item->item_weight;?>
            </div>
            <div>
                <label><?=Lang::$lbl_item_colors;?> </label>
                <?=$this->item->item_color;?>
            </div>
            <div>
                <label><?=Lang::$lbl_item_short_desc;?> </label>
                <?=$this->item->item_short_desc;?>
            </div>
            <div>
                <label><?=Lang::$lbl_item_long_desc;?> </label>
                <?=$this->item->item_long_desc;?>
            </div>


            <!--div>
                <label></label>
                <?=$this->item->item_meta_keywords;?>
            </div-->
            <!--div>
                <label></label>
                <?=$this->item->item_meta_description;?>
            </div-->
        </div>
    <?php endif; ?>
       
</div>