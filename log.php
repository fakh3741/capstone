<?php

session_start();
include_once('lib.php'); 
connect($db);
isdigit($s);
if($_SESSION['user']=="owner"){
	include_once('ownerheader.php');
}
if($_SESSION['user']=="user"){
	include_once('userheader.php');
}
switch($s){
case 0;
default:
    
    $ownerid = $_SESSION['ownerid'];
    $ownerid=htmlspecialchars($ownerid);
    if($stmt=mysqli_prepare($db, "SELECT time, longitude, attitude from location WHERE ownerid = ? LIMIT 1")) {
                mysqli_stmt_bind_param($stmt, "s" , $ownerid);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $time, $longitude, $attitude);
         while(mysqli_stmt_fetch($stmt)) {
        $time=htmlspecialchars($time);
        $longitude=htmlspecialchars($longitude);
        $attitude=htmlspecialchars($attitude);
         }
    }

    echo"<article class=\"box post\">
        <header>
            <h2>Event log</h2>
            <p>Events summary:</p>
        </header>
        <p> 
        <center>
        Summary diagram
        
        </p>
        <header>
        <h2></h2>
            <p>Last events:</p>
            </header>
            <p>
            <table style=\"width:100%\">
            <tr> <td> Time </td> <td> Event type </td> <td> Action </td> </tr>";
    
    if($stmt=mysqli_prepare($db, "SELECT time, longitude, attitude from location WHERE ownerid = ?")) {
                mysqli_stmt_bind_param($stmt, "s" , $ownerid);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $time, $longitude, $attitude);
    
        while(mysqli_stmt_fetch($stmt)) {
        $time=htmlspecialchars($time);
        $longitude=htmlspecialchars($longitude);
        $attitude=htmlspecialchars($attitude);
        echo" <tr>
                <td> $time </td>
                <td> $longitude </td>
                <td> $attitude </td>
                <td> <a href=location.php?s=1&long=$lonitude&att=$attitude> Get the location </a> </td> </tr>";
            }
    }
	else { 
        echo"Can not connect to DB";}
          echo"  </table> </p>
        </article>";
    
    
    
    
	break;


case "1":
    echo" Show the current location on a map. \n ";
    
	break;


}

include_once('footer.php');
?>
