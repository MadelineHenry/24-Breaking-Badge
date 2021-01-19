<?php

function createCursor(){
    if($_SERVER['host']== 'localhost'){
      $DB_HOST = 'localhost';
      $DB_NAME = '3307';
      $DB_USER = 'root';
      $DB_PASSWORD = '';
    }
      return new PDO("
        mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8", $DB_USER, $DB_PASSWORD,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
      );
  }
?>