<div class="row top">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center top-bar">
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav menu">
                <li>
                    <p style="margin: 18px 8px auto 8px;">
                        <a href="tel:0823794758">
                            <img  class="icon icon32" src="<?=Config::$web_path;?>/themes/<?=Config::$theme;?>/images/icon-support.png" />
                            +39 0823 79 47 58
                        </a>
                    </p>
                </li>
            </ul>
            
            <ul class="nav navbar-nav navbar-right menu">
                 <li>
                    <p style="margin: 18px 8px auto 8px;">
                        <a href="#">
                            <img src="<?=Config::$web_path;?>/themes/<?=Config::$theme;?>/images/icon-facebook.png" class="icon32"/>
                            <!--?=Lang::$cart;?-->
                        </a>
                    </p>
                </li>
                <li>
                    <p style="margin: 18px 8px auto 8px;">
                        <a href="<?=Config::$web_path;?>/Shop/cart">
                            <img src="<?=Config::$web_path;?>/themes/<?=Config::$theme;?>/images/icon-cart-circle.png" class="icon32"/>
                            <!--?=Lang::$cart;?-->
                        </a>
                    </p>
                </li>
                <li>
                    <p style="margin: 18px 8px auto 8px;">
                        <a href="#">
                            <img src="<?=Config::$web_path;?>/themes/<?=Config::$theme;?>/images/icon-search.png" class="icon32"/>
                            <!--?=Lang::$cart;?-->
                        </a>
                    </p>
                </li>
                <?php if(Session::get("auth") === 1 || Session::get("auth") === TRUE): ?>
                    <li>
                        <p style="margin: 18px 8px auto 8px;">
                            <?=Lang::$hello . " <strong><i>" . Session::get("user_data")["user_name"] . "</i></strong>";?>
                        </p>
                    </li>
                    <li>
                        <p style="margin: 18px 8px auto 8px;">
                            <a href="<?=Config::$web_path?>/User/logout">
                                <span class="glyphicon glyphicon-log-out"></span> 
                                <?=Lang::$logout;?>
                            </a>
                        </p>
                    </li>
                <?php else: ?>
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
                <?php endif; ?>
            </ul>

        </div>
    </div>
</div>