<?php if(isset($this->menus["main_menu"])): ?>
<!--div id="navbar" class="navbar-collapse collapse"-->
    <div class="menu-wrapper" id="admin-menu">
        <a href="<?=Config::$web_path;?>/Admin" style="float:left; width: 100%; max-width: 260px;">
            <img src="<?=Config::$web_path;?>/views/images/logo.png" style="width:100%;"/>
        </a>
        <ul class="nav navbar-nav menu">
            <?php include (Config::$abs_path . '/views/admin/nav/menu_items.php'); ?>
        </ul>
    </div>
<!--/div-->
<?php endif;?>