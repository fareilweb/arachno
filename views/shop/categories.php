<div class="categories">
    
    <h1><?=Lang::$categories?></h1>
    
    <div class="categories_list">
        <div class="row">
            
            <?php if(count($this->categories) > 0) :?>
            
                <?php foreach($this->categories as $curr_category): ?>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 category_wrapper">
                        <?php
                            if(count($curr_category->children) > 0){
                                $category_link = Config::$web_path. "/Shop/catChildren/" . $curr_category->category_id;
                            }else{
                                $category_link = Config::$web_path. "/Shop/showItems/" . $curr_category->category_id;
                            }
                        ?>
                        <a href="<?=$category_link;?>">
                            <div class="category_title">
                                <h3>
                                    <?=$curr_category->category_name;?>
                                </h3>
                            </div>
                            <div class="category_image">
                                <img src="<?=$curr_category->category_image_src;?>" alt="<?=$curr_category->category_name;?>" title="<?=$curr_category->category_name;?>" />
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