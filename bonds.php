<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Update Settings</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
  <div class="header">
 <h1> The Bond Exchange </h1>
</div>
  <?php
    $file = "backend.json";
    $json = json_decode(file_get_contents($file), true);
    $bondPrice = 0;
    $bondSupply = $json["bondSupply"];
    if ($bondSupply >= 0 && $bondSupply <= 5){
        $bondPrice = 1;
    }
    elseif ($bondSupply >= 6 && $bondSupply <= 10){
        $bondPrice = 2;
    }
    elseif ($bondSupply >= 11 && $bondSupply <= 15){
        $bondPrice = 3;
    }
    else {
        $bondPrice = 4;
    }
    $json["bondPrice"] = $bondPrice;
    file_put_contents($file, json_encode($json));
 ?>
 <p> Bonds are currently worth <?php echo $json["bondPrice"] ?> MooreCoins. </p>
 <form action="bondreciept.php" onsubmit="return submit()" style="align-self: center; ">
<button style="background-color: #9477ac;"> Buy Bond </button>
</form>
</body>
</html>