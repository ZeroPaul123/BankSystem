<?php
include "config.php";

$conn = new mysqli($servername, $username, $password, $dbname);
$sql2 = "SELECT COUNT(*) AS MAX FROM Persons";
$result = $conn->query($sql2);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        foreach($row as $yourmom){

        $registeredUsers = $yourmom;
        

        }
    }
} else {
    echo "0 results";
}


$sql2 = "SELECT COUNT(*) AS MAX FROM transaction_log";
$result = $conn->query($sql2);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        foreach($row as $yourmom){

        $transaction_logs_amount = $yourmom;
        

        }
    }
} else {
    echo "0 results";
}



$sql2 = "SELECT AVG(Balance) FROM Persons";
$result = $conn->query($sql2);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        foreach($row as $yourmom){

        $avgBalance = round($yourmom);
        

        }
    }
} else {
    echo "0 results";
}


$sql2 = "SELECT SUM(Balance) AS MAX FROM Persons";
$result = $conn->query($sql2);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        foreach($row as $yourmom){

        $totalBalance = $yourmom;
        

        }
    }
} else {
    echo "0 results";
}




$sql2 = 'SELECT Name FROM Persons WHERE BALANCE=(SELECT max(BALANCE) FROM Persons)';
$result = $conn->query($sql2);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        foreach($row as $yourmom){

        $richestMember = $yourmom;
        

        }
    }
} else {
    echo "0 results";
}


$sql2 = 'SELECT Name FROM Persons WHERE BALANCE=(SELECT MIN(BALANCE) FROM Persons)';
$result = $conn->query($sql2);
if ($result->num_rows == 1) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        foreach($row as $yourmom){

        $poorestMember = $yourmom;
        

        }
    }
} else {
    $poorestMember = "More than one result";
}





$conn->close();

?>