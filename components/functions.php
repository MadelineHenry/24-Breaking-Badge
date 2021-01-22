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
      $_SESSION['numberUsers'] =
      $results['COUNT(id)'];

    return true;
  }
  return false;
}

function signin($firstname,$lastname,$email,$password,$account_type)
{
  session_start_once();

  $password = password_hash($password, PASSWORD_DEFAULT);


  $db = createCursor();
  $sql = "INSERT INTO users (email, password, firstname, lastname, account_type) VALUES ('$email', '$password', '$firstname', '$lastname', '$account_type')";
  $req = $db->prepare($sql);
  $req->execute();
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
$results=$requestAllBadges->fetchAll(PDO::FETCH_ASSOC);

    return $results;
  
  
}

function getUserBadges()
{
  $bdd = createCursor();
  $requestBadgesUser = $bdd->prepare("SELECT name_badge, color_badge FROM users_has_badges 
  INNER JOIN users ON users_has_badges.fk_id_users=users.id 
  INNER JOIN badges ON users_has_badges.fk_id_badge =  badges.id_badge
  WHERE id=?");
  $requestBadgesUser->execute(array($_SESSION['user_id']));
  $answerOneBadge = $requestBadgesUser->fetchAll();
  return $answerOneBadge;
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

  $getNumberOfNormies = $cursor->query('SELECT COUNT(id) FROM users WHERE account_type="NORMIE"');
  $NumberOfNormies = $getNumberOfNormies ->fetch();
  $_SESSION['numberNormies'] =
  $NumberOfNormies['COUNT(id)'];  

  $getNumberBadgesOfUser = $cursor->prepare('SELECT COUNT(fk_id_users) FROM users_has_badges WHERE fk_id_users=?');
  $getNumberBadgesOfUser->execute(array($_SESSION['user_id']));
  $numberBadgesOfUser = $getNumberBadgesOfUser->fetch();
  $_SESSION['numberBadgesOfUser'] = $numberBadgesOfUser['COUNT(fk_id_users)'];
}

function peopleHasMoreBadges()
{
  $cursor = createCursor();
  $query = $cursor->prepare('SELECT firstname,COUNT(fk_id_badge) FROM users_has_badges INNER JOIN users ON users_has_badges.fk_id_users = users.id
WHERE account_type="NORMIE" GROUP BY fk_id_users HAVING COUNT(fk_id_badge) > ?');
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
  $query = $cursor->prepare('SELECT firstname,COUNT(fk_id_badge) FROM users_has_badges INNER JOIN users ON users_has_badges.fk_id_users = users.id
WHERE account_type="NORMIE" GROUP BY fk_id_users HAVING COUNT(fk_id_badge) > ?');
  $query->execute(array($_SESSION['numberBadgesOfUser']));
  $numberPeopleHasMoreBadges=0;
  while ($query->fetch()) {
    $numberPeopleHasMoreBadges++;
  };
  return  $numberPeopleHasMoreBadges;
}

function createPercentageBadgesStats()
{
 $bdd = createCursor();
   $requestNumberBadgesPro = $bdd->query("SELECT COUNT(name_badge) FROM users_has_badges INNER JOIN badges ON users_has_badges.fk_id_badge = badges.id_badge INNER JOIN users ON users_has_badges.fk_id_users = users.id WHERE name_badge='JS newbie' AND account_type='NORMIE'");
  $numberBadgesJSNewbie = $requestNumberBadgesPro->fetch();

  return  get_percentage($_SESSION['numberNormies'], $numberBadgesJSNewbie['COUNT(name_badge)']);
}

function getBadgesName() {
$arrayRecipeDate = [];
if (!empty($_POST['cleGetBadges'])) {
  $bdd = createCursor();
  $requestAllBadges = $bdd->query("SELECT name_badge FROM badges");

  while ($answerOneBadge = $requestAllBadges->fetch()) {
    $arrayRecipeDate[] = $answerOneBadge['name_badge'];
  }
  $jsArray= json_encode($arrayRecipeDate);
  echo $jsArray;
}
}

function getUsersName()
{
  $arrayUsersNames = [];
  if (!empty($_POST['clegetUsers'])) {
    $bdd = createCursor();
    $requestAllNames = $bdd->query("SELECT firstname FROM users");

    while ($answerOneName = $requestAllNames->fetch()) {
      $arrayUsersNames[] = $answerOneName['firstname'];
    }
    $jsArray = json_encode($arrayUsersNames);
    echo $jsArray;
  }
}

function deleteOrModifyBadge(){
  if (!empty($_POST["modify_badge"]) or !empty($_POST["delete_badge"])) {
    $modifiedNameBadge = $_POST["modif_name"];
    $modifiedDescriptionBadge = $_POST["modif_description"];
    $modifiedColorBadge = $_POST["modif_color"];
    $modifiedBadge = $_POST["badgeToModify"];
  }

  if (!empty($_POST["modify_badge"])) {
    $bdd = createCursor();
    $updateABadge = $bdd->prepare("UPDATE `badges` SET `name_badge`=?,`description_badge`=?,`color_badge`=? WHERE name_badge=?");
    $updateABadge->execute(array($modifiedNameBadge, $modifiedDescriptionBadge, $modifiedColorBadge, $modifiedBadge));
  }

  if (!empty($_POST["delete_badge"])) {
    $bdd = createCursor();
    $updateABadge = $bdd->prepare("DELETE FROM `badges` WHERE name_badge=?");
    $updateABadge->execute(array($modifiedBadge));
  }
}

function createNewBadge() {
  if (!empty($_POST["new_badge"])) {
    $newNameBadge = $_POST["new_name"];
    $newDescriptionBadge = $_POST["new_description"];
    $newColorBadge = $_POST["new_color"];

    $bdd = createCursor();
    $createABadge = $bdd->prepare("INSERT INTO `badges`(`name_badge`, `description_badge`, `color_badge`) VALUES (?,?,?)");
    $createABadge->execute(array($newNameBadge, $newDescriptionBadge, $newColorBadge));
  }
}

//END JEAN

function getAllUserNames(){
  $bdd = createCursor();
  $requestAllUserNames = $bdd->query("SELECT firstname, GROUP_CONCAT( name_badge ) FROM users_has_badges INNER JOIN users ON users.id = users_has_badges.fk_id_users INNER JOIN badges ON badges.id_badge = users_has_badges.fk_id_badge GROUP BY firstname");

  $answerOneUserName = $requestAllUserNames->fetchAll();
 return $answerOneUserName;
}


function getUsers()
{
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

  $idUserAndBadge= recupid($user_id,$badge_id);

  $requestFinalAdd = $db->prepare("INSERT INTO users_has_badges (fk_id_users, fk_id_badge) VALUES(?, ?)");
  $requestFinalAdd->execute(array($idUserAndBadge[0],$idUserAndBadge[1]));

}

function delete($user_id,$badge_id){
  $db = createCursor();

  $idUserAndBadge= recupid($user_id,$badge_id);

  $requestFinalDelete = $db->prepare("DELETE FROM users_has_badges WHERE fk_id_users=? AND fk_id_badge=? ");
  $requestFinalDelete->execute(array($idUserAndBadge[0],$idUserAndBadge[1]));

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
