<?php
session_start();



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



?>




<div class="article-title">

Home

<br><br><br>
</div>

<?php

include "statistics.php";
include "getInfo.php";


if(!empty($_SESSION["logged_in"])){


    echo "<br><br><br><br><br>Hello $currentName, How are you ?<br>";
   if($isCurrentlyAdmin == 1) {
       echo "<strong>You are Admin!</strong> <br>";  
    } else {
       echo "<strong>You are not an Admin!</strong><br>";
   }
}
echo "<br><br><br>Registered Users: <strong> $registeredUsers </strong><br>";
echo "Total ammount of Balance: <strong> $totalBalance </strong><br>";
echo "Average Balance: <strong> $avgBalance </strong> <br>";
echo "Richest Member: <strong> $richestMember </strong><br>";
echo "Transactions in database: <strong> $transaction_logs_amount </strong>";








?>
</center>



</body>





</html>