<?php
session_start();
?>
<?php
//Gets a bunch of stupid annoying data here
$file = "backend.json";
$json = json_decode(file_get_contents($file), true);
$date = date("z") + 1;
$id = $_SESSION["id"];
$wallet = "wallet.json";
$jason = json_decode(file_get_contents($wallet), true);
$price = $json["bondPrice"];
$money = $jason[$id]["coins"];
$bondSupply = $json["bondSupply"];
$ir = $json["interestRate"];
$login = json_decode(file_get_contents("login.json"), true);

//If they cannot afford a bond, just re-direct back to wallet.
if ($money < $price) {
    header('Location: wallet.php');
    exit;
}
//If they can afford a bond, create the bond, and then subtract the value from their balance and total money supply
else {
    //Subtracts money from account and total money supply tracker, adds a bond to bond supply
    $money = $money - $price;
    $jason[$id]["coins"] = $money;
    $json["moneySupply"] = $json["moneySupply"] - $price;
    $bondSupply = $bondSupply + 1;
    $json["bondSupply"] = $bondSupply;
    //Create Bond
    $bond = "bonds.json";
    $bonds = json_decode(file_get_contents($bond), true);
    //Bonds are designated by the bond number, the date (to calculate interest), interest rate at minting, owner of the bond, and the price of the bond when it was bought
    $bonds[strval($bondSupply)] = array("date" => $date, "ir" => $ir, "owner" => $id, "price" => $price);
    file_put_contents($bond, json_encode($bonds));
    file_put_contents($wallet, json_encode($jason));
    file_put_contents($file, json_encode($json));
}


ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$from = "admin@moorecoin.online";
$to = $login[$id]["email"];
$subject = "Bond Reciept";
$message = "Federal Reserve of Room 605 EZBOND NO." . strval($bondSupply) . " This note certifies that " . strval($id) . " has purchased an EZBond from the Federal Reserve of Room 605 costing " . strval($price) . " MooreCoins on this day " . strval(date("r")) . " This person is entitled to their deposit plus an interest rate of " . strval($ir) . " in two weeks time. This note is the only receipt for this transaction- DO NOT LOSE.";
$headers = "From:" . $from;
if(mail($to,$subject,$message, $headers)) {
    echo "The email message was sent.";
} else {
    echo "The email message was not sent.";
}
header('Location: wallet.php');
exit;
?>