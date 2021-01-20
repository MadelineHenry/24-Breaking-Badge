<?php
//JEAN
include("../components/functions.php");
//END JEAN

if ($_SESSION['account_type'] === 'ADMIN') {

    include_once('navbarAdmin.php');
} else {

    include("navbarNormies.php");
}

if ($_SESSION['account_type'] === 'NORMIES') {
    /* my badges */
}

//JEAN
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class=badgesOneUser style="display: flex;"><?= getUserBadges(); ?></div>
    <div><?= getBadges(); ?> </div>
</body>

</html>
<!-- //END JEAN -->