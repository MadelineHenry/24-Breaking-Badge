<?php
  session_start();

  include('./components/db.php');
  include('./components/functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/style.css">
  <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
  <link href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" rel="stylesheet">

  <title>Breaking Badge</title>
</head>
<body>
  <?php include_once('./components/router.php'); ?>

</body>
</html>