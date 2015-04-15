<?php
include_once('/var/www/html/capstone/lib.php'); 
connect($db);
#post.php?mac=""&long="111"&att="222"&rate="00"&emer="NO"
isset ($_REQUEST['mac'])?$mac=strip_tags($_REQUEST['mac']):$mac="";
isset ($_REQUEST['long'])?$long=strip_tags($_REQUEST['long']):$long="";
isset ($_REQUEST['att'])?$att=strip_tags($_REQUEST['att']):$att="";
isset ($_REQUEST['rate'])?$rate=strip_tags($_REQUEST['rate']):$rate="";
isset ($_REQUEST['emer'])?$emer=strip_tags($_REQUEST['emer']):$emer="";

$mac=htmlspecialchars($mac);
echo $mac;
if($stmt=mysqli_prepare($db, "SELECT ownerid FROM owners WHERE device_mac =?")) {
    mysqli_stmt_bind_param($stmt, "s" , $mac);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $ownerid);

    while(mysqli_stmt_fetch($stmt)) {
        $ownerid=htmlspecialchars($ownerid);
	echo $ownerid;}
}
else {
    echo "Error with database";}


$long=mysqli_real_escape_string($db, $long);
$att=mysqli_real_escape_string($db, $att);

if($stmt=mysqli_prepare($db,"INSERT INTO location set locationid='', ownerid=?, longitude=?, attitude=?, time=now(), address=''")) {
		mysqli_stmt_bind_param($stmt,"sss", $ownerid, $long, $att);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);}

$rate=mysqli_real_escape_string($db, $rate);

if($stmt=mysqli_prepare($db,"INSERT INTO heart set rateid='', ownerid=?, time=now(), rate=?")) {
		mysqli_stmt_bind_param($stmt,"ss", $ownerid, $rate);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);}




?>
