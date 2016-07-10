<div class="edit_item">
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2><?=Lang::$edit_item?></h2>
        </div>
    </div>
    
    <!--Item Images ==============================================================-->
    <hr/><?php
        $this->getView('admin/shop/item_images/item_images');
    ?><hr/>
    <!--Item Images END ==========================================================-->
    
    <form name="edit_item_form" method="post" action="<?=Config::$web_path?>/Admin/itemProcess/redirect/<?=$this->get['url']?>" enctype="multipart/form-data">
        <!-- Hidden Data -->
        <input type="hidden" name="item_id" id="item_id" value="<?=$this->item->item_id?>" />
            
        <div class="row">    
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
    /*jQuery('#images').on('change',function(){
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
    });*/
});
</script>
        