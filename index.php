<!DOCTYPE html>
<html>
 <head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@473&display=swap" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="Media/Moorecoinz.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Welcome to MooreCoin!</title>
  <?php
  $FILE_TIME = filemtime("styles.css");
  $CSS_LINK  = "styles.css?version=$FILE_TIME";
?>
  <link href="<?php echo $CSS_LINK?>" rel="stylesheet" type="text/css" />
 </head>
 <body>
     <div class="header">
 <h1> MooreCoin Online Wallet </h1>
</div>
<div class="row">
    <div class="column">
      <p style="color: black;"></p>
    </div>
    <div class="column">
        <h2> Login </h2>
        <form action="redirect.php" method="post" autocomplete="off" >
            <p>Student ID: <input type="text" name="id" placeholder="000000" maxlength="6" required /></p>
            <p>Email: <input type="email" name="email" placeholder="test@gmail.com" /></p>
            <p>Password: <input type="password" name="age" placeholder="********" required /></p>
            <p><input type="submit" class="" style="align-self: center;"/></p>
           </form>
           <p> Email only required on first login </p>
           <img src="Media/MooreDollar.png">
        </div>
    
    <div class="column">
      <p style="color: black;"></p> </div>
  </div>
  <div class="footer">
      <p><a href="https://github.com/PlexagonStuff/MooreCoin">Source Code</a> <a href="feedback.php">Feedback Form</a> </p>
  </div>
 </body>
</html>