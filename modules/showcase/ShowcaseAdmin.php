<?php
/**
 *
 */
include_once Config::$abs_path . '/controllers/Module.php';

class ShowcaseAdmin extends Module
{
    public $mod_name = "showcase";
    public $mod_url = "";

    function __construct()
    {
        parent::__construct();
        $this->mod_url = Config::$web_path . '/Admin/module/' .  $this->mod_name;
    }

    // BackEnd Override Call Action By Parameters
    function callAction($args=NULL)
    {
        // get the method name from "$args"
        // !!! Here in the backend the index for the method is 3
        if(isset($args[3])){
            $method = $args[3];
            // check if the method exist then call it
            if(method_exists($this, $method)){
                $this->$method( $args );
            }
        }else{
            $this->main($args);
        }
    }

    function main($args=array()){
        $this->args = $args;
        $this->view = "admin_main";
    }

    function listItems($args)
    {
        $this->args = $args;
        include_once dirname(__FILE__) . '/models/ScItemModel.php';
        $model = new ScItemModel();
        $this->items = $model->getAll();
        $this->view = "admin_list_items";
    }

    function editItem($args)
    {
        $this->args = $args;
        include_once dirname(__FILE__) . '/models/ScItemModel.php';
        $model = new ScItemModel();
        if(isset($args[4])){
            $sc_item_id = $args[4];
            $this->item = $model->getItemById($sc_item_id);
        }else{
            $this->item = $model;
        }
        $this->view = "admin_edit_item";
    }

    function deleteItem($args){
        $this->args = $args;
        include_once dirname(__FILE__) . '/models/ScItemModel.php';
        $item_model = new ScItemModel();
        $sc_item_id = $args[4];
        if(!$item_model->delete($sc_item_id)){
            $this->error = TRUE;
            $this->notice = "Eliminazione Elemento dal Database Fallita";
        }else{
            $this->redirect("/Admin/module/showcase/listItems");
        }
    }

    function editCategory($args)
    {
        $this->args = $args;
        $this->view = "admin_edit_category";
    }

    function listCategories($args)
    {
        $this->args = $args;
        $this->view = "admin_list_categories";
    }

}
