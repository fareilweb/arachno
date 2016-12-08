<?php

class Shop extends Controller
{

    public function index($args){
        // Get Args
        $this->args = $args;
        
        // Includes
        /*
        $this->includeView('pages/top_bar', 'top-bar');
        $this->includeView('pages/header', 'header-content');
        $this->includeView('pages/logo', 'header-left');
        $this->includeView('shop/shop_menu', 'header-right-1');
        $this->includeView('nav/main_menu', 'header-right-2');
        $this->includeView('pages/footer', 'footer-content');
        $this->includeView('shop/shop_menu', 'footer-center-1');
        $this->includeView('nav/main_menu', 'footer-center-2');
        */
        // Main View
        $this->getView();
    }
    
    /* =========================================================================
     * Categories
     * ========================================================================= */
    
    // List Main Categories
    public function home($args)
    {
        // Get Args
        $this->args = $args;
        
        // Categories
        $shop_category_model = $this->getModel("ShopCategoryModel");
        $this->categories = $shop_category_model->getMainCategories(Lang::$lang_id, 1);
        
        // Views
        $this->includeView('shop/categories', 'main-content'); 
        $this->index($args);        
    }
    
    
    /* =========================================================================
     * Items
     * ========================================================================= */
    
    // List All or Fitered Items (ex. by Category)
    public function categoryItems($args)
    {
        // Get Args
        $this->args = $args;
        
        $shop_item_model = $this->getModel('ShopItemModel');
        if( isset($args[0]) && is_numeric($args[0]) ){                    
            
            // Category data
            $this->category = $this->getModel("ShopCategoryModel");
            $this->category->loadById($args[0]);
            
            // Items Of The Category
            $this->items = $shop_item_model->getItemsByCategory($args[0], TRUE, Lang::$lang_id);
        }else{
            $this->items = $shop_item_model->getAll(Lang::$lang_id);
        }
        
        // Return Data
        $key_category_id = array_search("category_id", $this->args);
        $key_category_name = array_search("category_name", $this->args);
        if($key_category_id && $key_category_name){
            $this->return_url = Config::$web_path . "/Shop/categoryItems/" . $args[$key_category_id+1] ;
            $this->return_string = Lang::$back_to_category . ' "' . rawurldecode($args[$key_category_name+1]). '"';
        }else{
            $this->return_url = Config::$web_path . "/Shop/home";
            $this->return_string = Lang::$back_to_shop_home;
        }
        
        // Views
        $this->includeView('shop/category_items', 'main-content');    
        $this->index($args);
    }
    
 
    // Show One Item
    public function item($args)
    {
        // Get Args
        $this->args = $args;
        
        if(isset($args[0]) && is_numeric($args[0])){
            $this->item = $this->getModel('ShopItemModel');
            $this->item->loadById($args[0]);

            // Append Category Info to The Object
            $arg_key_name = (array_search('category_name', $this->args)+1);
            $arg_key_id = (array_search('category_id', $this->args)+1);
            $this->return_category_name = $this->args[$arg_key_name];
            $this->return_category_id = $this->args[$arg_key_id];
        }
        
        // Views
        $this->includeView('shop/item', 'main-content');    
        $this->index($args);
    }
 
 
        
    /* =========================================================================
     * Buy Process
     * ========================================================================= */
    
    // Select Payment Method
    function payment($args=NULL)
    {
        $this->args = $args;
        $this->cart = Session::get("cart");
        
        $shop_model = $this->getModel('ShopModel');
        $this->payments = $shop_model->getPayMethods();
        
        // Views
        $this->includeView('shop/payment', 'main-content');
        $this->index($args);
    }
    
    // Select Shipping Method
    function shipping($args=NULL)
    {
        $this->args = $args;
        
        $this->cart = Session::get("cart");
        
        // Get Data
        $shipping_model = $this->getModel('ShippingModel');
        $this->shippings = $shipping_model->getAll();
        
        // Views
        $this->includeView('shop/shipping', 'main-content');
        $this->index($args);
    }

    // Shipping Address
    function shipping_address($args=NULL){
        $this->args = $args;
        $this->cart = Session::get("cart");
        
        $this->includeView('shop/shipping_address', 'main-content');
        $this->index($args);
    }
    
    
    // Cart Review
    function review($args=NULL)
    {
        $this->args = $args;
        
        $this->cart = Session::get("cart");
        $this->total = 0;
        foreach($this->cart->items as $item){
            $item_tot = $item->item_price * $item->quantity;
            $this->total += $item_tot;
        }
        
        $this->shipping = $this->getModel('ShippingModel');
        $this->shipping->load($this->cart->shipping_id);
        
        $this->payment = $this->getModel('PaymentModel');
        $this->payment->load($this->cart->payment_id);

        // Views
        $this->includeView('shop/review', 'main-content');        
        $this->index($args);
        
    }

    
    // Insert Current Sale Into DB
    function storeSale(){
        
        $sale_model = $this->getModel('SaleModel');
        $sale_model->sale_timestamp = date('Y-m-d H:i:s');
        $sale_model->sale_cart_json = json_encode($this->cart, TRUE);
        $sale_model->sale_total = 0;
        foreach($this->cart->items as $item){
            $sale_model->sale_total += ($item->item_price * $item->quantity);
        }
        $sale_model->payment_status = 0;
        $sale_model->shipping_status = 0;
        
        if(Session::get("auth")){ 
            $sale_model->fk_user_id = Session::get("user_data")["user_id"];
        }else{
            $sale_model->fk_user_id = Session::get("registered_user_id");
        } 
        
        $sale_model->fk_payment_id = $this->cart->payment_id;
        $sale_model->fk_shipping_id = $this->cart->shipping_id;
        $sale_model->shipping_address = $this->cart->shipping_address;
        $sale_model->shipping_zip = $this->cart->shipping_zip;
        $sale_model->shipping_city = $this->cart->shipping_city;
        $sale_model->shipping_province = $this->cart->shipping_province;
        $sale_model->shipping_state = $this->cart->shipping_state;

        $insert_id_res = $sale_model->insert();
        
        return $insert_id_res;
    }

    
    // Confirm Sale
    function sendSaleConfirm($sale_id=NULL){
        if ($sale_id !== NULL){
            return TRUE;
        }
    }


