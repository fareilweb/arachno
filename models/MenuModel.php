<?php

class MenuModel extends Model
{
    private $menu_id = NULL;
    private $menu_title = NULL;
    private $menu_fk_lang_id = NULL;
    private $items = array();

    /* Contructor */
    public function __contruct($menu_id=NULL){
        parent::__contruct();
        if($menu_id!==NULL){
            $this->loadById($menu_id);
        }
    }

    /* ========================================
        Getter/Setter Magic Methods
     * ======================================== */
    public function __get($property){
        if (property_exists($this, $property)){
            return $this->$property;
        }
    }
    public function __set($property, $value){
        if (property_exists($this, $property)){
            $this->$property = $value;
        }
        return $this;
    }

    public function loadById($menu_id)
    {
        $query =
            "SELECT * FROM #_menus
            LEFT JOIN #_menu_items ON #_menu_items.fk_menu_id = $menu_id
            WHERE #_menus.menu_id = $menu_id
            ORDER BY `ordering`;";

        $results = $this->queryExec($query);
        while($row_obj = $results->fetch_object()){
            array_push($this->items, $row_obj);
        }

        if(count($this->items) > 0){
            $this->menu_id = $this->items[0]->menu_id;
            $this->menu_title = $this->items[0]->menu_title;
            $this->menu_fk_lang_id = $this->items[0]->menu_fk_lang_id;
        }
    }

    public function getMenuById($menu_id)
    {
        $this->loadById($menu_id);
        return $this;
    }


    public function getMenusByPageId($page_id)
    {
        $data = array();
        $query =
            "SELECT * FROM #_menus
             LEFT JOIN #_pages_has_menus ON #_pages_has_menus.fk_menu_id = #_menus.menu_id
             LEFT JOIN #_menu_items ON #_menu_items.fk_menu_id = #_menus.menu_id
             WHERE #_pages_has_menus.fk_page_id = $page_id
             ORDER BY `ordering`;";
        $results = $this->queryExec($query);
        while($row_obj = $results->fetch_object()){
            if(!isset($data[$row_obj->menu_name])){
                $data[$row_obj->menu_name] = array();
            }
            array_push($data[$row_obj->menu_name], $row_obj);
        }
        return $data;
    }

    public function getAllMenus()
    {
        $query =
            "SELECT * FROM #_menus
             LEFT JOIN #_menu_items ON #_menu_items.fk_menu_id = #_menus.menu_id
             ORDER BY `ordering`;";

        $results = $this->queryExec($query);
        $data = array();
        while($row_obj = $results->fetch_object()){

            if(!isset($data[$row_obj->menu_name])){
                $data[$row_obj->menu_name] = array();
            }

            array_push($data[$row_obj->menu_name], $row_obj);
        }
        return $data;
    }

}
