<?php
session_start();
include_once('/var/www/html/capstone/lib.php');
connect($db);
require_once('/var/www/html/capstone/jpgraph-3.5.0b1/src/jpgraph.php');
/*
Include the module for creating line graph plots.
*/
//require_once('/var/www/html/capstone/jpgraph-3.5.0b1/src/jpgraph_line.php');

$xArray=array();
$yArray=array();

$ydata = array(87,95,95,95,97,99,110,110);

/*
We're not going to set the values for the X axis.
*/
$xdata = array(0, 1, 2, 3, 4, 5, 6, 7);
$ownerid = 4;
    if($stmt=mysqli_prepare($db, "SELECT time, rate from heart WHERE ownerid = ? LIMIT 100")) {
                mysqli_stmt_bind_param($stmt, "s" , $ownerid);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $time, $rate);
                $i=0;
    while(mysqli_stmt_fetch($stmt)) {
        $time=htmlspecialchars($time);
        $rate=htmlspecialchars($rate);
        $yArray[]=$time;
        $xArray[]=intval($rate);


        }}

print_r($yArray);
print_r($xArray);
print_r($ydata);

?>
