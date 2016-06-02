<div class="main_menu">
    
    <div class="main_menu_wrapper">
        <?php if(isset($data->menu_data)): ?>
        
            <h3>
                <?=isset($data->menu_data[0]->menu_title) ? $data->menu_data[0]->menu_title : '';?>
            </h3>
        
            <ul>
                <?php foreach($data->menu_data as $menu_link): ?>
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