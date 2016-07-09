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

            console.log("\nImage ["+this.currentIndex+"] Created: ");
            console.log(this.imagesList);

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

            console.log("\nImage ["+this.currentIndex+"] Loaded: ");
            console.log(this.imagesList);

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

        console.log("\nImage ["+this.currentIndex+"] Added: ");
        console.log(this.imagesList);
    },
            
    // Update
    this.update = function(index){
        this.currentIndex = index;

        console.log("\nImage ["+this.currentIndex+"] Updated: ");
        console.log(this.imagesList);    
    },
            
    // Remove
    this.remove = function(index){
        console.log("\nBefore Remove: ");
        console.log(this.imagesList);

        if(this.imagesList.splice(index, 1)){
            //console.log(index + "\n");            
            jQuery(this.containerId).html("");
            for(var i=0; i<this.imagesList.length; i++){
                this.add(this.imagesList[i]);
            }
            
            console.log("\nAfter Remove: ");
            console.log(this.imagesList);
        }
    },
            
    this.upload = function(index){
        this.currentIndex = index;

        console.log("\nImage ["+this.currentIndex+"] Uploaded: ");
        console.log(this.imagesList);
    };
};

/* =============================================================================
 * Events ======================================================================
 * ============================================================================= */
jQuery(document).ready(function(){
    
    // Create Instance of Images Manager
    var images = new Images("#images-wrapper");
    
    // Load Saved Images
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

    console.log("\nINIZIO: ");
    console.log(images.imagesList);

    // Add an Empty Image Object
    jQuery("#add-image").click(function(){
        // Check Before if the Item is Saved (Have the Id)
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
    
    // On Image File Input Change
    jQuery(".image_file_input").change(function(){
        alert("normal");
    });
    jQuery("#images-wrapper").on("change", ".image_file_input", function() {
        alert("delegate");
    });

    // Images Form Submit Clicked
    jQuery("#item_images_submit").click(function(){
        var data = jQuery("#item_images_form").serialize();
        console.log("\nSerialized Data: ");
        console.log(data);
    });
});

</script>
