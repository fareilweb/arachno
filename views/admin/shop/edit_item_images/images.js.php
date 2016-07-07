<?php require(__DIR__ . '/images_ilk.php');?>

<script>
// Image Class
var Image =
{
    image_id: 0,
    image_src: "",
    image_name: "",
    image_title: "",
    image_alt: "",
    is_main: false,
    fk_item_id: 0

}

// Images Manager
var Images = 
{
    containerId: "#container",
    imagesList: [],    
    add: function(){
        
    },
    update: function(){

    },
    remove: function(){

    }
};




/* Events ====================================================================== */

// Add Image
jQuery("#add-image").click(function(){
    jQuery("#images-wrapper").append(
        jQuery("#item-image-ilk").html()
    );
});

// Remove Image
jQuery(document).on("click", ".remove-image", function() {
    jQuery(this).closest(".image_row").remove();
});

// Upload Images (submit)
jQuery("#item_images_submit").click(function(){
    
});

</script>
