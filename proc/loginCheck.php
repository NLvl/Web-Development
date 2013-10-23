<?php
session_start();
if(!isset($_POST['username']) && !isset($_POST['password']))
{
	header('location: ../login.php'); // take them back if they directly access the page.
	exit();
}
// Require the pages we need.
require ('../global/SQL.php');
require ('../global/functions.php');

$check = mysqli_query($sql, "SELECT `id`, `Username`, `Pass`, `PassSalt`, `AdminLevel`, `Band` FROM `accounts` WHERE `Username` = '".realEscape($_POST['username'])."'"); // Lets query to input data from the login page.

if(mysqli_num_rows($check) == 1) // The posted username was found process the below.
{
	if($login = mysqli_fetch_object($check)) // Lets fetch their information requested as an object. (since it's just 1 row)
	{
		// Password Salting is just another way to protect the real password hash (this is just protect agaisn't password decryptors; Referr to README for more information)
		if(strtoupper(encrypt($login->PassSalt.$_POST['password'])) == $login->Pass)  // strtoupper must be used since as we are now comparing. (strtoupper("string") makes it all caps)
		{
			if($login->Band > 0) // is the user banned?
			{
				header("location: ../login.php?error=2"); // Banned error message
			}
			else // the user isn't banned do the below
			{
				$_SESSION['user'] = $login->Username;
				$_SESSION['user_id'] = $login->id;
				
				header("location: ../index.php?p=dashboard"); // successful login re-direct them to the index page.
			}
		}
		else // Password didn't match
		{
			header("location: ../login.php?error=1"); // Username or Password error message
		}
	}
}
else // The username wasn't found.
{
	header("location: ../login.php?error=1"); // Username or Password error message
}
?>
