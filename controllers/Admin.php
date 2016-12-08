<?php
/* =====================================================================================
 * Admin Main Controller
 * ===================================================================================== */

class Admin extends Controller
{
    // Constructor
    function __construct(){
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
            // If User is not Admin exit
            if($user->user_type!=="admin"){
                echo Lang::$access_denied;
                exit();
            }
        }
    }

    // Index/Main Method
    function index($args=NULL)
    {
        if($this->get["url"] === "Admin"){
            $this->redirect("/Admin/welcome");
        }
        // Views
        $this->includeView('includes/top', 'top');
        $this->includeView('admin/nav/menu', 'top-bar');
        $this->getView('admin/pages/page_admin');
    }


    function welcome($args=NULL){
        $this->includeView('admin/contents/welcome', 'main-content');
        $this->index($args);
    }


/* =====================================================================================
    Menu Editor Area
 * ===================================================================================== */

    function menuSelect($args=NULL)
    {
        ?>
            <h1>TO DO</h1>
            <a href="<?=Config::$web_path;?>/Admin">Torna All'Amministrazione</a>
        <?php
    }

    function menuEdit($args=NULL)
    {
        ?>
            <h1>TO DO</h1>
            <a href="<?=Config::$web_path;?>/Admin">Torna All'Amministrazione</a>
        <?php
    }


/* =====================================================================================
    Modules
 * ===================================================================================== */
    // Modules List
    function modules($args=array())
    {
        $model = $this->getModel('ModuleModel');
        $this->modules = $model->getModules();
        $this->includeView('admin/modules/modules_list', 'main-content');
        $this->index($args);
    }

    // Module
    function module($args=array()){
        if(isset($args[0])){
            $mod_name   = $args[0];
            $this->loadModule($mod_name);
        }
        $this->index($args);
    }

    // OVERRIDE of "Controller" "loadModule()" method
    public function loadModule($mod_name=NULL)
    {
        if($mod_name!== NULL)
        {
            $mod_class = ucfirst($mod_name)."Admin";
            $mod_path = Config::$abs_path.'/modules/'.$mod_name;
            $mod_file = $mod_path.'/'.$mod_class.'.php';

            if(file_exists($mod_file))
            {
                // Include The Module Class
                include_once $mod_file;

                // Create an Instance of The Module Class
                $this->$mod_name = new $mod_class();

                /* Load The Current Module View in the Current Module Position */

                // Concatenate Theme Override View Absolute Path
                $theme_view_abs_path = Config::$abs_path
                                      . '/themes/'
                                      . Config::$theme
                                      . '/views/modules/'
                                      . $mod_name . '/'
                                      . $this->$mod_name->view
                                      . '.php';

                // Concatenate Module View Absolute Path
                $mod_view_abs_path = Config::$abs_path
                                      . '/modules/'
                                      . $mod_name
                                      . '/views/'
                                      . $this->$mod_name->view
                                      . '.php';

               if( file_exists($theme_view_abs_path) ){
                    // Check First If There is a Theme Override of The view
                    $view_abs_path = $theme_view_abs_path;
                }else if($mod_view_abs_path){
                    // Search for The Module Default Version
                    $view_abs_path = $mod_view_abs_path;
                }else{
                    // Use The Module Default View
                    $view_abs_path = $mod_path . '/views/' . Config::$module_default_view . '.php';
                }

                $this->includeView(
                  $view_abs_path,
                  $this->$mod_name->position,
                  TRUE
                );
            }
        }
    }


/* =====================================================================================
    Data Managing
 * ===================================================================================== */
    function dbManager($args=array()){
        require Config::$abs_path . '/adminer/adminer-4.2.5-mysql.php';
    }


