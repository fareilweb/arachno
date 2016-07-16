<div class="test">
        
    <?php
        foreach($this->cats as $cat)
        {
            $cat->childs = array();
            foreach ($this->cats as $child)
            {
                if($child->fk_parent_id === $cat->category_id){
                    array_push($cat->childs, $child);
                }
            }
        }
    ?>

    <?php foreach($this->cats as $cat):?>
        <?php if($cat->fk_parent_id==='0'):?>
            <?=$cat->category_name;?>
            <?php foreach ($this->cats as $first_child):?>
                <?php if($first_child->fk_parent_id === $cat->category_id):?>
                    <div class="child-category">
                        <?=$first_child->category_name;?>
                        <?php foreach ($this->cats as $second_child):?>
                            <?php if($second_child->fk_parent_id === $first_child->category_id):?>
                                <div class="child-category">
                                    <?=$second_child->category_name;?>
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    </div>
                <?php endif;?>
            <?php endforeach;?>
        <?php endif;?>
    <?php endforeach;?>
    
</div>

<?=$this->debug($this->cats);?>
    