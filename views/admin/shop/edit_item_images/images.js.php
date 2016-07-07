<?php require(__DIR__ . '/images_ilk.php');?>

<script>
    
function uploadMe(index_id){
    alert(index_id);
}
    
/* =============================================================================
 * Image Class
 * ============================================================================= */
var Image = function(image_id, image_src, image_name, image_title, image_alt, is_main, fk_item_id)
{
    this.image_id = image_id || 0,
    this.image_src = image_src || "",
    this.image_name = image_name || "",
    this.image_title = image_title || "",
    this.image_alt = image_alt || "",
    this.is_main = is_main || false,
    this.fk_item_id = fk_item_id || 0;
};

/* =============================================================================
 * Images Manager
 * ============================================================================= */
var Images = function(container_id)
{
    this.containerId = container_id || "#container",
    this.imagesList = [],
    // Load
    this.load = function(image_id, image_src, image_name, image_title, image_alt, is_main, fk_item_id)
    {
        // Create and Push A New Image Object Into this.imagesList Array
        var newImage = new Image(image_id, image_src, image_name, image_title, image_alt, is_main, fk_item_id);
        if( this.imagesList.push(newImage) ){
            var currentIndex = (this.imagesList.length-1);
            var currentImage = this.imagesList[currentIndex];
        }
        // Compose And Append HTML that rappresent an image (with all its inputs)
        var imagesIlk = jQuery("#images-ilk").html();
        imagesIlk = imagesIlk.replace(/#row_id#/gi, ("images_row_"+currentIndex));
        imagesIlk = imagesIlk.replace(/#image_id#/gi, image_id);
        imagesIlk = imagesIlk.replace(/#image_src#/gi, image_src);
        imagesIlk = imagesIlk.replace(/#image_name#/gi, image_name);
        imagesIlk = imagesIlk.replace(/#image_title#/gi, image_title);
        imagesIlk = imagesIlk.replace(/#image_alt#/gi, image_alt);
        imagesIlk = imagesIlk.replace(/#fk_item_id/gi, fk_item_id);
        imagesIlk = imagesIlk.replace('class="#is_main_'+is_main+'#"', 'selected');
        jQuery("#images-wrapper").append(imagesIlk);
    },
    // Add
    this.add = function(){
        if( this.imagesList.push(new Image) ){
            var currentIndex = (this.imagesList.length-1);
            var currentImage = this.imagesList[currentIndex];
        }
        var imagesIlk = jQuery("#images-ilk").html();
        imagesIlk = imagesIlk.replace(/#row_id#/gi, ("images_row_"+currentIndex));
        jQuery("#images-wrapper").append(imagesIlk);
    },
    // Update
    this.update = function(){

    },
    // Remove
    this.remove = function(){

    },
    this.upload = function(index){
        alert(index);
    };
};

/* =============================================================================
 * Events ======================================================================
 * ============================================================================= */
jQuery(document).ready(function(){
    
    var images = new Images();
    
    <?php if(count($this->item->item_images) > 0):?>
        <?php foreach($this->item->item_images as $key=>$val): ?>
            images.load(
                <?=$val->image_id;?>, 
                "<?=$val->image_src;?>", 
                "<?=$val->image_name;?>", 
                "<?=$val->image_title;?>", 
                "<?=$val->image_alt;?>", 
                <?=$val->is_main;?>, 
                <?=$val->fk_item_id;?>);
        <?php endforeach; ?>
    <?php endif;?>

    
    // Add Image
    jQuery("#add-image").click(function(){
        var item_id = jQuery("#item_id").val();
        if(item_id !== "" && item_id !== "0" && item_id !== 0){
            
            images.add();
            
        }else{
            swal({
                title: "<?=Lang::$warning;?>!",
                text : "<?=Lang::$save_before;?>",
                type: "warning",
                html: true
            });
        }
    });

    // Remove Image
    jQuery(document).on("click", ".remove-image", function() {
        jQuery(this).closest(".images_row").remove();
    });

    // Upload Images (submit)
    jQuery("#item_images_submit").click(function(){

    });            
    
    // On Image File Input Change
    jQuery(".image_file_input").change(function(){
        
    });
    
    jQuery( "#item_images_form" ).on( "click", ".image_file_input", function() {
        alert();
    });

    
            
});

</script>
