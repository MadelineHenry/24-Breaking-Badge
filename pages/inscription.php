<?php

    // include('../components/functions.php');
    session_start();


    if (isset($_POST['submit'])) {
        signin($_POST["firstname"],$_POST["lastname"],$_POST["email"],$_POST["password"],$_POST["account_type"]);
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="post">
        <input type="text" name="firstname" placeholder="First name">  
        <input type="text" name="lastname" placeholder="Lastname">
        <input type="text" name="email" placeholder="Your email">
        <input type="password" name="password" placeholder="Your password">
        <input type="text" name="account_type" placeholder="Account type">
        <button type="submit" value="login" name="submit">Add users
    </form>

</body>

</html>