<?php
   $to = "eng.faisalturdi@gmail.com";
   $subject = "Registering new owner";
   $message = "This is simple text message.";
   $header = "From:faisal.khan@colorado.edu \r\n";
   $retval = mail ($to,$subject,$message,$header);
   if( $retval == true )  
   {
      echo "Message sent successfully...";
   }
   else
   {
      echo "Message could not be sent...";
   }
?>
