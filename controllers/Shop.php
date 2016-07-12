<?php

class Shop extends Controller
{
    
    public function index($args){
        // Get Args
        $this->args = $args;
        
    }
    
    // List All Categories
    public function showCategories($args)
    {
        // Get Args
        $this->args = $args;
        
        // Get Data
        $this->menus["main_menu"] = $this->getModel('MenuModel')->selectMenuDataById(1); // TODO - Get The Menu Id From DB in relation withPage and Position
        $shop_model = $this->getModel('ShopModel');
        $this->categories = $shop_model->getCategories(Lang::$lang_id);
        
        // Views
        $this->includeView('nav/main_menu', 'header-content');
        $this->includeView('shop/categories', 'main-content');       
        $this->getView('pages/page_default');
    }
    
    // List All or Fitered Items (ex. by Category)
    public function showItems($args)
    {
        // Get Args
        $this->args = $args;
        
        // Get Data
        $this->menus["main_menu"] = $this->getModel('MenuModel')->selectMenuDataById(1); // TODO - Get The Menu Id From DB in relation withPage and Position
        $shop_model = $this->getModel('ShopModel');
        if( isset($args[0]) && is_numeric($args[0]) ){
            $this->items = $shop_model->getItemsByCategory($args[0], Lang::$lang_id);
        }else{
            $this->items = $shop_model->getItems(Lang::$lang_id);
        }
        
        // Views
        $this->includeView('nav/main_menu', 'header-content');
        $this->includeView('shop/items', 'main-content');       
        $this->getView('pages/page_default');
    }
 
    // Show One Item
    public function showItem($args)
    {
        // Get Args
        $this->args = $args;
        
        // Get Data
        $this->menus["main_menu"] = $this->getModel('MenuModel')->selectMenuDataById(1);
        if(isset($args[0]) && is_numeric($args[0])){
            $this->item = $this->getModel('ShopItemModel');
            $this->item->loadById($args[0]);
        }
        
        // Views
        $this->includeView('nav/main_menu', 'header-content');
        $this->includeView('shop/item', 'main-content');       
        $this->getView('pages/page_default');
    }
 
    
    
    
}