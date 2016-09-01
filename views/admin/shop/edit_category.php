<div class="edit_category">
    
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2><?=Lang::$edit_category?></h2>
        </div>
    </div><hr/>
    
    <form name="edit_category_form" method="post" action="<?=Config::$web_path?>/Admin/categoryProcess" enctype="multipart/form-data">
        
        <!-- Hidden Data -->
        <input type="hidden" name="category_id" id="category_id" value="<?=$this->category->category_id?>" />
        <input type="hidden" name="category_parent_name" id="category_parent_name" value="<?=$this->category->category_parent_name?>" />
        
        <div class="row">
        
            <!-- Category Image -->
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 category_image">
                <div class="form-group">
                    <label><?=Lang::$image?></label>
                    <input type="file" name="category_image" id="category_image" class="form-control" />
                    <input type="hidden" name="category_image_src" value="<?=$this->category->category_image_src;?>" />
                    <div class="category_image_preview">
                        <?php if($this->category->category_image_src != ""):?>
                            <img src="<?=$this->category->category_image_src;?>" />
                        <?php endif;?>
                    </div>
                </div>
            </div>
        
            <!-- Category Data -->
            <div class="col-xs-12 col-sm-6 col-md-9 col-lg-9 category_data">
                <div class="row">
                    <!-- Name -->
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label><?=Lang::$name?></label>
                            <input type="text" name="category_name" value="<?=$this->category->category_name?>" class="form-control" />
                        </div>
                    </div>
                    <!-- Parent -->
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label><?=Lang::$category_parent?></label>
                            <select name="fk_parent_id" id="fk_parent_id" class="form-control" >
                                <option value="0">Seleziona Categoria...</option>
                                <?php foreach($this->shop_categories as $category):?>
                                    <option value="<?=$category->category_id?>" <?=($this->category->fk_parent_id==$category->category_id) ? " selected" : "";?>>
                                        <?=$category->category_name;?>
                                    </option>
                                <?php endforeach;?>
                            </select>
                            <!-- The Script Valorize Hidden Field "category_parent_name" -->
                            <script>jQuery("#fk_parent_id").change(function(){
                                jQuery("#category_parent_name").val(
                                    jQuery("#fk_parent_id option:selected").text().trim()
                                );
                            });</script>
                        </div>
                    </div>
                    <!-- Status -->
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label><?=Lang::$status?></label><br/>
                            <label>
                                <input type="radio" name="category_status" value="1" <?=($this->category->category_status==1) ? "checked" : "";?> /> 
                                <?=Lang::$available?>
                            </label> 
                            <label>
                                <input type="radio" name="category_status" value="0" <?=($this->category->category_status==0) ? "checked" : "";?> /> 
                                <?=Lang::$unavailable?>
                            </label>
                        </div>
                    </div>
                    <!-- Language -->
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label><?=Lang::$language?></label>
                            <select name="fk_lang_id" class="form-control">
                                <option value="0"><?=Lang::$select_language?></option>
                                <?php foreach($this->languages as $lang):?>
                                    <option value="<?=$lang->lang_id;?>" <?=$lang->lang_id == $this->category->fk_lang_id ? "selected" : "";?>>
                                          <?=$lang->lang_name?> (<?=$lang->lang_internal_code;?>)
                                    </option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        
        <div class="row">
            <!-- Submit Button -->
            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2 col-xs-offset-3 col-sm-offset-4 col-md-offset-4 col-lg-offset-5">
                <div class="form-group">
                    <button type="submit" value="edit_category_submit" class="btn btn-default btn-lg">
                        <span class="glyphicon glyphicon-save"></span>
                        <?=Lang::$save?>
                    </button>
                </div>
            </div>
        </div>
    </form>
    
</div>


<script>

if(jQuery("#category_id").val() === ""){
    jQuery("#category_image").click(function(e){
        e.preventDefault();

        swal({
           title: "<?=Lang::$almost_done;?>!",
           text: "<?=Lang::$save_before;?>",
           type: "warning",
           html: true
       });

        return false;
    });
}

    

</script>
