<!DOCTYPE html>
<html lang="en" data-localization="<?=Session::get('lang') ? Session::get('lang') : Config::$default_lang;?>">
    <head>
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="title" content="<?=isset($this->page->page_title) ? $this->page->page_title : '';?>"/>
        <meta name="description" content="<?=isset($this->page->page_meta_description) ? $this->page->page_meta_description : '';?>"/>
        <meta name="keywords" content="<?=isset($this->page->page_meta_keywords) ? $this->page->page_meta_keywords : ''; ?>"/>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Bootstrap CSS -->
        <link href="<?=Config::$web_path;?>/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?=Config::$web_path;?>/libs/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">



        <!-- jQuery UI CSS -->
        <link type="text/css" rel="stylesheet" href="<?=Config::$web_path;?>/js/plugins/jquery-ui-1.11.4/jquery-ui.min.css" />

        <!-- Extra CSS -->
        <!--SweetAlert--><link type="text/css" rel="stylesheet" href="<?=Config::$web_path;?>/js/plugins/sweetalert-master/dist/sweetalert.css" />
        <!--TimePicker--><link type="text/css" rel="stylesheet" href="<?=Config::$web_path;?>/js/plugins/jonthornton-jquery-timepicker/jquery.timepicker.css" />
        <!--CScrollbar--><link type="text/css" rel="stylesheet" href="<?=Config::$web_path;?>/js/plugins/jquery-custom-scrollbar-0.5.5/jquery.custom-scrollbar.css" />
        <!--DropZone--><link rel="stylesheet" href="<?=Config::$web_path;?>/js/plugins/dropzone/dropzone.css">
        <!--Custom DropZone--><link rel="stylesheet" href="<?=Config::$web_path;?>/js/plugins/dropzone/custom-dropzone.css">

        <!-- Theme CSS -->
        <link href="<?=Config::$web_path;?>/themes/<?=Config::$theme;?>/css/theme_backend.css" rel="stylesheet">

        <!-- App CSS -->
        <link href="<?=Config::$web_path;?>/css/app_style.css" rel="stylesheet">

        <!-- jQuery / jQuery Plugins -->
        <script src="<?=Config::$web_path;?>/js/plugins/jquery-1.11.3.min.js"></script>
        <script src="<?=Config::$web_path;?>/js/plugins/jquery-ui-1.11.4/jquery-ui.min.js"></script>
        <script src="<?=Config::$web_path;?>/js/plugins/jquery-ui-localization/datepicker-it-IT.js"></script>
        <script src="<?=Config::$web_path;?>/js/plugins/jquery-ui-localization/datepicker-en-GB.js"></script>
        <script src="<?=Config::$web_path;?>/js/plugins/jonthornton-jquery-timepicker/jquery.timepicker.min.js"></script>
        <script src="<?=Config::$web_path;?>/js/plugins/sweetalert-master/dist/sweetalert.min.js"></script>
        <script src="<?=Config::$web_path;?>/js/plugins/jquery.form.js"></script>
        <script type="text/javascript" src="<?=Config::$web_path;?>/js/plugins/dropzone/dropzone.js"></script>

        <!-- Bootstrap JavaScripts -->
        <script src="<?=Config::$web_path;?>/libs/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body <?php if(isset($this->controller_name)):?>class="<?=$this->controller_name;?>"<?php endif;?>>

        <!-- Page Preloader -->
        <div id="page-preloader">
            <img src="<?=Config::$web_path;?>/views/images/preloader.gif"/>
        </div>

        <!-- Notifications Area -->
        <div id="notice"
            <?=isset($this->error) ? 'class="error"' : '';?>
            <?=isset($this->warning) ? 'class="warning"' : '' ;?>
        >
            <?=isset($this->notice) ? $this->notice : '';?>
        </div>

        <!-- Top -->
        <div class="container-fluid">
            <div class="row top-bar">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?php $this->getPosition('top-bar');?>
                </div>
            </div>
        </div>

        <!-- Header -->
        <div class="container-fluid">
            <header class="row">
                <!-- Header Content Position -->
                <div class="header-content col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?php $this->getPosition('header-content');?>
                </div>
            </header>
        </div>

        <!-- Main Content -->
        <div class="container-fluid">

            <!-- Content Top Position -->
            <div class="content-top">
                <?php $this->getPosition('content-top') ?>
            </div>

            <!-- Page Heading -->
            <div class="page-title">
                <h2><?= isset($this->page->page_title) ? $this->page->page_title : ''; ?></h2>
            </div>

            <!-- Page Content -->
            <div class="main-content">
                <!-- Main Content Position -->
                <?php $this->getPosition('main-content');?>
                <!--?=isset($this->page->page_content) ? $this->page->page_content : ''; ?-->
            </div>

            <!-- Content Bottom Position -->
            <div class="content-bottom">
                <?php $this->getPosition('content-bottom');?>
            </div>

        </div><!-- Main Content END -->

        <!-- Footer -->
        <div class="container-fluid">
            <footer class="row">
                <!-- Footer Content Position -->
                <div class="footer-content col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?php $this->getPosition('footer-content');?>
                </div>
            </footer>
        </div>

        <!--====================================================================
            APP Scripts (JS/PHP)
        =====================================================================-->
        <?php
            require_once(Config::$abs_path.'/js/main.js.php');
        ?>

        <!--====================================================================
            THEME Scripts (JS)
        =====================================================================-->
        <script src="<?=Config::$web_path;?>/themes/<?=Config::$theme;?>/js/theme_backend.js"></script>

        <!-- Debug -->
        <div class="debug">

        </div>

    </body>
</html>
