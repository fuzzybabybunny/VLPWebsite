<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Video Generator Script</title>
</head>

<body>
<?php 

$video="";
if ($_POST["gallery"]=="")
{
$video=$_POST["download"];
}
else
{
$video=$_POST["download"];
}
$streaming=$_POST["streaming"];

echo 
$_POST["email"]
.
'<br/><p>Video for '
.
$_POST["address"]
.
'</p><p>Hello '
.
$_POST["realtor"]
.
',</p>
<p>It was a pleasure shooting your listing!</p>
<p><b>Here is the video (please right click this link and select "Save As" - this video download link expires in a week):</p></b>'
.
'<p><a href="' . $video . '">' . $video . '</a></p>'
.
'<p><b>You can also use the same video link for streaming online.</p></b>'
.
'<p><a href="' . $streaming . '">' . $streaming . '</a></p>'
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