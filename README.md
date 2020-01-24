# phpBankSystem
 
Hey ther thanks for checking out my project. This is one of the first projects i made in php and i put quite much time into it, so i decided to publish it.

Features:
-Register
-Login
-Send Money
-See own account balance etc

Admin Features:
-execute SQL querys
-Edit Users
-Delete Users
-Create Users
-View transaction log
-View registered Users
-Make other users admin

#Instructions

1.) Download php files and upload them to your sever.
2.) change the config.php file to fit your personal server data
3.) Create 2 tables here is the structure:

CREATE TABLE `Persons` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Balance` double NOT NULL DEFAULT 0,
  `Pass` varchar(255) DEFAULT NULL,
  `Adress` varchar(255) DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0
) 

CREATE TABLE `transaction_log` (
  `senderID` int(11) NOT NULL,
  `receiverID` int(11) NOT NULL,
  `ammountTransfered` float NOT NULL,
  `timestamp` varchar(100) NOT NULL,
  `senderEmail` varchar(100) NOT NULL,
  `receiverEmail` varchar(100) NOT NULL
)


4.) Register at the register.php page.
5.) Go into phpmyadmin and change the "isAdmin" value of your account to "1"
6.) You are ready to go, You now have access to the admin panel under Admin tools.
