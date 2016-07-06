<?php require(__DIR__ . '/edit_item_image_ilk.php');?>

<hr/>
<div class="row image_row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h3><?=Lang::$images;?>
        <button  type="button" id="add-image" class="btn btn-default add-image">
            <span class="glyphicon glyphicon-plus"></span>
            <?=Lang::$add;?>
        </button>
        </h3>
    </div>
</div><br/>

<form name="item_images_form" action="<?=Config::$web_path?>/Upload/itemImagesProcess">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div id="images-wrapper">
                <?php if(count($this->item->item_images) > 0):?>
                    <?php
                        $show_ilk = 1;
                        foreach ($this->item->item_images as $img_key=>$img_val){    
                            require(__DIR__ . '/edit_item_image_ilk.php');
                        }
                    ?>
                <?php endif;?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <label>&nbsp;</label>
                <button type="button" id="item_images_submit" class="btn btn-default form-control">
                    <strong>
                        <span class="glyphicon glyphicon-cloud-upload"></span>
                        <?= Lang::$upload . " " .Lang::$images?>
                    </strong>
                </button>
            </div>
        </div>
    </div>
</form>
<hr/>

<script src="<?=Config::$web_path?>/js/libs/images-manager.js"></script>

<script>
jQuery("#add-image").click(function(){
    jQuery("#images-wrapper").append(
        jQuery("#item-image-ilk").html()
    );
});

// Remove Image Input From Form
jQuery(document).on("click", ".remove-image", function() {
    jQuery(this).closest(".image_row").remove();
});
</script>