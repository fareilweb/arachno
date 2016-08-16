<div class="main_menu">
    <div class="main_menu_wrapper">
        <?php if(isset($this->menus["main_menu"])): ?>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?=Config::$web_path;?>" target="_blank">
                            <?=Lang::$go_to_site?>
                        </a>
                    </li>
                    <li>
                        <a href="<?=Config::$web_path;?>/Admin/editItem">
                            <?=Lang::$add_item?>
                        </a>
                    </li>
                    <li>
                        <a href="<?=Config::$web_path;?>/Admin/showItems">
                            <?=Lang::$products?>
                        </a>
                    </li>
                    <li>
                        <a href="<?=Config::$web_path;?>/Admin/showMainCategories">
                            <?=Lang::$categories?>
                        </a>
                    </li>
                    <li>
                        <a href="<?=Config::$web_path;?>/Admin/shippings">
                            <?=Lang::$shippings;?>
                        </a>
                    </li>
                    <li>
                        <a href="<?=Config::$web_path;?>/Admin/payments">
                            <?=Lang::$payments;?>
                        </a>
                    </li>
                  <!--li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li role="separator" class="divider"></li>
                      <li class="dropdown-header">Nav header</li>
                      <li><a href="#">Separated link</a></li>
                      <li><a href="#">One more separated link</a></li>
                    </ul>
                  </li-->
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!--li>
                        <label style="margin: 18px 8px auto 8px;">
                            Lingua
                        </label>
                    </li-->
                    <!--li>
                        <p>
                            <?php include(__DIR__ . '/lang_menu.php');?>
                        </p>
                    </li-->
                </ul>
            </div>
   
        <?php endif;?>
            
    </div>
</div>
