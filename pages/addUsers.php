<?php

    if (isset($_POST['submit']) && !empty($_POST["lastName"]) && !empty($_POST["email"]) &&!empty($_POST["password"]) && !empty($_POST["accountType"])) {
        if (!empty($_POST["firstname"])) {
            signin($_POST["firstName"],$_POST["lastName"],$_POST["email"],$_POST["password"],$_POST["accountType"]);
        }
    }

?>

    <?php include('./components/navbarAdmin.php');?>
    <div class="addUsers_container">
        <form method="post" class="addUsers_form">
            <div class="addUsers_titles">
                <h2 class="addUsers_title_form">To Add a user</h2>
            </div>
            <div>
                <input for="firstName" type="firstName" name="firstName" placeholder="FirstName" class="addFirstName_input" required></input>
            </div>
            <div>
                <input for="lastName" type="lastName" name="lastName" placeholder="LastName" class="addLastName_input" required></input>
            </div>
            <div>
                <input for="email" type="email" name="email" placeholder="Email" class="addEmail_input" required></input>
            </div>
            <div>
                <input for="Password" type="password" name="password" placeholder="Password" class="addPsw_input" required></input>
            </div>
            <div>
                <input for="accountType" type="accountType" name="accountType" placeholder="Account Type" class="addAccountType_input" required></input>
            </div>
            <div class="submit_input">
                <button type="submit" name="submit" class="addUser_button">Submit</button>
            </div>
        </form>
        <div>
            <img class='ImageDeMADELINE' src="./assets/badges.png" alt="badges_image">
        </div>
    </div>