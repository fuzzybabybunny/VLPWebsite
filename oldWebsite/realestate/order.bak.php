<?php
// define variables and initialize with empty values

//error variables
$agentNameErr = $agentEmailErr = $otherEmailErr = $phoneErr = $address1Err = $cityErr = $stateErr = $zipErr = $sqftErr = $customsqftErr = $accessErr = $venderErr = $dateErr = $timeErr = "";

//non-error variables
$inquire = $agentname = $othername = $agentemail = $otheremail = $phone = $address1 = $address2 = $city = $state = $zip = $sqft = $customsqft = $domain = $access = $notes = $vendor = $date = $time = $referral = "";

$favFruit = array();
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
		if (empty($_POST["agentname"])) {
        $agentNameErr = "Missing";
    }
    else {
        $agentname = $_POST["agentname"];
    }
		
		if (empty($_POST["agentemail"]))  {
        $agentEmailErr = "Missing";
    }
    else {
        $agentemail = $_POST["agentemail"];
    }
		
		if (empty($_POST["phone"]))  {
        $phoneErr = "Missing";
    }
    else {
        $phone = $_POST["phone"];
    }
 
    if (empty($_POST["address1"])) {
        $address1Err = "Missing";
    }
    else {
        $address1 = $_POST["address1"];
    }
		
		if (empty($_POST["city"]))  {
        $cityErr = "Missing";
    }
    else {
        $city = $_POST["city"];
    }
		
		if (empty($_POST["state"]))  {
        $stateErr = "Missing";
    }
    else {
        $state = $_POST["state"];
    }
		
		if (empty($_POST["zip"]))  {
        $zipErr = "Missing";
    }
    else {
        $zip = $_POST["zip"];
    }
		
		if (empty( $_POST["sqft"] )&& ($_POST["customsqft"] == " sqft" ) )  {
        $sqftErr = "Missing";
    }
    else {
        $customsqft = $_POST["customsqft"];
				$sqft = $_POST["sqft"];
    }
		
		if (empty($_POST["access"]))  {
        $accessErr = "Missing";
    }
    else {
        $access = $_POST["access"];
    }
		
		if (empty($_POST["vendor"]))  {
        $vendorErr = "Missing";
    }
    else {
        $vendor = $_POST["vendor"];
    }
		
		if (empty($_POST["date"]))  {
        $dateErr = "Missing";
    }
    else {
        $date = $_POST["date"];
    }
		
		if (empty($_POST["time"]))  {
        $timeErr = "Missing";
    }
    else {
        $time = $_POST["time"];
    }
 
    if (!isset($_POST["howMany"])) {
        $howManyErr = "You must select 1 option";
    }
    else {
        $howMany = $_POST["howMany"];
    }
		
if ($agentNameErr && $agentEmailErr && $otherEmailErr && $phoneErr && $address1Err && $cityErr && $stateErr && $zipErr && $sqftErr && $customsqftErr && $accessErr && $venderErr && $dateErr && $timeErr = "") {
				$_SESSION['order-form'] = $_POST;
        // Move to next page
        header('Location: nextpage.php');
        exit;
	 }
}?>
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
<link rel="stylesheet" href="../js/validate/jquery.formance/demo/css/pygment_trac.css">
<!--<link rel="stylesheet" href="../js/validate/jquery.formance/demo/css/styles.css"/>-->
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>-->
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

<!--Script to Toggle Descriptions-->
<script>
$(document).ready(function(){
  $("button").click(function(){
    $("p").slideToggle();
  });
});
</script>
</head>

<body id="header_big">
<div id="container">
<div id="header"> 
  <!--Code for the Slideshow-->
  <?php include("../includes/slideshowrealestate.inc.php"); ?>
  <!--Code for the Navigation Bar-->
  <?php include("../includes/navrealestate.inc.php"); ?>
  
  
  
  <!--Defines the "Read More" description toggles under each item. ex. $photosLeft is the "Read More" toggle for the Unlimited Photography item on the left. $photos is the "Read More" toggle for the Unlimited Photography item on the right.-->
  <?php
	$page = $_REQUEST['page'];
	
	$photos = '<h1><b>Unlimited HDR Photos - no Single Property Website or Panoramas</b></h1>
	<script type="text/javascript">
			$(function() {
$("#toggle10").click(function() {
					$(".toggle10").slideToggle("fast");
					return false;
				});
			});
		</script>

<a href="#" id="toggle10"><b>More Info</b></a><br/>
		<div class="toggle10" style="display:none;">Includes unlimited daytime HDR photos and a single trip out to the property. A zip file with the bare JPG files will be emailed to you. No website or virtual tour / panoramas.<br />
		<a href="/realestate/images.php" target = "_blank"><img src="/images/order_form/photo_stack.png" /></a></div><br/>';
		
	$photosLeft = '<script type="text/javascript">
			$(function() {
$("#toggle510").click(function() {
					$(".toggle510").slideToggle("fast");
					return false;
				});
			});
		</script>

