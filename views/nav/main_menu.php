<div class="main_menu">
    <div class="main_menu_wrapper">
        <?php if(isset($this->menus["main_menu"])): ?>
        
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                      
                    <?php foreach($this->menus["main_menu"] as $menu_link): ?>
                        <?php
                            $uri = Config::$web_path;
                            if(isset($menu_link->link_rel_uri)){
                                $uri.=$menu_link->link_rel_uri;
                            }else if(isset($menu_link->link_abs_uri)){
                                $uri.=$menu_link->link_abs_uri;
                            }
                        ?>
                        <li>
                            <a 
                                href = "<?=$uri?>" 
                                target = "_self"
                                title= "<?=$menu_link->link_title?>" 
                                alt  = "<?=$menu_link->link_title?>"
                            >
                                <?=$menu_link->link_title?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    
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
                            <label>
                                Lingua
                            </label>
                        </li-->
                        <li>
                            <p style="margin: 18px 8px auto 8px;">
                                <a href="<?=Config::$web_path;?>/User/login/redirect/User/login">
                                    <span class="glyphicon glyphicon-log-in"></span> 
                                    <?=Lang::$login;?>
                                </a>
                            </p>
                        </li>
                        <li>
                            <p style="margin: 18px 8px auto 8px;">
                                <a href="<?=Config::$web_path;?>/User/register">
                                    <span class="glyphicon glyphicon-user"></span>
                                    <?=Lang::$register;?>
                                </a>
                            </p>
                        </li>
                        <li>
                            <p>
                                <?php include(__DIR__ . '/lang_menu.php');?>
                            </p>
                        </li>
                    </ul>
                </div>
   
        <?php endif;?>
            
    </div>
</div>
