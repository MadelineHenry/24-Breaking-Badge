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

        <h2 class="h2_leftside">My Badges</h2>
        <h3 class="h3_leftside">You have currently <?= $_SESSION['numberBadgesOfUser'] ?> badges</h3>

        <div class=badgesOneUser style="display: flex;"><?php foreach (getUserBadges() as $badgePerUser){ ?>

            <div class='badge_user' style='background-color:<?= $badgePerUser['color_badge'] ?>'>

                <?= $badgePerUser['name_badge'] ?>

            </div>

            <?php  }; ?>
        </div>
        <?php
        }
        ?>

        <h2 class="h2_leftside">All Badges</h2>
        <div class="partie_allbadges" id="style-1">
            <div><?php foreach (getBadges() as $badgeInfos){ ?>
                <div class='allBadges'>
                    <div class='badge' style='background-color:<?= $badgeInfos['color_badge'] ?>'>
                        <?= $badgeInfos['name_badge'] ?>
                    </div>
                    <div class='badge_description'>
                        <?= $badgeInfos['description_badge'] ?>
                    </div>
                </div>
                <?php }; ?>
            </div>

        </div>
    </div>

    <div class="badgesRightSide">

        <h2 class="h2_rightside">Some statistics</h2>

        <div class="badgesStats">
            <h3>There are <?=  $_SESSION['numberNormies'] ?> normies</h3>
            <h3> <?= createPercentageBadgesStats() ?>% of normies have the badge 'Cocaïne'</h3>
            <h3> <?= whoHasMoreBadges() ?> normies or
                    <?= get_percentage($_SESSION['numberNormies'], whoHasMoreBadges()) ?>% of them have more badges than
                    you. Indeed:</h3>
                <?= peopleHasMoreBadges() ?>
        </div>
    </div>
</div>
    <?php
        if (isAdmin()) { ?>
    <div class="div_editbadge"><a class="bouton_edit_badge" href="./index.php?page=editBadges"> Edit Badges </a></div>
    <?php
        }
        ?>

    <!-- //END JEAN -->