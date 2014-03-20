<?php/*
session_start();

// validation
$validationOK=true;
if (Trim($AgentName)=="")
{
	$validationOK=false;
}
if (Trim($Telephone)=="")
{
	$validationOK=false;
}
if (Trim($AgentEmail)=="") 
{
	$validationOK=false;
}
if (Trim($Address1)=="")
{
	$validationOK=false;
}
if (Trim($City)=="")
{
	$validationOK=false;
}
if (Trim($State)=="")
{
	$validationOK=false;
}
if (Trim($Zip)=="") 
{
	$validationOK=false;
}
if (Trim($SqFt)=="") 
{
	$validationOK=false;
}
if (Trim($HDRPhotos)=="" || Trim($SPW)=="") 
{
	$validationOK=false;
}
if (Trim($Domain)=="") 
{
	$validationOK=false;
}
if (Trim($Access)=="") 
{
	$validationOK=false;
}
if (Trim($Vendor)=="") 
{
	$validationOK=false;
}
if (Trim($Date)=="") 
{
	$validationOK=false;
}
if (Trim($Time)=="") 
{
	$validationOK=false;
}



if (!$validationOK) {
//  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.php\">";
header("location: order.php");
  exit;
}

*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="keywords" content="victor lin, real estate photographer california, real estate photographer Fremont, real estate photographer San Francisco, real estate photographer San Jose, real estate photographer Mountain View, real estate photographer Palo Alto, real estate photographer Cupertino, real estate photographer Los Altos, real estate photographer Sunnyvale, real estate photographer Milpitas, real estate photographer Santa Clara, real estate photographer Saratoga, real estate photographer Menlo Park, real estate photographer San Carlos, real estate photographer Redwood City, real estate photographer San Mateo, real estate photographer Campbell, real estate photographer Union City, real estate photographer Hayward, real estate photographer Los Gatos." />
	<meta name="description" content="Photography in California from Victor Lin Photography covers photography in Fremont, San Francisco, San Jose, Mountain View, Palo Alto, Cupertino, Los Altos, Sunnyvale, Milpitas, Santa Clara, Saratoga, Menlo Park, San Carlos, Redwood City, San Mateo, Campbell, Union City, Hayward, and Los Gatos." />
	<title>Victor Lin Real Estate Photography Packages</title>
	<style type="text/css">
<!--
@import url("../css/master.css");
@import url("../css/site.css");
-->
</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/jquery.lightbox-0.5.js"></script>
	<script src="../js/jquery.newsslider.js" language="javascript" type="text/javascript"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
	<script src="/js/slides.min.jquery.js"></script>

	<!--Script for the upper banner slider with the green circles-->
	<script>
		$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true
			});
		});
	</script>
	</head>

	<body id="header_big">
<div id="container">
<div id="header">
      <?php include("../includes/slideshowrealestate.inc.php"); ?>
      <?php include("../includes/navrealestate.inc.php"); ?>
      <?php
    // convert posted data into local variables

$_SESSION['AgentEmail'] = Trim(stripslashes($_POST['agentemail']));
$_SESSION['OtherEmail'] = Trim(stripslashes($_POST['otheremail']));
$_SESSION['AgentName'] = Trim(stripslashes($_POST['agentname']));
$_SESSION['OtherName'] = Trim(stripslashes($_POST['othername']));
$_SESSION['Telephone'] = Trim(stripslashes($_POST['phone']));
$_SESSION['Address1'] = Trim(stripslashes($_POST['address1']));
$_SESSION['Address2'] = Trim(stripslashes($_POST['address2']));
$_SESSION['City'] = Trim(stripslashes($_POST['city']));
$_SESSION['State'] = Trim(stripslashes($_POST['state']));
$_SESSION['Zip'] = Trim(stripslashes($_POST['zip']));
$_SESSION['SqFt'] = Trim(stripslashes($_POST['sqft']));
$_SESSION['HDRPhotos'] = Trim(stripslashes($_POST['hdrphotos']));
$_SESSION['SPW'] = Trim(stripslashes($_POST['SPW']));
$_SESSION['Domain'] = Trim(stripslashes($_POST['domainurl']));
$_SESSION['Panoramas'] = Trim(stripslashes($_POST['panoramas']));
$_SESSION['Rush'] = Trim(stripslashes($_POST['rush']));
$_SESSION['TourFactory'] = Trim(stripslashes($_POST['tourfactory']));
$_SESSION['TourFactoryPass'] = Trim(stripslashes($_POST['tourfactorypass']));
$_SESSION['FullVideo'] = Trim(stripslashes($_POST['fullvideo']));
$_SESSION['TwilightPhotos'] = Trim(stripslashes($_POST['twilightphotos']));
$_SESSION['TwilightVideos'] = Trim(stripslashes($_POST['twilightvideos']));
$_SESSION['Weekend'] = Trim(stripslashes($_POST['weekend']));
$_SESSION['Exteriors'] = Trim(stripslashes($_POST['exteriors']));
$_SESSION['Reshoot'] = Trim(stripslashes($_POST['reshoot']));
$_SESSION['Access'] = Trim(stripslashes($_POST['access']));
$_SESSION['Vendor'] = Trim(stripslashes($_POST['vendor']));
$_SESSION['Date'] = Trim(stripslashes($_POST['date']));
$_SESSION['Time'] = Trim(stripslashes($_POST['time']));
$_SESSION['Notes'] = Trim(stripslashes($_POST['notes']));
$_SESSION['Referral'] = Trim(stripslashes($_POST['referral']));

$AgentEmail = Trim(stripslashes($_POST['agentemail']));
$OtherEmail = Trim(stripslashes($_POST['otheremail'])); 
$EmailFrom = $AgentEmail.", ".$OtherEmail; 
$EmailTo = "victor@victorlinphoto.com";
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
$Address1 = Trim(stripslashes($_POST['address1']));
$Address2 = Trim(stripslashes($_POST['address2']));
$City = Trim(stripslashes($_POST['city']));
$State = Trim(stripslashes($_POST['state']));
$Zip = Trim(stripslashes($_POST['zip']));
$SPW = Trim(stripslashes($_POST['SPW'])); 
$Panoramas = Trim(stripslashes($_POST['panoramas'])); 
$Rush = Trim(stripslashes($_POST['rush'])); 
$TourFactory = Trim(stripslashes($_POST['tourfactory'])); 
$TourFactoryPass = Trim(stripslashes($_POST['tourfactorypass'])); 
$FullVideo = Trim(stripslashes($_POST['fullvideo'])); 
$TwilightPhotos = Trim(stripslashes($_POST['twilightphotos']));
$TwilightVideos = Trim(stripslashes($_POST['twilightvideos']));  
$Weekend = Trim(stripslashes($_POST['weekend']));  
$Exteriors = Trim(stripslashes($_POST['exteriors']));  
$Reshoot = Trim(stripslashes($_POST['reshoot']));  
$Domain = Trim(stripslashes($_POST['domainurl']));
$Access = Trim(stripslashes($_POST['access'])); 
$Notes = Trim(stripslashes($_POST['notes'])); 
$Vendor = Trim(stripslashes($_POST['vendor'])); 
$Date = Trim(stripslashes($_POST['date']));
$Time = Trim(stripslashes($_POST['time']));
$Schedule = $Date.", ".$Time; 
$Referral = Trim(stripslashes($_POST['referral']));

$TotalPackages = $HDRPhotos."<br />".$SPW."<br />".$Domain."<br />".$Panoramas."<br />".$Rush."<br />".$TourFactory."<br />".$TourFactoryPass."<br />".$FullVideo."<br />".$TwilightPhotos."<br />".$TwilightVideos."<br />".$Weekend."<br />".$Exteriors;


$ProcessorNotes = "Agent and Project Info:\n\n".$AgentName."\n".$Telephone."\n".$AgentEmail."\n".$Domain."
\n\nCc: ".$OtherName." - ".$OtherEmail."\n";
$ProcessorNotes=urlencode(str_replace("'", "&#39", $ProcessorNotes)); 

$FullAddress = Trim(stripslashes($_POST['address1']))." ".Trim(stripslashes($_POST['address2'])).", ".Trim(stripslashes($_POST['city'])).", ".Trim(stripslashes($_POST['state'])).", ".Trim(stripslashes($_POST['zip'])); 
$FullAddress = ucwords($FullAddress);
$FullAddress = str_replace("#", "Unit ", $FullAddress);
$Subject = "New Photography Order for ".Trim(stripslashes($FullAddress))." from ".$AgentName;

$joblink='http://www.victorlinphoto.com/vt/scripts/PhotographerEmailer.php?address='.$FullAddress.'&client='.$AgentName.'&clientemail='.$EmailFrom.'&sqft='.$SqFt.'&processornotes='.$ProcessorNotes.'&vendor='.$Vendor;

$Body = "";
$Body = "Link:\n\n ".$joblink."\n\nCalendar Entry:\n\n".$FullAddress." - ".$AgentName.", ".$OtherName.", ".$Telephone.", ".$Access.", ".$Notes.", ".$SqFt.", ".$Domain."
\n\nAddress of Listing:\n\n".$FullAddress."
\n\nClient Name:\n\n".$AgentName."
\n\nEmails:\n\n".$EmailFrom."
\n\nSquare Footage:\n\n".$SqFt."
\n\nAgent and Project Info:\n\n".$AgentName."\n".$Telephone."\n".$AgentEmail."\n".$Domain."
\n\nCc: ".$OtherName." - ".$OtherEmail."
\n\nVendor:\n\n ".$Vendor." 
\n\nService:\n\n ".$TotalPackages." 
\n\nSchedule: ".$Schedule;

?>
      <div id="content">
    <div id="left_even">
          <h1><b><img src="../images/please_confirm_order.jpg"</b><span class="brown2"><br />
            </span></h1>
            
            <!--
            Takes the submitted information from the order.php form page and re-enters then into a hidden form, ready to be submitted a second time after the user presses "Submit"
            The order_mailer.php page emails the order to me.
            This code is for the "Submit" button at the top of the page.
            -->
            
          <form method="POST" action="../order_mailer.php" name="enquire" id="enquire">
        <input class="inputLeft" name="agentemail" type="hidden" id="agentemail" value="<?php echo $_POST['agentemail']?>"/>
        <input class="inputLeft" name="otheremail" type="hidden" id="otheremail" value="<?php echo $_POST['otheremail']?>"/>
        <input class="inputLeft" name="agentname" type="hidden" id="agentname" value="<?php echo $_POST['agentname']?>"/>
        <input class="inputLeft" name="othername" type="hidden" id="othername" value="<?php echo $_POST['othername']?>"/>
        <input class="inputLeft" name="phone" type="hidden" id="phone" value="<?php echo $_POST['phone']?>"/>
        <input class="inputLeft" name="sqft" type="hidden" id="sqft" value="<?php echo $SqFt?>"/>
        <input class="inputLeft" name="hdrphotos" type="hidden" id="hdrphotos" value="<?php echo $_POST['hdrphotos']?>"/>
        <input class="inputLeft" name="SPW" type="hidden" id="SPW" value="<?php echo $_POST['SPW']?>"/>
        <input class="inputLeft" name="domain" type="hidden" id="domain" value="<?php echo $_POST['domain']?>"/>
        <input class="inputLeft" name="panoramas" type="hidden" id="panoramas" value="<?php echo $_POST['panoramas']?>"/>
        <input class="inputLeft" name="rush" type="hidden" id="rush" value="<?php echo $_POST['rush']?>"/>
        <input class="inputLeft" name="tourfactory" type="hidden" id="tourfactory" value="<?php echo $_POST['tourfactory']?>"/>
        <input class="inputLeft" name="tourfactorypass" type="hidden" id="tourfactorypass" value="<?php echo $_POST['tourfactorypass']?>"/>
        <input class="inputLeft" name="fullvideo" type="hidden" id="fullvideo" value="<?php echo $_POST['fullvideo']?>"/>
        <input class="inputLeft" name="twilightphotos" type="hidden" id="twilightphotos" value="<?php echo $_POST['twilightphotos']?>"/>
        <input class="inputLeft" name="twilightvideos" type="hidden" id="twilightvideos" value="<?php echo $_POST['twilightvideos']?>"/>
        <input class="inputLeft" name="weekend" type="hidden" id="weekend" value="<?php echo $_POST['weekend']?>"/>
        <input class="inputLeft" name="exteriors" type="hidden" id="exteriors" value="<?php echo $_POST['exteriors']?>"/>
        <input class="inputLeft" name="reshoot" type="hidden" id="reshoot" value="<?php echo $_POST['reshoot']?>"/>
        <input class="inputLeft" name="access" type="hidden" id="access" value="<?php echo $_POST['access']?>"/>
        <input class="inputLeft" name="notes" type="hidden" id="notes" value="<?php echo $_POST['notes']?>"/>
        <input class="inputLeft" name="vendor" type="hidden" id="vendor" value="<?php echo $_POST['vendor']?>"/>
        <input class="inputLeft" name="schedule" type="hidden" id="schedule" value="<?php echo $_POST['schedule']?>"/>
        <input class="inputLeft" name="address1" type="hidden" id="address1" value="<?php echo $_POST['address1']?>"/>
        <input class="inputLeft" name="address2" type="hidden" id="address2" value="<?php echo $_POST['address2']?>"/>
        <input class="inputLeft" name="city" type="hidden" id="city" value="<?php echo $_POST['city']?>"/>
        <input class="inputLeft" name="state" type="hidden" id="state" value="<?php echo $_POST['state']?>"/>
        <input class="inputLeft" name="zip" type="hidden" id="zip" value="<?php echo $_POST['zip']?>"/>
        <a href="javascript:history.go(-1)" data-icon="back" data-role="button" data-theme="b" ><img src="../images/back_form.jpg"></a>
        <input type="image" name="submit" value="Submit" src="../images/confirm_submit_form.jpg">
      </form>
      
      <!--This displays the contents of what the user entered in the order.php page-->
      
          <br />
          <div>
        <div>
              <p>* denotes required fields</p>
              <p class="p12" style="padding:0px;">Agent Name  *</p>
              <p style="padding-bottom:5px;">
          <h2><b><?php echo $AgentName?></b></h2>
              </p>
              <br clear="all" />
              <p class="p12" style="padding:0px;">Your Name (if different from above) </p>
              <p style="padding-bottom:5px;">
          <h2><b><?php echo $OtherName?></b></h2>
              </p>
              <br clear="all" />
              <p class="p12" style="padding:0px;">Agent's Phone with Area Code *</p>
              <p style="padding-bottom:5px;">
          <h2><b><?php echo $Telephone?></b></h2>
              </p>
              <br clear="all" />
              <p class="p12" style="padding:0px;">Agent's Email *</p>
              <p style="padding-bottom:5px;">
          <h2><b><?php echo $AgentEmail?></b></h2>
              </p>
              <br clear="all" />
              <p class="p12" style="padding:0px;">Your Email (if different from above)</p>
              <p style="padding-bottom:5px;">
          <h2><b><?php echo $OtherEmail?></b></h2>
              </p>
              <br clear="all" />
              <p class="p12" style="padding:0px;">Address of Property  *</p>
              <p style="padding-bottom:5px;">
          <h2><b><?php echo $FullAddress?></b></h2>
              </p>
              <br clear="all" />
              <p class="p12" style="padding:0px;">Square footage of all living spaces, subject to verification*</p>
              <p style="padding-bottom:5px;">
          <h2><b><?php echo $SqFt?></b></h2>
              </p>
              <br clear="all" />
              <p class="p12" style="padding:0px;">What services would you like? *</p>
              <p style="padding-bottom:5px;">
          <h2><b><?php echo $TotalPackages?></b></h2>
              </p>
              <br clear="all" />
              <p class="p12" style="padding:0px;">If you want a custom website address, what would you like it to be? <br/>
            (ex. www.1234MainSt.com)</p>
              <p style="padding-bottom:5px;">
          <h2><b><?php echo $Domain?></b></h2>
              </p>
              <br clear="all" />
              <p class="p12" style="padding:0px;">How will we access the property? If a combo, what is it? *</p>
              <p style="padding-bottom:5px;">
          <h2><b><?php echo $Access?></b></h2>
              </p>
              <br clear="all" />
              <p class="p12" style="padding:0px;">Did you use any of the following professionals for this property? *</p>
              <p style="padding-bottom:5px;">
          <h2><b><?php echo $Vendor?></b></h2>
              </p>
              <br clear="all" />
              <p class="p12" style="padding:0px;"><b>Date</b> and <b>time</b> you would like to have this shot?     *</br>
            Only schedule us for a time when the property is 100% </br>
            photo-ready and vacant. We cannot coordinate directly</br>
            with any of the stagers above for scheduling.</br>
          </p>
              <p class="p12" style="padding:0px;"></p>
              <p style="padding-bottom:5px;">
          <h2><b><?php echo $Schedule?></b></h2>
              </p>
              <br clear="all" />
              <p class="p12" style="padding:0px;">If someone referred you, who was it? <br />
            They will earn a $50 credit with us on their next order!</p>
              <p class="p12" style="padding:0px;"></p>
              <p style="padding-bottom:5px;">
          <h2><b><?php echo $Referral?></b></h2>
              </p>
              <br clear="all" />
              <p class="p12" style="padding:0px;">Additional notes such as areas to focus on or your </br>
            TourFactory username and password (if applicable)?</p>
              <p class="p12" style="padding:0px;"></p>
              <p style="padding-bottom:5px;">
          <h2><b><?php echo $Notes?></b></h2>
              </p>
              <br clear="all" />
              
            <!--
            Takes the submitted information from the order.php form page and re-enters then into a hidden form, ready to be submitted a second time after the user presses "Submit"
            The order_mailer.php page emails the order to me.
            This code is for the "Submit" button at the bottom of the page.
            -->
              <form method="POST" action="../order_mailer.php" name="enquire" id="enquire">
            <input class="inputLeft" name="agentemail" type="hidden" id="agentemail" value="<?php echo $_POST['agentemail']?>"/>
            <input class="inputLeft" name="otheremail" type="hidden" id="otheremail" value="<?php echo $_POST['otheremail']?>"/>
            <input class="inputLeft" name="agentname" type="hidden" id="agentname" value="<?php echo $_POST['agentname']?>"/>
            <input class="inputLeft" name="othername" type="hidden" id="othername" value="<?php echo $_POST['othername']?>"/>
            <input class="inputLeft" name="phone" type="hidden" id="phone" value="<?php echo $_POST['phone']?>"/>
            <input class="inputLeft" name="sqft" type="hidden" id="sqft" value="<?php echo $SqFt?>"/>
            <input class="inputLeft" name="hdrphotos" type="hidden" id="hdrphotos" value="<?php echo $_POST['hdrphotos']?>"/>
            <input class="inputLeft" name="SPW" type="hidden" id="SPW" value="<?php echo $_POST['SPW']?>"/>
            <input class="inputLeft" name="domain" type="hidden" id="domain" value="<?php echo $_POST['domain']?>"/>
            <input class="inputLeft" name="panoramas" type="hidden" id="panoramas" value="<?php echo $_POST['panoramas']?>"/>
            <input class="inputLeft" name="rush" type="hidden" id="rush" value="<?php echo $_POST['rush']?>"/>
            <input class="inputLeft" name="tourfactory" type="hidden" id="tourfactory" value="<?php echo $_POST['tourfactory']?>"/>
            <input class="inputLeft" name="tourfactorypass" type="hidden" id="tourfactorypass" value="<?php echo $_POST['tourfactorypass']?>"/>
            <input class="inputLeft" name="fullvideo" type="hidden" id="fullvideo" value="<?php echo $_POST['fullvideo']?>"/>
            <input class="inputLeft" name="twilightphotos" type="hidden" id="twilightphotos" value="<?php echo $_POST['twilightphotos']?>"/>
            <input class="inputLeft" name="twilightvideos" type="hidden" id="twilightvideos" value="<?php echo $_POST['twilightvideos']?>"/>
            <input class="inputLeft" name="weekend" type="hidden" id="weekend" value="<?php echo $_POST['weekend']?>"/>
            <input class="inputLeft" name="exteriors" type="hidden" id="exteriors" value="<?php echo $_POST['exteriors']?>"/>
            <input class="inputLeft" name="reshoot" type="hidden" id="reshoot" value="<?php echo $_POST['reshoot']?>"/>
            <input class="inputLeft" name="access" type="hidden" id="access" value="<?php echo $_POST['access']?>"/>
            <input class="inputLeft" name="notes" type="hidden" id="notes" value="<?php echo $_POST['notes']?>"/>
            <input class="inputLeft" name="vendor" type="hidden" id="vendor" value="<?php echo $_POST['vendor']?>"/>
            <input class="inputLeft" name="schedule" type="hidden" id="schedule" value="<?php echo $Schedule?>"/>
            <input class="inputLeft" name="referral" type="hidden" id="referral" value="<?php echo $Referral?>"/>
            <input class="inputLeft" name="address1" type="hidden" id="address1" value="<?php echo $_POST['address1']?>"/>
            <input class="inputLeft" name="address2" type="hidden" id="address2" value="<?php echo $_POST['address2']?>"/>
            <input class="inputLeft" name="city" type="hidden" id="city" value="<?php echo $_POST['city']?>"/>
            <input class="inputLeft" name="state" type="hidden" id="state" value="<?php echo $_POST['state']?>"/>
            <input class="inputLeft" name="zip" type="hidden" id="zip" value="<?php echo $_POST['zip']?>"/>
            <a href="javascript:history.go(-1)" data-icon="back" data-role="button" data-theme="b" ><img src="../images/back_form.jpg"></a>
            <input type="image" name="submit" value="Submit" src="../images/confirm_submit_form.jpg">
          </form>
            </div>
        </p>
        <br clear="all" />
      </div>
          <br clear="all" />
        </div>
        
    <?php echo $right_content; ?> </div>
      <?php include("../includes/footer.inc.php"); ?>
    </div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script> 
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-8751659-1");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>