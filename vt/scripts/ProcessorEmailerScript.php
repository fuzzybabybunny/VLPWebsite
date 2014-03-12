<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>VT Link Generator Script</title>
</head>

<body>
<?php 

//Gets shotcount from previous form
$shotcount="";
$shotcount=$_GET["shotcount"];

//Gets vendor from previous form
$vendor="";
$vendor=$_GET["vendor"];

//Gets sqft from previous form
$sqft="";
$sqft=$_GET["sqft"];

//Gets free or not free status from previous form
$status="";
$status=$_GET["status"];

//Generates the download URL
//Set the default timezone to use.
date_default_timezone_set('PST');

$year=date('Y');
$month=date('m');
$photos="";
$photos="http://paragon.photographer.s3.amazonaws.com"."/".$year."/".$month."/".$_GET["zip"];
$photos = str_replace(" ","%20",$photos);
$findzip = ".zip";
$pos = strpos($photos, $findzip);
if ($pos === false) {
	$photos = $photos . ".zip";
}


//Generates the First Name from the Full Name of the Realtor
$name="";
$realtor="";
$realtor=$_GET["realtor"];
$name = explode(' ', $realtor);
$first_name = $name[0];
$joblink = "";

$joblink="http://www.victorlinphoto.com/vt/scripts/LinkGenerator.php?address=".$_GET["address"]."&realtorFirstName=".$first_name."&vendor=".$vendor."&typejob=".$_GET["typejob"]."&shotcount=".$shotcount."&realtor=".$realtor."";

//Determines type of job
/*$joblink="none";
if ($_GET["typejob"]=="126 Staging")
{
$joblink="http://www.victorlinphoto.com/vt/scripts/126LinkGenerator.php?address=".$_GET["address"]."&realtor=".$first_name."";
}
elseif ($_GET["typejob"]=="Non-126 Staging")
{
$joblink="http://www.victorlinphoto.com/vt/scripts/VTLinkGenerator.php?address=".$_GET["address"]."&realtor=".$first_name."";
}
elseif ($_GET["typejob"]=="TourFactory")
{
$joblink="http://www.victorlinphoto.com/vt/scripts/TourFactoryGenerator.php?address=".$_GET["address"]."&realtor=".$first_name."";
}
elseif ($_GET["typejob"]=="TourFactory with 126")
{
$joblink="http://www.victorlinphoto.com/vt/scripts/TourFactoryGenerator.php?address=".$_GET["address"]."&realtor=".$first_name."";
}
elseif ($_GET["typejob"]=="DTMSM")
{
$joblink="http://www.victorlinphoto.com/vt/scripts/PhotosOnlyGenerator.php?address=".$_GET["address"]."&realtor=".$first_name."";
}
elseif ($_GET["typejob"]=="MHStaging")
{
$joblink="http://www.victorlinphoto.com/vt/scripts/ModernHjemLinkGenerator.php?address=".$_GET["address"]."&realtor=".$first_name."";
}
elseif ($_GET["typejob"]=="Just Photos")
{
$joblink="http://www.victorlinphoto.com/vt/scripts/PhotosOnlyGenerator.php?address=".$_GET["address"]."&realtor=".$first_name."";
}
elseif ($_GET["typejob"]=="Just Photos with Slideshow")
{
$joblink="http://www.victorlinphoto.com/vt/scripts/PhotoSlideshowGenerator.php?address=".$_GET["address"]."&realtor=".$first_name."";
}
elseif ($_GET["typejob"]=="Just Photos with Invoice")
{
$joblink="http://www.victorlinphoto.com/vt/scripts/PhotosOnlyGenerator.php?address=".$_GET["address"]."&realtor=".$first_name."";
}
*/

$notes=$_GET["notes"]; 
//$formattednotes=str_replace(Chr(13),'<br/>', $notes); 
$procnotes=$_GET["processornotes"]; 
//$formattedprocnotes=str_replace(Chr(13),'<br/>', $procnotes); 

//Creates variables to be sent to emailer
$emailsubject="";
$emailtext="";
$formattedemailtext="";

$emailsubject='VLP Processing Job: '.$_GET["address"];

$emailtext=
'<b><a href="http://www.tourbuzz.net/" target=_blank>TourBuzz Login</a></b>'
.
'<br/><br/><b><a href="http://www.tourfactory.com" target=_blank>TourFactory Login</a></b>'
.
'<br/><br/><b>Job Link:</b><br/><br/>'
.
'<a href="'
.
$joblink
.
'" target="_blank">'
.
$_GET["typejob"]
.
'</a>'
.
'<br/><br/><b>Vender:</b><br/><br/>'
.
$_GET["vendor"]
.
'<br/><br/><b>Address:</b><br/><br/>'
.
$_GET["address"]
.
'<br/><br/><b>Square Footage:</b><br/><br/>'
.
$_GET["sqft"]
.
'<br/><br/><b>Client:</b><br/><br/>'
.
$_GET["realtor"]
.
'<br/><br/><b>Number of Shots:</b><br/><br/>'
.
$_GET["shotcount"]
.
'<br/><br/><b>Download:</b><br/><br/>
<a href="'
.
$photos
.
'">'
.
$photos
.
'</a><br/><br/><b>Notes:</b><br/><br/>'
.
$notes
.
'<br/><br /><b>Thank you!</b>
<br />-Victor
<br />victor@victorlinphoto.com
<br />http://www.victorlinphoto.com
<br />650.248.0289';

$formattedemailtext='<html><body>'.$emailtext.'</body></html>';

$_SESSION['emailsubject'] = $emailsubject;
$_SESSION['formattedemailtext'] = $formattedemailtext;
$_SESSION['address'] = $_GET["address"];
$_SESSION['payment'] = $_GET["payment"];
$_SESSION['photographer'] = $_GET["photographer"];
$_SESSION['shotcount'] = $_GET["shotcount"];
$_SESSION['typejob'] = $_GET["typejob"];
$_SESSION['vendor'] = $_GET["vendor"];
$_SESSION['sqft'] = $_GET["sqft"];
$_SESSION['realtor'] = $_GET["realtor"];
$_SESSION['sessionID'] = $_GET["sessionID"];
$_SESSION['readynotes'] = $_GET["readynotes"];
$_SESSION['ready'] = $_GET["ready"];
$_SESSION['status'] = $_GET["status"];
$_SESSION['totalpayment'] = $_GET["totalpayment"];

echo '<b>Email Correct?</b></br></br><input type=button value="Back" onClick="history.go(-1)"></br></br><FORM METHOD="LINK" ACTION="mailer.php">
<INPUT TYPE="submit" VALUE="Submit">
</FORM></br>';

echo $emailsubject."</br></br>";
echo $formattedemailtext;

?>

</body>
</html>