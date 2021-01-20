<?php
//JEAN
include("../components/functions.php");
//END JEAN
session_start();
if ($_SESSION['account_type'] === 'ADMIN') {

    include_once('../components/navbarAdmin.php');
} else {

    include("../components/navbarNormies.php");
}

if ($_SESSION['account_type'] === 'NORMIES') {
    /* my badges */
}

//JEAN
?>
    <div class=badgesOneUser style="display: flex;"><?= getUserBadges(); ?></div>
    <div><?= getBadges(); ?> </div>
<!-- //END JEAN -->