<?php
/**
 *
 */
class ScCategoryModel extends Model
{
    function __construct(){
        parent::__construct();
    }

    // Get All Categories
    function getAll()
    {
        $query = "SELECT * FROM mod_showcase_category";
        $results = $this->queryExec($query);

        $data = array();
        while($data_row = $results->fetch_object()){
            array_push($data, $data_row);
        }
        return $data;
    }

}
