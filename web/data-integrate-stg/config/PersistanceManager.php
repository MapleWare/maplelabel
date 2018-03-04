<?php

class PersistanceManager {
//$host="onlabeldevsing";
//$username="onlabeldevsing";
//$password="onlabeldevsingapore";
//$database="onlabeldev";
    private $mysqli;
    private $dbHost = 'onlabelsdev.chzjzofxptj9.us-west-2.rds.amazonaws.com';
    private $dbUserName = 'onlabelsdev';
    private $dbPassword = 'successonlabels';
    private $dbName = 'onlabelspilotstg';
    

    public function __construct() {
        try {
            $this->mysqli = new mysqli($this->dbHost, $this->dbUserName, $this->dbPassword, $this->dbName);
            $this->mysqli->set_charset("utf8");
        } catch (mysqli_sql_exception $e) {
            echo $e->getMessage();
        }
    }

    public function getCount($query) {
        $assocArray = $this->mysqli->query($query)->fetch_assoc();
        if ($this->mysqli->errno) {
            die("MySQL database query failed: " . $this->mysqli->error);
        }
        return $assocArray['c'];
    }

    public function fetchResult($query) {
        $result = $this->mysqli->query($query);
        if ($this->mysqli->errno) {
            die("MySQL database query failed: " . $this->mysqli->error);
        }
        $resultArray = array();
        while ($row = $result->fetch_assoc()) {
            $resultArray[] = $row;
        }
        return $resultArray;
    }

    public function executeQuery($query) {
        $result = $this->mysqli->query($query);
        if ($this->mysqli->errno) {
            die("MySQL database query failed: " . $this->mysqli->error);
        }
        return $this->mysqli->insert_id;
    }

    public function updateQuery($query) {
        $result = $this->mysqli->query($query);
        if ($this->mysqli->errno) {
            die("MySQL database query failed: " . $this->mysqli->error);
        }
        return $this->mysqli->affected_rows;
    }

    public function realEscapeString($string) {
        $result = $this->mysqli->real_escape_string($string);

        if ($this->mysqli->errno) {
            die("MySQL database query failed: " . $this->mysqli->error);
        }

        return $result;
    }

    public function createTables() {
        
    }

}

?>
