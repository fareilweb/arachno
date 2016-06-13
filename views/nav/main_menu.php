<div class="main_menu">
    <div class="main_menu_wrapper">
        <?php if(isset($this->menus["main_menu"])): ?>
        
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                      <li class="active"><a href="#">   Home</a></li>
                      <li><a href="#">About</a></li>
                      <li><a href="#">Contact</a></li>
                      <li class="dropdown">
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
                      </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      <li class="active"><a href="./">Default <span class="sr-only">(current)</span></a></li>
                      <li><a href="../navbar-static-top/">Static top</a></li>
                      <li><a href="../navbar-fixed-top/">Fixed top</a></li>
                    </ul>
                </div>

        
            <!--h3>
                <?=isset($this->menus["main_menu"][0]->menu_title) ? $this->menus["main_menu"][0]->menu_title : '';?>
            </h3-->

            <ul>
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
            </ul>
        
        <?php endif;?>
            
    </div>
</div>

<!--
[0] => stdClass Object
(
    [menu_id] => 1
    [menu_title] => Menu Principale
    [link_id] => 1
    [fk_menu_id] => 1
    [link_title] => Home Page
    [link_rel_uri] => /
    [link_abs_uri] => NULL
)
-->