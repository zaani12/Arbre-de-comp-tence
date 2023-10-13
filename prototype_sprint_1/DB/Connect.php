<?php
class Connect
{
  const SERVERNAME = "localhost";
  const DATABASNAME = "sprint1db";
  const USERNAME = "root";
  const PASSWORD = "";


  public static function DB()
  {
    try {

      $conn = new PDO("mysql:host=" . self::SERVERNAME . ";dbname=" . self::DATABASNAME, self::USERNAME, self::PASSWORD);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo "Connected successfully";
      return $conn;
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }
}
