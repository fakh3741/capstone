<?php

session_start();
include_once('lib.php'); 
include_once('ownerheader.php');
//connect($db);


switch($s){
    //main page for the owners
case 0;
default:
    $ownername= $_SESSION['name'];
    echo"<article class=\"box post\">
        <header>
            <h2>Owners Main Page</h2>
            <p>Welecome $ownername </p>
        </header>
        <p> 
        <table style=\"width:100%\">
            <tr>
                <td><center> <img src=\"img/profile.png\" alt=\"profile\" height=\"85\" width=\"85\"> <br> Manage your profile </center></td>
                <td> <center><img src=\"img/adduser.png\" alt=\"adduser\" height=\"85\" width=\"85\"> <br> Add users </center></td>
                <td> <center><img src=\"img/location.png\" alt=\"location\" height=\"85\" width=\"85\"> <br><a href=\"location.php\">Location tracking</a></center></td>
            </tr>
            <tr>
                <td> <center><img src=\"img/heart.png\" alt=\"heart\" height=\"85\" width=\"85\"> <br> <a href=\"heart.php\">Heart pulse monitaring</a></center></td>
                <td> <center><img src=\"img/log.png\" alt=\"log\" height=\"85\" width=\"85\"> <br> Event log</center></td>
        </table>
        
        </p>						
        </article>";
    
	break;

//Edit the profile
case "1":
    echo" Setup the owner profile. \n
        <table style=\"width:100%\">
    <form method=post action=profile.php?s=2>
    <tr><td> Heart rate alert: </td> <td> Max: <input type=\"text\" id=\"maxrate\" name=\"maxrate\"> </td></tr>
    <tr><td>  </td> <td> Min: <input type=\"text\" id=\"minrate\" name=\"minrate\"> </td></tr>
    <tr><td> Emergency alert: </td> <td> <input type=\"text\" id=\"emergencyalert\" name=\"emergencyalert\"> </td></tr>
    <tr><td> Heart alert: </td> <td> <input type=\"text\" id=\"heartalert\" name=\"heartalert\"> </td></tr>
    <tr><td> Light alert: </td> <td> <input type=\"text\" id=\"lightalert\" name=\"lightalert\"> </td></tr>
    <tr><td></td><td><input type=\"submit\" value=\"Update profile\"></td></tr>
    </form>
    </table>";
	break;

//Save the profile
case "2":
    $ownerid=mysqli_real_escape_string($db , $ownerid);
	$max_heart_rate=mysqli_real_escape_string($db , $maxrate);
	$min_heart_rate=mysqli_real_escape_string($db , $minrate);
	$emergency_alert=mysqli_real_escape_string($db, $emergencyalert);
    $heart_alert=mysqli_real_escape_string($db, $heartalert);
    $light_alert=mysqli_real_escape_string($db, $lightalert);
	if($stmt=mysqli_prepare($db,"INSERT INTO owner_profile set profileid='', ownerid=?, max_heart_rate=?, min_heart_rate=?, emergency_alert=?, heart_alert=?, light_alert=?")) {
		mysqli_stmt_bind_param($stmt,"ssssss", $ownerid, $max_heart_rate, $min_heart_rate, $emergency_alert, $heart_alert, $light_alert);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
    }

	echo" The owner profile has been modefied. \n
	   <a href=add.php?s=2&ownerid=$ownerid> Add new user under the owner profile </a> \n
       <a href=main.php?ownerid=$ownerid> Continue to the owner main page </a>";
	break;
    
//Display the pofile
case "3":
	
	break;

}

include_once('footer.php');
?>
