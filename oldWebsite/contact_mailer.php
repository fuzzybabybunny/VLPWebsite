<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
// get posted data into local variables
$EmailFrom = Trim(stripslashes($_POST['email'])); 
$EmailTo = "victor@victorlinphoto.com";
$Subject = Trim(stripslashes($_POST['subject'])); 
$Name = Trim(stripslashes($_POST['name'])); 
$Address = Trim(stripslashes($_POST['address'])); 
$Telephone = Trim(stripslashes($_POST['phone'])); 
$Content = Trim(stripslashes($_POST['details'])); 

// validation
$validationOK=true;
if (Trim($EmailFrom)=="") $validationOK=false;
if ((strpos($Address, 'www') !== false) || (strpos($Address, 'http') !== false)) $validationOK=false;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.php\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Address: ";
$Body .= $Address;
$Body .= "\n";
$Body .= "Telephone: ";
$Body .= $Telephone;
$Body .= "\n";
$Body .= "Content: ";
$Body .= $Content;
$Body .= "\n";

// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=success.php\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.php\">";
}

?>

</body>
</html>