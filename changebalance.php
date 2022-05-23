<?php
// Start the session
session_start();
?>
<html>
<head> <title> Updating Balances </title></head>
<body>
<?php
//Storing 
  $id = $_POST['id'];
  $amount = floatval($_POST['amount']);
  $file = "wallet.json";
  $json = json_decode(file_get_contents($file), true);
  //if the id does not show up and was not created correctly, just go back to start
  if (is_null($json[$id])) {
    header('Location: wallet.php');
    exit;
  }
  else {
    $coins = $json[$id]["coins"];
    $json[$id]["coins"] = $coins + $amount;
    file_put_contents($file, json_encode($json));
  }
  header('Location: wallet.php');
exit;
  ?>
</body>
</html>