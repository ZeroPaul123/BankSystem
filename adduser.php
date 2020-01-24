<?php
session_start();

require "security.php";
require "requireAdmin.php"
?>



<!DOCTYPE html>


<html>

<head>

<title>Add User</title> 
<link rel="stylesheet" type="text/css" href="css/style.css">

<style>
body {
    overflow: hidden;
}
</style>



</head>


<?php
include "config.php";



$conn = new mysqli($servername, $username, $password, $dbname);

$name = $_POST["Name"];

$email = $_POST["Email"];

$balance = $_POST["Balance"];

$pass = $_POST["Pass"];

$adress = $_POST["Adress"];

$deleteID = $_POST["deleteID"];


if(isset($_POST["deleteID"])){
$sql = "DELETE FROM Persons WHERE ID=$deleteID";
if ($conn->query($sql) === TRUE) {
  echo "User Deleted Succesfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


}
if(isset($_POST["Name"]) && isset($_POST["Pass"])){
$sql = "INSERT INTO Persons(Name, Email, Balance, Pass, Adress) VALUES('$name', '$email', '$balance', '$pass', '$adress')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}





}


?>



<body>

<nav>

<?php include("header.php"); ?>

</nav>

<br><br>
<div class="article-title">User Customization</div>


<div class="col-container">
  <div class="col">
  <form method="POST" style="margin-left: 60%; margin-top: 10%">

    <span><input type="text" name="Name" placeholder="Name"></span><br>
    <span><input type="text" name="Email" placeholder="E-Mail"></span><br>

    <span><input type="number" name="Balance" placeholder="Balance"></span><br>
    <span><input type="text" name="Pass" placeholder="Pass"></span><br>
    <span><input type="text" name="Adress" placeholder="Adress"></span><br>
    <input type="submit" value="Add">

    </form>
  </div>

  <div class="col">
  <form method="POST" style="margin-right: 40%; margin-top: 10%">

    <span><input type="text" name="deleteID" placeholder="AccountID"></span><br>
    <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this record permanently?')">

    </form>
  </div>
</div>



				
			



</body>