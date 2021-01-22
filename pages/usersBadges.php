<?php
    if ($_SESSION['account_type'] === 'ADMIN') {
        include_once('./components/navbarAdmin.php');
    } else {
    include("./components/navbarNormies.php");
    }
    
    if (isset($_POST['add'])) {
        removeBadge($_POST["userName"],$_POST["badgeName"]);
    }
    if (isset($_POST['delete'])) {
        delete($_POST["userName"],$_POST["badgeName"]);
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
                        <th>Last Name</th>
                        <th>Badges</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Lucie</td>
                        <td>Mariani</td>
                        <td>lucieli@hotmail.com</td>
                    </tr>
                    <tr>
                        <td>Lucie</td>
                        <td>Mariani</td>
                        <td>lucieli@hotmail.com</td>
                    </tr>
                </tbody>
            </table>  
        </div>
      
        <div class="badges_container">
            <div class="addUser_button">
                <a class="addUser_link" href="./addUsers.php">Add User</a>
            </div>
            <form method="POST">
                <div class="badges_menus">
                    <div class="users_menu">
                        <label for="">Choise the user</label>
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
                        <button type="" name="add" class="add_button">+</button>
                    </div>
                    <div class="less">
                        <button type="" name="delete" class="less_button">-</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
