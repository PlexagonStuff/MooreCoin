<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@473&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Update Settings</title>
    <link href="styles.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
  <?php
  $option = $_POST['option'];
  if ($option == "settings") {?>
    <form action="changebackend.php" method="post" autocomplete="off">
    <p>Exchange Rate (Moore to Summative) <input type="text" name="exchange" /></p>
    <p>Interest Rate <input type="text" name="interest"/></p>
    <p>Compound Rate (in weeks) <input type ="text" name = "compound"/></p>
    <input type="submit">
    </form>
 <?php }
  elseif ($option == "balance"){ ?>
    <form action="changebalance.php" method="post" autocomplete="off">
        <p>Type Student ID of balance you wish to change <input type="text" name="id"/></p>
        <p> Amount added or taken away (taken away is negative) <input type="text" name="amount"/>
        <input type="submit">
  </form>
 <?php } else if ($option == "check")  {
   $file = "wallet.json";
   $json = json_decode(file_get_contents($file), true);
   echo var_dump($json);
 }
 else if ($option == "log")  {
  $file = "login.json";
  $json = json_decode(file_get_contents($file), true);
  echo var_dump($json);
}
else  {
  $file = "scenario.json";
  $json = json_decode(file_get_contents($file), true);
  echo var_dump($json);
}
  ?>
  </body>
</html>