<?php   
    require_once('../components/functions.php');

    if (!empty(*_POST['email'])){
        if(login($_POST['email'], $_POST['password'])){
            echo 'connected';
        }else{
            echo 'failed';
        }
    }
?>

<form method="post" action="">
    <input type="email" name="email" id="">
    <input type="password" name="password" id="">
    <input type="submit" value="Valid" id="">
</form>