/* =====================================================================================
    Page Editor Area
 * ===================================================================================== */

    // Select Page to Edit
    function pageSelect($args=NULL)
    {
        $this->args = $args;
        $page_model = $this->getModel('PageModel');
        $this->pages = $page_model->getAll();
        $this->includeView('admin/contents/page_select', 'main-content');
        $this->index($args);
    }

    // Edit/Create a Page
    function pageEdit($args=NULL)
    {
        // Load Content Categories
        $category_model = $this->getModel('CategoryModel');
        $this->categories = $category_model->getAll();

        // Get The Page Model And data
        $this->page = $this->getModel('PageModel');
        if(isset($args[0])){
            $this->page->loadById($args[0]);
        }
        $this->includeView('admin/contents/page_editor', 'main-content');
        $this->index($args);
    }

    // Save Page (AJAX Rest)
    function pageSave()
    {
        if(!isset($this->post['page_data'])){
            echo json_encode(["status"=>TRUE, "message"=>"retrieve_post_data_fail"]);
        }else{
            // Parse Posted Data String)
            $page_data = array();
            parse_str($this->raw_post['page_data'], $page_data);

            // Get Page Model
            $page_model = $this->getModel('PageModel');

            // Do Update or Create
            if(isset($page_data['page_id']) && $page_data['page_id']!=="")
            {
                // Update Mode
                $res_update = $page_model->update($page_data);
                if(!$res_update){
                    echo json_encode(["status"=>FALSE, "message"=>"page_update_fail"]);
                }else{
                    echo json_encode(["status"=>TRUE, "message"=>"page_update_success"]);
                }

            }else{
                // Create Mode (insert)
                $res_insert = $page_model->insert($page_data);
                if(!$res_insert){
                    echo json_encode(["status"=>FALSE, "message"=>"page_insert_fail"]);
                }else{
                    echo json_encode(["status"=>TRUE, "message"=>"page_insert_success", "insert_id"=>$res_insert]);
                }
            }
        }

    }

    function pageDelete($args=NULL)
    {
        if($args!==NULL && isset($args[0]))
        {
            $page_model = $this->getModel('PageModel');
            $del_res = $page_model->delete($args[0]);
            if(!$del_res){
                $this->notice = Lang::$delete_fail;
                $this->index($args);
            }else{
                header('location: ' . Config::$web_path . '/Admin/pageSelect');
            }
        }
    }

    // Delete A View Associated With A Page
    function removePageView()
    {
        if(isset($this->post["view_id"])){
            $page_model = $this->getModel('PageModel');

            if($page_model->delPageView($this->post["view_id"])){
                echo json_encode(array("status"=>TRUE, "message"=>"delete_success"));
            }else{
                echo json_encode(array("status"=>FALSE, "message"=>"delete_failed"));
            }

        }else{ exit; }
    }




