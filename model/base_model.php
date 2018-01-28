<?php

class BaseModel {
  protected $conn;

  protected $user = 'root';
  protected $pass = '';
  protected $host = 'localhost';
  protected $dbName = 'recoon';

  public function __construct() {
    $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbName,
                          $this->user,
                          $this->pass);
  }
}