<a href="#" class="more_info_right" id="toggle510"><b>More Info</b></a><br/>
		<div class="toggle510" style="width: 330px; padding: 0px 0px 0px 25px; display: none;">Includes unlimited daytime HDR photos and a single trip out to the property. A zip file with the bare JPG files will be emailed to you. No website or virtual tour / panoramas.<br />
		<a href="/realestate/images.php" target = "_blank"><img src="/images/order_form/photo_stack.png" /></a></div><br/>';
		
	$spw = '<h1><b>Single Property Website: $25</b></h1>
	
<script type="text/javascript">
			$(function() {
$("#toggle20").click(function() {
					$(".toggle20").slideToggle("fast");
					return false;
				});
			});
</script>

<a href="#" id="toggle20"><b>More Info</b></a><br/>
<div class="toggle20" style="display:none;">A web page where the property can be showcased along with all of its media.<br /><br />
<a href="/realestate/virtualtours.php" target = "_blank"><img src="/images/order_form/virtual_tour_stack.png" /></a></div>
<br/>';

	$spwLeft = '<script type="text/javascript">
			$(function() {
$("#toggle520").click(function() {
					$(".toggle520").slideToggle("fast");
					return false;
				});
			});
</script>

<a href="#" class="more_info_right" id="toggle520"><b>More Info</b></a><br/>
<div class="toggle520" style="width: 330px; padding: 0px 0px 0px 25px; display: none;">A web page where the property can be showcased along with all of its media.<br /><br />
</div>
<div class="toggle520" style="display:none;">
<a href="/realestate/virtualtours.php" target = "_blank"><img src="/images/order_form/virtual_tour_stack.png" /></a></div>
<br/>';

	$domain = '<h1><b>Custom Web Address / Domain Name: $20</b></h1>
		<script type="text/javascript">
			$(function() {
$("#toggle60").click(function() {
					$(".toggle60").slideToggle("fast");
					return false;
				});
			});
</script>

<a href="#" id="toggle60"><b>More Info</b></a><br/>
<div class="toggle60" style="display:none;">Also known as a URL, a custom web address where viewers can go to view the Single Property Website ( example: www.1234MainSt.com )</div>
<br/>';

	$domainLeft = '<script type="text/javascript">
			$(function() {
$("#toggle560").click(function() {
					$(".toggle560").slideToggle("fast");
					return false;
				});
			});
</script>

<a href="#" class="more_info_right" id="toggle560"><b>More Info</b></a><br/>
<div class="toggle560" style="width: 330px; padding: 0px 0px 0px 25px; display: none;">Also known as a URL, a custom web address where viewers can go to view the Single Property Website ( example: www.1234MainSt.com )</div>
<br/>';

	$panos = '<h1><b>Panoramas / Virtual Tour Effect: $20</b></h1>
		<script type="text/javascript">
			$(function() {
$("#toggle100").click(function() {
					$(".toggle100").slideToggle("fast");
					return false;
				});
			});
</script>

<a href="#" id="toggle100"><b>More Info</b></a><br/>
<div class="toggle100" style="display:none;"><b>A Single Property Website is  with this addition.</b> Panoramas are what give the traditional "virtual tour" effect of spinning around in 180 - 360 degrees.<br />
<br /></div>
<div class="toggle100" style="width: 425px; padding: 0px 0px 0px 25px; display: none;">
<b>When loaded onto a Single Property Website, a panorama...</b>
<br />
<br />
<img src="/images/order_form/panorama.jpg" />
<br />
<br />
<b>Becomes...</b>
<br />
<br />
<video controls>
  <source src="/images/order_form/VT_Clip.mp4" type="video/mp4">
Your browser does not support the video tag.
</video></div>
<br/>';

	$panosLeft = '<script type="text/javascript">
			$(function() {
$("#toggle500").click(function() {
					$(".toggle500").slideToggle("fast");
					return false;
				});
			});
</script>

<a href="#" class="more_info_right" id="toggle500"><b>More Info</b></a><br/>
<div class="toggle500" style="width: 330px; padding: 0px 0px 0px 25px; display: none;"><b>A Single Property Website is  with this addition.</b> Panoramas are what give the traditional "virtual tour" effect of spinning around in 180 - 360 degrees.<br />
<br /></div>
<div class="toggle500" style="width: 425px; padding: 0px 0px 0px 25px; display: none;">
<b>When loaded onto a Single Property Website, a panorama...</b>
<br />
<br />
<img src="/images/order_form/panorama.jpg" />
<br />
<br />
<b>Becomes...</b>
<br />
<br />
<video controls>
  <source src="/images/order_form/VT_Clip.mp4" type="video/mp4">
