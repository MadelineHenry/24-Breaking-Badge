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
    <div class="login_container">
        <form method="post" class="login_form">
            <div class="login_titles">
                <h1 class="welcome_title">Welcome</h1>
                <h2 class="BB_title">To Breaking Badges</h2>
            </div>
            <div>
                <input for="email" type="email" name="email" placeholder="Email" class="email_input"></input>
            </div>
            <div>
                <input for="password" type="password" name="password" placeholder="Password" class="psw_input"></input>
            </div>
            <div class="submit_input">
                <button type="submit" class="login_button">Log In</button>
            </div>
        </form>
    </div>
</body>

</html>