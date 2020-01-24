<?php
session_start();

include "config.php";
require "getInfo.php";
require "requireAdmin.php";

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


<body>

<nav>

<?php include("header.php"); ?>


</nav>
<br>
<div class="article-title">Database</div><br><br><br>

<center>

<input type="test" class="search-button" id="myInput" onkeyup="myFunction()" placeholder="Search for name">

<?php
include "listUsers.php";
echo $html_table;
?>

</div>
</center>




<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

</body>