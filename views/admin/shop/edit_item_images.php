<hr/>

<div class="row image_row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h3>Immagini
        <button  type="button" id="add-image" class="btn btn-default add-image">
            <span class="glyphicon glyphicon-plus"></span>
            Aggiungi
        </button>
        </h3>
    </div>
</div><br/>

<div class="row image_row">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class="form-group">
            <label><?=Lang::$select_images?></label>
            <input type="file" name="images[]" class="form-control" />
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class="form-group">
            <label><?=Lang::$title?></label>
            <input type="text" name="images_title[]" value="" class="form-control" />
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class="form-group">
            <label><?=Lang::$alt_text?></label>
            <input type="text" name="images_alt[]" value="" class="form-control" />
        </div>
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <div class="form-group">
            <label><?=Lang::$main_image?></label>
            <select name="images_is_main[]" class="form-control" >
                <option value="0"><?=Lang::$no;?></option>
                <option value="1"><?=Lang::$yes;?></option>
            </select>
        </div>
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
        <div class="form-group">
            <br>
            <button class="btn btn-default remove-image" type="button" data-numToRemove="">
                <span class="glyphicon glyphicon-remove"></span>
            </button>
        </div>
    </div>
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
// Remove Image Input From Form
jQuery(document).on("click", ".remove-image", function() {
    var num = jQuery(this).attr("data-numToRemove");
    var id_to_remove = "#image_wrapper_" + num;

    alert(id_to_remove);

    jQuery(id_to_remove).remove();
});
</script>