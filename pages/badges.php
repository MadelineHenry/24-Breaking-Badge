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
<div class="toute_la_partie_my_badges">
    <div class="tous_les_badges">
        <h2>My Badges</h2>
        <div class=badgesOneUser style="display: flex;"><?= getUserBadges(); ?></div>
    </div>
</div>
<?php

}

?>
<div class="toute_la_partie_all_badges">
    <div class="tous_les_badges">
        <h2>All Badges</h2>
        <div><?= getBadges(); ?> </div>
    </div>
</div>
<!-- //END JEAN -->