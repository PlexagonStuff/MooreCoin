<?php
// Start the session
session_start();
?>
<html>
<head> <title> Updating Balances </title></head>
<body>
<?php
//This opens the file for reading only, then closes it so that it can be deleted by the unlink function
$clear = fopen("wallet.json", 'r');
fclose($clear);
unlink("wallet.json");
$clear = fopen("login.json", 'r');
fclose($clear);
unlink("login.json");

$clear = fopen("backend.json", 'r');
fclose($clear);
unlink("backend.json");
$clear = fopen("bonds.json", 'r');
fclose($clear);
unlink("bonds.json");

//This block recreates the login and wallet files and repopulates it with admin information
$id = "admin";
$array = array($id => array("password" => 1234));
$json = json_encode($array);
file_put_contents("login.json", $json);

$id = "admin";
$array = array($id => array("coins" => 0));
$json = json_encode($array);
file_put_contents("wallet.json", $json);

//This block repopulates the settings as blank, as they will be updated when people join MooreCoin for the first time.
$array = array("exchangeRate" => 0, "interestRate" => 0, "moneySupply" => 0, "bondSupply" => 0, "bondPrice" => 0);
$json = json_encode($array);
file_put_contents("backend.json", $json);


$array = array();
$json = json_encode($array);
file_put_contents("bonds.json", $json);






header('Location: wallet.php');
exit;
  ?>
</body>
</html>