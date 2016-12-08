<?php

class LocalizationModel extends Model
{
    public function getLanguages()
    {
        $query = "SELECT * FROM #_languages;";
        $this->results = $this->queryExec($query);
        if(!$this->results){
            return FALSE;
        }else{
            $data = array();
            while($row = $this->results->fetch_object()){
                array_push($data, $row);
            }
            return $data;
        }
    }



}