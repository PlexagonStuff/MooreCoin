<?php
session_start();
?>
<?php
$points = abs(floatval($_POST['point']));
$coin = json_decode(file_get_contents("wallet.json"), true);
$settings = json_decode(file_get_contents("backend.json"), true);
$summative = 0;
$sumpoints = 0;
echo var_dump($_POST);
//If the exchange all was selected, exchange all coins, otherwise, just don't.
if (isset($_POST['all'])) {
        $summative = $coin[$_SESSION["id"]]["coins"];
} 
else if (isset($_POST['some'])) {
    if (abs(floatval($points)) <= $coin[$_SESSION["id"]]["coins"]){
        $summative = floatval($points);
    }
    else {
        header('Location: wallet.php');
        exit;
    }
}
//If the exchange all was selected, exchange all coins, otherwise, just don't.
/*if ($points == "all") {
    $summative = $coins[$_SESSION["id"]]["coins"];
}
else {
    if (floatval($points) <= $coins[$_SESSION["id"]]["coins"]){
        $summative = floatval($points);
    }
    else {
        header('Location: wallet.php');
        exit;
    }
}*/ 

echo $points;
echo $summative;
$coin[$_SESSION["id"]]["coins"] = $coin[$_SESSION["id"]]["coins"] - $summative;
$settings["moneySupply"] = $settings["moneySupply"] - $summative;

$sumpoints = $summative * $settings["exchangeRate"];

file_put_contents("wallet.json", json_encode($coin));
file_put_contents("backend.json", json_encode($settings));

ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$from = "admin@moorecoin.online";
$to = "pmoore@gbcs.org";
$subject = "Summative Point Notice";
$message = strval($_SESSION["id"]). " has exchanged " . strval($summative) . " MooreCoins for " . strval($sumpoints) . " points at an exchange rate of " . strval($settings["exchangeRate"]);
$headers = "From:" . $from;
if(mail($to,$subject,$message, $headers)) {
    echo "The email message was sent.";
} else {
    echo "The email message was not sent.";
}
header('Location: wallet.php');
exit; 
?>