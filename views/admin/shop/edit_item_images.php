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

<div id="new-images-wrapper">
</div>

<?php if(count($this->item->item_images) > 0):?>
<div class="row">
    <h2></h2>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
        <label><?=Lang::$preview?></label>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
        <label><?=Lang::$title?></label>
        <input type="text" name="images_title[]" value="" class="form-control" />
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
        <label><?=Lang::$alt_text?></label>
        <input type="text" name="images_alt[]" value="" class="form-control" />
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
        <label><?=Lang::$main_image?></label>
        <select name="images_is_main[]" class="form-control" >
            <option value="0"><?=Lang::$no;?></option>
            <option value="1"><?=Lang::$yes;?></option>
        </select>
    </div>
</div>
<?php endif;?>
<hr/>


<script>
jQuery("#add-image").click(function(){
    jQuery("#new-images-wrapper").append(
        jQuery("#item-image-ilk").html()
    );
});

// Remove Image Input From Form
jQuery(document).on("click", ".remove-image", function() {
    jQuery(this).closest(".image_row").remove();
});
</script>