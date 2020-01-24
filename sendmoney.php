<?php session_start(); 



include "config.php";
require "security.php";
include "getInfo.php";

?>

<html>

<head>



<title> Send Money </title>

<link rel="stylesheet" href="css/style.css">



</head>

<body style="overflow: hidden">



<nav>



<?php include("header.php"); ?>



</nav>
<center>
<br>
<?php



echo "Your current balance: <strong> $currentBalance </strong>";



if(isset($_POST["sendEmail"])) {
    $email = $_POST["sendEmail"];
    $balance = $_POST["sendBalance"];

    if (($currentBalance - $balance) >= 0 && $balance >= 0) {
        $sql = "SELECT Email FROM Persons WHERE Email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1){
            $sql = "UPDATE Persons SET balance = ($currentBalance - $balance) WHERE ID = $currentID";
            $result = $conn->query($sql);

            if (!$result) {
                die("ERROR SUBTRACTING MONEY");
            }


            $sql = "UPDATE Persons SET Balance = Balance + $balance WHERE Email = '$email'";
            $result = $conn->query($sql);

            if ($result) {
                unset($_POST["sendEmail"]);
                unset($_POST["sendBalance"]);
                unset($_REQUEST);
                $_POST["sendEmail"] = "";
                $_POST["sendBalance"] = "";
                $timestamperino = date('Y-m-d H:i:s');



                $receiverID = getInfoByID($email, "idbyemail");
                $currentEmail = getInfoByID($currentID, "email");
                $sql = "INSERT INTO transaction_log (senderID, receiverID, ammountTransfered, timestamp, senderEmail, receiverEmail) VALUES ($currentID, $receiverID, $balance, '$timestamperino', '$currentEmail', '$email')";
                $result = $conn->query($sql);
                if($result){
                echo "<div class='output'>You have sent $email $balance$</div>";
                }

            }


        } else { echo "<div class='output'>This email does not exist</div>";}
    } else { echo "<div class='output'>You do not have enough balance</div>";}
}

?>


<center>


<form method="POST" style="margin-top: 15%">



<input type="email" name="sendEmail" placeholder="Email" required><br>

<input type="number" min="0" name="sendBalance" placeholder="Balance" required><br>

<input type="submit" value="Send Money" onclick="return confirm('Are you sure you want to send this money?'")>



</form>



</center>



</body>



</html>



