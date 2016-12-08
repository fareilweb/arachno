<div class="edit_item">
    <h2>
      <span class="glyphicon glyphicon-edit"></span>
      <?=Lang::$edit_item;?>
    </h2>

    <form class="edit_item_form" id="edit_item_form">
        <!-- Hidden Data -->

        <!-- Item ID -->
        <input type="text" name="sc_item_id" value="<?=$this->showcase->item->sc_item_id;?>"/>
        <br><br>

        <div class="row">

            <!--Item Slug -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="form-group">
                    <input
                      type="text"
                      name="sc_item_slug"
                      value="<?=$this->showcase->item->sc_item_slug;?>"
                      class="form-control"
                      placeholder="Slug"
                    />
                </div>
            </div>

            <!-- Item Name -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="form-group">
                    <input
                      type="text"
                      name="sc_item_name"
                      value="<?=$this->showcase->item->sc_item_name;?>"
                      class="form-control"
                      placeholder="Nome"
                    />
                </div>
            </div>

            <!-- Item Short Description -->
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <textarea
                      type="text"
                      name="sc_item_short_desc"
                      class="form-control"
                      placeholder="Riepilogo"
                    ><?=$this->showcase->item->sc_item_short_desc;?></textarea>
                </div>
            </div>

            <!-- Item Long Description -->
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <textarea
                      type="text"
                      name="sc_item_long_desc"
                      class="form-control"
                      placeholder="Descrizione"
                    ><?=$this->showcase->item->sc_item_long_desc;?></textarea>
                </div>
            </div>

            <!-- Item Date -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="form-group">
                    <input
                      type="date"
                      name="sc_item_date"
                      value="<?=$this->showcase->item->sc_item_date;?>"
                      class="form-control"
                      placeholder="Data"
                    />
                </div>
            </div>

            <!-- Item Status -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="form-group">
                    <input
                      type="text"
                      name="sc_item_status"
                      value="<?=$this->showcase->item->sc_item_status;?>"
                      class="form-control"
                      placeholder="Stato"
                    />
                </div>
            </div>

        </div>

    </form><!-- End OF Main Form -->

    <div class="row">

        <!-- Item Categories -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
            <div class="form-group">
                <label for="categories">Categorie</label>
                <select name="sc_item_categories" id="sc_item_categories" multiple="multiple" class="form-control">
                <?php foreach($this->showcase->item->categories as $category): ?>
                    <option value="<?=$category->sc_category_id;?>"><?=$category->sc_category_name;?></option>
                <?php endforeach;?>
                </select>
            </div>
        </div>

        <!-- Item Images -->
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
            <div class="form-group">
                <label for="images">Immagini</label>

                    <div id="dz" class="custom-dropzone">
                        <!--div class="dz-message">
                            Trascina quì o clicca per selezionare le immagini.
                        </div-->
                    </div>

            </div>
        </div>
    </div>

    <!-- Save Button (submit) -->
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <hr>
            <div class="form-group">
                <button id="edit_item_submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-save"></span>
                    <?=Lang::$save;?>
                </button>
            </div>
        </div>
    </div>

</div>

<script>
jQuery(document).ready(function($){

    // EVENT - Submit Item Edit
    $("#edit_item_submit").click(function(e){
        e.preventDefault();

        //console.log( document.getElementById("sc_item_categories").options[0].text );

        jQuery.post("<?=Config::$web_path;?>/ws/call", {
            ws_file: "<?=addslashes(Config::$abs_path.'/modules/showcase/wsScItem.php');?>",
            ws_class: "wsScItem",
            ws_action: "save",
            item_serialized_data: jQuery("#edit_item_form").serialize()
        }).done(function(response){
            var response = JSON.parse(response);
            if(response.status === false){
                swal({
                  type: "error",
                  title: "",
                  text: "",
                  html: true,
                  timer: 1000
                });
                console.log(response);
            }else{

            }
        }).fail(function(response){
            console.log(response);
        });

    });


/* Dropzone Area */
<?php
if($this->showcase->item->sc_item_id !== NULL):
    include dirname(__FILE__) . '/../js/dz.js';

    // Iterate Uploaded Image And Load In Dropzone
    foreach($this->showcase->item->images as $image):
        $file_abs_path = Config::$abs_path . '/themes/' . Config::$theme . '/images' . $image->sc_image_src;
        $file_size = filesize($file_abs_path);
?>
    /*<!--JS-->*/
    dz.loadImage(
        "<?=basename($image->sc_image_src);?>",
        "<?=$file_size?>",
        "<?=Config::$web_path;?>/themes/<?=Config::$theme;?>/images<?=$image->sc_image_src;?>",
        "<?=$image->sc_image_id;?>"
    );
    /*<!--JS-->*/
<?php
    endforeach;
endif;
?>

});
</script>
