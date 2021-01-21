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

?>
<div class="badgesPage">
    <div class="badgesLeftSide">
        <?php
        if (!isAdmin()) { ?>
            <h2>My Badges</h2>
            <div class=badgesOneUser style="display: flex;"><?= getUserBadges(); ?></div>
        <?php
        }
        ?>

        <h2>All Badges</h2>
        <div><?= getBadges(); ?> </div>
    </div>
    <div class="badgesRightSide">
        <?php
        if (isAdmin()) { ?>
            <button>Edit Badges</button>
        <?php
        }
        ?>
        <div class="badgesStats"></div>
    </div>
</div>
<!-- //END JEAN -->