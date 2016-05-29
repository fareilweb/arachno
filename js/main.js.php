<script>
    
    jQuery(window).load(function(){
        jQuery("#page-preloader").hide();	
    });

    jQuery(document).ready(function () {

        /* ============================================
         * General Date Picker Stuff 
         * ============================================ */

        jQuery('.datepicker').datepicker({
            showOn: "button",
            buttonImage: "<?=Config::$web_path?>/themes/<?=Config::$theme?>/images/calendar.gif",
            buttonImageOnly: false,
            buttonText: "Seleziona la Data",
            changeMonth: true,
            changeYear: true,
            numberOfMonths: 1,
            showButtonPanel: true
        });
        var currLoc = jQuery("html").attr("data-localization");
        jQuery( ".datepicker" ).datepicker( "option", jQuery.datepicker.regional[currLoc] );
        function mySetDate(){
            jQuery(".datepicker").datepicker("setDate", "12-07-1981");
        }

    });
</script>
