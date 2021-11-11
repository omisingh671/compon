<?php
error_reporting(1);
class Database{
  private static $dbName = "compon";
  private static $dbHost = "localhost";
  private static $dbUsername = "amar";
  private static $dbUserPassword = "tsg_user";
     
  private static $conn  = null;
     
  public function __construct(){
    die("Init function is not allowed");
  }
     
  public static function connect(){
    // One connection through whole application
    if ( null == self::$conn ){     
      try{
        self::$conn =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
		    self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch(PDOException $e){
        die($e->getMessage()); 
      }
    }
    return self::$conn;
  }
     
  public static function disconnect(){
    self::$conn = null;
  }
}
?>