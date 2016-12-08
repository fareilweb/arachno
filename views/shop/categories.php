<div class="categories">
    
    <h2>
        <?=Lang::$categories?>
    </h2><hr/>
    
    <div class="categories_list">
        <div class="row">
            
            <?php if(count($this->categories) > 0) :?>
            
                <?php foreach($this->categories as $curr_category): ?>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 category_wrapper">
                        <a href="<?=Config::$web_path. "/Shop/categoryItems/" . $curr_category->shop_category_id;?>">
                            <div class="category">
                                <div class="category_title">
                                    <h3><?=$curr_category->shop_category_name;?></h3>
                                </div>
                                <div class="category_image">
                                    <?php
                                        if($curr_category->shop_category_image_src != ""){
                                            $category_image_src = Config::$web_path . $curr_category->shop_category_image_src;
                                        }else{
                                            $category_image_src = Config::$web_path . "/views/images/shop/default.png";
                                        }
                                    ?>
                                    <img src="<?=$category_image_src;?>" title="<?=$curr_category->shop_category_name;?>" />
                                </div>
                            </div>
                        </a>
                    </div>

                <?php endforeach;?>
            
            <?php else:?>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h2><?=Lang::$categories_none;?></h2>
                </div>

            <?php endif;?>
            
        </div>
    </div>
    
</div>
