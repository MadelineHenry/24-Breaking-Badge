<?php 
 if($_SESSION['account_type'] === 'ADMIN'){
     
    include_once('navbarAdmin.php');

 }
 else {

 include("navbarNormies.php");

}

if($_SESSION['account_type'] === 'NORMIES'){
    /* my badges */
}

/* badges */


 ?>