Your browser does not support the video tag.
</video></div>
<br/>';
	
	$twilight = '<h1><b>Twilight Photography</b></h1>';
	
	$weekend = '<h1><b>Weekend Service: $50</b></h1>
	<script type="text/javascript">
			$(function() {
$("#toggle40").click(function() {
					$(".toggle40").slideToggle("fast");
					return false;
				});
			});
</script>

<a href="#" id="toggle40"><b>More Info</b></a><br/>
<div class="toggle40" style="display:none;">Subject to photographer availability.</div>
<br/>';

	$weekendLeft = '<script type="text/javascript">
			$(function() {
$("#toggle540").click(function() {
					$(".toggle540").slideToggle("fast");
					return false;
				});
			});
</script>

<a href="#" class="more_info_right" id="toggle540"><b>More Info</b></a><br/>
<div class="toggle540" style="width: 330px; padding: 0px 0px 0px 25px; display: none;">Subject to photographer availability.</div>
<br/>';
		
	$rush = '<h1><b>RUSH Delivery: $50</b></h1>
	<script type="text/javascript">
			$(function() {
$("#toggle90").click(function() {
					$(".toggle90").slideToggle("fast");
					return false;
				});
			});
</script>

<a href="#" id="toggle90"><b>More Info</b></a><br/>
<div class="toggle90" style="display:none;">Our normal turnaround times for photos is 8AM the next day. We can rush and deliver them to you before 6PM on the same day of shooting with this service. Single Property Websites and Videos will be delivered at a later time.</div>
<br/>';

	$rushLeft = '<script type="text/javascript">
			$(function() {
$("#toggle590").click(function() {
					$(".toggle590").slideToggle("fast");
					return false;
				});
			});
</script>

<a href="#" class="more_info_right" id="toggle590"><b>More Info</b></a><br/>
<div class="toggle590" style="width: 330px; padding: 0px 0px 0px 25px; display: none;">Our normal turnaround times for photos is 8AM the next day. We can rush and deliver them to you before 6PM on the same day of shooting with this service. Single Property Websites and Videos will be delivered at a later time.</div>
<br/>';


	$exteriors = '<h1><b>Preliminary Exterior Shots: $50</b></h1>
	<script type="text/javascript">
			$(function() {
$("#toggle50").click(function() {
					$(".toggle50").slideToggle("fast");
					return false;
				});
			});
</script>

<a href="#" id="toggle50"><b>More Info</b></a><br/>
<div class="toggle50" style="display:none;">For clients who want quick exterior shots for putting on the market with. Interior shots will be scheduled for a later date.</div>
<br/>';
	
	$exteriorsLeft = '<script type="text/javascript">
			$(function() {
$("#toggle550").click(function() {
					$(".toggle550").slideToggle("fast");
					return false;
				});
			});
</script>

<a href="#" class="more_info_right" id="toggle550"><b>More Info</b></a><br/>
<div class="toggle550" style="width: 330px; padding: 0px 0px 0px 25px; display: none;">For clients who want quick exterior shots for putting on the market with. Interior shots will be scheduled for a later date.</div>
<br/>';

	$tourfactory = '<h1><b>Uploading to <a href="http://www.tourfactory.com/">TourFactory</a>: FREE with Single Property Website orders</b></h1>
	
	<script type="text/javascript">
			$(function() {
$("#toggle70").click(function() {
					$(".toggle70").slideToggle("fast");
					return false;
				});
			});
</script>

<a href="#" id="toggle70"><b>More Info</b></a><br/>
<div class="toggle70" style="display:none;">Some agents already have TourFactory accounts and prefer to use TourFactory as their Single Property Website platform. We offer uploading to their existing TourFactory accounts for FREE. Agent assumes all responsibility for TourFactory fees.</div>
<br/>';

	$tourfactoryLeft = '<script type="text/javascript">

			$(function() {
$("#toggle570").click(function() {
					$(".toggle570").slideToggle("fast");
					return false;
				});
			});
</script>

<a href="#" class="more_info_right" id="toggle570"><b>More Info</b></a><br/>
<div class="toggle570" style="width: 330px; padding: 0px 0px 0px 25px; display: none;">Some agents already have TourFactory accounts and prefer to use TourFactory as their Single Property Website platform. We offer uploading to their existing TourFactory accounts for FREE. Agent assumes all responsibility for TourFactory fees.</div>
<br/>';

	$video = '<h1><b>Full Motion Video Tour shot with Video Cameras</b></h1>
     <h1><b><a href="http://www.youtube.com/user/victorlinphoto/videos" target="_blank">(Click for our YouTube Channel)</a></b></h1>
	 
	 	<script type="text/javascript">
			$(function() {
$("#toggle80").click(function() {
					$(".toggle80").slideToggle("fast");
					return false;
				});
			});
