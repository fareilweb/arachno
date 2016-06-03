<?php
/*==============================================================================*
 * Page Controller
 *==============================================================================*/
class Page extends Controller
{
    public function index( $params=array() )
    {
        
        //$this->varDebug($params);
        
        // Init Data Container
        $this->data = new stdClass;
        
        // Get Page Slug (the used identifier) from the params
        $page_slug = isset($params[0]) ? $params[0] : Config::$home_slug;

        // Page Data
        $page_model = $this->getModel('PageModel');
        $this->data = $page_model->getPageData( $page_slug );
        
        // Menu Data and Menu View
        $menu_model = $this->getModel('MenuModel');
        $this->menu_data = $menu_model->selectMenuDataById(1);
            
        // Included Views
        $this->includeView('nav/main_menu', 'content-top');   
        $this->includeView('nav/lang_menu', 'content-bottom');
        
        // Includes and then Main Page View
        $this->getView('pages/page_default', $this->data);
    }
}
