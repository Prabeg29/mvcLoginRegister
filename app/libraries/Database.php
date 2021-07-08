<?php

abstract class Database {
    private $dbHost = DB_HOST;
    private $dbUser = DB_USER;
    private $dbPwd = DB_PASSWORD;
    private $dbName = DB_NAME;

    private $statement;
    private $dbHandler;
    private $error;

    public function __construct(){
        $conn = "mysql:host=$this->dbHost;dbname=$this->dbName";
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try{
            $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPwd, $options);
        }
        catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
}