<html>

<?php

include "config.php";
include "getInfo.php"
?>
<body>
<ul>


    
    <li><a href="index.php">Home</a></li>
    <?php if(empty($_SESSION["logged_in"])) {echo '<li style="float: right"><a href="login.php">Login</a></li>';  }?>

    <?php if(empty($_SESSION["logged_in"])) {echo '<li style="float: right"><a href="register.php">Register</a></li>';  }?>
    <?php if(!empty($_SESSION["logged_in"])) {echo '<li><a href="myaccount.php">My Account</a></li>';  }?>

    <?php if(!empty($_SESSION["logged_in"])) {echo '<li><a href="sendmoney.php">Send Money</a></li>';  }?>


    <?php if($isCurrentlyAdmin == 1) {echo '<li class="dropdown"><a>Admin Tools</a> <div class="dropdown-content"><a class="lastdrop" href="adduser.php" > Add/Delete Users </a> <a class="lastdrop" href="edituser.php" > Edit Users </a> <a class="lastdrop" href="log.php" >Display Log </a> <a class="lastdrop" href="data.php" > List users </a> <a class="lastdrop" href="sqlquery.php" > SQL Query </a> </div> </li>';  }?>

    <?php if(!empty($_SESSION["logged_in"])) {echo '<li style="float: right"><a href="logout.php">Logout</a></li>';  }?>
    
</ul>
</body>

</html>