<?php
/*
 * @FILE DESCRIPTION: Handles functions that will be used for PHP/MySQL
 */

 
/*
	Function: encrypt("String")
	Desc: Hash strings (Password Hashing) Whirlpool hashing format
*/
function encrypt($value)
{
return hash('Whirlpool', $value);
}

/*
	Function: realEscape("String")
	Desc: Prevents SQL injection from <form> inputs (certain special characters)
*/
function realEscape($string)
{
  require('SQL.php'); // We need this to define the "$sql" variable
  if(get_magic_quotes_gpc())
  {
    return mysqli_real_escape_string($sql, stripslashes($string));
  }
  else
  {
    return mysqli_real_escape_string($sql, $string);
  }
}

?>