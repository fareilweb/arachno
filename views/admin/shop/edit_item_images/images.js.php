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
    this.currentIndex = 0,
    this.currentImage = false,
    this.image_html_model = jQuery("#images-ilk").html(),
    
    // Create
    this.create = function(){
        // Create a New Empty Image
        var newImage = new Image;
        if( this.imagesList.push(newImage) ){
            this.currentIndex = (this.imagesList.length-1);
            this.add(newImage, this.currentIndex);
        }
    },
    
    // Load
    this.load = function(image_id, image_src, image_name, image_title, image_alt, is_main, fk_item_id)
    {
        // Create and Push A New Image Object Into this.imagesList Array
        var newImage = new Image(image_id, image_src, image_name, image_title, image_alt, is_main, fk_item_id);
        if( this.imagesList.push(newImage) ){
            this.currentIndex = (this.imagesList.length-1);
            this.add(newImage, this.currentIndex);
        }
    },
            
    // Add
    this.add = function(image_obj, index){
        // Compose And Append HTML that rappresent an image (with all its inputs)
        var image_html = this.image_html_model;
        image_html = image_html.replace(/#row_id#/gi, ("images_row_"+index));
        image_html = image_html.replace(/#index#/gi, index);
        image_html = image_html.replace(/#image_id#/gi, image_obj.image_id);
        image_html = image_html.replace(/#image_src#/gi, image_obj.image_src);
        image_html = image_html.replace(/#image_name#/gi, image_obj.image_name);
        image_html = image_html.replace(/#image_title#/gi, image_obj.image_title);
        image_html = image_html.replace(/#image_alt#/gi, image_obj.image_alt);
        image_html = image_html.replace(/#fk_item_id/gi, image_obj.fk_item_id);
        image_html = image_html.replace('class="#is_main_'+image_obj.is_main+'#"', 'selected');
        jQuery("#images-wrapper").append(image_html);
    },
            
    // Update
    this.update = function(index){
        
    },
            
    // Remove
    this.remove = function(index){
        if(this.imagesList.splice(index, 1)){
            //console.log(index + "\n");
            console.log("\nPRIMA: ");
            console.log(this.imagesList);
            
            jQuery(this.containerId).html("");
            for(var i=0; i<this.imagesList.length; i++){
                this.add(this.imagesList[i]);
            }
            
            console.log("\nDOPO: ");
            console.log(this.imagesList);
            
        }
    },
            
    this.upload = function(index){
        alert(index);
    };
};

/* =============================================================================
 * Events ======================================================================
 * ============================================================================= */
jQuery(document).ready(function(){
    
    var images = new Images("#images-wrapper");
    
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
            
            images.create();
            
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
        //jQuery(this).closest(".images_row").remove();
        var index = jQuery(this).attr("data-index");
        images.remove(index);
    });

    // Upload Images (submit)
    jQuery("#item_images_submit").click(function(){

    });            
    
    // On Image File Input Change
    jQuery(".image_file_input").change(function(){
        
    });
    
    jQuery( "#item_images_form" ).on( "click", ".image_file_input", function() {
        
    });

    
            
});

</script>
