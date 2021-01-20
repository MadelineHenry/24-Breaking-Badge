<?php

    include('../components/functions.php');

    if (!empty($_POST["email"])) {
        if (login($_POST["email"],$_POST["password"])) {
            header("location:badg.php");
        }
        else{
            echo 'log not very ok';
        }
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
        <input type="text" name="email" placeholder="Your email">
        <input type="password" name="password" placeholder="Your password">
        <button type="submit" value="login" name="submit">Sign up
    </form>

</body>

</html>