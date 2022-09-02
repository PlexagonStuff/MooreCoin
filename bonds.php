<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@473&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="Media/Moorecoinz.png">
    <meta name="viewport" content="width=device-width">
    <title>Update Settings</title>
    <link href="styles.css" rel="stylesheet" type="text/css" />
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
<button > Buy Bond </button>
</form>
</body>
</html>