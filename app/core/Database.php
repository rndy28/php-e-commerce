<?php

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;

    public function __construct()
    {
        try {
            $this->dbh = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }
    public function bind($type, $params){
        $this->stmt->bind_param($type, ...$params);
    }
    public function execute()
    {
        $this->stmt->execute();
    }

    public function resultSet()
    {
        $this->execute();
        $result = $this->stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function single(){
        $this->execute();
        $result = $this->stmt->get_result();
        return $result->fetch_assoc();
    }
    public function affectedRows(){
        return mysqli_affected_rows($this->dbh);
    }
}
