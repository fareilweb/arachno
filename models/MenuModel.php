<?php

class MenuModel extends Model
{
    
    public function selectMenuDataById($menu_id = 0)
    {
        /*** 1. - Write Query =================================================*/
        $query = 
            "SELECT * "
          . "FROM #_menus "
          . "LEFT JOIN #_menu_links ON #_menu_links.fk_menu_id = $menu_id "
          . "WHERE #_menus.menu_id = $menu_id";
        
        /*** 2. - Execute Query, Save Results =================================*/
        $results = $this->queryExec($query);
        
        /*** 3. - Create and populate Array of Objects as Data Container ======*/
        $data = [];
        while ($obj = $results->fetch_object()){
            array_push($data, $obj);
        }

        /*** 4. - Free/Close (clean memory) ===================================*/
        $results->free();
        $this->mysqli->close();
        
        /*** 5. - Return Data to Caller =======================================*/
        return $data;
        
    }
    
    
}