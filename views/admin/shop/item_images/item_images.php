<?php $this->getView('admin/shop/item_images/image_ilk'); ?>

<div class="row">
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <h3><?=Lang::$select_images?></h3>
        <!-- Upload Form =============================================== -->
        <form method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="<?=Config::$web_path?>/Upload/itemImagesProcess/<?=$this->item->item_id?>">
            <input type="hidden" name="image_form_submit" value="1"/>
            <div class="form-group">
                <!--input type="hidden" name="fk_item_id" value="<?=$this->item->item_id?>" /-->
                <input type="file" name="images[]" id="images" class="btn btn-default form-control" multiple>
            </div>
        </form>
    </div>
    
    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        
            <label><?=Lang::$preview?></label>
            <div id="images_preview" class="row">
              
            </div>
        
    </div>
    
        <!--span class="glyphicon glyphicon-cloud-upload"></span-->
        <!--?=Lang::$save . " " .Lang::$images;?-->
        <!-- Upload Form END =========================================== -->
    
</div>

<script type="text/javascript">
jQuery(document).ready(function(){
    
    // AJAX Submit Upload
    jQuery('#images').on('change', function(e){
         jQuery("#multiple_upload_form").ajaxSubmit({
            target:"#images_preview",
            beforeSubmit:function(e){
                jQuery('#page-preloader').show();
            },
            success:function(e){
                jQuery('#page-preloader').hide();
            },
            error:function(e){
                swal({
                    title: "err",
                    text: "err",
                    type: "warning",
                    html: true
                });
            }
        });
    });

    // Images Preview - Remove Image From Preview
    jQuery("#images_preview").on("click", "button.rem", function(e){
        var index = jQuery(this).attr("data-index"); 
        jQuery(".preview_image_wrapper#index"+index).remove();
    });

    // Images Preview - Add Image to Item
    jQuery("#images_preview").on("click", "button.add", function(e){
        var index = jQuery(this).attr("data-index");
        var image_src = jQuery(this).attr("data-src");
        var image_id = jQuery(this).attr("data-id");
        
        var html = jQuery("#image_ilk").html();
        html = html.replace(/#index#/gi, index);
        html = html.replace(/#image_src#/gi, image_src);
        html = html.replace(/#image_id#/gi, image_id);
        
        if(jQuery("#item_images").append(html)){
            jQuery(".preview_image_wrapper#index"+index).remove();
        } 
    });
    
    

});
</script>