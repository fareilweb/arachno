<?php
/*==============================================================================*
 * Page Controller
 *==============================================================================*/
class Page extends Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function index($args=array())
    {
        // Parse Args
        if(isset($args[0])){
            $page_slug = $args[0];
        }else{
            $page_slug = Config::$home_slug;
        }

        // Get Model / Page Data
        $this->page = $this->getModel('PageModel');
        $this->page->loadBySlug($page_slug);

        // Load Page Module if The Page Have One
        if(
          $this->page->page_module !== ""
          && $this->page->page_module !== "false"
          && $this->page->page_module !== FALSE
        ){
            $this->loadModule($this->page->page_module, "main-content");
        }


        // Included Views
        if($this->page->page_views){
            foreach($this->page->page_views as $view){
                $this->includeView($view->view_slug, $view->view_position);
            }
        }

        // Get The Main View Of The Page
        if($this->page->page_view!=""){
            $this->getView($this->page->page_view);
        }else{
            $this->getView();
        }
    }

}
