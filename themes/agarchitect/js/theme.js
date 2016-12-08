jQuery(document).ready(function(jQuery) {

    /* Menu Function */
    (function(){
        var is_open = false;
        var menu_box_height
          = jQuery("header .menu.portfolio").outerHeight() + jQuery("header .menu.pages").outerHeight();

        jQuery(".menu-open a").click(function(event){
            event.preventDefault();
            if(is_open===false){
                is_open = true;
                jQuery("header div.menu-box").animate({height: menu_box_height+"px"});
                jQuery(".menu-open #icon_closed").hide();
                jQuery(".menu-open #icon_open").show();
            }else{
                is_open = false;
                jQuery("header div.menu-box").animate({height: "0px"});
                jQuery(".menu-open #icon_open").hide();
                jQuery(".menu-open #icon_closed").show();
            }
        });
    })();

    /* Init jQuery Custom Scroll Plugin */
    $(".custom-scroll").customScrollbar({
        skin: "gray-skin", /* default-skin | gray-skin | modern-skin*/
        updateOnWindowResize: true,
        preventDefaultScroll: true
    });

});
