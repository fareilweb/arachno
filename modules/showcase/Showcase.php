<?php
/**
 *
 */
include_once Config::$abs_path . '/controllers/Module.php';

class Showcase extends Module
{
    // Members
    public $items;
    public $item;
    public $categories;
    public $category;

    // Contruct Function
    function __construct(){
        parent::__construct();
    }

    function main($args=array()){

        $this->view = "admin_main";
    }

    // List Items
    function items($args=array())
    {
        include_once dirname(__FILE__) . '/models/ScItemModel.php';
        $model = new ScItemModel();
        $this->items = $model->getAll();
        $this->view = "items";
    }


    // Single Item
    function item($args=array())
    {
        if(isset($args[2])){
            $sc_item_id = $args[2];
            include_once dirname(__FILE__) . '/models/ScItemModel.php';
            $model = new ScItemModel();
            $this->item = $model->getItemById($sc_item_id);
            $this->view = "item";
        }
    }


    // Single Category
    function category($args=array())
    {

        $this->view = "category";
    }


    // List Categories
    function categories($args=array())
    {
        // Get Model
        include_once dirname(__FILE__) . '/models/ScCategoryModel.php';
        $model = new ScCategoryModel();

        // Get Data From Model
        $this->categories = $model->getAll();

        $this->view = "categories";
    }

}
