
<div class="container-fluid">
    <header class="row">
        <!-- Header Content Position -->
        <div class="header-content col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="row">
                <!-- Header Left -->
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="header-left">
                        </header>
                        <!-- Position: [header-left] -->
                        <?php $this->getPosition('header-left');?>
                        <div class="logo">
                            <!--a href="<?=Config::$web_path;?>">
                                <img src="<?=Config::$web_path?>/themes/<?=Config::$theme?>/images/logo.png" />
                            </a-->
                        </div>
                    </div>
                </div>

                <!-- Header Right -->
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="header-right">
                        <!-- Position: [header-right-1] -->
                        <?php $this->getPosition('header-right-1');?>

                        <!-- Position: [header-right-2] -->
                        <?php $this->getPosition('header-right-2');?>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
