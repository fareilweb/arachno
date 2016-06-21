<div class="item">
    
    
    <?php if(isset($this->item) && $this->item->item_id!==NULL): ?>
    
        <div>
            <?=$this->item->item_id;?>
        </div>
        <div>
            <?=$this->item->item_code;?>    
        </div>
        <div>
            <?=$this->item->fk_category_id;?>
        </div>
        <div>
            <?=$this->item->item_status;?>
        </div>
        <div>
            <?=$this->item->item_stock;?>
        </div>
        <div>
            <?=$this->item->item_price;?>
        </div>
        <div>
            <?=$this->item->item_title;?>
        </div>
        <div>
            <?=$this->item->item_weight;?>
        </div>
        <div>
            <?=$this->item->item_color;?>
        </div>
        <div>
            <?=$this->item->item_short_desc;?>
        </div>
        <div>
            <?=$this->item->item_long_desc;?>
        </div>
        <div>
            <?=$this->item->item_meta_keywords;?>
        </div>
        <div>
            <?=$this->item->item_meta_description;?>
        </div>
    <?php endif; ?>
    
</div>