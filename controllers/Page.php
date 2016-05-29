<?php
/*==============================================================================*
 * Page Controller
 *==============================================================================*/
class Page extends Controller
{
    public function index( $params=[] )
    {
        // Get Page Slug (the used identifier) from the params
        $page_slug = isset($params[0]) ? $params[0] : Config::$home_slug;

        // Page Data
        $page_model = $this->getModel('PageModel');
        $data = $page_model->getPageData( $page_slug );
        
        //$this->debug($data);
        
        // Menu Data and Menu View
        $menu_model = $this->getModel('MenuModel');
        $data->menu_data = $menu_model->selectMenuDataById(1);
        $this->includeView('nav/main_menu_view');   
        
        // Includes and then Main Page View
        $data->includes = $this->getIncludes();
        $this->getView('pages/page_view', $data);
    }
}
