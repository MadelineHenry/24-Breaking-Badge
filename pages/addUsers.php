<?php
// login("jean@coucou.be", "coucou")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">

    <title>Breaking Badge</title>
</head>

<body>
    <div class="addUsers_container">
        <form method="post" class="addUsers_form">
            <div class="addUsers_titles">
                <h2 class="addUsers_title_form">To Add a user</h2>
            </div>
            <div>
                <input for="firstName" type="firstName" name="firstName" placeholder="FirstName" class="addFirstName_input"></input>
            </div>
            <div>
                <input for="lastName" type="lastName" name="lastName" placeholder="LastName" class="addLastName_input"></input>
            </div>
            <div>
                <input for="email" type="email" name="email" placeholder="Email" class="addEmail_input"></input>
            </div>
            <div>
                <input for="Password" type="password" name="password" placeholder="Password" class="addPsw_input"></input>
            </div>
            <div>
                <input for="accountType" type="accountType" name="accountType" placeholder="Account Type" class="addAccountType_input"></input>
            </div>
            <div class="submit_input">
                <button type="submit" class="addUser_button">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>