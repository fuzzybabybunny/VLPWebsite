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

$name="";
$SqFt=$_GET["sqft"];
$SqFt=urlencode(str_replace("'", "&#39", $SqFt));
$client="";
$client=$_GET["client"];
$clientemail="";
$clientemail=$_GET["clientemail"];
$name = explode(' ', $client);
$first_name = $name[0];
$processornotes = $_GET["processornotes"];
//$formattedprocnotes=str_replace(Chr(13),'<br/>', $processornotes); 
$formattedprocnotes=urlencode(str_replace("'", "&#39", $processornotes)); 
$photographer=$_GET["photographer"];
$price="";
$price=$_GET["price"];
$sessionID=$price*4+$price/5;
$vendor=$_GET["vendor"];


$joblink="http://www.victorlinphoto.com/vt/scripts/ProcessorEmailer.php?typejob=".$_GET["typejob"]."&address=".$_GET["address"]."&client=".$client."&processornotes=".$formattedprocnotes."&sessionID=".$sessionID."&payment=".$_GET["payment"]."&vendor=".$vendor."&sqft=".$SqFt."&photographer=".$photographer;

/*
$joblink="none";
if ($_GET["typejob"]=="126 Staging")
{
$joblink="http://www.victorlinphoto.com/vt/scripts/ProcessorEmailer.php?typejob=126 Staging&address=".$_GET["address"]."&realtor=".$realtor."&processornotes=".$formattedprocnotes."&payment=".$_GET["payment"]."&photographer=".$photographer."&free=".$_GET["free"];
}
elseif ($_GET["typejob"]=="Non-126 Staging")
{
$joblink="http://www.victorlinphoto.com/vt/scripts/ProcessorEmailer.php?typejob=Non-126 Staging&address=".$_GET["address"]."&realtor=".$realtor."&processornotes=".$formattedprocnotes."&payment=".$_GET["payment"]."&photographer=".$photographer;
}
elseif ($_GET["typejob"]=="TourFactory")
{
$joblink="http://www.victorlinphoto.com/vt/scripts/ProcessorEmailer.php?typejob=TourFactory&address=".$_GET["address"]."&realtor=".$realtor."&processornotes=".$formattedprocnotes."&payment=".$_GET["payment"]."&photographer=".$photographer;
}
elseif ($_GET["typejob"]=="TourFactory with 126")
{ 
$joblink="http://www.victorlinphoto.com/vt/scripts/ProcessorEmailer.php?typejob=TourFactory with 126&address=".$_GET["address"]."&realtor=".$realtor."&processornotes=".$formattedprocnotes."&payment=".$_GET["payment"]."&photographer=".$photographer;
}
elseif ($_GET["typejob"]=="DTMSM")
{ 
$joblink="http://www.victorlinphoto.com/vt/scripts/ProcessorEmailer.php?typejob=DTMSM&address=".$_GET["address"]."&realtor=".$realtor."&processornotes=".$formattedprocnotes."&payment=".$_GET["payment"]."&photographer=".$photographer;
}
elseif ($_GET["typejob"]=="MHStaging")
{
$joblink="http://www.victorlinphoto.com/vt/scripts/ProcessorEmailer.php?typejob=MHStaging&address=".$_GET["address"]."&realtor=".$realtor."&processornotes=".$formattedprocnotes."&payment=".$_GET["payment"]."&photographer=".$photographer."&free=".$_GET["free"];
}
elseif ($_GET["typejob"]=="Just Photos with Slideshow")
{
$joblink="http://www.victorlinphoto.com/vt/scripts/ProcessorEmailer.php?typejob=Just Photos with Slideshow&address=".$_GET["address"]."&realtor=".$realtor."&processornotes=".$formattedprocnotes."&payment=".$_GET["payment"]."&photographer=".$photographer;
}
elseif ($_GET["typejob"]=="Just Photos")
{
$joblink="http://www.victorlinphoto.com/vt/scripts/ProcessorEmailer.php?typejob=Just Photos&address=".$_GET["address"]."&realtor=".$realtor."&processornotes=".$formattedprocnotes."&payment=".$_GET["payment"]."&photographer=".$photographer;
}
*/

$notes=$_GET["notes"]; 
$formattednotes=str_replace(Chr(13),'<br/>', $notes); 
$emailsubject="";
$emailtext="";
$formattedemailtext="";

$emailsubject='VLP Photography Job: '.$_GET["address"];

$emailtext=
'VLP Photography Job: <a href="http://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q='.$_GET["address"].'" target=_blank>'.$_GET["address"].'</a>
<br/><br/><b>Type of Job:</b><br/><br/>'
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
'<br/><br/><b>Vendor:</b><br/><br/>'
.
$_GET["vendor"]
.
'<br/><br/><b>Address:</b><br/><br/>'
.
$_GET["address"]
.
/**'<br/><br/><b>Time:</b><br/><br/>'
.
$_GET["time"]
.
**/
'<br/><br/><b>Client:</b><br/><br/>'
.
$_GET["client"]
.
'<br/><br/><b>Client Email:</b><br/><br/>'
.
$_GET["clientemail"]
.
'<br/><br/><b>Square Feet:</b><br/><br/>'
.
$_GET["sqft"]
.
/**
'<br/><br/><b>Payment Amount:</b><br/><br/>'
.
$_GET["payment"]
.
'<br/><br/><b>Photographer Notes:</b><br/><br/>'
.
$formattednotes
.
**/
'<br/><br /><b>Thank you!</b>
<br />admin@victorlinphoto.com
<br />http://www.victorlinphoto.com';

$formattedemailtext='<html><body>'.$emailtext.'</body></html>';

$_SESSION['address'] = $_GET["address"];
$_SESSION['photographer'] = $photographer;
$_SESSION['client'] = $_GET["client"];
$_SESSION['clientemail'] = $clientemail;

echo '<b>Click to Email the Client</b></br></br><input type=button value="Back" onClick="history.go(-1)"></br></br><FORM METHOD="LINK" ACTION="ClientEmailer.php">
<INPUT TYPE="submit" VALUE="Submit">
</FORM></br>';

//echo '</br>Photographer: '.$photographer.'</br></br>';

echo $formattedemailtext;
?>

</body>
</html>