<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 

//Logs the Processor's Job
/*$today="";
$today = date("n/j/Y"); 
$myFile = "processorlog.txt";
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = $today."\t".$_POST["address"]."\n";
fwrite($fh, $stringData);
fclose($fh);*/

$photos="none";
if ($_POST["gallery"]=="")
{
$photos="http://s3.amazonaws.com/Paragon_Media_Storage/" . $_POST["zip"];
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

$needle = ",";
$pos = strpos ($_POST["address"], $needle);
$shortAddress = substr($_POST["address"], 0, $pos);
$formattedAddress = str_replace(' ',"",$shortAddress);
$directoryAddress = '../' . $formattedAddress . '.php';
$ourFileName = $formattedAddress . '.php';
$fh = fopen($directoryAddress, 'w') or die("can't open file");
fwrite($fh, '<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>' . $_POST["address"] . '</title>
</head>

<body>
<div align="center">
<iframe src ="' . $_POST["full"] . '" scrolling="no" frameBorder="0" width="1000px" height="675px">
<p>Your browser does not support iframes.</p>
</iframe>
<img src="VT-logo.jpg" width="1000" border="0" usemap="#Map"/>
<map name="Map" id="Map">
<area shape="rect" coords="337,1,619,189" href="http://onetwosixdesign.com/" target="_blank" alt="OneTwoSixDesign Staging" />
<area shape="rect" coords="639,0,948,189" href="http://www.victorlinphoto.com/realestate/index.php" target="_blank" alt="Victor Lin Photography" />
</map>
</div>
</body>
</html>');
fclose($fh); 
?>
<?php echo 
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
'<p><b>The virtual tour (does not expire):</p></b> 
<p>Tour Link: <a href="http://www.victorlinphoto.com/vt/' . $ourFileName . '">http://www.victorlinphoto.com/vt/' . $ourFileName . '</a></p>
<p>Un-Branded Tour Link: <a href="' . $_POST["mls"] . '">' . $_POST["mls"] . '</a></p>
<p><b>Please follow this tutorial on how to manage your new virtual tour:</p></b>

<p><a href="http://www.victorlinphoto.com/realestate/vuvistatutorial/tours_1.php">http://www.victorlinphoto.com/realestate/vuvistatutorial/tours_1.php</a></p>

<p><b>Login Screen:</p></b>
<p><a href="https://vu.realbiz360.com/login.php">https://vu.realbiz360.com/login.php</a></p>
<p><b>Username:</b> ' . $_POST["username"] . '<br /> <b>Password:</b> ' . $_POST["password"] .  

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