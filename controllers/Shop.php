<?php

class Shop extends Controller
{
    public function index($args){
        $this->showProducts($args);
    }
    
    public function showItems($args)
    {
        // Get Args
        $this->args = $args;
        
        // Elaborate Content
        
        
        
        // Views
        $this->menus["main_menu"] = $this->getModel('MenuModel')->selectMenuDataById(1); // TODO - Get The Menu Id From DB in relation withPage and Position
        $this->includeView('nav/main_menu', 'header-content');
        $this->includeView('nav/lang_menu', 'footer-content');
        $this->includeView('shop/items', 'main-content');       
        $this->getView('pages/page_default');
    
    }
 
    
    public function showItem($args)
    {
        // Get Args
        $this->args = $args;
        
        // Elaborate Content
        if(isset($args[0]) && is_numeric($args[0]))
        {
            $this->item = $this->getModel('ShopItemModel');
            $this->item->loadById($args[0]);
            
        }
        
        // Views
        $this->menus["main_menu"] = $this->getModel('MenuModel')->selectMenuDataById(1);
        $this->includeView('nav/main_menu', 'header-content');
        $this->includeView('nav/lang_menu', 'footer-content');
        $this->includeView('shop/item', 'main-content');       
        $this->getView('pages/page_default');
    }
 
    
    
}