<?php
session_start();
if(empty($_SESSION['logged_in']))
{
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/bank/login.php');
    exit;
} 

include "getInfo.php";




$currentID = $_SESSION["currentID"];

?>