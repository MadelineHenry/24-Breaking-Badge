<!-- Navbar Admin -->
<header class="site-header">
    <div class="header">

        <div class="header-left">

            <a href="./index.php?page=badges" class="logo"><img class='zoom' src="./assets/breakingbadge.png" alt="logo"></a>
            <div class="navbar_gauche">
                <?php 
                    echo 'Welcome ' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname']
                ?>
            </div>

        </div>

        <div class="header-right">

            <div class="zoom navbar_droite"><a class='padding_box' href="./index.php?page=badges">BADGES</a></div>
            <div class="zoom navbar_droite"><a class='padding_box' href="./index.php?page=usersBadges">USERS</a></div>
            <div class="zoom navbar_droite"><a class='padding_box' href="./logout.php">Log out</a></div>

        </div>

    </div>

</header>