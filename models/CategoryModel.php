<?php
class CategoryModel extends Model
{

    public function getAll($toarray = False)
    {   
        $data = array();
        $query = "SELECT * FROM #_categories;";
        $results = $this->queryExec($query);
        if($toarray == TRUE){
            while($row = $results->fetch_array()){
                array_push($data, $row);
            }
        }else{
            while($row = $results->fetch_object()){
                array_push($data, $row);
            }
        }
        return $data;
    }

} 