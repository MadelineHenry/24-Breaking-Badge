<?php
//   include_once('functions.php');
//   $routes = [];
//   $routes['dashboard'] = 'Dashboard';
//   $routes['badges'] = 'All badges';
//   $routes['students'] = 'All students';

//  if (!empty($_GET['p'])){
//   $requestedPage = $_GET['p'];
//  } else {
//   $requestedPage = "";
//  }

  if(!isAuthenticated()){
    include('./pages/login.php');
  }
  else{
  include_once('badges.php');

  }
  // echo $requestedPage;
?>