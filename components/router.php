<?php
//Jean
  // include_once('functions.php');
 
  if(!isAuthenticated()){
    include('./pages/login.php');
  }
  else{
  include_once('./pages/badges.php');
  }

?>