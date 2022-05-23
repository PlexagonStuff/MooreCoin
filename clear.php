<?php
// Start the session
session_start();
?>
<html>
<head> <title> Updating Balances </title></head>
<body>
<?php
//Storing 
$clear = fopen("backend.json", 'r');
fclose($clear);
unlink("backend.json");
$clear = fopen("wallet.json", 'r');
fclose($clear);
unlink("login.json");
header('Location: wallet.php');
exit;
  ?>
</body>
</html>