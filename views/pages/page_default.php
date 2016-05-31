<!DOCTYPE html>
<html lang="en" data-localization="<?=Session::get('lang') ? Session::get('lang') : Config::$default_lang;?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <meta name="title" content="<?php if(isset($data->page_title)){echo $data->page_title;} ?>"/>
    <meta name="description" content="<?php if(isset($data->page_meta_description)){echo $data->page_meta_description;} ?>"/>
    <meta name="keywords" content="<?php if(isset($data->page_meta_keywords)){echo $data->page_meta_keywords;} ?>"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- Bootstrap CSS -->
    <link href="<?=Config::$web_path ?>/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=Config::$web_path ?>/libs/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- App CSS -->
    <link href="<?=Config::$web_path ?>/css/app_style.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="<?=Config::$web_path ?>/themes/<?=Config::$theme ?>/css/theme.css" rel="stylesheet">

    <!-- jQuery UI CSS -->
    <link type="text/css" rel="stylesheet" href="<?=Config::$web_path?>/js/libs/jquery-ui-1.11.4/jquery-ui.min.css" />

    <!-- Extra CSS -->
    <!--SweetAlert--><link type="text/css" rel="stylesheet" href="<?=Config::$web_path?>/js/libs/sweetalert-master/dist/sweetalert.css" />
    <!--TimePicker--><link type="text/css" rel="stylesheet" href="<?=Config::$web_path?>/js/libs/jonthornton-jquery-timepicker/jquery.timepicker.css" />

    <!-- jQuery / jQuery Plugins -->
    <script src="<?=Config::$web_path ?>/js/libs/jquery-1.11.3.min.js"></script>
    <script src="<?=Config::$web_path ?>/js/libs/jquery-ui-1.11.4/jquery-ui.min.js"></script>
    <script src="<?=Config::$web_path ?>/js/libs/jquery-ui-localization/datepicker-it-IT.js"></script>
    <script src="<?=Config::$web_path ?>/js/libs/jquery-ui-localization/datepicker-en-GB.js"></script>
    <script src="<?=Config::$web_path ?>/js/libs/jonthornton-jquery-timepicker/jquery.timepicker.min.js"></script>
    <script src="<?=Config::$web_path ?>/js/libs/sweetalert-master/dist/sweetalert.min.js"></script>

    <!-- Bootstrap JavaScripts -->
    <script src="<?=Config::$web_path ?>/libs/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    
    <!--Page Preloader -->
    <div id="page-preloader">
        <img src="<?=Config::$web_path?>/views/pages/images/preloader.gif"/>
    </div>

    
    <!--========================================================================
        Main Content 
    =========================================================================-->
    <div class="container-fluid">
        
        <!-- Page Heading -->
        <?=isset($data->page_heading) ? "<div class=\"page-heading\"><h2>".$data->page_heading."</h2></div>" : '';?>

        <!-- Page Includes -->
        <?php if(isset($data->includes)){                      
            foreach ($data->includes as $include_path){
                include_once($include_path);
            }
        }?>

        <?=isset($data->page_content) ? $data->page_content : '';?>

    </div><!-- .container-fluid END -->

    
    <!--========================================================================
        APP Scripts (JS/PHP)
    =========================================================================-->
    <?php 
        require_once(Config::$abs_path . '/js/main.js.php'); 
    ?>
    

    <!--========================================================================
        THEME Scripts (JS)
    =========================================================================-->
    <script src="<?=Config::$web_path ?>/themes/<?=Config::$theme?>/js/theme.js"></script>
    

    <!-- Google Analitics -->
    <!--script>
    (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-39960816-16', 'auto');
    ga('send', 'pageview');
    </script-->
    
</body>
</html>
