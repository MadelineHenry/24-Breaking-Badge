<?php
//JEAN
// include("../components/functions.php");
//END JEAN
// session_start();
if ($_SESSION['account_type'] === 'ADMIN') {

    include_once('./components/navbarAdmin.php');
} else {

    include("./components/navbarNormies.php");
}

if ($_SESSION['account_type'] === 'NORMIE') {?>
    <h2>My Badges</h2>
    <div class=badgesOneUser style="display: flex;"><?= getUserBadges(); ?></div>

<?php

}

?>
<h2>All Badges</h2>
<div><?= getBadges(); ?> </div>
<!-- //END JEAN -->