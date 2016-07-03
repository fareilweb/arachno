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
    
    
    
    /* =========================================================================
     * Categories Methods
     * =========================================================================*/
    
    // Show Categories
    function showCategories($args)
    {
        // Data
        $this->args = $args;
        $shop_model = $this->getModel('ShopModel');
        $this->categories = $shop_model->getCategories();
        
        // Views
        $this->includeView('admin/shop/list_categories', 'main-content');
        $this->index($args);
        //$this->debug($this->categories);
    }
    
    // Edit/Add Category
    function editCategory($args)
    {
        // Data
        $this->args = $args;
        $shop_model = $this->getModel('ShopModel');
        $this->shop_categories = $shop_model->getCategories();
        $this->category = $this->getModel('ShopCategoryModel');
        
        if(isset($args[0])){
            $this->category->loadById($args[0]);
        }
        
        // Views
        $this->includeView('admin/shop/edit_category', 'main-content');
        $this->index($args);
        
        $this->debug($this->category);
    }
    
    // Category Process
    function categoryProcess($args)
    {
        $this->args = $args;
        $this->post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        // Switch If Is a New Category or and existing one
        if(isset($this->post['category_id']) && $this->post['category_id']!==""){
            $this->updateCategory($args);
        }else{
            $this->createCategory($args);
        }
    }
    
    // Create Category
    function createCategory($args)
    {
        $new_category = $this->getModel('ShopCategoryModel');
        foreach ($this->post as $category_key => $category_val){
            $new_category->$category_key = $category_val;
        }
        if(!$new_category->insertCategory()){ //<--- Note, the category insert it self
            $this->notice = Lang::$insert_fail;
        }else{
            $this->notice = Lang::$insert_success;
        }
        $this->index($args);
    }
    
    // Update Category
    function updateCategory($args)
    {
        $new_category = $this->getModel('ShopCategoryModel');
        foreach ($this->post as $category_key => $category_val){
            $new_category->$category_key = $category_val;
        }
        if(!$new_category->updateCategory()){ //<--- Note, the category update it self
            $this->notice = Lang::$update_fail;
        }else{
            $this->notice = Lang::$update_success;
        }
        $this->index($args);
    }
    
    // Delete Category
    function deleteCategory($args)
    {
        // Data
        $this->args = $args;
        // Process
        if(is_numeric($args[0]) && in_array("confirm_delete", $args))
        {
            $category_model = $this->getModel('ShopCategoryModel');
            $del_result = $category_model->deleteCategory($args[0]);
            if(!$del_result){
                $this->notice = Lang::$delete_fail;
            }else{
                $this->notice = Lang::$delete_success;
            }
        }else{
            // Confirm Delete View
            $this->includeView('admin/shop/delete_category', 'main-content');
        }
        // Views
        $this->index($args);
    }
    
    
    
    /* =========================================================================
     * Items Methods
     * =========================================================================*/
    
    // Show Items List (also with filter if required)
    function showItems($args)
    {
        // Data
        $this->args = $args;
        $shop_model = $this->getModel('ShopModel');
        $this->items = $shop_model->getItems();
        
        // Views
        $this->includeView('admin/shop/list_items', 'main-content');
        $this->index($this->args);
        //$this->debug($this->items);
    }   

    // Edit/Add Item
    function editItem($args)
    {
        // Data
        $this->args = $args;
        $shop_model = $this->getModel('ShopModel');
        $this->shop_categories = $shop_model->getCategories();
        $this->item = $this->getModel('ShopItemModel');
        
        if(isset($args[0])){
            $this->item->loadById($args[0]);
        }
        
        // Views
        $this->includeView('admin/shop/edit_item', 'main-content');
        $this->index($args);
        
        $this->debug($this);
    }
    
    // Process The Posted Data by Switching The Right Method
    function itemProcess($args)
    {
        $this->args = $args;
        $this->post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        // Switch If Is a New Item or and existing one
        if(isset($this->post['item_id']) && $this->post['item_id']!==""){
            $this->updateItem($args);
        }else{
            $this->createItem($args);
        }
        //$this->debug($this);
    }
   
    // Create New Item And Insert
    function createItem($args)
    {
        $new_item = $this->getModel('ShopItemModel');
        
        // Push Values Into Object Proprierties
        foreach ($this->post as $item_key => $item_val){
            $new_item->$item_key = $item_val;
        }
        
        // Push Images Into item_images Proprierty
        $item_images = array();
        foreach($this->post['images_src'] as $img_src_key=>$img_src_val){
            $image_obj = new stdClass;
            $image_obj->image_src      = $img_src_val;
            $image_obj->image_name     = $this->post['images_name'][$img_src_key];
            $image_obj->image_title    = $this->post['images_title'][$img_src_key];
            $image_obj->image_alt      = $this->post['images_alt'][$img_src_key];
            $image_obj->is_main        = $this->post['images_is_main'][$img_src_key];
            //$image_obj->fk_item_id;
            array_push($item_images, $image_obj);
        }
        $new_item->item_images = $item_images;
        
        if(!$new_item->insertItem()){ //<--- Note, the item insert it self
            $this->notice = Lang::$insert_fail;
        }else{
            $this->notice = Lang::$insert_success;
        }
        $this->index($args);
        
        $this->debug($this);
    }
     
    // Update An Existing Item
    function updateItem($args)
    {
        $new_item = $this->getModel('ShopItemModel');
        
        // Push Values Into Object Proprierties
        foreach ($this->post as $item_key => $item_val){
            $new_item->$item_key = $item_val;
        }
        
        // Push Images Into item_images Proprierty
        $item_images = array();
        foreach($this->post['images_src'] as $img_src_key=>$img_src_val){
            $image_obj = new stdClass;
            $image_obj->image_src      = $img_src_val;
            $image_obj->image_name     = $this->post['images_name'][$img_src_key];
            $image_obj->image_title    = $this->post['images_title'][$img_src_key];
            $image_obj->image_alt      = $this->post['images_alt'][$img_src_key];
            $image_obj->is_main        = $this->post['images_is_main'][$img_src_key];
            $image_obj->fk_item_id     = $new_item->item_id;
            array_push($item_images, $image_obj);
        }
        $new_item->item_images = $item_images;
        
        if(!$new_item->updateItem()){ //<--- Note, the item update it self
            $this->notice = Lang::$update_fail;
        }else{
            $this->notice = Lang::$update_success;
        }
        $this->index($args);
        $this->debug($this);
    }
    
    // Delete Item
    function deleteItem($args)
    {
        // Data
        $this->args = $args;
        // Process
        if(is_numeric($args[0]) && in_array("confirm_delete", $args))
        {
            $item_model = $this->getModel('ShopItemModel');
            $del_result = $item_model->deleteItem($args[0]);
            if(!$del_result){
                $this->notice = Lang::$delete_fail;
            }else{
                $this->notice = Lang::$delete_success;
            }
        }else{
            // Confirm Delete View
            $this->includeView('admin/shop/delete_item', 'main-content');
        }
        // Views
        $this->index($args);
        //$this->debug($this);
    }
    
}