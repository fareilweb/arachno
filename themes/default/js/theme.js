jQuery(document).ready(function($) {


    // Init jQuery Custom Scroll Plugin
    $(".custom-scroll").customScrollbar({
        skin: "gray-skin", /* default-skin | gray-skin | modern-skin*/
        updateOnWindowResize: true,
        preventDefaultScroll: true
    });
});
