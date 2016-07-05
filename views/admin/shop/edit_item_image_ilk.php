<div id="item-image-ilk" class="hidden">
    <div class="row image_row">
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
            <div class="form-group">
                <label><?=Lang::$preview;?></label>
                <div class="item-image-preview text-center">
                    <span class="glyphicon glyphicon-picture"></span>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
            <div class="form-group">
                <label><?=Lang::$file;?></label>
                <input type="file" name="images[]" class="form-control" />
            </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
            <div class="form-group">
                <label><?=Lang::$title?></label>
                <input type="text" name="images_title[]" value="" class="form-control" />
            </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
            <div class="form-group">
                <label><?=Lang::$alt_text?></label>
                <input type="text" name="images_alt[]" value="" class="form-control" />
            </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
            <div class="form-group">
                <label><?=Lang::$main;?></label>
                <select name="images_is_main[]" class="form-control" >
                    <option value="0"><?=Lang::$no;?></option>
                    <option value="1"><?=Lang::$yes;?></option>
                </select>
            </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-2 col-lg-1">
            <div class="form-group">
                <br/>
                <button class="btn btn-default remove-image" type="button" data-remove="">
                    <span class="glyphicon glyphicon-remove"></span>
                    <?=Lang::$delete?>
                </button>
            </div>
        </div>
    </div>
</div>
    
