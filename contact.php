<?php
    $name=mysql_real_escape_string($_POST['name']);
    $email=mysql_real_escape_string($_POST['email']);
    $message=mysql_real_escape_string($_POST['message']);
    if (($name=="")||($email=="")||($message==""))
        {
        echo "All fields are required, please fill <a href=\"\">the form</a> again.";
        }
    else{        
        $from="From: $name<$email>\r\nReturn-path: $email";
        $subject="Message sent using your contact form";
        mail("mintonkmuttclub@gmail.com", $subject, $message, $from);
        echo "Email sent!";
        }
    }  
?>