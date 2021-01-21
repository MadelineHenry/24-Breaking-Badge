<?php
include_once('db.php');


// Similar to "include_once" but for sessions
// Calls "session_start()" unless it has already been called on the page
function session_start_once()
{
  if (session_status() == PHP_SESSION_NONE) {
    return session_start();
  }
}

  function isAuthenticated(){
    session_start_once();
    return !empty($_SESSION['user_id']);
  }

  function isAdmin(){
    session_start_once();
    return isAuthenticated() && $_SESSION['account_type'] == 'ADMIN';
  }

  function login($email, $password){
    session_start_once();

    $cursor = createCursor();
    $query = $cursor->prepare('SELECT id, password, firstname, lastname, account_type FROM users WHERE email=?');
    $query->execute([$email]);
    $results = $query->fetch();

    if(!empty($results) AND password_verify($password, $results['password'])){
      $_SESSION['user_id'] = $results['id'];
      $_SESSION['account_type'] = $results['account_type'];
      $_SESSION['email'] = $email;
      $_SESSION['firstname'] = $results['firstname'];
      $_SESSION['lastname'] = $results['lastname'];
    //JEAN
    $_SESSION['numberUsers'] =
      $results['COUNT(id)'];

    return true;
  }
  return false;
}

function signin()
{
  session_start_once();

  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $account_type = $_POST['account_type'];

  $db = createCursor();
  $sql = "INSERT INTO users (email, password, firstname, lastname, account_type) VALUES ('$email', '$password', '$firstname', '$lastname', '$account_type')";
  $req = $db->prepare($sql);
  $req->execute();
  header("location:badges.php");
}

function logout()
{
  session_start_once();
  session_destroy();
}

//JEAN
function getBadges()
{
  $bdd = createCursor();
  $requestAllBadges = $bdd->query("SELECT name_badge, description_badge, color_badge FROM badges");

  while ($answerOneBadge = $requestAllBadges->fetch()) {
    ob_start(); ?>
    <div class='allBadges'>
      <div class='badge' style='background-color:<?= $answerOneBadge['color_badge'] ?>'>
        <?= $answerOneBadge['name_badge'] ?>
      </div>
      <div class='badge_description'>
        <?= $answerOneBadge['description_badge'] ?>
      </div>
    </div>
  <?php $content = ob_get_clean();
    echo $content;
  };
}

