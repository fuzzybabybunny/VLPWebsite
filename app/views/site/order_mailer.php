<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

			<!--
            Takes the submitted information from orderconfirm.php and prepares them for emailing.
            -->
            
<?php
    // converts POSTed data into local variables
	// defines the email parameters
$AgentEmail = Trim(stripslashes($_POST['agentemail']));
$OtherEmail = Trim(stripslashes($_POST['otheremail'])); 
$EmailFrom = $AgentEmail.", ".$OtherEmail; 
$EmailTo = "victor@victorlinphoto.com, admin@victorlinphoto.com";
$AgentName = Trim(stripslashes($_POST['agentname']));
$OtherName = Trim(stripslashes($_POST['othername'])); 
$Telephone = Trim(stripslashes($_POST['phone'])); 
if (Trim(stripslashes($_POST['sqft']))=="")
{
	$SqFt = Trim(stripslashes($_POST['customsqft']));
}
else 
{
	$SqFt = Trim(stripslashes($_POST['sqft'])); 
}
$HDRPhotos = Trim(stripslashes($_POST['hdrphotos'])); 
$SPW = Trim(stripslashes($_POST['SPW'])); 
$Panoramas = Trim(stripslashes($_POST['panoramas'])); 
$Rush = Trim(stripslashes($_POST['rush'])); 
$TourFactory = Trim(stripslashes($_POST['tourfactory']));  
$FullVideo = Trim(stripslashes($_POST['fullvideo'])); 
$TwilightPhotos = Trim(stripslashes($_POST['twilightphotos']));
$TwilightVideos = Trim(stripslashes($_POST['twilightvideos']));  
$Weekend = Trim(stripslashes($_POST['weekend']));  
$Exteriors = Trim(stripslashes($_POST['exteriors']));  
$Reshoot = Trim(stripslashes($_POST['reshoot']));  
$Domain = Trim(stripslashes($_POST['domain']));
$Access = Trim(stripslashes($_POST['access'])); 
$Notes = Trim(stripslashes($_POST['notes'])); 
$Vendor = Trim(stripslashes($_POST['vendor'])); 
$Schedule = Trim(stripslashes($_POST['schedule'])); 
$Referral = Trim(stripslashes($_POST['referral']));

// Standardizes the address.
$FullAddress = Trim(stripslashes($_POST['address1']))." ".Trim(stripslashes($_POST['address2'])).", ".Trim(stripslashes($_POST['city'])).", ".Trim(stripslashes($_POST['state'])).", ".Trim(stripslashes($_POST['zip'])); 
$FullAddress = ucwords($FullAddress);
$FullAddress = str_replace("#", "Unit ", $FullAddress);

//If these conditions are true it adds additional text to the calendar entry or processor notes.

if (Trim(stripslashes($_POST['tourfactorypass'])) != "")
{  
$TourFactoryPass = "TourFactory Username and Password \n\n".Trim(stripslashes($_POST['tourfactorypass']));
}

if ($Rush != "")
{
	$RushMessage = "Send out before 4PM! - ";
}

//These are the different types of jobs - TourFactory, RUSH, TourBuzz, Just Photos

$TypeJob = "";

if ($HDRPhotos != "" && $SPW == "" && $TourFactory == "" && $Panoramas == "")
{
	$TypeJob = "Just Photos";
}
elseif ($HDRPhotos != "" && $SPW != "" && $TourFactory == "")
{
	$TypeJob = "TourBuzz";
}
elseif ($Panoramas != "" && $TourFactory == "")
{
	$TypeJob = "TourBuzz";
}
elseif ($TourFactory != "")
{
	$TypeJob = "TourFactory";
}
elseif ($Panoramas != "" && $TourFactory != "")
{
	$TypeJob = "TourFactory";
}
else
{
	$TypeJob = "";
}

// These defines the variables that will be used in the email body.

// These are notes for the photo processor
$ProcessorNotes = "Agent and Project Info:\n\n".$AgentName."\n".$Telephone."\n".$AgentEmail."\n".$Domain."\n".$TourFactoryPass."
\n\nCc: ".$OtherName." - ".$OtherEmail."\n";
$ProcessorNotes=urlencode(str_replace("'", "&#39", $ProcessorNotes)); 

// Email subject line.
$Subject = "New Photography Order for ".Trim(stripslashes($FullAddress))." from ".$AgentName;

// This generates the link that takes the user to the page that emails the photographer and the client the order details.
$Joblink='http://www.victorlinphoto.com/vt/scripts/PhotographerEmailer.php?address='.$FullAddress.'&client='.$AgentName.'&clientemail='.$EmailFrom.'&sqft='.$SqFt.'&processornotes='.$ProcessorNotes.'&vendor='.$Vendor.'&typejob='.$TypeJob;

// This displays all the items that the client selected from order.php
$TotalPackages = $HDRPhotos."\n".$SPW."\n".$Domain."\n".$Panoramas."\n".$Rush."\n".$TourFactory."\n".$TourFactoryPass."\n".$FullVideo."\n".$TwilightPhotos."\n".$TwilightVideos."\n".$Weekend."\n".$Exteriors;

// Validation
$validationOK=true;
if (Trim($EmailFrom)=="") $validationOK=false;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.php\">";
  exit;
}

// Prepares email body text
$Body = "";
$Body = "Link:\n\n ".$Joblink."
\n\nCalendar Entry:\n\n".$RushMessage.$FullAddress." - ".$AgentName.", ".$OtherName.", ".$Telephone.", ".$Access.", ".$Notes.", ".$SqFt.", ".$Domain."
\n\nAddress of Listing:\n\n".$FullAddress."
\n\nClient Name:\n\n".$AgentName."
\n\nEmails:\n\n".$EmailFrom."
\n\nAgent and Project Info:\n\n".$AgentName."\n".$Telephone."\n".$AgentEmail."\n".$Domain."\n".$TourFactoryPass.";
\n\nCc: ".$OtherName." - ".$OtherEmail."
\n\nVendor:\n\n".$Vendor."
\n\nSquare Footage:\n\n".$SqFt." 
\n\nService:\n\n".$TotalPackages." 
\n\nSchedule: ".$Schedule."
\n\nReferral: ".$Referral;

date_default_timezone_set('America/Los_Angeles');
$date = date('Y-m-d H:i:s');
$SeperatorLine = "---------------------------------------------------------------------------";

// This section logs the order submission from the user in ordersubmissions.txt

$myFile = "ordersubmissions.txt";
		$fh = fopen($myFile, 'a') or die("can't open file");
		$stringData = $SeperatorLine."\n\n".$date."\n\n".$Subject."\n\n".$Body."\n\n".$SeperatorLine."\n";
		fwrite($fh, $stringData);
		fclose($fh);



// email command
 
$Headers = "From: ".$EmailFrom;
$success = mail($EmailTo, $Subject, $Body, $Headers);

// Redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=realestate/ordersuccess.php\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.php\">";
}
?>

</body>
</html>