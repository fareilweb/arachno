<?php

/*=============================================================================*
 * Admin Main Controller
 *=============================================================================*/

class Admin extends Controller
{
    function __construct()
    {   // Auth And Privilege Check
        if( !Session::get('auth')){
            // redirect to login or exit
           if(!header('location: ' . Config::$web_path . '/User/login/redirect/Admin')){
               exit();
           }
        }else{
            // User Logged
            $user = $this->getModel('UserModel');
            $user->loadUserById( Session::get('user_data')['user_id'] );
            // If User iS not Admin exit
            if($user->user_type!=="admin"){
                echo Lang::$access_denied;
                exit();
            }
        }
    }
    
    // Index Method
    function index()
    {    
        // Views Includes
        $this->menus["main_menu"] = $this->getModel('MenuModel')->selectMenuDataById(1);
        $this->includeView('admin/nav/menu', 'header-content');
        $this->getView('pages/page_default');
    }
    
    // Add Item
    function addItem()
    {
        // Get Data
        $shop_model = $this->getModel('ShopModel');
        $this->shop_categories = $shop_model->getCategories();
        
        
        // Include Views
        $this->includeView('admin/shop/edit_item', 'main-content');
        $this->index();
        
        $this->varDebug($this);
    }
    
    // Add Item - PROCESS
    function addItemProcess($args)
    {
        $this->args = $args;
        $this->post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        //echo $this->post['item_id'];
        
        if(isset($this->post['item_id']) && $this->post['item_id']!=="")
        {
            $this->updateItem();
        }else{
            $this->createItem();
        }
    }
    
    // Add Item - UPDATE MODE
    function updateItem()
    {
        // TODO - Get The Stored Item From DB and Populate the Object Proprierties
        
        // TODO - Update Data To The Object Instance
        
        // TODO - Update Data With The New Data in the Object Instance
        
    }
    
    // Add Item - CREATE MODE
    function createItem()
    {
        $new_item = $this->getModel('ShopItemModel');
        foreach ($this->post as $item_key => $item_val){
            $new_item->$item_key = $item_val;
        }
        
        if(!$new_item->insert()){
            echo "Inserimento Fallito";
        }else{
            echo "Oggetto Inserito";
        }
        
        // TODO - Save Item to Database
        
    }
    
    
}