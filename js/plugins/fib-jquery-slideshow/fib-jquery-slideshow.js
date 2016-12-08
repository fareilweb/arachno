(function($){

    var ciao = 0;

    $.fn.slideshow = function(options) {
        // Settings / Options
        var settings = $.extend({
            // These are the defaults.
            color: "#556b2f",
            text: "default"
        }, options );

        // Plugin Business
        this.css( "color", settings.color );

        /*
        $(".gallery img").each(function(index, el) {
            if(index < $(".gallery img").length){
                $(el).addClass('hidden');
            }
            $(".gallery-slideshow .images").append(el);
        });
        */


        return this;
    };

})(jQuery);
