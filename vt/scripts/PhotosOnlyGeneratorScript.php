<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>VT Link Generator Script</title>
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

echo 
$_POST["email"]
.
'<br/><p>Photos for '
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