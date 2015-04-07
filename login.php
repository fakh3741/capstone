<?php
session_start();
include_once('/var/www/html/capstone/lib.php');
include_once('/var/www/html/capstone/header.php');
connect($db);
isdigit($s);

switch($s){
case 0;
default:
        header('Location: index.php');
        break;
//owner login
case 1:   
    $owneremail=htmlspecialchars($owneremail);
    $pwd=htmlspecialchars($pwd);
    owner_authenticate($db, $owneremail, $pwd);
	break;
    
//user login
case 2:
    $useremail=htmlspecialchars($useremail);
    $pwd=htmlspecialchars($pwd);
    user_authenticate($db, $useremail, $pwd);
	break;
    
}

include_once('/var/www/html/capstone/footer.php');
?>


