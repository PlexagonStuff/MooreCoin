<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="icon" type="image/x-icon" href="Media/Moorecoinz.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Update Settings</title>
    <link href="styles.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
  <div class="header">
 <h1> SUMMATIVE POINTS WOOO! </h1>
</div>
  <?php
    $file = "wallet.json";
    $json = json_decode(file_get_contents($file), true);
 ?>
 <p> You currently have <?php echo $json[$_SESSION["id"]]["coins"] ?> MooreCoins. </p>
 <form action="summativereciept.php" style="align-self: center; " method="post">
 <input type="text" name="point" maxlength="6"/>
 <button  name ="some" value="all"> Exchange Coins </button>
 <button  name ="all" value="all"> Exchange All Coins </button>
</form>
</body>
</html>