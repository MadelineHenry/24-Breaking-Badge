<?php
//Jean
  // include_once('functions.php');
 
  if(!isAuthenticated()){
    include('./pages/login.php');
  }
  else{
  // include_once('./pages/badges.php');
  $page = 'badges';
  if(!empty ($_GET['page'])){
    $page = $_GET['page'];
  }
  include_once('./pages/'. $page . '.php');
  }

?>