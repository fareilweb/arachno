<?php

class MenuModel extends Model
{
    
    public function selectMenuDataById($menu_id = 0)
    {
        /*** 1. - Write Query =================================================*/
        $query = 
            "SELECT * "
          . "FROM #_menu_list "
          . "LEFT JOIN #_menu_items ON #_menu_items.fk_menu_id = $menu_id "
          . "WHERE #_menu_list.menu_id = $menu_id";
        
        /*** 2. - Execute Query, Save Results =================================*/
        $results = $this->queryExec($query);
        
        /*** 3. - Create and populate Array of Objects as Data Container ======*/
        $data = array();
        while ($obj = $results->fetch_object()){
            array_push($data, $obj);
        }

        /*** 4. - Free/Close (clean memory) ===================================*/
        //$results->free();
        //$this->mysqli->close();
        
        /*** 5. - Return Data to Caller =======================================*/
        return $data;
        
    }
    
    
}
