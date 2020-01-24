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

    

   

die("<div class='output'>Hey $currentName, you are already logged in. Click <a class='link' href='./sqlquerry.php'>here</a> to get to the home page.</div>");



} 



$name = $_POST["registerName"];

$adress = $_POST["registerAdress"];

$email = $_POST["registerEmail"];

$password = md5($_POST["registerPassword"]);



if (isset($_POST["registerName"])) {


    $sql = "SELECT Email FROM Persons WHERE Email = '$email'";
    $result = $conn->query($sql);



    if ($result->num_rows > 0){
        die("<div class='output'>This Email is already registered. Please <a class='link' href='login.php'>login</a>.</div>");
    }



    $sql = "INSERT INTO Persons(Name, Email, Adress, Pass) VALUES('$name', '$email', '$adress', '$password')";

    $result = $conn->query($sql);







}

?>



<center>



<form method="POST" style="margin-top: 15%">



<input type="text" name="registerName" placeholder="Name"><br>

<input type="text" name="registerAdress" placeholder="Adress"><br>

<input type="email" name="registerEmail" placeholder="E-Mail"><br>

<input type="password" name="registerPassword" placeholder="Password"><br>

<div class="register">Already registered? <a class="link" href="login.php">Login now.</a></div><br>

<input type="submit" value="Register">



</form>



</center>



</body>



</html>



