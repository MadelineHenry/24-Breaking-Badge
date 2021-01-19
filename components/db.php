<?php
  $DB_HOST = 'localhost';
  $DB_NAME = 'jean';
  $DB_USER = 'jean';
  $DB_PASSWORD = 'coucou';

  function createCursor(){
      return new PDO("
        mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8", 
        $DB_USER, 
        $DB_PASSWORD, 
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
      );
  }
?>