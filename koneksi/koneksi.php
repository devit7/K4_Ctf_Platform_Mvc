<?php
include('config.php');

class connect{
  public $conn;


  function __construct(){
    try{
    $this->conn = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    }catch(PDOException $e){
      echo "Connection failed: " . $e->getMessage();
    }
  }


}


?>