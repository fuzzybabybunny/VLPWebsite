<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$mail->Mailer = "smtp";
$mail->Host = "ssl://smtp.gmail.com";
$mail->Port = 465;
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Username = "victor@victorlinphoto.com"; // SMTP username
$mail->Password = "4r5t4ert"; // SMTP password
$webmaster_email = "victor@victorlinphoto.com"; //Reply to this email ID
$email="victor@victorlinphoto.com"; // Recipients email ID
$name="Victor"; // Recipient's name
$mail->From = Trim(stripslashes($_POST['email']));
$mail->FromName = Trim(stripslashes($_POST['name']));
$mail->AddAddress($email,$name);
$mail->AddReplyTo($webmaster_email,"Webmaster");
$mail->WordWrap = 50; // set word wrap
$mail->AddAttachment("/var/tmp/file.tar.gz"); // attachment
$mail->AddAttachment("/tmp/image.jpg", "new.jpg"); // attachment
$mail->IsHTML(true); // send as HTML
$mail->Subject = Trim(stripslashes($_POST['subject']));
$mail->Body = Trim(stripslashes($_POST['details']));  //HTML Body
$mail->AltBody = Trim(stripslashes($_POST['details']));  //Text Body
if(!$mail->Send())
{
echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
echo "Message has been sent";
}
?> 

</body>
</html>