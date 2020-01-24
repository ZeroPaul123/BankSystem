<?php

require "config.php";


if (!function_exists('getInfoByID')) {
    
function getInfoByID($int, $type) {
    global $db;
    global $conn;


    switch($type) {

        case "name":
            $name = "";
            $sql2 = "SELECT Name AS Name from Persons WHERE ID=$int";
            $result = $conn->query($sql2);
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    foreach($row as $yourmom){

                    $name = $yourmom;
                    

                    }
                }
            } else {
                $name = "user does not exist";
            }

            return $name;
        break;
        case "balance":
            $name = "";
            $sql2 = "SELECT Balance AS Balance from Persons WHERE ID=$int";
            $result = $conn->query($sql2);
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    foreach($row as $yourmom){

                    $balance = $yourmom;
                    

                    }
                }
            } else {
                $balance = "user does not exist";
            }

            return $balance;
        break;

        case "email":
            $name = "";
            $sql2 = "SELECT Email AS Email from Persons WHERE ID=$int";
            $result = $conn->query($sql2);
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    foreach($row as $yourmom){

                    $email = $yourmom;
                    

                    }
                }
            } else {
                $email = "user does not exist";
            }

            return $email;
        break;

        case "idbyemail":
            $name = "";
            $sql2 = "SELECT ID AS ID from Persons WHERE Email='$int'";
            $result = $conn->query($sql2);
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    foreach($row as $yourmom){

                    $email = $yourmom;
                    

                    }
                }
            } else {
                $email = "user does not exist";
            }

            return $email;
        break;
    }
    
}
}



$id = $_SESSION["currentID"];

$sql = "SELECT Balance AS Balance from Persons WHERE ID=$id";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        foreach($row as $yourmom){

        $currentBalance = $yourmom;
        

        }
    }
} else {
    $currentBalance = "not_logged_in";
}



$sql = "SELECT isAdmin AS admin from Persons WHERE ID=$id";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        foreach($row as $yourmom){

        $isCurrentlyAdmin = $yourmom;
        

        }
    }
} else {
    
}

$sql = "SELECT Name AS Name from Persons WHERE ID=$id";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        foreach($row as $yourmom){

        $currentName = $yourmom;
        

        }
    }
} else {
    $currentName = "not_logged_in";
}


?>