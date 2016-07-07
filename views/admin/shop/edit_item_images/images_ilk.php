<div id="images-ilk" class="hidden">
    
    <div class="row images_row" id="#row_id#" >
        
        <!-- 
            Hidden Data 
        -->
        <input type="hidden" name="images_fk_item_id[]" value="#fk_item_id#" />
        <input type="hidden" name="images_id[]" value="#image_id#" />
        <input type="hidden" name="images_src[]" value="#image_src#" />

        
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
            <div class="form-group">
                <label><?=Lang::$preview;?></label>
                <!-- 
                    Preview 
                -->
                <div class="image-preview text-center">
                    <!--span class="glyphicon glyphicon-picture" class="hidden"></span-->
                    <img src="#image_src#" alt="<?=Lang::$preview;?>" title="<?=Lang::$preview;?>" onerror="javascript:jQuery(this).remove()" />
                    <!--onerror="javascript:jQuery(this).remove()"-->
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
            <div class="form-group">
                <label><?=Lang::$file;?></label>
                <!-- 
                    Image (file)
                -->
                <input type="file" name="images[]" class="form-control" class="image_file_input" onchange='javascript:uploadMe("#row_id#");' />
                
            </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
            <div class="form-group">
                <label><?=Lang::$title?></label>
                <!-- 
                    Image Title
                -->
                <input type="text" name="images_title[]" value="#image_title#" class="form-control" />
            </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
            <div class="form-group">
                <label><?=Lang::$alt_text?></label>
                <!-- 
                    Image Alternative Text 
                -->
                <input type="text" name="images_alt[]" value="#image_alt#" class="form-control" />
            </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
            <div class="form-group">
                <label><?=Lang::$main;?></label>
                <!-- 
                    Image "Is Main" Flag 
                -->
                <select name="images_is_main[]" class="form-control">
                    <option value="0" class="#is_main_0#"><?=Lang::$no;?></option>
                    <option value="1" class="#is_main_1#"><?=Lang::$yes;?></option>
                </select>
            </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
            <div class="form-group">
                <br/>
                <!--
                    Remove Image Button
                -->
                <button class="btn btn-default remove-image" type="button" data-remove="">
                    <span class="glyphicon glyphicon-remove"></span>
                    <?=Lang::$delete?>
                </button>
            </div>
        </div>
    </div>
</div>

<!--   
image_id
image_src
image_name
image_title
image_alt
is_main
fk_item_id
-->
