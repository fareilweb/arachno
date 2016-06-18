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
        $this->menus["main_menu"] = $this->getModel('MenuModel')->selectMenuDataById(1);
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
        //TO DO - Get Item Data By The MOdel
        //$item_model = $this->getModel('ShopItemModel');
       
        
        // Views
        $this->menus["main_menu"] = $this->getModel('MenuModel')->selectMenuDataById(1);
        $this->includeView('nav/main_menu', 'header-content');
        $this->includeView('nav/lang_menu', 'footer-content');
        $this->includeView('shop/items', 'main-content');       
        $this->getView('pages/page_default');
    }
 
    
    
}