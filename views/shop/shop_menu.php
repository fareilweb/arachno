<div class="menu-wrapper" id="shop_menu">
    <ul class="menu">
        <?php if (isset($this->menus['shop_menu'])): ?>
            <?php foreach($this->menus['shop_menu'] as $item): ?>
                <li>
                    <a 
                        href="<?=Config::$web_path;?><?=$item->link_rel_uri;?>" 
                        target="_self" 
                        title="<?=$item->link_title;?>" 
                        alt="<?=$item->link_title;?>"
                    ><?=$item->link_title;?></a>
                </li>
            <?php endforeach;?>
        <?php endif;?>
    </ul>
</div>