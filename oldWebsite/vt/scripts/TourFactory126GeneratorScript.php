<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TourFactory Generator Script</title>
</head>

<body>
<?php 

$photos="none";
if ($_POST["gallery"]=="")
{
$photos="http://s3.amazonaws.com/Paragon_Media_Storage/" . $_POST["zip"];
}
else
{
$photos=$_POST["gallery"];
}

$TourFactoryURL="none";
if (strpos($_POST['full'], ':') !== false) {
$TourFactoryURL=$_POST['full'];
}
else
{
$TourFactoryURL="http://" . $_POST["full"];
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
<p><b>Here are the photos (please download and save quickly - this photo download link expires in a week):</p></b>'
.
'<p><a href="' . $photos . '">' . $photos . '</a></p>'
.
'<p><b>The virtual tour:</p></b>
<p><a href="' . $TourFactoryURL . '" target="blank">' . $TourFactoryURL . '</a></p>
<p><b>Login Screen:</p></b>
<p><a href="http://www.tourfactory.com/" target="blank">http://www.tourfactory.com/</a></p>
<p>My photos can be downloaded from inside your TourFactory account.</p>
<p>Please contact TourFactory for help on how to manage your TourFactory tour:</p>
<p><a href="http://www.tourfactory.com/company/contactus.asp" target="blank">http://www.tourfactory.com/company/contactus.asp</a></p>
</p><p>Please do not hesitate to contact me with any questions.</p>
<p>If you enjoy my work please think of me next time you have a listing.</p>
Thank you!
<br />-Victor
<br />victor@victorlinphoto.com
<br />http://www.victorlinphoto.com
<br />650.248.0289'
?>

</body>
</html>