<?php
class database
{
    private $user = "root";
    private $pass = "";
    private $host = "localhost";
    private $dbms = "app_cpc";
    private $conn = null;
    private $status = false;

    function __construct()
    {
        $this->conn = $this->init();
    }

    public function getStatus()
    {
        return $this->status;
    }
    public function getCon()
    {
        return $this->conn;
    }
    public function close()
    {
        $this->conn = null;
    }

    private function init()
    {
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=" . $this->dbms, $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->status = true;
            return $conn;
        } catch (PDOException $th) {
            return $th;
        }
    }
}
