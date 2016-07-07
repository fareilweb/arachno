<div class="row image_row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h3>
            <?=Lang::$images;?>
            <!-- 
                Add Image Button 
            -->
            <button  type="button" id="add-image" class="btn btn-default add-image">
                <span class="glyphicon glyphicon-plus"></span>
                <?=Lang::$add;?>
            </button>
        </h3>
    </div>
</div><br/>

<form name="item_images_form" id="item_images_form" action="<?=Config::$web_path?>/Upload/itemImagesProcess">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <!--
                Images
            -->
            <div id="images-wrapper">
                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <label>&nbsp;</label>
                <!-- 
                    Upload Images Button 
                -->
                <button type="button" id="item_images_submit" class="btn btn-default form-control">
                    <strong>
                        <span class="glyphicon glyphicon-cloud-upload"></span>
                        <?=Lang::$upload . " " .Lang::$images;?>
                    </strong>
                </button>
            </div>
        </div>
        
    </div>
</form>
<?php $this->getView('admin/shop/edit_item_images/images.js');?>
