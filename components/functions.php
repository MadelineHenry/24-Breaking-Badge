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

function isAuthenticated()
{
  session_start_once();
  return !empty($_SESSION['user_id']);
}

function isAdmin()
{
  session_start_once();
  return isAuthenticated() && $_SESSION['account_type'] == 'ADMIN';
}

function login($email, $password)
{
  session_start_once();

  $cursor = createCursor();
  $query = $cursor->prepare('SELECT id, password from users WHERE email=?');
  $query->execute([$email]);
  $results = $query->fetch();

  // $cursor->closeCursor();

  if (password_verify($password, $results['password'])) {
    $_SESSION['user_id'] = $results['id'];
    $_SESSION['account_type'] = $results['account_type'];
    $_SESSION['email'] = $email;

    return true;
  }
  return false;
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
    <div class='allBadges' style='display:flex'>
      <div class='badge' style='display:flex;justify-content:center;align-items:center;height:100px;width:100px;border-radius:50%;background-color:<?= $answerOneBadge['color_badge'] ?>'>
        <?= $answerOneBadge['name_badge'] ?>
      </div>
      <div style='display:flex;justify-content:center;align-items:center;'>
        <?= $answerOneBadge['description_badge'] ?>
      </div>
    </div>
<?php $content = ob_get_clean();
echo $content;
  };
}

function getUserBadges()
{
  $_SESSION['user_id']=4;
  $bdd = createCursor();
  $requestBadgesUser = $bdd->prepare("SELECT name_badge, color_badge FROM users_has_badges 
  INNER JOIN users ON users_has_badges.fk_id_users=users.id 
  INNER JOIN badges ON users_has_badges.fk_id_badge =  badges.id_badge
  WHERE id=?");
  $requestBadgesUser ->execute(array($_SESSION['user_id']));
 

  while ($answerOneBadge = $requestBadgesUser->fetch()) {ob_start(); ?>
      <div class='badge' style='display:flex;justify-content:center;align-items:center;height:100px;width:100px;border-radius:50%;background-color:<?= $answerOneBadge['color_badge'] ?>'>
        <?= $answerOneBadge['name_badge'] ?>
      </div>
    <?php
      $content = ob_get_clean();
      echo $content;
  }
}
//END JEAN


function getUsers()
{
}

function createBadge()
{
}

function editBadge($badge_id)
{
}

function removeBadge($badge_id)
{
}

function grantBadgeToUser($badge_id, $user_id)
{
}

function removeBadgeFromUser($badge_id, $user_id)
{
}
?>