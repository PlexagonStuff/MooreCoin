<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@473&display=swap" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="Media/Moorecoinz.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Feedback Form</title>
    <link href="styles.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
  <div class="header">
 <h1> Feedback Form </h1>
</div>
  <?php
    $file = "wallet.json";
    $json = json_decode(file_get_contents($file), true);
 ?>
 <p>You've reached the Chairman of the FED. If you have any suggestions or wish to get into contact, please fill out this form. Your cooperation is greatly appreciated.</p>
 <form action="sendfeedback.php" style="align-self: center; " method="post">
 Email: <input type="email" name="email" required> <p></p>
 <textarea name="message"cols="100" rows ="6" required></textarea>
 <p></p>
 <button> Send Form </button>
</form>
</body>
</html>