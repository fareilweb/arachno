(function($){
    // HTML Templates
    var HTML_APP =
      '<div id="imgsmart_controls">'+
          '<div id="imgsmart_images"></div>'+
          '<input id="imgsmart_add" class="btn btn-default" value="#text_add#" type="button" />'+
      '</div>';

    var HTML_IMAGE_ITEM =
      '<div class="image_item row">'+
          '<div class=""></div>'+
      '</div>';

    $.fn.ImgSmart = function(options)
    {
        /* =================================================================== *
            Settings
        ** =================================================================== */
        var settings =
          $.extend({
                selector: this.selector,
                text_add: "Add"
          }, options );


        /* =================================================================== *
            Helpers
        ** =================================================================== */
        String.prototype.replaceAll = function(target, replacement) {
            return this.split(target).join(replacement);
        };


        /* =================================================================== *
            Plugin Business
        ** =================================================================== */
        this.images = [];

        // Replace Placeholders Strings
        this.replaceStrings = function(){
            HTML_APP = HTML_APP.replace("#text_add#", settings.text_add);
        };

        // Init
        this.init = function(){
            this.replaceStrings();
            this.html(HTML_APP);
        };

        /* Events =========================================================== */
        this.on("click", "#imgsmart_add", function(){

            jQuery(settings.selector).append(settings.text_add);
        });

        this.init();
        return this;
    };
})(jQuery);
