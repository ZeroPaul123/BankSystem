<?php
session_start();

require "security.php";

?>



<!DOCTYPE html>


<html>

<head>

<title>Home</title> 
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>



<body>

<nav>
    
<?php include("header.php"); ?>


</nav>



<center>


<?php
include "config.php";


?>



</form>


<?php


include "getInfo.php";



echo "<br><br>Your Name: $currentName <br>";
$mail = getInfoByID($currentID, "email");
echo "Your Email: $mail <br>";
echo "Your Balance: $currentBalance <br>";
echo "Your UserID: $currentID <br>";

echo "Is Admin: " . $isCurrentlyAdmin;





?>
</center>



</body>





</html>