<?php
//JEAN
include("../components/db.php");
$bdd = createCursor();
$requestAllBadges = $bdd->query("SELECT name_badge, description_badge, color_badge FROM badges");

while ($answerOneBadge = $requestAllBadges->fetch()) {
echo "<div class='allBadges' style='display:flex'>
    <div class='badge' style='display:flex;justify-content:center;align-items:center;height:100px;width:100px;border-radius:50%;background-color:".$answerOneBadge['color_badge']."'>"
    .$answerOneBadge['name_badge'].
    "</div>
    <div style='display:flex;justify-content:center;align-items:center;'>"
    .$answerOneBadge['description_badge'].
    "</div>
</div>";
};
//Jean