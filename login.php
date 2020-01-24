<?php session_start(); ?>
<html>
<header>

<title> Login </title>
<link rel="stylesheet" href="css/style.css">

</header>

<body style="overflow: hidden">


<nav>

<?php include("header.php"); ?>

</nav>

<?php

include "config.php";



if(!empty($_SESSION["logged_in"])) {
    include "getInfo.php";
    
   
die("<div class='output'>Hey $currentName, you are already logged in. Click <a class='link' href='./myaccount.php'>here</a> to get to the home page.</div>");

} 
  

if(isset($_POST["loginEmail"])) {


    $loginEmail = $_POST["loginEmail"];   
    $loginPassword = $_POST["loginPassword"];
    $sql = "SELECT * FROM Persons WHERE Email='$loginEmail' and Pass='$loginPassword'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0){

        foreach($result as $row) {

            $currentUser = $row["Name"];
            $_SESSION["currentID"] = $row["ID"];

            
          }
    $_SESSION["logged_in"] = "true";
    
    die("<div class='output'>You are now logged in $currentUser, click <a class='link' href='./myaccount.php'>here</a> to get to the home page.</div>");
    
} else {

    echo("<div class='output'>Wrong Password or Email</div>");

}
}


?>




<center>

<form method="POST" style="margin-top: 15%">

<input type="email" name="loginEmail" placeholder="E-Mail"><br>
<input type="password" name="loginPassword" placeholder="Password"><br>
<div class="register">Not registered yet? <a class="link" href="register.php">Register now.</a></div><br>
<input type="submit" value="Login">

</form>

</center>

</body>

</html>

