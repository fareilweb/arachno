<div class="edit_item">
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2><?=Lang::$edit_item?></h2>
        </div>
    </div>
    
    <!-- * Item Images ==============================================================* -->
    <hr/>
        <?php include(dirname(__FILE__) . '/item_images/item_images.php');?>
    <hr/>
    <!-- * Item Images END ==========================================================* -->
    
    

    <form name="edit_item_form" method="post" action="<?=Config::$web_path?>/Admin/itemProcess/redirect/<?=$this->get['url']?>" enctype="multipart/form-data">
        <!-- Hidden Data -->
        <input type="hidden" name="item_id" id="item_id" value="<?=$this->item->item_id?>" />

        <h3><?=Lang::$images?></h3><br/>
        
        <div id="item_images" class="row">
            <?php
                foreach($this->item->item_images as $curr_key => $curr_img)
                {
                    $html = file_get_contents(Config::$abs_path . '/views/admin/shop/item_images/item_image_ilk.php');
                    $html = str_replace("#index#", $curr_key, $html);
                    $html = str_replace("#image_id#", $curr_img->image_id, $html);
                    $html = str_replace("#image_src#", (Config::$web_path.$curr_img->image_src), $html);
                    $html = str_replace("#image_alt#", $curr_img->image_alt, $html);
                    $html = str_replace("#image_title#", $curr_img->image_title, $html);
                    $curr_img->is_main ? '' : $html = str_replace("checked", "", $html) ;
                    echo  $html;
                }
            ?>
        </div><hr/>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label><?=Lang::$item_categories?></label>
                    <div class="shop_categories">
                        <!--Main Level Categories Iteration-->
                        <ul class="categories main-level">
                        <?php foreach($this->shop_categories as $cat):?>
                            <?php if($cat->fk_parent_id==='0'):?>
                                <li class="category">
                                    <label>
                                        <input type="checkbox" name="item_categories[<?=$cat->category_id;?>]" <?=isset($this->item->item_categories[$cat->category_id]) ? " checked " : "";?> />
                                        <?=$cat->category_name;?>
                                    </label>
                                    
                                    <!--First Level Childs Iteration-->
                                    <ul class="categories first-level">
                                    <?php foreach ($this->shop_categories as $first_child):?>
                                        <?php if($first_child->fk_parent_id === $cat->category_id):?>

                                            <li class="category">
                                                <label>
                                                    <input type="checkbox" name="item_categories[<?=$first_child->category_id;?>]" <?=isset($this->item->item_categories[$first_child->category_id]) ? " checked " : "";?> />
                                                    <?=$first_child->category_name;?>
                                                </label>
                                                
                                                <!--Second Level Childs Iteration-->
                                                <ul class="categories second-level">
                                                    <?php foreach ($this->shop_categories as $second_child):?>
                                                        <?php if($second_child->fk_parent_id === $first_child->category_id):?>
                                                            <li class="category">
                                                                <label>
                                                                    <input type="checkbox" name="item_categories[<?=$second_child->category_id;?>]" <?=isset($this->item->item_categories[$second_child->category_id]) ? " checked " : "";?> />
                                                                    <?=$second_child->category_name;?>
                                                                </label>
                                                            </li>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </ul>

                                            </li>

                                        <?php endif;?>
                                    <?php endforeach;?>
                                    </ul>

                                </li>
                            <?php endif;?>
                        <?php endforeach;?>
                        </ul>
                    </div>                   
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label><?=Lang::$item_code?></label>
                    <input type="text" name="item_code" value="<?=$this->item->item_code?>" class="form-control" />
                </div>
            </div>
           
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label><?=Lang::$item_title?></label>
                    <input type="text" name="item_title" value="<?=$this->item->item_title;?>" class="form-control" />
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label><?=Lang::$item_price ?></label>
                    <input type="text" name="item_price" value="<?=$this->item->item_price;?>" class="form-control" />
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label><?=Lang::$status?></label><br/>
                    <label>
                        <?=Lang::$available?>
                        <input type="radio" name="item_status" value="1" <?=($this->item->item_status==1) ? "checked" : "";?> class="form-control"/> 
                    </label>
                    <label>
                        <?=Lang::$unavailable?>
                        <input type="radio" name="item_status" value="0" <?=($this->item->item_status==0) ? "checked" : "";?> class="form-control"/> 
                    </label>
                    <hr/>
                </div>
            </div>
                
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label><?=Lang::$item_stock?></label>
                    <input type="text" name="item_stock" value="<?=$this->item->item_stock;?>" class="form-control" />
                </div>
            </div>
                
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label><?=Lang::$item_weight?></label>
                    <input type="text" name="item_weight" value="<?=$this->item->item_weight;?>" class="form-control" />
                </div>
            </div>
            <!-- Colors -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label><?=Lang::$item_colors?></label>
                    <input type="text" name="item_colors" value="<?=$this->item->item_colors;?>" class="form-control" />
                </div>
            </div>
            <!-- Short Description -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label><?=Lang::$item_short_desc?></label>
                    <textarea name="item_short_desc" class="form-control"><?=$this->item->item_short_desc;?></textarea>
                </div>
            </div>
            <!-- Long Description -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label><?=Lang::$item_long_desc?></label>
                    <textarea name="item_long_desc" class="form-control"><?=$this->item->item_long_desc;?></textarea>
                </div>
            </div>
            <!-- Meta Keywords -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label><?=Lang::$meta_keys?></label>
                    <textarea name="item_meta_keywords" class="form-control"><?=$this->item->item_meta_keywords;?></textarea>
                </div>
            </div>
            <!-- Meta Description -->  
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label><?=Lang::$meta_desc?></label>
                    <textarea name="item_meta_description" class="form-control"><?=$this->item->item_meta_description;?></textarea>
                </div>
            </div>
            <!-- Language -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label><?=Lang::$language?></label>
                    <select name="fk_lang_id" class="form-control">
                        <option value="0"><?=Lang::$select_language?></option>
                        <?php foreach($this->languages as $lang):?>
                            <option value="<?=$lang->lang_id;?>" <?=$lang->lang_id == $this->item->fk_lang_id ? "selected" : "";?>>
                                  <?=$lang->lang_name?> (<?=$lang->lang_internal_code;?>)
                            </option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            
        </div>
        
        <div class="row">
            <!-- Submit Button -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
                <div class="form-group text-center">
                    <button type="submit" value="edit_item_submit" class="btn btn-default btn-lg" style="margin:0 auto 0 auto;">
                        <span class="glyphicon glyphicon-save"></span>
                        <?=Lang::$save?>
                    </button>
                </div>
            </div>
        </div>
    </form>
    
</div>