</script>

<a href="#" id="toggle80"><b>More Info</b></a><br/>
<div class="toggle80" style="display:none;">We will come in with professional video equipment and shoot a 3 - 8 minute video of the property. The video file will be made available for download. Turnaround time is 2 days from the date of shooting.</div>
<br/>';

	$videoLeft = '<script type="text/javascript">
			$(function() {
$("#toggle580").click(function() {
					$(".toggle580").slideToggle("fast");
					return false;
				});
			});
</script>

<a href="#" class="more_info_right" id="toggle580"><b>More Info</b></a><br/>
<div class="toggle580" style="width: 330px; padding: 0px 0px 0px 25px; display: none;">We will come with professional video equipment and shoot a 3 - 8 minute video of the property. The video file will be made available for download. Turnaround time is 2 days from the date of shooting.</div>
<br/>';

	$OneTwoSixLeft = '<script type="text/javascript">
			$(function() {
$("#toggle5100").click(function() {
					$(".toggle5100").slideToggle("fast");
					return false;
				});
			});
</script>

<a href="#" class="more_info_right" id="toggle5100"><b>More Info</b></a><br/>
<div class="toggle5100" style="width: 330px; padding: 0px 0px 0px 25px; display: none;">$25-$50 discount for packages with a Single Property Website.</div>
<br/>';

