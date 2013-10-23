<?php
if(isset($_SESSION['user'])) // If the user is already in session
{
	header("location: index.php"); // Re-direct them to the index page since there already logged in.
	exit();
}
?>
<title>Login Page</title>
<?php
/* Error messages

1 -> Password or Username incorrect
2 -> Account is banned

*/
if(isset($_GET['error']) && $_GET['error']== "1") { echo "<strong>Unable to login</strong><br>Please make sure the Username and Password are correct.<br><br>"; }

if(isset($_GET['error']) && $_GET['error']== "2") { echo "<strong>Unable to login</strong><br>Your account has been banned.<br><br>"; }

?>
<form action="proc/loginCheck.php" method="POST" >
Username: <input type="text" name="username" />
<br>
Password: <input type="password" name="password" />
<br>
<input type="submit" value="Login" />
</form>