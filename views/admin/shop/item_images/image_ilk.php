<div id="image_ilk" class="hidden">
    <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2 text-center item_image_wrapper" id="index#index#">
        <input type="hidden" name="images_id[]" value="#image_id#" />
        <p style="text-align: right;">
            <label>
                <input type="checkbox" name="is_main" class="is_main_checkbox" data-image_id="#image_id#" />
            </label>
            <button class="btn btn-default btn-danger rem" data-index="#index#" data-image_id="#image_id#">
                <span class="glyphicon glyphicon-remove"></span>
            </button>
        </p>
        <p>
            <img src="#image_src#" alt="<?=Lang::$preview?>" title="<?=Lang::$preview?>" />
        </p>
    </div>
</div>