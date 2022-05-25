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

//This block recreates the login and wallet files and repopulates it with admin information
$id = "admin";
$array = array($id => array("password" => 1234));
$json = json_encode($array);
file_put_contents("login.json", $json);

$id = "admin";
$array = array($id => array("coins" => 0));
$json = json_encode($array);
file_put_contents("wallet.json", $json);



header('Location: wallet.php');
exit;
  ?>
</body>
</html>