/* =====================================================================================
    Shop Managing
 * ===================================================================================== */

    // Remove Item Image From Database
    function removeItemImage($args)
    {
        $this->args = $args;
        if(isset($this->post['image_id']))
        {
            $image_model = $this->getModel('ShopImageModel');
            if( !$image_model->load($this->post['image_id']) ){
                echo json_encode(["status"=>0, "message"=>"load-image-failed"]);
                exit;
            }else{
                if(!$image_model->deleteFile()){
                    echo json_encode(["status"=>0, "message"=>"delete-from-disk-failed"]);
                    exit;
                }else{
                    if(!$image_model->delete()){
                        echo json_encode(["status"=>0, "message"=>"delete-from-db-failed"]);
                        exit;
                    }else{
                        echo json_encode(["status"=>1, "message"=>"delete-succes"]);
                        exit;
                    }
                }
            }
        }
    }


    // Set Main Image
    function setMainImage($args){
        $this->args = $args;

        $image_model = $this->getModel('ShopImageModel');
        $image_id = $this->post['image_id'];

        if(!$image_model->load($image_id)){
            echo json_encode(["status"=>0, "message"=>"Load Image Failed"]);
        }

        if(!$image_model->setAsMain()){
            echo json_encode(["status"=>0, "message"=>"set-as-main-fail"]);
        }else{
            echo json_encode(["status"=>1, "message"=>"set-as-main-succes"]);
        }
    }


    // Show Items List (also with filter if required)
    function categoryItems($args)
    {
        // Data
        $this->args = $args;
        $shop_item_model = $this->getModel('ShopItemModel');
        $this->items = $shop_item_model->getAll();

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
        $shop_category_model = $this->getModel('ShopCategoryModel');
        $this->shop_categories = $shop_category_model->getAll();
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
        $this->args = $args;
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
        $this->args = $args;
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


    // Show Main Categories
    function showMainCategories($args)
    {
        $this->args = $args;

        // Data
        $shop_category_model = $this->getModel('ShopCategoryModel');
        $this->shop_categories = $shop_category_model->getAll();

        // Views
        $this->includeView('admin/shop/list_categories', 'main-content');
        $this->index($args);
    }


    // Edit/Add Category
    function editCategory($args)
    {
        $this->args = $args;

        // Data
        $this->category = $this->getModel('ShopCategoryModel');
        $this->shop_categories = $this->category->getAll();

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
        $this->args = $args;

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
        $this->args = $args;
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
                    if(in_array($upl->files['category_image']['type'], $upl->allow)){

                        $file_ext   = pathinfo($upl->files['category_image']['name'], PATHINFO_EXTENSION);
                        $file_name  = "category_".$category_model->category_id . '.' . $file_ext;
                        $file_path  = '/views/images/shop/categories/' . $file_name;

                        if($upl->saveFile($upl->files['category_image']['tmp_name'], $file_path)){
                            $category_model->category_image_src = $file_path;
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
                $this->index($args);
            }else{
                $category_id = $this->post["category_id"];
                $this->redirect("/Admin/editCategory/$category_id");
            }

        }
    }


    // Delete Category
    function deleteCategory($args)
    {
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


    /* ========================== *
        Shippings
     * ========================== */

    // Show Shippings
    function shippings($args=NULL)
    {
        $this->args = $args;

        // Data
        $shop_model = $this->getModel('ShippingModel');
        $this->ship_methods = $shop_model->getAll();

        // Views
        $this->includeView('admin/shop/list_shippings', 'main-content');
        $this->index($args);

    }

    // Edit / Add Shipping
    function editShipping($args=NULL)
    {
        $this->args = $args;
        $this->shipping = $this->getModel('ShippingModel');

        if($args!==NULL && isset($args[0]) && is_numeric($args[0])){
            // Load Saved Data
            $this->shipping->load($args[0]);
        }

        // Views
        $this->includeView('admin/shop/edit_shipping', 'main-content');
        $this->index($args);
    }

    // Save Shipping
    function saveShipping($args=NULL)
    {
        $this->args = $args;
        $data = array();
        parse_str($this->post['data'], $data);

        $shipping_model = $this->getModel('ShippingModel');
        if($data['shipping_id'] != ""){
            $res = $shipping_model->update($data);
            $shipping_id = $data["shipping_id"];
        }else{
            $res = $shipping_model->insert($data);
            $shipping_id = $shipping_model->mysqli->insert_id;
        }
        if($res!==FALSE){
            echo json_encode(array("status"=>1, "message"=>"success", "shipping_id"=>$shipping_id), TRUE);
        }else{
            echo json_encode(array("status"=>0, "message"=>"fail", "shipping_id"=>$shipping_id), TRUE);
        }
    }

    // Remove Shipping
    function removeShipping($args=NULL)
    {
        $this->args = $args;
        if(isset($args[0]) && is_numeric($args[0]))
        {
            $shipping_model = $this->getModel('ShippingModel');
            $res = $shipping_model->delete($args[0]);
            if(!$res){
                echo Lang::$delete_fail;
            }else{
                $redirect = array_search("redirect", $args);
                if($redirect!==FALSE){
                    $url = Config::$web_path;
                    for($i=$redirect+1; $i<count($args); $i++){
                        $url.= "/" . $args[$i];
                    }
                    header("location: $url");
                }
            }
        }

    }


    /* ============================ *
        Payments
     * ============================ */

    // Show Payments
    function payments($args=NULL)
    {
        $this->args = $args;

        // Data
        $shop_model = $this->getModel('ShopModel');
        $this->pay_methods = $shop_model->getPayMethods();

        // Views
        $this->includeView('admin/shop/list_payments', 'main-content');
        $this->index($args);
    }

    // Edit / Add Payment
    function editPayment($args=NULL)
    {
        $this->args = $args;
        $this->payment = $this->getModel('PaymentModel');

        if($args!==NULL && isset($args[0]) && is_numeric($args[0])){
            // Load Saved Data
            $this->payment->load($args[0]);
        }

        // Views
        $this->includeView('admin/shop/edit_payment', 'main-content');
        $this->index($args);
    }

    // Save Payment
    function savePayment($args=NULL)
    {
        $this->args = $args;
        $data = array();
        parse_str($this->post['data'], $data);

        $payment_model = $this->getModel('PaymentModel');
        if($data['payment_id'] != ""){
            $res = $payment_model->update($data);
            $payment_id = $data["payment_id"];
        }else{
            $res = $payment_model->insert($data);
            $payment_id = $payment_model->mysqli->insert_id;
        }
        if($res!==FALSE){
            echo json_encode(array("status"=>1, "message"=>"success", "payment_id"=>$payment_id), TRUE);
        }else{
            echo json_encode(array("status"=>0, "message"=>"fail", "payment_id"=>$payment_id), TRUE);
        }
    }

    // Remove Payment
    function removePayment($args=NULL)
    {
        $this->args = $args;
        if(isset($args[0]) && is_numeric($args[0]))
        {
            $payment_model = $this->getModel('PaymentModel');
            $res = $payment_model->delete($args[0]);
            if(!$res){
                echo Lang::$delete_fail;
            }else{
                $redirect = array_search("redirect", $args);
                if($redirect!==FALSE){
                    $url = Config::$web_path;
                    for($i=$redirect+1; $i<count($args); $i++){
                        $url.= "/" . $args[$i];
                    }
                    header("location: $url");
                }
            }
        }
    }

/* =====================================================================================
    END OF - Shop Managing
 * ===================================================================================== */

}
