<?php

class Database
{
    public $mysqli = NULL;
    public $results = NULL;

    public function __construct()
    {
        if($this->mysqli===NULL){
            $this->mysqli = new mysqli( Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
        }

        if ($this->mysqli->connect_errno)
        {
            echo "<b>Database() say: </b>connection problems<br>";
            echo "Errno: " . $this->mysqli->connect_errno . "<br>";
            echo "Error: " . $this->mysqli->connect_error . "<br>";
            exit;
        }
    }

    /*==========================================================================*
     * Clean Memory and Cose Connection
     *==========================================================================*/
    public function cleanAndClose()
    {
        if(isset($this->results) && !is_bool($this->results))
        {
            $this->results->free();

        }
        $this->mysqli->close();
    }


    /*==========================================================================*
     * Escape a String
     *==========================================================================*/
    public function escape($string=NULL)
    {
        return $this->mysqli->real_escape_string($string);
    }


    /*=========================================================================*
      Get Objects Records Set
    *=========================================================================*/
    public function getObjectsList($query=""){
        $results = $this->queryExec($query);
        if($results){
            $data = array();
            while ($row_obj = $results->fetch_object()) {
              array_push($data, $row_obj);
            }
            return $data;
        }else{
            return FALSE;
        }
    }


    /*=========================================================================*
      Get Objects Records Set
    *=========================================================================*/
    public function getArraysList($query=""){
        $results = $this->queryExec($query);
        if($results){
            $data = array();
            while ($row_arr = $results->fetch_array()) {
              array_push($data, $row_arr);
            }
            return $data;
        }else{
            return FALSE;
        }
    }


    /*=========================================================================*
     * Return An ARRAY Of The Object Retrieved By The Query
     *=========================================================================*/
    public function getArrayData($query='')
    {
        $_query = str_replace("#_", Config::$db_prefix, $query);

        if (!$this->results = $this->mysqli->query($_query)) {
            echo "<b>Database() say: </b>query problems<br>";
            echo "Query: " . $_query . "<br>";
            echo "Errno: " . $this->mysqli->errno . "<br>";
            echo "Error: " . $this->mysqli->error . "<br>";
            exit;
        }

        if ($this->results->num_rows === 0) {
            //echo "<b>Database() say: </b>no query results<br>";
            $data = FALSE;
        }

        $data = $this->results->fetch_assoc();
        return $data;
    }


   /*==========================================================================*
    * Return An OBJECT Of The Row Retrieved By The Query
    *==========================================================================*/
    public function getObjectData($query='')
    {
        $_query = str_replace("#_", Config::$db_prefix, $query);

        if (!$this->results = $this->mysqli->query($_query)) {
            echo "<b>Database() say: </b>query problems<br>";
            echo "Query: " . $_query . "<br>";
            echo "Errno: " . $this->mysqli->errno . "<br>";
            echo "Error: " . $this->mysqli->error . "<br>";
            exit;
        }

        if ($this->results->num_rows === 0) {
            //echo "<b>Database() say: </b>no query results<br>";
            //$data = new stdClass();
            $data = FALSE;
        }else{
            $data = $this->results->fetch_object();
            $data->num_rows = $this->results->num_rows;
        }
        return $data;
    }


    /*==========================================================================*
     * Generic Query Execution
     *==========================================================================*/
    public function queryExec($_query="")
    {
        $query = str_replace("#_", Config::$db_prefix, $_query);

        if (!$this->results = $this->mysqli->query($query)) {
            echo "<b>Database() say: </b>query problems<br>";
            echo "Query: " . $query . "<br>";
            echo "Errno: " . $this->mysqli->errno . "<br>";
            echo "Error: " . $this->mysqli->error . "<br>";
            return FALSE;
        }else{
            return $this->results;
        }
    }


    // Destruct Method
    function __destruct(){
        $this->cleanAndClose();
    }

}
