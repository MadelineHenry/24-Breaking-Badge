<?php
  include_once('functions.php');
  $routes = [];
  $routes['dashboard'] = 'Dashboard';
  $routes['badges'] = 'All badges';
  $routes['students'] = 'All students';

 if (!empty($_GET['p'])){
  $requestedPage = $_GET['p'];
 } else {
  $requestedPage = "";
 }

  if(!isAuthenticated()){
    include('./pages/login.php');
  }
  else if(array_key_exists($requestedPage, $routes)){
    include_once('navbar.php');

    // include the page
  }
  echo $requestedPage;
?>