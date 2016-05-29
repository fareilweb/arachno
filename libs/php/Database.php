<?php

class Database
{

    public $mysqli;

    public function __construct()
    {
        // Hostname: 127.0.0.1, username: your_user, password: your_pass, db: sakila
        $this->mysqli = new mysqli( Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);

        if ($this->mysqli->connect_errno)
        {
            echo "<b>Database() say: </b>connection problems<br>";
            echo "Errno: " . $this->mysqli->connect_errno . "<br>";
            echo "Error: " . $this->mysqli->connect_error . "<br>";
            exit;
        }
    }
    

/*==============================================================================*
 * Generic Query Execution
 *==============================================================================*/
    public function queryExec($query='')
    {
        $_query = str_replace("#_", Config::$db_prefix, $query);
        
        if (!$result = $this->mysqli->query($_query)) {
            echo "<b>Database() say: </b>query problems<br>";
            echo "Query: " . $_query . "<br>";
            echo "Errno: " . $this->mysqli->errno . "<br>";
            echo "Error: " . $this->mysqli->error . "<br>";
            exit;
        }

        // remember to
        //-->>$results->free();
        //-->>$mysqli->close();
        // but not here, becouse you will need to fetch results
        return $result;
    }

    
    
/*==============================================================================*
 * Return An ARRAY Of The Object Retrieved By The Query
 *==============================================================================*/
    public function getArrayData($query='')
    {
        $_query = str_replace("#_", Config::$db_prefix, $query);
        
        if (!$result = $this->mysqli->query($_query)) {
            echo "<b>Database() say: </b>query problems<br>";
            echo "Query: " . $_query . "<br>";
            echo "Errno: " . $this->mysqli->errno . "<br>";
            echo "Error: " . $this->mysqli->error . "<br>";
            exit;
        }

        if ($result->num_rows === 0) {
            echo "<b>Database() say: </b>no query results<br>";
            exit;
        }

        $data = $result->fetch_assoc();

        $result->free();
        $this->mysqli->close();

        return $data;
    }

    

/*==============================================================================*
 * Return An OBJECT Of The Object Retrieved By The Query
 *==============================================================================*/
    public function getObjectData($query='')
    {
        $_query = str_replace("#_", Config::$db_prefix, $query);
        
        if (!$result = $this->mysqli->query($_query)) {
            echo "<b>Database() say: </b>query problems<br>";
            echo "Query: " . $_query . "<br>";
            echo "Errno: " . $this->mysqli->errno . "<br>";
            echo "Error: " . $this->mysqli->error . "<br>";
            exit;
        }

        if ($result->num_rows === 0) {
            //echo "<b>Database() say: </b>no query results<br>";
            //$data = new stdClass();
            $data = FALSE;
        }else{
            $data = $result->fetch_object();
            $data->num_rows = $result->num_rows;
        }

        $result->free();
        $this->mysqli->close();

        return $data;
    }


}
