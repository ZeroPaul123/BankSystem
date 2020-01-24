<?php
session_start();

require "security.php";
require "requireAdmin.php"
?>



<!DOCTYPE html>


<html>

<head>

<title>Executer</title> 
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>



<body>

<nav>

    
<?php include("header.php"); ?>


</nav>


<center>

<form method="POST">

<br><br><br><br><br>

<TEXTAREA name="guti" ROWS="10" COLS="35" placeholder="Your query.."></TEXTAREA> <br>

<input type="submit" value="Submit Query">


<?php
include "config.php";

$conn = new mysqli($servername, $username, $password, $dbname);
$sql = $_POST["guti"];

if(isset($_POST["guti"])){
$response = $conn->query($sql);
echo $response;
}
?>



</form>


<?php






?>
</center>



</body>





</html>