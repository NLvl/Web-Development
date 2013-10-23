<?php
/*
 * @FILE DESCRIPTION: Handles inportant files to include for ever page
 */
 
// Lets start the session for every page (required for $_SESSIONS to function).
session_start();

// Lets create the database connection
require("SQL.php");
// Lets grab our functions that will be used for PHP/MySQL
require("functions.php");
// Lets load the users data when they are logged in.
require("user.php");

?>