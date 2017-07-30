<?php

	session_start();
	mysql_connect("localhost", "badminton", "taitanium");
    mysql_select_db("badminton");

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
			
			if($objResult["status"] == "ADMIN")
			{
			header("location:http://202.44.12.152/badminton/account_2.html");
			}
			else if($objResult["status"] == "USER")
			{
			header("location:http://202.44.12.152/badminton/account.html");
			}
			else if($objResult["status"] == "TAI")
			{
			header("location:http://202.44.12.152/badminton/account_3.html");
			}
			else if($objResult["status"] == "STDUNION")
			{
			header("location:http://202.44.12.152/badminton/STDUNION_8769807.html");
			}
          else if($objResult["status"] == "SAFFAIRS")
			{
			header("location:http://202.44.12.152/badminton/SAFFAIRS97969656.html");
			}
	}
	mysql_close();
?>

