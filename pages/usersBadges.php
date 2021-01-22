<?php include_once('./components/navbarAdmin.php'); ?>    
    <div class="usersBadges_container">
        <div class="usersList_container">
            <div class="usersList_title">
                <h2 class="users_title">Users list</h2>
            </div>
            <table class="users_table">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Badges</th>
                    </tr>
                </thead>
                <tbody>
                    <?= getAllUserNames() ?>
                    
                </tbody>
            </table>
        </div>

        <div class="badges_container">
            <div>
                <a class="addUser_link" href="./index.php?page=addUsers">Add User</a>
            </div>
            <div class="badges_menus">
                <div class="users_menu">
                    <label for="">Choise the user</label>
                    <select name="user" id="user_select">
                        <option value=""></option>
                    </select>
                </div>
                <div class="badges_menu">
                    <label for="">Choise the badge</label>
                    <select name="badge" id="badge_select">
                        <option value=""></option>
                    </select>
                </div>
            </div>
            <div class="badges_buttons">
                <div class="add">
                    <button type="" alt="" class="add_button">+</button>
                </div>
                <div class="less">
                    <button type="" alt="" class="less_button">-</button>
                </div>
            </div>
        </div>
    </div>