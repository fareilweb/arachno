<div class="main_menu">
    <div class="main_menu_wrapper">
        <?php if(isset($this->menus["main_menu"])): ?>
        
            <h3>
                <?=isset($this->menus["main_menu"][0]->menu_title) ? $this->menus["main_menu"][0]->menu_title : '';?>
            </h3>
        
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
                            target = "_blank"
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