<div class="categories">
    
    <h2>
        <?=Lang::$categories?>
    </h2>
    
    <div class="categories_list">
        <div class="row">
            
            <?php if(count($this->categories) > 0) :?>
            
                <?php foreach($this->categories as $curr_category): ?>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 category_wrapper">
                        <div class="category">
                            <div class="category_title">
                                <h3>
                                    <?=$curr_category->category_name;?>
                                </h3>
                            </div>
                            <div class="category_image">
                                <img src="<?=Config::$web_path . $curr_category->category_image_src;?>" alt="<?=$curr_category->category_name;?>" title="<?=$curr_category->category_name;?>" />
                            </div>
                            
                            <div class="category_links">
                                <!-- Oggetti di Questa Categoria -->
                                <a href="<?=Config::$web_path. "/Shop/showItems/" . $curr_category->category_id;?>" class="btn btn-info form-control">
                                    <span class="glyphicon glyphicon-shopping-cart"></span>
                                    <?=Lang::$category_items;?>
                                </a>
                                <!-- Sottocategorie -->
                                <?php if(count($curr_category->children) > 0): ?>
                                    <a href="<?=Config::$web_path. "/Shop/catChildren/" . $curr_category->category_id;?>" class="btn btn-default form-control">
                                        <span class="glyphicon glyphicon-arrow-down"></span>
                                        <?=Lang::$subcategories;?>
                                    </a>
                                <?php endif;?>
                            </div>
                            
                        </div>
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