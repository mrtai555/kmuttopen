<?php
	require('config.php');
	
	
	$uname = mysql_real_escape_string($_POST['txtUsername']);
 	$pass = mysql_real_escape_string($_POST['txtPassword']);
 	$pass = md5($pass);
    $strSQL = "SELECT * FROM users WHERE `uname` = '$uname' AND `pass` = '$pass'";

	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{ 
	echo "Username and Password Incorrect!";
     
	}
	else 
	{
			$_SESSION["id"] = $objResult["id"];
			$_SESSION["status"] = $objResult["status"];

			session_write_close();
			
			if($objResult["status"] == "TAI")
			{
				header("location:http://202.44.12.152/badminton/register1.php");
			}
			else if($objResult["status"] == "ADMIN")
			{
				header("location:http://202.44.12.152/badminton/register1.php");
			}
			else 
			{
			echo "Your status is USER You can't use this Function!";
			
			}
	}
	mysql_close();
?>