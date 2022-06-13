<?php
// Start the session
session_start();
?>
<html>
<head> <title> Checking Login </title></head>
<body>
<?php
//Storing 
  $id = $_POST['id'];
  $password = $_POST['age'];
  $email = $_POST['email'];
  $file = "login.json";
  $json = json_decode(file_get_contents($file), true);
  //This block is for if we do not have an account for this student, make one
  if (is_null($json[$id])) {
    $json[$id] = array("password" => $password, "email" => $email);
    file_put_contents($file, json_encode($json));
  }
  
  //This block is for redirecting to a wallet if they have the right credentials, otherwise, no
  if ($json[$id]["password"] == $password) {
    header('Location: wallet.php');
    //Store the id for the session so that we can show their wallet. 
    $_SESSION["id"] = $id;
    exit;
  }
  else {
    header('Location: index.php');
    exit;
  }
  ?>
  }
</html>