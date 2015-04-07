<?php

session_start();
include_once('/var/www/html/capstone/lib.php'); 
include_once('/var/www/html/capstone/header.php');
connect($db);


switch($s){
case 0;
default:
    $ownerid = $_SESSION['ownerid'];
    $ownerid=htmlspecialchars($ownerid);
    
    echo" Heart pulse logging. \n ";
    if($stmt=mysqli_prepare($db, "SELECT time, rate from heart WHERE ownerid = ? LIMIT 100")) {
                mysqli_stmt_bind_param($stmt, "s" , $ownerid);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $time, $rate);
    echo"<table style=\"width:100%\">
            <tr> <td> Time </td> <td> Pulse rate <td> Status </td> </tr>";
    while(mysqli_stmt_fetch($stmt)) {
        $time=htmlspecialchars($time);
        $rate=htmlspecialchars($rate);
        echo" <tr>
                <td> $time </td>
                <td> $rate </td> </tr>";

    }
    }
	else { 
        echo"Can not connect to DB";}
    
	break;


case "1":
    echo" Displaying the heart pulse in a graph. \n ";
    
	break;


}

include_once('/var/www/html/capstone/footer.php');
?>
