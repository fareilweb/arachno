<?php

/*=============================================================================*
 * Admin Main Controller
 *=============================================================================*/

class Admin extends Controller
{
    // Constructor
    function __construct()
    {   
        parent::__construct();
        
        // Auth And Privilege Check
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
     * Items Methods
     * =========================================================================*/
    
    // Remove Item Image From Database
    function removeItemImage($args){
        $this->args = $args;
        if(isset($this->post['image_id'])){
            $image_model = $this->getModel('ShopImageModel');
            $image_id = $this->post['image_id'];
            
            if(!$image_model->load($image_id)){
                echo json_encode(["status"=>0, "message"=>"Load Image Failed"]);
            }
            
            if(!$image_model->deleteFile()){
                echo json_encode(["status"=>0, "message"=>"disk-fail"]);
            }
            
            if(!$image_model->delete()){
                echo json_encode(["status"=>0, "message"=>"db-fail"]);
            }else{
                echo json_encode(["status"=>1, "message"=>"delete-succes"]);
            }
        }
    }
    
    
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
    }   

    
    // Edit/Add Item
    function editItem($args)
    {
        // Data
        $this->args = $args;
        $shop_model = $this->getModel('ShopModel');
        $this->shop_categories = $shop_model->getAllCategories();
        $this->item = $this->getModel('ShopItemModel');
        if(isset($args[0])){
            $this->item->loadById($args[0]);
        }
        
        // Views
        $this->includeView('admin/shop/edit_item', 'main-content');
        $this->index($args);
    }
    
    
    // Process The Posted Data by Switching The Right Method
    function itemProcess($args)
    {
        $this->args = $args;
        $process_res = FALSE;

        // Switch If Is a New Item or and existing one
        if(isset($this->post['item_id']) && $this->post['item_id']!==""){
            $process_res = $this->updateItem($args);
        }else{
            $process_res = $this->createItem($args);
        }

        // Redirect
        $redirect = array_search("redirect", $args);
        if($redirect!==FALSE){
            $url = Config::$web_path;
            for($i=$redirect+1; $i<count($args); $i++){
                $url.= '/' . $args[$i];
            }
            header('location: ' . $url);
        }
    }
   
    
    // Create New Item And Insert
    function createItem($args) 
    {
        if($this->post)
        {
            $new_item = $this->getModel('ShopItemModel');
            // Push Values Into Object Proprierties
            foreach ($this->post as $item_key => $item_val){
                $new_item->$item_key = $item_val;
            }
            if(!$new_item->insertItem()){ //<--- Note, the item insert it self
                //$this->notice = Lang::$insert_fail;
                return FALSE;
            }else{
                //$this->notice = Lang::$insert_success;
                return TRUE;
            }
            //$this->index($args);
        }
    }
    
     
    // Update An Existing Item
    function updateItem($args)
    {
        if($this->post)
        {
            $new_item = $this->getModel('ShopItemModel');
            // Push Values Into Object Proprierties
            foreach ($this->post as $item_key => $item_val){
                $new_item->$item_key = $item_val;
            }
            
            if(!$new_item->updateItem()){ //<--- Note, the item update it self
                //$this->notice = Lang::$update_fail;
                return FALSE;            
            }else{
                //$this->notice = Lang::$update_success;
                return TRUE;
            }
            //$this->index($args);
        }
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
    }
    
    
    
    /* =========================================================================
     * Categories Methods
     * =========================================================================*/
    
    // Show Main Categories
    function showMainCategories($args)
    {
        // Data
        $this->args = $args;
        $shop_model = $this->getModel('ShopModel');
        $this->categories = $shop_model->getAllCategories();
        
        // Views
        $this->includeView('admin/shop/list_categories', 'main-content');
        $this->index($args);
    }
    
    
    // Edit/Add Category
    function editCategory($args)
    {
        // Data
        $this->args = $args;
        $shop_model = $this->getModel('ShopModel');
        $this->shop_categories = $shop_model->getAllCategories();
        $this->category = $this->getModel('ShopCategoryModel');
        if(isset($args[0])){
            $this->category->loadById($args[0]);
        }
        
        // Views
        $this->includeView('admin/shop/edit_category', 'main-content');
        $this->index($args);
    }
    
    
    // Category Process
    function categoryProcess($args)
    {
        $this->args = $args;
        if($this->post)
        {
            // Switch If Is a New Category or and existing one
            if(isset($this->post['category_id']) && $this->post['category_id']!==""){
                $this->updateCategory($args);
            }else{
                $this->createCategory($args);
            }
        }
    }
    
    
    // Create Category
    function createCategory($args)
    {
        if($this->post)
        {
            $category_model = $this->getModel('ShopCategoryModel');
            foreach ($this->post as $category_key => $category_val){
                $category_model->$category_key = $category_val;
            }
            if(!$category_model->insertCategory()){ //<--- Note, the category insert it self
                $this->notice = Lang::$insert_fail;
            }else{
                $this->notice = Lang::$insert_success;
            }
            $this->index($args);
        }
    }
    
    
    // Update Category
    function updateCategory($args)
    {
        if($this->post)
        {
            $category_model = $this->getModel('ShopCategoryModel');
            foreach ($this->post as $category_key => $category_val){
                $category_model->$category_key = $category_val;
            }
            
            // Upload Image
            require_once(Config::$abs_path.'/controllers/Upload.php');
            $upl = new Upload();        
            if($upl->files['category_image']['error'] != 4){ // Error 4 mean NO FILE UPLOADED
                if($upl->files['category_image']['size'] < $upl->maxSize){
                    if( in_array($upl->files['category_image']['type'], $upl->allow) ){
                        
                        $file_ext = pathinfo($upl->files['category_image']['name'], PATHINFO_EXTENSION);
                        $file_name = "category_".$category_model->category_id . '.' . $file_ext;
                        $file_path = Config::$abs_path . '/views/images/shop/categories/' . $file_name;
                        $file_src = Config::$web_path . '/views/images/shop/categories/' . $file_name;
                        if($upl->saveFile($upl->files['category_image']['tmp_name'], $file_path)){
                            $category_model->category_image_src = $file_src;
                        }

                    }else{
                        $this->notice = Lang::$err_file_type; // Type ERR
                    }
                }else{
                    $this->notice = Lang::$err_file_size; // Size ERR
                }
            }
            // Upload Image END
            
            if(!$category_model->updateCategory()){ //<--- Note, the category update it self
                $this->notice = Lang::$update_fail;
            }else{
                $this->notice = Lang::$update_success;
            }
            $this->index($args);
        }
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
    
}