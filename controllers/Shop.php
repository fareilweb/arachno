<?php

class Shop extends Controller
{
    
    public function index($args){
        // Get Args
        $this->args = $args;
    }
    
    /* =========================================================================
     * Categories
     * ========================================================================= */
    
    // List Main Categories
    public function home($args)
    {
        // Get Args
        $this->args = $args;
        
        // Get Data
        $this->menus["main_menu"] = $this->getModel('MenuModel')->selectMenuDataById(1); // TODO - Get The Menu Id From DB in relation withPage and Position
        
        // Categories
        $shop_model = $this->getModel('ShopModel');
        $this->categories = $shop_model->getMainCategories(Lang::$lang_id, 1);
        // Add Categories Children
        foreach($this->categories as $curr_cat){
            $curr_cat->children = $shop_model->getCategoryChildren($curr_cat->category_id);
        }
        
        // Views
        $this->includeView('nav/main_menu', 'header-content');
        $this->includeView('shop/categories', 'main-content');       
        $this->getView('pages/page_default');
    }
    
    
    public function catChildren($args=NULL)
    {
        // Get Args
        $this->args = $args;
        
        // Get Data
        $this->menus["main_menu"] = $this->getModel('MenuModel')->selectMenuDataById(1); // TODO - Get The Menu Id From DB in relation withPage and Position

        // Categories
        $shop_model = $this->getModel('ShopModel');
        $this->categories = $shop_model->getCategoryChildren($args[0]);
        // Add Categories Children
        foreach($this->categories as $curr_cat){
            $curr_cat->children = $shop_model->getCategoryChildren($curr_cat->category_id);
        }
        
        // Views
        $this->includeView('nav/main_menu', 'header-content');
        $this->includeView('shop/categories', 'main-content');       
        $this->getView('pages/page_default');
    }
    
    
    /* =========================================================================
     * Items
     * ========================================================================= */
    
    // List All or Fitered Items (ex. by Category)
    public function showItems($args)
    {
        // Get Args
        $this->args = $args;
        
        // Get Data
        $this->menus["main_menu"] = $this->getModel('MenuModel')->selectMenuDataById(1); // TODO - Get The Menu Id From DB in relation withPage and Position
        
        $shop_model = $this->getModel('ShopModel');
        if( isset($args[0]) && is_numeric($args[0]) ){
        
            $this->items = $shop_model->getItemsByCategory($args[0], TRUE, Lang::$lang_id);
        
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
 
 
        
    /* =========================================================================
     * Buy Process
     * ========================================================================= */
    
    function payment($args=NULL)
    {
        $this->args = $args;
        $this->cart = Session::get("cart");
        
        // Get Data
        $this->menus["main_menu"] = $this->getModel('MenuModel')->selectMenuDataById(1);
        $shop_model = $this->getModel('ShopModel');
        $this->payments = $shop_model->getPayMethods();
        
        // Views
        $this->includeView('nav/main_menu', 'header-content');
        $this->includeView('shop/payment', 'main-content');
        $this->getView('pages/page_default');
    }
    
    
    function shipping($args=NULL)
    {
        $this->args = $args;
        $this->cart = Session::get("cart");
        
        // Get Data
        $this->menus["main_menu"] = $this->getModel('MenuModel')->selectMenuDataById(1);
        $shop_model = $this->getModel('ShopModel');
        $this->shippings = $shop_model->getShippings();
        
        // Views
        $this->includeView('nav/main_menu', 'header-content');
        $this->includeView('shop/shipping', 'main-content');
        $this->getView('pages/page_default');
    }
    
    
    function cart($args=NULL)
    {
        $this->args = $args;
        $this->cart = Session::get("cart");
        
        // Get Data
        $this->menus["main_menu"] = $this->getModel('MenuModel')->selectMenuDataById(1);
        
        
        // Views
        $this->includeView('nav/main_menu', 'header-content');
        $this->includeView('shop/cart', 'main-content');        
        $this->getView('pages/page_default');
        
        //Session::destroy();
        
    }

    function addToCart($args=NULL)
    {
        $this->args = $args;
        $this->cart = Session::get("cart");
        
        // Init Cart If It's Not Ready
        if(!$this->cart){
            $this->cart = new stdClass;
            $this->cart->items = array();
        }
        
        // Get Item Data
        $item_model = $this->getModel('ShopItemModel');
        $item_model->loadById($args[0]);
        
        // Copy Needed Proprerties
        $item = new stdClass();
        $item->item_id = $item_model->item_id;
        $item->item_code = $item_model->item_code;
        $item->item_categories = $item_model->item_categories;
        $item->item_status = $item_model->item_status;
        $item->item_stock = $item_model->item_stock;
        $item->item_price = $item_model->item_price;
        $item->item_title = $item_model->item_title;
        $item->item_weight = $item_model->item_weight;
        $item->item_colors = $item_model->item_colors;
        $item->item_short_desc = $item_model->item_short_desc;
        $item->item_long_desc = $item_model->item_long_desc;
        $item->item_meta_keywords = $item_model->item_meta_keywords;
        $item->item_meta_description = $item_model->item_meta_description;
        $item->fk_lang_id = $item_model->fk_lang_id;
        $item->item_images = $item_model->item_images;
        $item->quantity = 1;
        
        array_push($this->cart->items, $item);
        
        if(Session::set("cart", $this->cart) != FALSE){
            header('location: ' . Config::$web_path . '/Shop/cart');
        }
        
    }
    
    
    function removeFromCart($args=NULL)
    {
        $this->args = $args;
        $this->cart = Session::get("cart");
        
        if($this->cart!=FALSE && isset($args[0]))
        {   
            unset($this->cart->items[$args[0]]);
            
            if(!Session::set("cart", $this->cart)){
                echo Lang::$update_fail;
                exit();
            }else{
                $redirect_i = array_search("redirect", $args);
                if(!$redirect_i){
                    echo Lang::$update_success;
                }else{
                    $url = Config::$web_path;
                    for($i=($redirect_i+1); $i<count($args); $i++){
                        $url .= "/" . $args[$i];
                    }
                    header('location: ' . $url);
                }
            }
        }
    }
    
    function updateQuantity($args=NULL)
    {
        $this->args = $args;
        $this->cart = Session::get("cart");
        
        if(isset($this->cart) && count($this->cart->items) > 0){
            $this->cart->items[$this->post['key']]->quantity = $this->post['quantity'];
            if(!Session::set("cart", $this->cart)){
                echo json_encode(array("status"=>FALSE, "message"=>"upd-quantity-failed")); 
            }else{
                echo json_encode(array("status"=>TRUE, "message"=>"upd-quantity-success"));
            }
        }else{
            echo json_encode(array("status"=>FALSE, "message"=>"upd-quantity-err-no-cart-or-items")); 
        }
    }

}