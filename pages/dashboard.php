<?php

    include('../components/functions.php');

    getUsers();

    if (isset($_POST['add'])) {
        removeBadge($_POST["userName"],$_POST["badgeName"]);
    }
    if (isset($_POST['delete'])) {
        delete($_POST["userName"],$_POST["badgeName"]);
    }

?>


<form method="post">
    <select name="userName" id="">
        <option value="cemil">cemil</option>
        <option value="Johnny">Johnny</option>
    </select>
    <select name="badgeName" id="">
        <option value="JS PRO">JS PRO</option>
        <option value="JS newbie">JS newbie</option>
    </select>

    <button type="submit" name="add">+</button>
    <button type="submit" name="delete">-</button>
</form>