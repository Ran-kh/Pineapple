<?php

//Singleton
class DataBase
{
  private static DataBase $db;
  private $cnxn;

  private $host = 'localhost';
  private $user = 'root';
  private $pass = '';
  private $dbname = 'pineapple';

  public function __Construct()
  {
    $this->cnxn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
    if(!$this->cnxn)
      die("Connection failed: ". mysqli_connect_error());
  }

  public static function getInstance()
  {
    if(!isset($db))
      $db = new DataBase();
    return $db;
  }

  public function getCnxn()
  {
    return $this->cnxn;
  }

}
