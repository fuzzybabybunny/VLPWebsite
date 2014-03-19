<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 

$oldornew="none";
if ($_POST["oldornew"]=="old")
{
$oldornew="I see you have a listing being staged with OneTwoSixDesign. When will the house be completely showcase
ready (landscaping/staging/cleaning/etc are finished) and when would you like to schedule me for photography?</p>
<p>If you've already made plans for photos/VT with another company,
please let me know.</p>
Thank you,
<br />-Victor
<br />victor@victorlinphoto.com
<br />http://www.victorlinphoto.com
<br />650.248.0289";
}
else
{
$oldornew="I am OneTwoSixDesign Staging's preferred photographer and I do all of the
virtual tours and photography for their clients.</p>
<p>Because you are staging with OneTwoSixDesign, I'd like to give you a $25 discount off of any prices you see on my website. Simply use coupon code '<b>25OFF126</b>' at checkout:</p>
<p><a href='http://www.victorlinphoto.com/realestate/store' target='_blank'>Victor Lin Photography Store</a></p>
<p>You can view my work here:</p>
<p><a href='http://victorlinphoto.com/realestate/index.php' target='_blank'>Portfolio</a></p>
<p>Please schedule with me if you'd like to take advantage of my services, and always feel free to contact me with any questions you may have.</p>
Thank you,
<br />-Victor
<br />victor@victorlinphoto.com
<br />http://www.victorlinphoto.com
<br />650.248.0289";
}

echo 
$_POST["email"]
.
'<p>Photos and Virtual Tour for '
.
$_POST["address"]
.
'</p><p>Hello '
.
$_POST["realtor"]
.
",</p>
<p>"
.
$oldornew
?>

</body>
</html>