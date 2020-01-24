<?php
session_start();

include "config.php";
require "getInfo.php";
require "requireAdmin.php";
include "statistics.php";
?>



<!DOCTYPE html>


<html>

<head>

<title>List Log</title> 
<link rel="stylesheet" type="text/css" href="css/style.css">

<style>
body {
    overflow: auto;
}
</style>

</head>


<body>

<nav>

<?php include("header.php"); ?>


</nav>
<br>
<div class="article-title">Transaction Log</div><br><br><br>

<center>

<input type="test" class="search-button" id="myInput" onkeyup="myFunction()" placeholder="Search for sender Email">

<?php



$sql = "SELECT * FROM transaction_log ORDER BY timestamp DESC LIMIT 80";
$result = $conn->query($sql);
$html_table = '<table id="myTable" class="data" cellspacing="0" cellpadding="2"><tr><th>Sender Email</th><th> Receiver Email</th><th>Ammount</th><th>Timestamp</th></tr>';

foreach($result as $row) {
    $html_table .= '<tr><td>' .$row['senderEmail']. '</td><td>' .$row['receiverEmail']. '</td><td>' .$row['ammountTransfered']. '</td><td>' .$row['timestamp']. '</td></tr>';
  }


  $html_table .= '</table>';           // ends the HTML table
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