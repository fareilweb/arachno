
<?php include (dirname(__FILE__) . '/image_ilk.php'); ?>

<div class="row">
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
        <h3><?=Lang::$select_images?></h3>
        <!-- Upload Form =============================================== -->
        <form method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="<?=Config::$web_path?>/Upload/itemImagesProcess/<?=$this->item->item_id?>">
            <input type="hidden" name="image_form_submit" value="1"/>
            <div class="form-group">
                <input type="file" name="images[]" id="images" class="btn btn-default form-control" multiple>
            </div>
        </form>
    </div>
    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
        <h3><?=Lang::$preview?></h3>
        <div id="images_preview">

        </div>
    </div>
</div>

<script type="text/javascript">
jQuery(document).ready(function(){
    
    function RemoveImageFromDb(image_id, index){
        jQuery("#page-preloader").show();
        jQuery.post("<?=Config::$web_path?>/Admin/removeItemImage", {
            image_id: image_id
        }).done(function(result){
            var res = JSON.parse(result);
            if(res.status === 1){
                jQuery("#index"+index).remove();
                jQuery("#page-preloader").hide();
            }else{
                jQuery("#page-preloader").hide();
                swal({
                    title: "<?=Lang::$warning?>",
                    text: "<strong><?=Lang::$delete_fail?></strong>",
                    type: "error",
                    html: true
                });
            }
        }).fail(function(err){
            jQuery("#page-preloader").hide();
            var result = JSON.parse(result);
        });
    }
    
    // AJAX Submit Upload
    <?php if($this->item->item_id!=""):?>
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
    <?php else:?>
        jQuery("#images").click(function(e){
            e.preventDefault();
            swal({
                title: "<?=Lang::$almost_done;?>!",
                text: "<?=Lang::$save_before;?>",
                type: "warning",
                html: true
            });
            return false;
        });
    <?php endif;?>


    // Set an Image As Main OR Not
    jQuery("#item_images").on("change", ".is_main_checkbox", function(e){
        
        jQuery("#page-preloader").show();
        
        var image_id = jQuery(this).attr("data-image_id");
        var isChecked = jQuery(this).is(':checked');
        var senderClass = jQuery(this).attr("class");
        
        jQuery("#item_images input:checked").each(function(index, element){
           if(jQuery(element).attr("class") !== jQuery(e.target).attr("class")){
                jQuery(element).attr('checked', false);
           } 
        });
        
        jQuery.post("<?=Config::$web_path?>/Admin/setMainImage", {
            image_id: image_id
        }).done(function(result){
            var res = JSON.parse(result);
            if(res.status === 1){
                jQuery("#page-preloader").hide();
            }else{
                jQuery("#page-preloader").hide();
                swal({
                    title: "<?=Lang::$warning?>",
                    text: "<strong><?=Lang::$update_fail?></strong>",
                    type: "error",
                    html: true
                });
            }
        }).fail(function(err){
            jQuery("#page-preloader").hide();
            var result = JSON.parse(result);
        });
        
        /*
        alert(
            "Image ID = " + image_id + "\n" +
            "Is Cheched? = " + isChecked
        );*/
    });

    // Remove Image From Preview
    jQuery("#images_preview").on("click", "button.rem", function(e){
        e.preventDefault();
        var index = jQuery(this).attr("data-index");
        var image_id = jQuery(this).attr("data-image_id");
        RemoveImageFromDb(image_id, index);
    });

    // Remove Image From Item
    jQuery("#item_images").on("click", "button.rem", function(e){
        e.preventDefault();
        var index = jQuery(this).attr("data-index");
        var image_id = jQuery(this).attr("data-image_id");
        RemoveImageFromDb(image_id, index);
    });

    // Add Image to Item Form
    jQuery("#images_preview").on("click", "button.add", function(e){
        var index = jQuery(this).attr("data-index");
        var image_src = jQuery(this).attr("data-src");
        var image_id = jQuery(this).attr("data-image_id");
        
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