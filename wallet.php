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
    <title>Moorecoin Wallet</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <?php 
      $file = "wallet.json";
      $json = json_decode(file_get_contents($file), true);
      $settings = "backend.json";
      $jason = json_decode(file_get_contents($settings), true);
      //If we don't have a wallet (first time login), we add a new wallet (initializes three coins)
      if (is_null($json[$_SESSION["id"]])) {
        $coins = 3.0;
        $jason["moneySupply"] = $jason["moneySupply"] + 3.0;
        $json[$_SESSION["id"]] = array("coins" => $coins);
        file_put_contents($file, json_encode($json));
        file_put_contents($settings, json_encode($jason));
      }

      $file = "wallet.json";
      $json = json_decode(file_get_contents($file), true);
      $jason = json_decode(file_get_contents($settings), true);

      //Calculate Exchange Rate http://mooregb.weebly.com/ez-money-market.html has the equations
      $money = floatval($jason["moneySupply"]);
      $jason["exchangeRate"] = ((pow($money, 3))/16464000) - ((pow($money, 2) * 3)/78400) + ($money/1680) + (5/2);
      $jason["interestRate"] = (((5 * $money) /14) + 200) * 0.01;

    if ($_SESSION["id"] == "admin") {
      //If admin, go to admin menu (change balances or settings)
      echo "Hello Mr. Moore"; ?>
      <form action="updatesettings.php" method="post" autocomplete="off">
        <input type="radio" id="Settings" name="option" value="settings"> Settings
        <input type="radio" id="Balances" name="option" value="balance"> Balances
        <input type="radio" id="Check" name="option" value="check"> Check All Accounts
        <input type="submit">
      </form>
      <form>
      <button formaction="clear.php" style="background-color: #9477ac;">Clear All Data </button>
      </form>
   <?php }
    else { ?>
     <!-- This shows user information on their dashboard, and provides an option to exchange MooreCoin for summative points (add email function later) -->
    <p> <img src="Media/Mr.Moore Transparent.png"/>Hello <?php echo $_SESSION["id"] ?> You have <?php echo $json[$_SESSION["id"]]["coins"] ?> Moorecoins </p>
    <p> The current exchange rate is 1 MooreCoin to <?php echo $jason["exchangeRate"] ?> summative points </p>
    <p> The current interest rate is <?php echo (floatval($jason["interestRate"]) * 100) ?>%</p>
    <form action="bonds.php">
    <button style="background-color: #9477ac;"> Go to the Bond Market </button>
    </form>
    <?php }?>
    <?php file_put_contents($settings, json_encode($jason)); ?>
  </body>
</html>