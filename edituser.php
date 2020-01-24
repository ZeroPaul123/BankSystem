<?php

session_start();
require "security.php";
require "requireAdmin.php"

?>
<html>

<head> 

<title>Edit User</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body style="overflow: hidden">


<nav>

<?php include("header.php"); ?>


</nav>



<?php

include "config.php";

$conn = new mysqli($servername, $username, $password, $dbname);


if(isset($_POST["emailtofind"]) || isset($_POST["usertofind"])) {

if(!empty($_POST["emailtofind"])) {

  $emailvar = $_POST["emailtofind"];
  $sql = "SELECT * FROM Persons WHERE Email='$emailvar'";
 
  $result = $conn->query($sql);


}

if(!empty($_POST["usertofind"])) {
  
  $uservar = $_POST["usertofind"];
  
  $sql = "SELECT * FROM Persons WHERE ID=$uservar";
  $result = $conn->query($sql);

  
}

foreach($result as $row) {
  $var6 = $row["isAdmin"];
  $var5 = $row["Email"];
  $var4 = $row['ID'];
  $var3 = $row['Name'];
  $var2 = $row['Balance'];
  $var1 = $row['Adress'] ;

 }
}


?>
<br><br>

<?php


$editEmail = $_POST["editEmail"];
$editName = $_POST["editName"];
$editID = $_POST["editID"];
$editBalance = $_POST["editBalance"];
$editAdress = $_POST["editAdress"];
$editAdmin = $_POST["editAdmin"];



if (isset($_POST["editID"])){


$sql = "UPDATE Persons SET Name='$editName', Email='$editEmail', Balance=$editBalance, Adress='$editAdress', isAdmin=$editAdmin WHERE ID=$editID";



if ($conn->query($sql) === TRUE) {
    echo "<div class='article-success'>User $editID has been updated</div>";
} else {
    echo "Error updating record: " . $conn->error;
}
}
?>

<div class="article-title">User Manipulation</div>

<div class="col-container">
  <div class="col">
  <form method="POST" style="margin-left: 60%; margin-top: 10%">

    <input type="text" value="<?php echo $var4; ?>" name="editID" readonly="readonly" placeholder="Account ID" /> <br>
    <input type="text" value="<?php echo $var3; ?>" name="editName" placeholder="Name" /><br>
    <input type="text" value="<?php echo $var5; ?>" name="editEmail" placeholder="E-Mail" /><br>

    <input type="text" value="<?php echo $var2; ?>" name="editBalance" placeholder="Balance" /><br>
    <input type="number" min="0" max="1" value="<?php echo $var6; ?>" name="editAdmin" placeholder="is Admin" /><br>
    <!-- Admin: <input type="checkbox" <?php echo 'checked="checked"'; ?>> -->
    <input type="text" value="<?php echo $var1; ?>" name="editAdress" placeholder="Adress" /><br>
    

    <input type="submit" value="Update Record">

    </form>
  </div>

  <br>
  <div class="col">
  <form method="POST" style="margin-right: 40%; margin-top: 10%">

    <input type="number" name="usertofind" placeholder="Enter Account ID"><br>
    <div class="or">or</div>
    <input type="email" name="emailtofind" placeholder="Enter Email"><br>
    <input type="submit" value="Get Data">

    </form>
  </div>
</div>


</body>

</html>
