<?php
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$from = "admin@moorecoin.online";
$to = "plexagongb@gmail.com";
$subject = "Summative Point Notice";
$message = $_SESSION["id"]."PHP mail works just fine";
$headers = "From:" . $from;
if(mail($to,$subject,$message, $headers)) {
    echo "The email message was sent.";
} else {
    echo "The email message was not sent.";
}
?>