<?php

session_start();
include_once('lib.php'); 
include_once('userheader.php');
//connect($db);


switch($s){
    //main page for users
case 0;
default:
    $name= $_SESSION['name'];
    echo"<article class=\"box post\">
        <header>
            <h2>Users Main Page</h2>
            <p>Welecome $name </p>
        </header>
        <p> 
        <table style=\"width:100%\">
            <tr>
                <td> <center><img src=\"img/location.png\" alt=\"location\" height=\"120\" width=\"120\"> <br><a href=\"location.php\">Location tracking</a></center></td>
                 <td> <center><img src=\"img/heart.png\" alt=\"heart\" height=\"120\" width=\"120\"> <br> <a href=\"heart.php\">Heart pulse monitaring</a></center></td>
                
            </tr>
        </table>  
        </p>						
        </article>";
    
	break;    

}

include_once('footer.php');
?>
