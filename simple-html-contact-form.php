<?php

$action = $_REQUEST['action'];
if ($action == "")    /* display the contact form */
    {
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="submit">
    <h5 style= "font-family: 'Roboto', sans-serif;">Your name:<br>
    <input name="name" type="text" value="" size="30"  style=" background-color: white; box-sizing: border-box; border: 2px solid #ccc; border-radius: 4px; padding: 5px 5px 8px 5px;" /><br>
    Your email:<br>
    <input name="email" type="text" value="" size="30" style=" background-color: white; box-sizing: border-box; border: 2px solid #ccc; border-radius: 4px; padding: 5px 5px 8px 5px;" /><br>
    Your message:<br>
    <textarea name="message" rows="7" cols="30" style=" background-color: white; box-sizing: border-box; border: 2px solid #ccc; border-radius: 4px; padding: 5px 5px 8px 5px;"></textarea><br>
    <br>
    <input type="submit" value="Send email "  style=" background: rgb(223, 117, 20); box-sizing: border-box; border: 2px solid #ccc; border-radius: 4px; padding: 5px 5px 8px 5px; font-family: 'Roboto', sans-serif;color: white;"/>
    </form>
    <?php
    } 
else                /* send the submitted data */
    {
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $message=$_REQUEST['message'];
    if (($name=="")||($email=="")||($message==""))
        {
        echo "All fields are required, please fill <a href=\"\">the form</a> again.";
        }
    else{        
        $from="From: $name<$email>\r\nReturn-path: $email";
        $subject="Message sent using your contact form";
        mail("mintonkmuttclub@gmail.com", $subject, $message, $from);
        echo "Email sent!, Are you want <a href=\"\">send email</a> again.";

        }
    }  
?>