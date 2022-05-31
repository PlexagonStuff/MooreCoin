<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
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
 <?php } else {
   $file = "wallet.json";
   $json = json_decode(file_get_contents($file), true);
   echo var_dump($json);
 }
  ?>
  </body>
</html>