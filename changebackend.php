<?php
// Start the session
session_start();
?>
<html>
<head> <title> Updating Settings </title></head>
<body>
<?php
//Storing 
  $exchange = $_POST["exchange"];
  $interest = $_POST["interest"];
  $compound = $_POST["compound"];
  //Getting the file and changing the values
  $file = "backend.json";
  $json = json_decode(file_get_contents($file), true);
  $json["exchangeRate"] = $exchange;
  $json["interestRate"] = $interest;
  $json["compoundingRate"] = $compound;
  file_put_contents($file, json_encode($json));
  //Exiting back to wallet
  header('Location: wallet.php');
    exit;
  ?>
  }
</html>