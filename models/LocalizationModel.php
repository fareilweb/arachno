
<?php

class LocalizationModel extends Model
{

    public function getLanguages()
    {
        $query = "SELECT * FROM #_languages;";
        $results = $this->queryExec($query);
        if(!$results){
            return FALSE;
        }else{
            $data = array();
            while($row = $results->fetch_object()){
                array_push($data, $row);
            }
            $results->free();
            $this->mysqli->close();
            return $data;
        }
    }

}