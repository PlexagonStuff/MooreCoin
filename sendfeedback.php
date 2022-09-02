<?php
session_start();
?>
<?php
$login = json_decode(file_get_contents("login.json"), true);
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$from = $_POST['email'];
$to = "plexagongb@gmail.com";
$subject = "Moorecoin Feedback Form";
$message = $_POST['message'];
$headers = "From:" . $from;
if(mail($to,$subject,$message, $headers)) {
    echo "The email message was sent.";
} else {
    echo "The email message was not sent.";
}
header('Location: index.php');
exit;
?>