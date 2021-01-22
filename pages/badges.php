<?php
//JEAN
// include("../components/functions.php");
//END JEAN
// session_start();
statsData();

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
            <h>You have currently <?= $_SESSION['numberBadgesOfUser'] ?> badges</h>
            <div class=badgesOneUser style="display: flex;"><?= getUserBadges(); ?></div>
        <?php
        }
        ?>

        <h2 class="h2_leftside">All Badges</h2>
        <div><?= getBadges(); ?> </div>
    </div>
    <div class="badgesRightSide">
        <?php
        if (isAdmin()) { ?>
            <div class="div_editbadge"><a class="bouton_edit_badge" href="./index.php?page=editBadges"> Edit Badges </a></div>
        <?php
        }
        ?>
        <h2 class="h2_rightside">Some statistics</h2>
        <div class="badgesStats">
            <!-- <button id="newbie">JS NEWBIE</button> -->
            <!-- <form action="../index.php" method="POST">
                <input type="submit" name="newbie" value="JS NEWBIE"></input>
                <input type="submit" name="intermediate" value="JS Intermediate"></input>
                <input type="submit" name="pro" value="JS PRO"></input>
            </form> -->
            <h3>There are <?=  $_SESSION['numberNormies'] ?> normies</h3>
            <h3> <?= createPercentageBadgesStats() ?>% of normies have the badge 'JS Newbie'</h3>
            <h3> <?= whoHasMoreBadges() ?> normies or <?= get_percentage($_SESSION['numberNormies'], whoHasMoreBadges()) ?>% of them have more badges than you. Indeed:</h3>
            <?= peopleHasMoreBadges() ?>
        </div>
    </div>
</div>

<!-- //END JEAN -->