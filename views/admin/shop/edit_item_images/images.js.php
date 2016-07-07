<?php require(__DIR__ . '/images_ilk.php');?>

<script>

var FormImages = 
{
    prop1: 0,
    prop2: 0,
    
    get: function()
    {
        return this.prop1 + this.prop2;
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
