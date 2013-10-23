<?php
require("global/header.php");

if(!isset($_SESSION['user'])) // Checking if the user is logged in
{
	header("location: login.php");
}
$date = new DateTime(''. $user['RegiDate'] .''); // Set date format for "Registered"

echo "Welcome, <b>".$user['Username']."</b> you registered with us on the ".date_format($date, '<b>M d, Y</b>')."</b><br /><br />"; // Display the Users "Username" and show them the Date they registered.

// Simple message to Administrators
if($user['AdminLevel'] > 0)
{
	echo "This account has Administrator rights.";
}
else
{
	echo "This account isn't an Administrator.";
}

echo "<br /><br /><a href=\"logout.php\">Logout?</a>
";
?>