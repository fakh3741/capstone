<?php

session_start();
include_once('lib.php'); 
include_once('header.php');
//connect($db);
isdigit($s);

switch($s){
case 0;
default:
    echo"<script type=\"text/javascript\" 
           src=\"http://maps.google.com/maps/api/js?sensor=false\"></script>";
    
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
            <h2>Location Tracking</h2>
            <p>Last location:</p>
        </header>
        <p> 
        <center>
        <div id=\"map\" style=\"width: 600px; height: 400px\"></div> </center>

   <script type=\"text/javascript\"> 
      var myOptions = {
         zoom: 15,
         center: new google.maps.LatLng(40.007694, -105.265873),
         mapTypeId: google.maps.MapTypeId.ROADMAP
      }

      var map = new google.maps.Map(document.getElementById(\"map\"), myOptions);
   </script>
        
        </p>
        <header>
        <h2></h2>
            <p>Last 50 location coordinates:</p>
            </header>
            <p>
            <table style=\"width:100%\">
            <tr> <td> Time </td> <td> Longitude </td> <td> Attitude </td> <td> Show it on map </td> </tr>";
    
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
