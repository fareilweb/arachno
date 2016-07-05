<!--?=$this->debug($this->item)?-->

<?php
    if(count($this->item->item_images) > 0){
        $this->debug($this->item->item_images[0]);
    }
    
?>


<div id="item-image-ilk" class="<?=!isset($show_ilk) ? 'hidden' : '';?>">
<!--   
image_id
image_src
image_name
image_title
image_alt
is_main
fk_item_id
-->

    <!-- 
        Hidden Data 
    -->
    <input type="hidden" name="images_id[]" value="<?=isset($this->item->image_id) ? $this->item->image_id : '';?>" />
    <input type="hidden" name="images_fk_item_id[]" value="<?=isset($this->item->fk_item_id) ? $this->item->fk_item_id : '';?>" />
    
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
                <!-- 
                    Image 
                -->
                <input type="file" name="images[]" class="form-control" />
                
            </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
            <div class="form-group">
                <label><?=Lang::$title?></label>
                <!-- 
                    Images Title 
                -->
                <input type="text" name="images_title[]" value="" class="form-control" />
            </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
            <div class="form-group">
                <label><?=Lang::$alt_text?></label>
                <!-- 
                    Images Alternative Text 
                -->
                <input type="text" name="images_alt[]" value="" class="form-control" />
            </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
            <div class="form-group">
                <label><?=Lang::$main;?></label>
                <!-- 
                    Images Is Main Flag 
                -->
                <select name="images_is_main[]" class="form-control" >
                    <option value="0"><?=Lang::$no;?></option>
                    <option value="1"><?=Lang::$yes;?></option>
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
    
