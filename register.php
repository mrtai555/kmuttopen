<?php
require('config.php');


 $email1 = $_POST['email1'];
 $email2 = $_POST['email2'];
 $pass1 = $_POST['pass1'];
 $pass2 = $_POST['pass2'];
 $status = $_POST['status'];

 if($email1 == $email2 && $pass1 == $pass2 && ($status == "ADMIN" || $status == "USER" || $status == "SAFFAIRS" ))
 {
   //All good
   $name = mysql_real_escape_string($_POST['name']);
   $lname = mysql_real_escape_string($_POST['lname']);
   $uname = mysql_real_escape_string($_POST['uname']);
   $email1 = mysql_real_escape_string($_POST['email1']);
   $email2 = mysql_real_escape_string($_POST['email2']);
   $pass1 = mysql_real_escape_string($_POST['pass1']);
   $pass2 = mysql_real_escape_string($_POST['pass2']);
   $status = mysql_real_escape_string($_POST['status']);
   $phonenum = mysql_real_escape_string($_POST['phonenum']);
   $student_id = mysql_real_escape_string($_POST['studentid']);

   $pass1 = md5($pass1);
   //Check if username is taken
   $check = mysql_query("SELECT * FROM users WHERE uname = '$uname'")or die(mysql_error());
   if (mysql_num_rows($check)>=1) echo "Username already taken";
   //Put everyting in DB
   else{
   mysql_query("INSERT INTO `users` (`id`, `name`, `lname`, `uname`, `email`, `pass`,`status`,`phonenum`,`student_id`) VALUES (NULL, '$name', '$lname', '$uname', '$email1', '$pass1','$status','$phonenum','$student_id')") or die(mysql_error());
   echo "Registration Successful";
   echo "Redirect...";

   header("refresh:5; url=http://202.44.12.152/badminton");
   }
 }
 else{
  echo "Sorry, your email's or your passwords do not match. <br />";
 }






?>
