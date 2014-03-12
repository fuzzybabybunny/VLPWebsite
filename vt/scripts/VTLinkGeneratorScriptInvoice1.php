<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>VT Link Generator Script</title>
</head>

<body>
<?php 

//Logs the Processor's Job
$today="";
$today = date("n/j/Y"); 
$myFile = "processorlog.txt";
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = $today."\t".$_POST["address"]."\n";
fwrite($fh, $stringData);
fclose($fh);

$photos="none";
if ($_POST["gallery"]=="")
{
$photos="http://www.victorlinphoto.com/photodownloads/" . $_POST["zip"];
}
else
{
$photos=$_POST["gallery"];
}

$receiptorinvoice="none";
if ($_POST["receiptinvoice"]=="receipt")
{
	$receiptorinvoice="receipt";
}
else
{
	$receiptorinvoice="invoice";
}

echo 
$_POST["email"]
.
'<br/><p>Photos and Virtual Tour for '
.
$_POST["address"]
.
'</p><p>Hello '
.
$_POST["realtor"]
.
',</p>
<p>It was a pleasure photographing your listing!</p>
<p>Here are the photos (please download and save quickly - photo download link expires in a week):</p>'
.
'<p><a href="' . $photos . '">' . $photos . '</a></p>'
.
'<p>The virtual tour:</p> 
<p>Branded Tour Link: <a href="' . $_POST["full"] . '">' . $_POST["full"] . '</a></p>
<p>Un-Branded Tour Link: <a href="' . $_POST["mls"] . '">' . $_POST["mls"] . '</a></p>
<p>Please follow this tutorial on how to manage your new virtual tour:</p>

<p><a href="http://www.victorlinphoto.com/realestate/vuvistatutorial/tours_1.php">http://www.victorlinphoto.com/realestate/vuvistatutorial/tours_1.php</a></p>

<p>Login Screen:</p>
<p><a href="https://vu.realbiz360.com/login.php">https://vu.realbiz360.com/login.php</a></p>
<p>Username: ' . $_POST["username"] . '<br /> Password: ' . $_POST["password"] . 

'</p><p>Please do not hesitate to contact me with any questions.</p>
<p>If you enjoy my work please think of me next time you have a listing.</p>
Thank you!
<br />-Victor
<br />victor@victorlinphoto.com
<br />http://www.victorlinphoto.com
<br />650.248.0289'
?>

</body>
</html>