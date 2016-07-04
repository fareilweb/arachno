<div id="item-image-ilk" class="hidden">
    <div class="row image_row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <div class="form-group">
                <label><?=Lang::$file;?></label>
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
                <label><?=Lang::$main;?></label>
                <select name="images_is_main[]" class="form-control" >
                    <option value="0"><?=Lang::$no;?></option>
                    <option value="1"><?=Lang::$yes;?></option>
                </select>
            </div>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
            <div class="form-group">
                <label>&nbsp;</label>
                <button class="btn btn-default remove-image" type="button" data-remove="">
                    <span class="glyphicon glyphicon-remove"></span>
                </button>
            </div>
        </div>
    </div>
</div>
    
