<?php
require "global/SQL.php";
require "global/functions.php";

//start the session 
session_start(); 

//check to make sure the session variable is registered 
if(isset($_SESSION['user']))
{ 
//session variable is registered, the user is ready to logout 
session_unset(); // Unset "$_SESSION['user'] from the user
session_destroy(); // Now drestroy "$_SESSION['user']".

header("location: /login.php");
}
else{ 
header("location: /login.php");
}
?>