    function paypal($args=NULL){
        switch($args[0])
        {
            case 'confirm': // Confirm Return Url

            break;

            case 'cancel': // Cancel Return Url

            break;

            case 'ipn': // PayPal IPN Url

            break;

            default:
                // nothing...
            break;
        }
    }

    
    // Pay
    function pay($sale_id=NULL){
        if ($sale_id !== NULL)
        {
            $this->sale = $this->getModel('SaleModel');
            $this->sale->load($sale_id);
            
            if(!$this->sale){
                return FALSE;
            }else{
                // Payment Data
                $this->payment = $this->getModel('PaymentModel');
                $this->payment->load($this->sale->fk_payment_id);
                // User Data 
                $this->customer = $this->getModel('UserModel');
                $this->customer->loadUserById($this->sale->fk_user_id);

                $this->includeView('shop/pay_'.$this->payment->payment_slug, 'main-content');
                
                return TRUE;
            }
        }
    }
    
    
    // Buy
    function buy($args=NULL)
    {
        $this->cart = Session::get("cart");
        
        $store_insert_id = $this->storeSale();
        if(!$store_insert_id){
            
            $this->error = TRUE;
            $this->notice = Lang::$operation_fail . " (store)";
            
        }else{
            
            if(!$this->sendSaleConfirm($store_insert_id)){
                $this->error = TRUE;
                $this->notice = Lang::$operation_fail . " (email)";
            }else{
                if(!$this->pay($store_insert_id)){
                    $this->error = TRUE;
                    $this->notice = Lang::$operation_fail . " (pay)";
                }
            }
            
        }
        
        $this->index($args);
    }


    // Show Cart
    function cart($args=NULL)
    {
        
        $this->args = $args;
        $this->cart = Session::get("cart");
        
        // Views
        $this->includeView('shop/cart', 'main-content');        
        $this->index($args);
    }


    // Set Selected Shipping Method To Cart
    function setShipping($args=NULL)
    {
        $this->args = $args;

        if(isset($this->post['shipping_id']))
        { 
            $this->cart = Session::get("cart");
            if(!$this->cart)
            {
                // No Cart Found
                echo json_encode(["status"=>FALSE, "message"=>"err_no_cart_found"], TRUE);
            }else{
                $this->cart->shipping_id = $this->post['shipping_id'];
                if(!Session::set("cart", $this->cart))
                {
                    // Cart Saving Error
                    echo json_encode(["status"=>FALSE, "message"=>"err_no_cart_saving"], TRUE);
                }else{
                    // OK!
                    echo json_encode(["status"=>TRUE, "message"=>"shipping_saved"], TRUE);
                }
            }
        }else{
            // No Shipping Data Sended
            echo json_encode(["status"=>FALSE, "message"=>"err_no_shipping_data"], TRUE);
        }
    }


    // Set Shipping Address to Session
    function setShippingAddress($args=NULL)
    {
        $this->args = $args;
        if(isset($this->post['shipping_address']))
        { 
            $this->cart = Session::get("cart");
            if(!$this->cart){
                echo json_encode(["status"=>FALSE, "message"=>"err_no_cart"], TRUE);
            }else{
                $this->cart->shipping_address = $this->post['shipping_address'];
                $this->cart->shipping_zip = $this->post['shipping_zip'];
                $this->cart->shipping_city = $this->post['shipping_city'];
                $this->cart->shipping_province = $this->post['shipping_province'];
                $this->cart->shipping_state = $this->post['shipping_state'];
                if(!Session::set("cart", $this->cart)){
                    echo json_encode(["status"=>FALSE, "message"=>"err_set_cart_failed"], TRUE);
                }else{
                    echo json_encode(["status"=>TRUE, "message"=>"err_set_cart_success"], TRUE);
                }
            }
        }
    }

    
    // Set Selected Payment Method To Cart
    function setPayment($args=NULL)
    {
        $this->args = $args;

        if(isset($this->post['payment_id']))
        { 
            $this->cart = Session::get("cart");
            if(!$this->cart)
            {
                // No Cart Found
                echo json_encode(["status"=>FALSE, "message"=>"err_no_cart_found"], TRUE);
            }else{
                $this->cart->payment_id = $this->post['payment_id'];
                if(!Session::set("cart", $this->cart))
                {
                    // Cart Saving Error
                    echo json_encode(["status"=>FALSE, "message"=>"err_no_cart_saving"], TRUE);
                }else{
                    // OK!
                    echo json_encode(["status"=>TRUE, "message"=>"payment_saved"], TRUE);
                }
            }
        }else{
            // No Shipping Data Sended
            echo json_encode(["status"=>FALSE, "message"=>"err_no_payment_data"], TRUE);
        }
    }


    // Add An Item To Aart
    function addToCart($args=NULL)
    {
        $this->args = $args;
        $this->cart = Session::get("cart");
        
        // Init Cart If It's Not Ready
        if(!$this->cart){
            $this->cart = new stdClass;
            $this->cart->items = array();
            $this->cart->shipping_id = NULL;
            $this->cart->payment_id = NULL;
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

    
    // Remove An Item To Cart
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
    

    // Update Quantity Of An Item To The Cart
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