/*

area_1, area_2, area_3 are from the prices.php page. Different areas have different prices, so different text needs to be shown for each area.

The defines the $right_content (content on the right side of the page) depending on the area.

*/

	switch ($page) {
		case "":
		$right_content = '<div id="right_even">
<h1><b>To see prices, please select the location of the property:</b></h1>	<br/>	
<a href="http://victorlinphoto.com/realestate/prices.php?page=area_1"><h3>Campbell, Cupertino, East Palo Alto, Fremont, Los Altos, Los Gatos, Menlo Park, Milpitas, Mountain View, Newark, Palo Alto, San Jose, Santa Clara, Saratoga, Sunnyvale, Union City</a></h3><br /><br />

<a href="http://victorlinphoto.com/realestate/prices.php?page=area_2"><h3>Atherton, Belmont, Burlingame, Dublin, Hayward, Hillsborough, Millbrae, Morgan Hill, Redwood City, San Bruno, San Carlos, San Leandro, San Mateo, Foster City</a></h3><br /><br />

<a href="http://victorlinphoto.com/realestate/prices.php?page=area_3"><h3>Alameda, Berkeley, Daly City, Gilroy, Half Moon Bay, Oakland, Pacifica, San Francisco, South San Francisco, San Leandro</a></h3><br /><br />
</div>';
break;
		case "area_1":
			$right_content = '<div id="right_even">
    <h1><b>Packages and Prices for:</b></h1>
	<br/><h3><b>Campbell, Cupertino, East Palo Alto, Fremont, Los Altos, Los Gatos, Menlo Park, Milpitas, Mountain View, Newark, Palo Alto, San Jose, Santa Clara, Saratoga, Sunnyvale, Union City</b></h3><br/><br/>
	
	'.$photos.'
		
    <b><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Under 1,500 sqft: $100 </p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1,501-2,000 sqft: $125 </p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2,001-3,000 sqft: $150 </p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3,001-4,000 sqft: $175 </p>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Over 4,001 sqft: Custom Pricing </p></b>
	
    '.$spw.'
	
	'.$panos.'
	
	'.$domain.'

	'.$twilight.'
	
	<b><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Under 1,500 sqft: $100 </p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1,501-2,000 sqft: $125 </p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2,001-3,000 sqft: $150 </p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3,001-4,000 sqft: $175 </p>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Over 4,001 sqft: Custom Pricing </p></b>
	
	'.$rush.'
	
	'.$weekend.'

	<h1><b>Preliminary Exterior Shots: $50</b></h1>
	<script type="text/javascript">
			$(function() {
$("#toggle50").click(function() {
					$(".toggle50").slideToggle("fast");
					return false;
				});
			});
</script>

<a href="#" id="toggle50"><b>More Info</b></a><br/>
<div class="toggle50" style="display:none;">For clients who want quick exterior shots for putting on the market with. Interior shots will be scheduled for a later date.</div>
<br/>

	'.$tourfactory.'
    
    '.$video.'

    <b><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Under 1,500 sqft: $300</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1,501-2,000 sqft: $375</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2,001-3,000 sqft: $475</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3,001-4,000 sqft: $575</p>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agent Video Intro: $30</p>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agent Video Closing: $30</p>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agent Voiceover: $70</p></b>
    </div>
    <br clear="all" />
  </div>';
			break;
			case "area_2":
			$right_content = '<div id="right_even">
<h1><b>Packages and Prices for:</b></h1>
<br/><h3><b>Atherton, Belmont, Burlingame, Dublin, Hayward, Hillsborough, Millbrae, Morgan Hill, Redwood City, San Bruno, San Carlos, San Leandro, San Mateo, Foster City</b></h3><br/><br/>

	'.$photos.'
		
    <b><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Under 1,500 sqft: $150 </p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1,501-2,000 sqft: $175 </p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2,001-3,000 sqft: $200 </p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3,001-4,000 sqft: $225 </p>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Over 4,001 sqft: Custom Pricing </p></b>
	
    '.$spw.'
	
	'.$panos.'
	
	'.$domain.'

	'.$twilight.'
	
	<b><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Under 1,500 sqft: $150 </p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1,501-2,000 sqft: $175 </p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2,001-3,000 sqft: $200 </p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3,001-4,000 sqft: $225 </p>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Over 4,001 sqft: Custom Pricing </p></b>
	
	'.$rush.'
	
	'.$weekend.'

	<h1><b>Preliminary Exterior Shots: $75</b></h1>
	<script type="text/javascript">
			$(function() {
$("#toggle50").click(function() {
					$(".toggle50").slideToggle("fast");
					return false;
				});
			});
</script>

<a href="#" id="toggle50"><b>More Info</b></a><br/>
<div class="toggle50" style="display:none;">For clients who want quick exterior shots for putting on the market with. Interior shots will be scheduled for a later date.</div>
<br/>

	'.$tourfactory.'
    
    '.$video.'

    <b><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Under 1,500 sqft: $350</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1,501-2,000 sqft: $425</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2,001-3,000 sqft: $525</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3,001-4,000 sqft: $625</p>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agent Video Intro: $30</p>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agent Video Closing: $30</p>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agent Voiceover: $70</p></b>
    </div>
    <br clear="all" />
  </div>';
  
			break;
		case "area_3":
			$right_content = '<div id="right_even">
    <h1><b>Packages and Prices for:</b></h1>
	<br/><h3><b>Alameda, Berkeley, Daly City, Gilroy, Oakland, Pacifica, San Francisco, South San Francisco, San Leandro
</b></h3><br/><br/>
    
		'.$photos.'
		
    <b><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Under 1,500 sqft: $175 </p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1,501-2,000 sqft: $200 </p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2,001-3,000 sqft: $225 </p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3,001-4,000 sqft: $250 </p>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Over 4,001 sqft: Custom Pricing </p></b>
	
    '.$spw.'
	
	'.$panos.'

	'.$domain.'

	'.$twilight.'
	
	<b><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Under 1,500 sqft: $175 </p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1,501-2,000 sqft: $200 </p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2,001-3,000 sqft: $225 </p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3,001-4,000 sqft: $250 </p>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Over 4,001 sqft: Custom Pricing </p></b>
	
	'.$rush.'
	
	'.$weekend.'

	<h1><b>Preliminary Exterior Shots: $100</b></h1>
	<script type="text/javascript">
			$(function() {
$("#toggle50").click(function() {
					$(".toggle50").slideToggle("fast");
					return false;
				});
			});
</script>

<a href="#" id="toggle50"><b>More Info</b></a><br/>
<div class="toggle50" style="display:none;">For clients who want quick exterior shots for putting on the market with. Interior shots will be scheduled for a later date.</div>
<br/>

	'.$tourfactory.'
    
    '.$video.'

    <b><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Under 1,500 sqft: $375</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1,501-2,000 sqft: $450</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2,001-3,000 sqft: $550</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3,001-4,000 sqft: $650</p>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agent Video Intro: $30</p>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agent Video Closing: $30</p>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agent Voiceover: $70</p></b>
    </div>
    <br clear="all" />
  </div>';
			break;
	}
	?>
    
  <!--
  
  This is the main order form. When submitted, the info gets passed to orderconfirm.php which is an order confirmation page for the client to review the order.
  
  Things to do:
  
  1. The fields marked with * MUST be filled out.
  2. The form fields must be validated to contain the correct text.
  3. Certain fields must have AutoComplete off.
  4. I want the order form to calculate an estimated total price in real-time as the client checkmarks items.
  
  -->
  
  <div id="content">
    <div id="left_even">
      <h1><b>Order Inquiry Form</b></h1>
      <h2><span class="brown2">Please submit an order inquiry and we will get in touch with you. Be sure to note our prices on the right.<br />
        &nbsp;</span></h2>
      <div id="formorder">
      <!--<form method="POST" action="orderconfirm.php" name="inquire" id="inquire">-->
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="inquire" id="inquire">
        <div id="left_even">
          <p>* denotes required fields</p>
          <p class="p12" style="padding:0px;">Agent Name  *</p>
          <p style="padding-bottom:5px;">
            <input class="inputLeft" name="agentname" type="text" id="agentname" autocomplete="on"  placeholder="Agent Name" value= "<?php echo htmlspecialchars($agentname);?>" />
						<span class="error"><?php echo $agentNameErr;?></span>

          </p>
          <br clear="all" />
          <p class="p12" style="padding:0px;">Your Name (if different from above) </p>
          <p style="padding-bottom:5px;">
            <input class="inputLeft" name="othername" type="text" id="othername" autocomplete="on" />
          </p>
          <br clear="all" />
          <p class="p12" style="padding:0px;">Agent's Phone with Area Code *</p>
          <p style="padding-bottom:5px;">
            <input class="inputLeft" name="phone" type="text" placeholder="Phone Number" value= "<?php echo htmlspecialchars($phone);?>" />
						<span class="error"><?php echo $phoneErr;?></span>
          </p>
          <br clear="all" />
          <p class="p12" style="padding:0px;">Agent's Email *</p>
          <p style="padding-bottom:5px;">
            <input class="inputLeft" name="agentemail" type="text" id="agentemail" placeholder="Agent Email" data-formance_algorithm="complex" value= "<?php echo htmlspecialchars($agentemail);?>" />
						<span class="error"><?php echo $agentEmailErr;?></span>
          </p>
          <br clear="all" />
          <p class="p12" style="padding:0px;">Your Email (if different from above)</p>
          <p style="padding-bottom:5px;">
            <input class="inputLeft" name="otheremail" type="text" id="otheremail" placeholder="Email" data-formance_algorithm="complex" value= "<?php echo htmlspecialchars($otheremail);?>" />
						<span class="error"><?php echo $otherEmailErr;?></span>
          </p>
          <br clear="all" />
          <p class="p12" style="padding:0px;">Address of Property  *</p>
          <p style="padding-bottom:5px;">
            <input class="inputLeft" name="address1" type="text" id="address1" autocomplete="off"  placeholder="Address 1" value= "<?php echo htmlspecialchars($address1);?>" />
						<span class="error"><?php echo $address1Err;?></span>
          </p>
          <br clear="all" />
          <p class="p12" style="padding:0px;"></p>
          <p style="padding-bottom:5px;">
            <input class="inputLeft" name="address2" type="text" id="address2" autocomplete="off" placeholder="Address 2" />
          </p>
          <br clear="all" />
          <p class="p12" style="padding:0px;">City  *</p>
          <p style="padding-bottom:5px;">
            <input class="inputLeft" name="city" type="text" id="city" autocomplete="off" placeholder="City" value= "<?php echo htmlspecialchars($city);?>" />
						<span class="error"><?php echo $cityErr;?></span>
          </p>
          <br clear="all" />
          <p class="p12" style="padding:0px;">State  *</p>
          <p style="padding-bottom:5px;">
            <select name="state"  autocomplete="off" >
              <option value="AL">Alabama</option>
              <option value="AK">Alaska</option>
              <option value="AZ">Arizona</option>
              <option value="AR">Arkansas</option>
              <option value="CA" selected>California</option>
              <option value="CO">Colorado</option>
              <option value="CT">Connecticut</option>
              <option value="DE">Delaware</option>
              <option value="DC">District of Columbia</option>
              <option value="FL">Florida</option>
              <option value="GA">Georgia</option>
              <option value="HI">Hawaii</option>
              <option value="ID">Idaho</option>
              <option value="IL">Illinois</option>
              <option value="IN">Indiana</option>
              <option value="IA">Iowa</option>
              <option value="KS">Kansas</option>
              <option value="KY">Kentucky</option>
              <option value="LA">Louisiana</option>
              <option value="ME">Maine</option>
              <option value="MD">Maryland</option>
              <option value="MA">Massachusetts</option>
              <option value="MI">Michigan</option>
              <option value="MN">Minnesota</option>
              <option value="MS">Mississippi</option>
              <option value="MO">Missouri</option>
              <option value="MT">Montana</option>
              <option value="NE">Nebraska</option>
              <option value="NV">Nevada</option>
              <option value="NH">New Hampshire</option>
              <option value="NJ">New Jersey</option>
              <option value="NM">New Mexico</option>
              <option value="NY">New York</option>
              <option value="NC">North Carolina</option>
              <option value="ND">North Dakota</option>
              <option value="OH">Ohio</option>
              <option value="OK">Oklahoma</option>
              <option value="OR">Oregon</option>
              <option value="PA">Pennsylvania</option>
              <option value="RI">Rhode Island</option>
              <option value="SC">South Carolina</option>
              <option value="SD">South Dakota</option>
              <option value="TN">Tennessee</option>
              <option value="TX">Texas</option>
              <option value="UT">Utah</option>
              <option value="VT">Vermont</option>
              <option value="VA">Virginia</option>
              <option value="WA">Washington</option>
              <option value="WV">West Virginia</option>
              <option value="WI">Wisconsin</option>
              <option value="WY">Wyoming</option>
            </select>
          </p>
          <br clear="all" />
          <p class="p12" style="padding:0px;">Zip Code  *</p>
          <p style="padding-bottom:5px;">
            <input class="inputLeft" name="zip" type="text" id="zip" autocomplete="off" placeholder="Zip Code" value= "<?php echo htmlspecialchars($zip);?>" />
						<span class="error"><?php echo $zipErr;?></span>
          </p>
          <br clear="all" />
          <p class="p12" style="padding:0px;">Square footage of all living spaces, subject to verification* <span class="error"><?php echo $sqftErr;?></span></p>
          <p style="padding-bottom:5px;">
            <input type="radio" id="sqft" name="sqft" value="Under 1,500 sqft" <?php if (isset($sqft) && $sqft == "Under 1,500 sqft") echo "checked"; ?>>
            <label for="sqft">Under 1,500 sqft</label>
            <br/>
            <input type="radio" id="sqft" name="sqft" value="1,501 - 2,000 sqft" <?php if (isset($sqft) && $sqft == "1,501 - 2,000 sqft") echo "checked"; ?>>
            <label for="sqft">1,501 - 2,000 sqft</label>
            <br/>
            <input type="radio" id="sqft" name="sqft" value="2,001 - 3,000 sqft" <?php if (isset($sqft) && $sqft == "2,001 - 3,000 sqft") echo "checked"; ?>>
            <label for="sqft">2,001 - 3,000 sqft</label>
            <br/>
            <input type="radio" id="sqft" name="sqft" value="3,001 - 4,000 sqft" <?php if (isset($sqft) && $sqft == "3,001 - 4,000 sqft") echo "checked"; ?>>
            <label for="sqft">3,001 - 4,000 sqft</label>
            <br/>
            <input type="radio" id="sqft" name="sqft" />
            <label for="sqft">If 4,001 sqft or over, please specify:</label>
            <br/>
          <p style="padding-bottom:5px;">
            <input class="rightJustified" name="customsqft" type="text" id="customsqft" placeholder="sqft" value="<?php echo htmlspecialchars($customsqft);?>"  />
          </p>
          <br clear="all" />
          <p class="p12" style="padding:0px;">What services would you like? *</p>
          <br clear="all" />
          <input id="hdrphotos" type="checkbox" name="hdrphotos" value="Unlimited HDR Photography" checked/>
          <label for="hdrphotos">Unlimited HDR Photos - no Panoramas<br>
          </label>
          <?php echo $photosLeft;?>
          <input type="checkbox" id="spw" name="SPW" value="Single Property Website"  checked/>
          <label for="spw"> Single Property Website: $25<br>
          </label>
          <?php echo $spwLeft;?>
          <input id="domain" type="checkbox" name="domain" />
          <label for="domain"> Custom Website Address: $20 <br />
            <?php echo $domainLeft;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;What would you like your custom website address for<br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;your Single Property Website to be? <br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(ex. www.1234MainSt.com) </label>
          <p style="padding-bottom:5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="inputLeft" name="domain" type="text" id="domain" placeholder="www.1234MainSt.com" />
          </p>
          <input type="checkbox" id="panoramas" name="panoramas" value="Panoramas / Virtual Tour Effect">
          <label for="panoramas">Panoramas / Virtual Tour Effect: $20<br>
          </label>
          <?php echo $panosLeft;?>
          <input type="checkbox" id="rush" name="rush" value="Rush Delivery">
          <label for="rush" >RUSH Delivery before 6PM: $50<br>
          </label>
          <?php echo $rushLeft;?>
          <input type="checkbox" id="tourfactory" name="tourfactory" value="TourFactory Upload">
          <label for="tourfactory">
          Upload to Agent's <a href="http://www.tourfactory.com/" target="_blank">TourFactory</a> Account: FREE with<br />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Single Property Website orders, $25 for orders without.<br>
          <?php echo $tourfactoryLeft;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username and Password?
          <p style="padding-bottom:5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input class="inputLeft" name="tourfactorypass" type="text" id="tourfactorypass" placeholder="Username, Password"/>
          </p>
          </label>
          <input type="checkbox" id="fullvideo" name="fullvideo" value="Full Motion Video Tour">
          <label for="fullvideo" >Full Motion Video Tour shot with Video Cameras<br>
          </label>
          <?php echo $videoLeft;?>
          <input type="checkbox" id="twilightphotos" name="twilightphotos" value="Twilight Photography">
          <label for="twilightphotos" >Twilight Photography<br>
          </label>
          <input type="checkbox" id="twilightvideos" name="twilightvideos" value="Twilight Videography">
          <label for="twilightvideos" >Twilight Videography - Video Tour shot with Video Cameras<br>
          </label>
          <input type="checkbox" id="weekend" name="weekend" value="Weekend Service">
          <label for="weekend" >Weekend Service: $50<br>
          </label>
          <?php echo $weekendLeft;?>
          <input type="checkbox" id="exteriors" name="exteriors" value="Exterior Shots">
          <label for="exteriors" >Preliminary Exterior Shots<br>
          </label>
          <?php echo $exteriorsLeft;?>
          <input type="checkbox" id="reshoot" name="reshoot" value="Reshoot">
          <label for="reshoot" >Reshoot<br>
          </label>
          </p>
          <br clear="all" />
          <p class="p12" style="padding:0px;">How will we access the property? If a combo, what is it? *</p>
          <p style="padding-bottom:5px;">
            <input class="inputLeft" name="access" type="text" id="access" placeholder="Access Instructions"  value= "<?php echo htmlspecialchars($access);?>" />
						<span class="error"><?php echo $accessErr;?></span>
          </p>
          <br clear="all" />
          <script type="text/javascript">
			$(function() {
$("#toggle160").click(function() {
					$(".toggle160").slideToggle("fast");
					return false;
				});
			});
		</script>
          <p class="p12" style="padding:0px;">Did you use any of the following professionals for this property? * </p>
          <p style="padding-bottom:5px;">
            <input type="radio" id="vendor" name="vendor" value="OneTwoSixDesign Staging">
            <label for="vendor"> OneTwoSix Design&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <br/>
            <?php echo $OneTwoSixLeft;?>
            <input type="radio" id="vendor" name="vendor" value="Modern Hjem Staging">
            <label for="vendor"> Modern Hjem / Staged Coop</label>
            <br>
            <input type="radio" id="vendor" name="vendor" value="DTMSM">
            <label for="vendor"> Don't Tell Me Show Me</label>
            <br>
            <input type="radio" id="vendor" name="vendor" value="None on the List">
            <label for="vendor"> None of the Above</label>
            <br>
          </p>
          <br clear="all" />
          <p class="p12" style="padding:0px;"><b>Date</b> and <b>time</b> you would like to have this shot?     *</br>
            Only schedule us for a time when the property is 100% </br>
            photo-ready and vacant. We cannot coordinate directly</br>
            with any of the stagers above for scheduling.</br>
          </p>
          <p class="p12" style="padding:0px;"></p>
          <p style="padding-bottom:5px;"> Date:
            <input class="inputLeftAdjustableWidth" size="50" name="date" type="text" id="date" value= "<?php echo htmlspecialchars($date);?>" />
						<span class="error"><?php echo $dateErr;?></span>
          <p style="padding-bottom:5px;"> Time:
            <input class="inputLeftAdjustableWidth" size="50" name="time" type="text" id="time" value= "<?php echo htmlspecialchars($time);?>" />
						<span class="error"><?php echo $timeErr;?></span>
          </p>
          <br clear="all" />
          <p class="p12" style="padding:0px;">If someone referred you, who was it? <br />
            They will earn a $50 credit with us on their next order!</p>
          <p class="p12" style="padding:0px;"></p>
          <p style="padding-bottom:5px;">
            <input class="inputLeftAdjustableWidth" size="60" name="referral" type="text" id="referral" />
          </p>
          <br clear="all" />
          <p class="p12" style="padding:0px;">Additional notes such as areas to focus on?</p>
          <p class="p12" style="padding:0px;"></p>
          <p style="padding-bottom:5px;">
            <input class="inputLeftAdjustableWidth" size="60" name="notes" type="text" id="notes" />
          </p>
          <br clear="all" />
          <input type="image" name="submit" value="Submit" src="../images/continue_form.jpg">
        </div>
        </p>
        <br clear="all" />
        </div>
        <br clear="all" />
      </form>
    </div>
    <?php echo $right_content; ?> 
    </div>
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

    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="../js/validate/jquery.formance/demo/js/scale.fix.js"></script>
    <script src="../js/validate/jquery.formance/lib/jquery.formance.js"></script>
    <script src="../js/validate/jquery.formance/demo/js/awesome_form.js"></script>

</body>
</html>