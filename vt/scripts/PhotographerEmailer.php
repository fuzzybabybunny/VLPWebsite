<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Photographer Link Generator</title>
</head>

<body>
<h2><strong>Photographer Calendar Link Form</strong></h2>

<?php
	
	$address = $_GET['address'];
	$client = $_GET['client'];
	$clientemail = $_GET['clientemail'];
	$time = $_GET['time'];
	$price = $_GET['price'];
	$sqft = $_GET['sqft'];
	$processornotes = $_GET['processornotes'];
	$vendor = $_GET['vendor'];
	$typejob = $_GET['typejob'];
	
	if ($vendor == "OneTwoSixDesign Staging")
		{
			$onetwosixcheck = "checked";
		}
	else if ($vendor == "None on the List")
		{
			$realtorcheck = "checked";
		}
	else if ($vendor == "Modern Hjem Staging")
		{
			$mhcheck = "checked";
		}
	else if ($vendor == "DTMSM")
		{
			$dtmsm = "checked";
		}
		
	if ($typejob == "TourBuzz")
		{
			$tourbuzzcheck = "checked";
		}
	else if ($typejob == "TourFactory")
		{
			$tourfactorycheck = "checked";
		}
	else if ($typejob == "Just Photos")
		{
			$justphotoscheck = "checked";
		}

		
echo
'<form action="PhotographerEmailerScript.php" method="get">
Address: 
<input type="text" size="50" name="address" value="'.$address.'"/>
<br />
<!--Time: 
<input type="text" size="50" name="time" value="'.$time.'"/>
<br />-->
Client Name: 
<input type="text" size="50" name="client" value="'.$client.'"/>
<br />
Client Email: 
<input type="text" size="50" name="clientemail" value="'.$clientemail.'"/>
<br />
Square Footage: 
<input type="text" size="50" name="sqft" value="'.$sqft.'"/>
<br />
<!--Payment: 
<input type="text" size="50" name="payment" value="50">
<br>-->
<br />
<!--Notes for Photog:
<textarea cols="50" rows="1" name="notes" ></textarea>
<br />-->
<br />
Notes for Processor:
<textarea cols="50" rows="8" name="processornotes">'.$processornotes.'</textarea>
<br />
<br />
Photographer:
<select name="photographer">
<option value="Ana">Ana Melendez</option>
<option value="Anthony">Anthony Piatte</option>
<option value="Scott">Scott Dubose</option>
<option value="Christian">Christian</option>
<option value="Victor">Victor Lin</option>
</select>
<br />
<!--<br />
Price Charged:
<br />
<input type="text" size="50" name="price" value="'.$price.'"/>
<br />-->
<br />


Vendor:
<br /><input type="radio" name="vendor" value="126 Staging" '.$onetwosixcheck.' /> 126
<br /><input type="radio" name="vendor" value="Realtor" '.$realtorcheck.'/> Realtor
<br /><input type="radio" name="vendor" value="MHStaging" '.$mhcheck.'/> Modern Hjem
<br /><input type="radio" name="vendor" value="DTMSM" '.$dtmsm.'/> DTMSM
<br />
<br />
Type of Job:
<br /><input type="radio" name="typejob" value="TourBuzz" '.$tourbuzzcheck.' /> TourBuzz
<br /><input type="radio" name="typejob" value="TourFactory" '.$tourfactorycheck.'/> TourFactory
<br /><input type="radio" name="typejob" value="Just Photos" '.$justphotoscheck.'/> Just Photos
<br /><input type="radio" name="typejob" value="Video" /> Video
<br /><input type="radio" name="typejob" value="Just Photos with Slideshow" /> Just Photos with Slideshow<br />
<input type="submit" size="50" value="Submit" />
</form>';
?>
</body>
</html>