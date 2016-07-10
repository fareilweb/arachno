<div class="row">
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <h3><?=Lang::$select_images?></h3>
        <!-- Upload Form =============================================== -->
        <form method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="<?=Config::$web_path?>/Upload/itemImagesProcess">
            <input type="hidden" name="image_form_submit" value="1"/>
            <div class="form-group">
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
    
    jQuery('#images').on('change', function(e){
        
         jQuery("#multiple_upload_form").ajaxForm({
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
        }).submit();
        
    });
    
});
</script>