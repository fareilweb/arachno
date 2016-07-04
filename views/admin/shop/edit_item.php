<div class="edit_item">
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2><?=Lang::$edit_item?></h2>
        </div>
    </div><hr/>
    
    <div class="row">
        <!-- Images Upload -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <label><?=Lang::$images?></label>
                <form method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="<?=Config::$web_path?>/Upload/itemImagesProcess">
                    <input type="hidden" name="image_form_submit" value="1"/>
                    <label><?=Lang::$select_images?></label>
                    <input type="file" name="images[]" id="images" multiple class="form-control">
                    <div class="uploading" style="display: none;">
                        <label>&nbsp;</label>
                        <img src="<?=Config::$web_path;?>/views/pages/images/preloader.gif" alt="uploading..."/>
                    </div>
                </form>     
            </div>
        </div>
    </div>
    
    <form name="edit_item_form" method="post" action="<?=Config::$web_path?>/Admin/itemProcess">
        <!-- Hidden Data -->
        <input type="hidden" name="item_id" value="<?=$this->item->item_id?>" />
        
        <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <div id="item_images_preview"></div>
                    <?php if(count($this->item->item_images) > 0):?>
                    <div id="item_images_loaded">
                        <table><tbody>
                            <tr>
                                <th><?=Lang::$preview?></th>
                                <th><?=Lang::$title?></th>
                                <th><?=Lang::$alt_text?></th>
                                <th><?=Lang::$main_image?></th>
                                <th></th>
                            </tr>
                            <?php foreach($this->item->item_images as $img_key => $img_obj):?>
                                <div id="image_wrapper_<?=$img_key?>">
                                    <input type="hidden" name="images_src[]" value="<?=$img_obj->image_src?>" />
                                    <input type="hidden" name="images_name[]" value="<?=$img_obj->image_name?>" />
                                    <tr>
                                        <td><img src="<?=$img_obj->image_src?>" alt="Image Preview" ></td>
                                        <td><input type="text" name="images_title[]" value="<?=$img_obj->image_title?>" class="form-control" /></td>
                                        <td><input type="text" name="images_alt[]" value="<?=$img_obj->image_alt?>" class="form-control" /></td>
                                        <td>
                                            <select name="images_is_main[]" class="form-control">
                                                <option value="FALSE"><?=Lang::$no?></option>
                                                <option value="TRUE" <?=$img_obj->is_main == 1 ? " selected" : "";?>><?=Lang::$yes?></option>
                                            <select>
                                        </td>
                                        <td>
                                            <button class="btn btn-default remove-image" data-numToRemove="<?=$img_key?>">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </button>
                                        </td>
                                    </tr>
                                </div>
                            <?php endforeach;?>
                        </tbody></table>
                    </div>
                    <?php else:?>
                        <input type="hidden" name="images_src[]" value="" />
                        <input type="hidden" name="images_name[]" value="" />
                        <input type="hidden" name="images_title[]" value="" />
                        <input type="hidden" name="images_alt[]" value="" />
                        <input type="hidden" name="images_is_main[]" value="" />
                    <?php endif;?>
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
                    <label><?=Lang::$item_category?></label>
                    <select name="fk_category_id" class="form-control" >
                        <option value="1">Seleziona Categoria...</option>
                        <?php foreach($this->shop_categories as $category):?>
                            <option value="<?=$category->category_id?>" <?=($this->item->fk_category_id==$category->category_id) ? " selected" : "";?>>
                                <?=$category->category_name;?>
                            </option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label><?=Lang::$status?></label><br/>
                    <label>
                        <input type="radio" name="item_status" value="1" <?=($this->item->item_status==1) ? "checked" : "";?> /> 
                        <?=Lang::$available?>
                    </label>
                    <label>
                        <input type="radio" name="item_status" value="0" <?=($this->item->item_status==0) ? "checked" : "";?> /> 
                        <?=Lang::$unavailable?>
                    </label>
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
                    <label><?=Lang::$item_price ?></label>
                    <input type="text" name="item_price" value="<?=$this->item->item_price;?>" class="form-control" />
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

 <!-- Images Upload JavaScript -->
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#images').on('change',function(){
            jQuery('#multiple_upload_form').ajaxForm({
                //display the uploaded images
                target:'#item_images_preview',
                beforeSubmit:function(e){
                    $('.uploading').show();
                },
                success:function(e){
                    $('.uploading').hide();
                },
                error:function(e){

                }
            }).submit();
        });
        
        // Remove Image Input From Form
        jQuery(document).on("click", ".remove-image", function() {
            var num = jQuery(this).attr("data-numToRemove");
            var id_to_remove = "#image_wrapper_" + num;
            
            alert(id_to_remove);
            
            jQuery(id_to_remove).remove();
        });
    });
</script>
        