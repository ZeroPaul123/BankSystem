
<?php
include "config.php";



$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM Persons";
$result = $conn->query($sql);
$html_table = '<table id="myTable" class="data" cellspacing="0" cellpadding="2"><tr><th>Name</th><th>ID</th><th>Email</th><th>Balance</th><th>is Admin</th><th>Adress</th></tr>';

foreach($result as $row) {
    $html_table .= '<tr><td>' .$row['Name']. '</td><td>' .$row['ID']. '</td><td>' .$row['Email']. '</td><td>' .$row['Balance']. '</td><td>' .$row['isAdmin']. '</td><td>' .$row['Adress']. '</td></tr>';
  }


  $html_table .= '</table>';           // ends the HTML table

 
 ?>