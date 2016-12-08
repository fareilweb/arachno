<div class="page_editor">

    <h2>
        <span class="glyphicon glyphicon-edit"></span>
        <?=Lang::$page_editor;?>

        <a href="<?=Config::$web_path;?>/Admin/pageSelect" class="btn btn-default">
            <span class="glyphicon glyphicon-folder-open"></span>
            &nbsp; <?=Lang::$select;?>
        </a>
        <hr/>
    </h2>

    <div class="editor">
        <form id="page_data_form">
            <!-- Hidden data -->
            <input type="hidden" id="page_id" name="page_id" value="<?=$this->page->page_id;?>" />
            <?php
                if(
                    $this->page->fk_author_user_id
                    && $this->page->fk_author_user_id != 0
                    && $this->page->fk_author_user_id != "0"
                    && $this->page->fk_author_user_id != ""
                ){
                    $fk_author_user_id = $this->page->fk_author_user_id;
                }else{
                    $fk_author_user_id = $this->user['user_id'];
                }
            ?>
            <input type="hidden" id="fk_author_user_id" name="fk_author_user_id" value="<?=$fk_author_user_id;?>" />

            <div class="row">
                <!-- Included Views -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <?php
                            include dirname(__FILE__) . "/page_views.php";
                        ?>
                    </div>
                    <hr/>
                </div>

                <!-- Modules -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <?php
                            include dirname(__FILE__) . "/page_modules.php";
                        ?>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Language -->
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="form-group">
                        <label><?=Lang::$language;?></label>
                        <select id="fk_page_lang_id" name="fk_page_lang_id" class="form-control">
                            <option value="0">Seleziona...</option>
                            <?php foreach($this->languages as $lang):?>
                                <option value="<?=$lang->lang_id;?>" <?php if($lang->lang_id==$this->page->fk_page_lang_id):?>selected<?php endif;?>><?=$lang->lang_name;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>

                <!-- Category -->
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="form-group">
                        <label><?=Lang::$category;?></label>
                        <select id="fk_page_category_id" name="fk_page_category_id" class="form-control">
                            <option value="0">Seleziona...</option>
                            <?php foreach($this->categories as $cat):?>
                                <option value="<?=$cat->category_id;?>" <?php if($cat->category_id==$this->page->fk_page_category_id):?>selected<?php endif;?>><?=$cat->category_name;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>

                <!-- Slug -->
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="form-group">
                        <label for="page_slug"><?=Lang::$page_slug;?></label>
                        <input id="page_slug" name="page_slug" value="<?=$this->page->page_slug;?>" type="text" placeholder="<?=Lang::$page_slug;?>" class="form-control" />
                    </div>
                </div>

                <!-- Page CSS Class -->
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="form-group">
                        <label for="page_css_class"><?=Lang::$css_class;?></label>
                        <input id="page_css_class" name="page_css_class" value="<?=$this->page->page_css_class;?>" type="text" placeholder="" class="form-control" />
                    </div>
                </div>

                <!-- Title -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="page_title"><?=Lang::$title;?></label>
                        <input id="page_title" name="page_title" value="<?=$this->page->page_title;?>" type="text" placeholder="" class="form-control" />
                    </div>
                </div>

                <!-- Page Title Hidden -->
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="form-group">
                        <label for="page_title_hidden"><?=Lang::$page_title_hidden;?></label>
                        <p>
                            <label>
                                <?=Lang::$yes;?>
                                <input name="page_title_hidden" value="1" type="radio"
                                    <?php if(isset($this->page->page_title_hidden) && $this->page->page_title_hidden==1):?>checked<?php endif;?> class="form-control" />
                            </label>
                            <label>
                                <?=Lang::$no;?>
                                <input name="page_title_hidden" value="0" type="radio"
                                    <?php if(isset($this->page->page_title_hidden) && $this->page->page_title_hidden==0):?>checked<?php endif;?> class="form-control" />
                            </label>
                        </p>
                    </div>
                </div>


                <!-- ================================================
                    Page Content Editor
                ================================================= -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for=""><?=Lang::$page_content;?></label>
                        <textarea
                            id="page_content"
                            name="page_content"
                            class="form-control"
                            style="width: 100%; height: 400px;"><?=$this->page->page_content;?></textarea>
                    </div>
                </div>

                <!-- Page Meta Description -->
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="form-group">
                        <label for="page_meta_description"><?=Lang::$meta_desc;?></label>
                        <textarea id="page_meta_description" name="page_meta_description" class="form-control"><?=$this->page->page_meta_description;?></textarea>
                    </div>
                </div>

                <!-- Page Meta Keywords -->
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="form-group">
                        <label for="page_meta_keywords"><?=Lang::$meta_keys;?></label>
                        <textarea id="page_meta_keywords" name="page_meta_keywords" class="form-control"><?=$this->page->page_meta_keywords;?></textarea>
                    </div>
                </div>

            </div>
        </form>

        <!-- Save Button -->
        <div class="row">
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                <hr/>
                <div class="form-group">
                    <button class="btn btn-default form-control" id="btn_save_page">
                        <span class="glyphicon glyphicon-save"></span>
                        <?=Lang::$save;?>
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- CKEditor -->
<script src="<?=Config::$web_path;?>/js/plugins/ckeditor_4.5.11_full/ckeditor.js"></script>
<script>
    var ckeditor = CKEDITOR.replace("page_content", {
        language: 'it'
    });
</script>

<script>
jQuery(document).ready(function(){

    // Save
    jQuery("#btn_save_page").click(function(){

        // Update Hidden TextArea With current data from CKEditor
        ckeditor.updateElement();

        // Serialize all form inputs data
        var serialized_page_data = jQuery("#page_data_form *").serialize();

        // Send Data to "Save" Service by AJAX
        jQuery.post("<?=Config::$web_path;?>/Admin/pageSave", {
            page_data: serialized_page_data
        }).done(function(_response){
            var response = JSON.parse(_response);
            if(response.status===false){

                swal({
                    type: "error",
                    html: true,
                    title: "<?=Lang::$warning;?>",
                    text: "<?=Lang::$operation_fail;?>"
                });
                console.log(response);

            }else{
                // Set to the curent form new the inserted id
                if(response.insert_id){
                    jQuery("#page_id").val(response.insert_id);
                }
                swal({
                    type: "success",
                    html: true,
                    title: "<?=Lang::$operation_success;?>",
                    timer: 1500
                });
            }

        }).fail(function(_response){
            var response = JSON.parse(_response);
            swal({
                type: "error",
                html: true,
                title: "<?=Lang::$warning;?>",
                text: "<?=Lang::$operation_fail;?>"
            });
            console.log(response);
        });
    });
    // Save END

});
</script>

<?php
//$this->print_ri($this);
?>
