<?php

include_once('./components/navbarAdmin.php');
if (isset($_POST['add'])) {
    removeBadge($_POST["userName"], $_POST["badgeName"]);
}
if (isset($_POST['delete'])) {
    delete($_POST["userName"], $_POST["badgeName"]);
}

?>

<div class="usersBadges_container">
    <div class="usersList_container">
        <div class="usersList_title">
            <h2 class="users_title">Users list</h2>
        </div>
        <table class="users_table">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Badges</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach (getAllUserNames() as $badgeOfUser) { ?>
                    <tr>
                        <td>
                            <?= $badgeOfUser['firstname'] ?>
                        </td>
                        <td>
                            <?= $badgeOfUser['GROUP_CONCAT( name_badge )'] ?>
                        </td>
                    </tr>

                <?php } ?>

            </tbody>
        </table>
    </div>

    <div class="badges_container">
        <div>
            <a class="addUser_link" href="./index.php?page=addUsers">Add User</a>
        </div>
        <form method="POST">
            <div class="badges_menus">
                <div class="users_menu">
                    <label for="">Choose the Normie</label>
                    <select name="userName" id="" class="select_users">
                    </select>
                </div>
                <div class="badges_menu">
                    <label for="">Choise the badge</label>
                    <select name="badgeName" id="badge_select" class="select_badge">
                    </select>
                </div>
            </div>

            <form method="POST">
                <div class="badges_menus">
                    <div class="users_menu">
                        <label for="">Choose the user</label>
                            <select name="userName" id="">
                                <option value="cemil">cemil</option>
                                <option value="Johnny">Johnny</option>
                            </select>
                    </div>
                    <div class="badges_menu">
                        <label for="">Choise the badge</label>
                        <select name="badgeName" id="badge_select">
                            <option value="JS PRO">JS PRO</option>
                            <option value="JS newbie">JS Intermediate</option>
                            <option value="JS newbie">JS newbie</option>
                        </select>
                    </div>
                </div> 
                <div class="badges_buttons">
                    <div class="add">
                        <button type="" name="add" class="add_button">Add a badge to the selected person</button>
                    </div>
                    <div class="less">
                        <button type="" name="delete" class="less_button">Delete a badge to the selected person</button>
                    </div>

                </div>
            </div>

        </form>

    </div>
</div>

<script src="./assets/getBadges.js"></script>
<script src="./assets/getUsers.js"></script>