function getUserBadges()
{
  $bdd = createCursor();
  $requestBadgesUser = $bdd->prepare("SELECT name_badge, color_badge FROM users_has_badges 
  INNER JOIN users ON users_has_badges.fk_id_users=users.id 
  INNER JOIN badges ON users_has_badges.fk_id_badge =  badges.id_badge
  WHERE id=?");
  $requestBadgesUser->execute(array($_SESSION['user_id']));

  while ($answerOneBadge = $requestBadgesUser->fetch()) {
    ob_start(); ?>
    <div class='badge_user' style='background-color:<?= $answerOneBadge['color_badge'] ?>'>
      <?= $answerOneBadge['name_badge'] ?>
    </div>
  <?php
    $content = ob_get_clean();
    echo $content;
  }
}

function get_percentage($total, $number)
{
  if ($total > 0) {
    return round(100 * ($number / $total), 2);
  } else {
    return 0;
  }
}

function statsData()
{
  $cursor = createCursor();
  $query = $cursor->query('SELECT COUNT(id) FROM users');
  $results = $query->fetch();
  $_SESSION['numberUsers'] =
    $results['COUNT(id)'];

  $getNumberBadgesOfUser = $cursor->prepare('SELECT COUNT(fk_id_users) FROM users_has_badges WHERE fk_id_users=?');
  $getNumberBadgesOfUser->execute(array($_SESSION['user_id']));
  $numberBadgesOfUser = $getNumberBadgesOfUser->fetch();
  $_SESSION['numberBadgesOfUser'] = $numberBadgesOfUser['COUNT(fk_id_users)'];
}

function peopleHasMoreBadges()
{
  $cursor = createCursor();
  $query = $cursor->prepare('SELECT firstname,COUNT(fk_id_badge) FROM users_has_badges INNER JOIN users on users_has_badges.fk_id_users=users.id GROUP BY fk_id_users HAVING COUNT(fk_id_badge) >?');
  $query->execute(array($_SESSION['numberBadgesOfUser']));

  while ($results = $query->fetch()) {
    ob_start(); ?>
    <div>
      <p><?= $results['firstname'] ?> has <?= $results['COUNT(fk_id_badge)'] ?> badge(s) </p>
    </div>
<?php
    $content = ob_get_clean();
    echo $content;
  };
}

function whoHasMoreBadges()
{
  $cursor = createCursor();
  $query = $cursor->prepare('SELECT firstname,COUNT(fk_id_badge) FROM users_has_badges INNER JOIN users on users_has_badges.fk_id_users=users.id GROUP BY fk_id_users HAVING COUNT(fk_id_badge) >?');
  $query->execute(array($_SESSION['numberBadgesOfUser']));
  $numberPeopleHasMoreBadges=0;
  while ($results = $query->fetch()) {
    $numberPeopleHasMoreBadges++;
  };
  return  $numberPeopleHasMoreBadges;
}

function createPercentageBadgesStats()
{
  $bdd = createCursor();
  $requestNumberBadges = $bdd->query("SELECT COUNT(id) FROM users");
  $numberBadges = $requestNumberBadges->fetch();

  $requestNumberBadgesPro = $bdd->query("SELECT COUNT(name_badge) FROM users_has_badges INNER JOIN badges ON users_has_badges.fk_id_badge = badges.id_badge WHERE name_badge='JS newbie'");
  $numberBadgesJSNewbie = $requestNumberBadgesPro->fetch();

  return  get_percentage($numberBadges['COUNT(id)'], $numberBadgesJSNewbie['COUNT(name_badge)']);
}



//END JEAN


function getUsers()
{
  $db = createCursor();
  $request = $db->prepare("SELECT name_badge, color_badge,firstname, lastname FROM users_has_badges 
  INNER JOIN users ON users_has_badges.fk_id_users=users.id 
  INNER JOIN badges ON users_has_badges.fk_id_badge =  badges.id_badge");

  $request->execute();

  while ($data = $request->fetch()) {
    echo $data['firstname'].' '.$data['lastname'].' '.$data['name_badge'];
    echo '<br>';
  }
}

function createBadge()
{
}

function editBadge($badge_id)
{
}

function removeBadge($user_id,$badge_id)
{
  $db = createCursor();

  $var1= recupid($user_id,$badge_id);

  $requestFinalAdd = $db->prepare("INSERT INTO users_has_badges (fk_id_users, fk_id_badge) VALUES('$var1[0]', '$var1[1]')");
  $requestFinalAdd->execute();

}

function delete($user_id,$badge_id){
  $db = createCursor();

  $var1= recupid($user_id,$badge_id);

  $requestFinalDelete = $db->prepare("DELETE FROM users_has_badges WHERE fk_id_users=? AND fk_id_badge=? ");
  $requestFinalDelete->execute(array($var1[0],$var1[1]));

}

function recupid($iduser, $idbadge){
  $db = createCursor();

  $requestAdd = $db->prepare("SELECT id FROM users WHERE firstname = '$iduser'");
  $requestAdd->execute();
  $resultsAdd = $requestAdd->fetch();

  $requestDelete = $db->prepare("SELECT id_badge FROM badges WHERE name_badge = '$idbadge'");
  $requestDelete->execute();
  $resultsDelete = $requestDelete->fetch();

  return array($resultsAdd['id'], $resultsDelete['id_badge']);
}


function grantBadgeToUser($badge_id, $user_id)
{
}

function removeBadgeFromUser($badge_id, $user_id)
{
}
?>