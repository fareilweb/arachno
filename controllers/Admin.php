<?php

/*=============================================================================*
 * Admin Main Controller
 *=============================================================================*/

class Admin extends Controller
{
    // Constructor
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
    
    // Index/Main Method
    function index()
    {   
        // Data
        $loc_model = $this->getModel('LocalizationModel');
        $this->languages = $loc_model->getLanguages();
        $this->menus["main_menu"] = $this->getModel('MenuModel')->selectMenuDataById(1);
        
        // Views
        $this->includeView('admin/nav/menu', 'header-content');
        $this->getView('pages/page_default');
    }
    
    
    
    /*==========================================================================
     *  Single Item [Create/Read/Update/Delete]
     *==========================================================================*/
    
    // Add Item ----------------------------------------------------------------
    function addItem()
    {
        // Get Data
        $shop_model = $this->getModel('ShopModel');
        $this->shop_categories = $shop_model->getCategories();

        // Include Views
        $this->includeView('admin/shop/edit_item', 'main-content');
        $this->index();
        
        //$this->varDebug($this);
    }

    // Edit Item ---------------------------------------------------------------
    function editItem($args)
    {
        $this->args = $args;
        //$this->args[0] <- user for the item id to edit
        
        
        $this->includeView('admin/shop/edit_item', 'main-content');
        $this->index();
    }
    
    // Add Item - PROCESS ------------------------------------------------------
    function itemProcess($args)
    {
        $this->args = $args;
        $this->post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(isset($this->post['item_id']) && $this->post['item_id']!==""){
            $this->updateItemProcess($args);
        }else{
            $this->createItemProcess($args);
        }
    }
    
    // Add Item - UPDATE MODE --------------------------------------------------
    function updateItemProcess()
    {
        // TODO - Get The Stored Item From DB and Populate the Object Proprierties
        
        // TODO - Update Data To The Object Instance
        
        // TODO - Update Data With The New Data in the Object Instance
        
        
    }
    
    // Add Item - CREATE MODE --------------------------------------------------
    function createItemProcess($args)
    {
        $new_item = $this->getModel('ShopItemModel');
        foreach ($this->post as $item_key => $item_val){
            $new_item->$item_key = $item_val;
        }
        
        if(!$new_item->insert()){ //<--- Note, the item insert it self
            $this->notice = "Inserimento Oggetto Fallito";
        }else{
            $this->notice = "Inserimento Oggetto Riuscito";
        }
        $this->index($args);
    }
    
    
    
    /*==========================================================================
     *  Items list [Open One/Open One]
     *==========================================================================*/
    
    // Show Items List (also with filter if required) --------------------------
    function showItems($args)
    {
        // Data
        $this->args = $args;
        $shop_model = $this->getModel('ShopModel');
        $this->items = $shop_model->getItems();
        
        // Views
        $this->includeView('admin/shop/items_list', 'main-content');
        $this->index($this->args);
    }
    
    
}