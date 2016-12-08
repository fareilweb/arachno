/* ======================================================================== *
    Dropzone
** ======================================================================== */
// PHP "traslation" to JavaScript
var PHP = {
    store_path: "<?=addslashes(Config::$abs_path.'/themes/'.Config::$theme.'/images/showcase/items/'.$this->showcase->item->sc_item_slug.'/');?>",
    sc_item_id: "<?=$this->showcase->item->sc_item_id;?>",
    sc_image_src_path: "/showcase/items/<?=$this->showcase->item->sc_item_slug;?>/",
    ws_upload_file: "<?=Config::$web_path;?>/ws/uploadImage",
    ws_delete_file: "<?=Config::$web_path;?>/ws/call",
    ws_store_to_db: "<?=Config::$web_path;?>/ws/call"
}

// Disable DZ Autodiscover
Dropzone.autoDiscover = false;

// DZ Settings
var dz_options = {
    url: PHP.ws_upload_file,
    paramName: "file",
    maxFilesize: 8,
    maxFiles: 24,
    uploadMultiple: false,
    addRemoveLinks: true,
    acceptedFiles: "image/*",
    dictDefaultMessage: 'Trascina qu&igrave; le immagini o clicca per selezionarle.',
    dictFallbackMessage: 'Il tuo browser non supporta il "drag and drop"',
    dictInvalidFileType: 'Formato File Non Valido',
    dictFileTooBig: 'Il File Eccede le DImensioni Massime Consentite',
    dictCancelUpload: 'Interrompi il Caricamento',
    dictCancelUploadConfirmation: 'Caricamento Completato',
    dictRemoveFile: 'Rimovi il File',
    dictMaxFilesExceeded: 'Hai Superato il Numero Massimo di File',
    accept: function(file, done) {
        if (file.name === "some_name"){
            done("Error Message"); // Il file non viene elaborato
        } else {
            done(); // Il file viene elaborato
        }
    }
};

// Get DZ Instance
var dz = new Dropzone("div#dz", dz_options);

// Add Method Load already uploaded/existing files
dz.loadImage = function(image_name, image_size, image_web_path, image_id){
    // Create the mock file:
    var mockFile = { name: image_name, size: image_size, image_id: image_id };
    var imageUrl = image_web_path;
    dz.emit("addedfile", mockFile);
    dz.emit("thumbnail", mockFile, imageUrl);
    dz.createThumbnailFromUrl(mockFile, imageUrl);
    dz.emit("complete", mockFile);
    dz.options.maxFiles = dz.options.maxFiles - 1;
}

// EVENT: when the file was correctly uploaded
dz.on("success", function(file, response){

    var response = JSON.parse(response);
    if(response.status===true){

        file.store_path = PHP.store_path + response.prefix + file.name;
        file.name = response.prefix + file.name;

        jQuery.post(PHP.ws_store_to_db, {

            ws_file: "<?=addslashes(Config::$abs_path.'/modules/showcase/wsScItemImages.php');?>",
            ws_class: "wsScItemImages",
            ws_action: "save",
            sc_image_src: PHP.sc_image_src_path + response.prefix + file.name,
            sc_item_id: PHP.sc_item_id

        }).done(function(response){
            var response = JSON.parse(response);
            if(response.status === true){

                // Append The Insert_ID to "file" object
                file.image_id = response.insert_id;
                swal({
                  type:"success",
                  title: "OK!",
                  text: "Immagine Correttamente Salvata.",
                  html: true,
                  timer: 1000
                });

            }else{

                swal({
                  type:"error",
                  title: "Qualcosa non ha funzionato.",
                  text: "Controlla la console per i dettagli dell'errore. Response OK",
                  html: true
                });
                console.log(response);

            }

        }).fail(function(response){
            var response = JSON.parse(response);
            swal({
              type:"error",
              title: "Qualcosa non ha funzionato.",
              text: "Controlla la console per i dettagli dell'errore. Response Error",
              html: true
            });
            console.log(response);

        });

    }else{
        swal({
          type: "error",
          title: "Uplaod Error",
          text: "Upload Error" + file.name,
          html: true,
        });
    }

});

// EVENT: when a file is removed
dz.on("removedfile", function(file){
    // Rimuovere il file dal server e dal database
    jQuery.post(PHP.ws_delete_file, {
        ws_file: "<?=addslashes(Config::$abs_path.'/modules/showcase/wsScItemImages.php');?>",
        ws_class: "wsScItemImages",
        ws_action: "delete",
        sc_item_image_id: file.image_id,
        abs_file_name: PHP.store_path + file.name
    }).done(function(response){
        var response = JSON.parse(response);
        if(response.status === true){
            swal({
              type:"success",
              title: "OK!",
              text: "Immagine Correttamente Rimossa",
              html: true,
              timer: 1000
            });
        }else{
            swal({
              type:"error",
              title: "Qualcosa non ha funzionato.",
              text: "Controlla la console per i dettagli dell'errore",
              html: true
            });
            console.log(response);
        }

    }).fail(function(response){
        var response = JSON.parse(response);
        swal({
          type:"error",
          title: "Qualcosa non ha funzionato.",
          text: "Controlla la console per i dettagli dell'errore.",
          html: true
        });
        console.log(response);
    });
});

// EVENT: before the DZ form is sended. can append data to it
dz.on("sending", function(file, xhr, formData) {
    //var date = new Date();
    //var formatted_time = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate() + "_" +  date.getHours() + "-" + date.getMinutes() + "-" + date.getSeconds();
    //formData.append("prefix", formatted_time+"_" );
    formData.append("store_path", PHP.store_path); // Absolute path to the store folder
});

/* ======================================================================== *
    Dropzone END
** ======================================================================== */
