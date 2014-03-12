<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Custom Link Generator</title>
</head>

<body>
<?php
		$address = $_GET['address'];
		$payment = $_GET['payment'];
		$client = $_GET['client'];
		$sessionID = $_GET['sessionID'];
		$photographer = $_GET['photographer'];
		$status = "";
		$status=$_GET["free"];
		$name = explode(' ', $realtor);
		$first_name = $name[0];
		$shotcount = "";
		$notes = $_GET['processornotes'];
		$formattednotes=str_replace(Chr(13),'<br/>', $notes); 
		$typejob = $_GET['typejob'];
		$vendor = $_GET['vendor'];
		$sqft = urldecode($_GET['sqft']);
		$realtor = "";
		$s126 = "";
		$n126 = "";
		$n126i = "";
		$tfi = "";
		$tf126 = "";
		$jpi = "";
		$jpsi = "";
		$dtmsm = "";
		$tb = "";
		$video = "";
		$mhstaging = "";
		$other = "";
		
if ($status=="free")
{
$free = "checked";
}
elseif ($status=="not free")
{
$notfree = "checked";
}

		
if ($vendor=="126 Staging")
{
$s126 = "checked";
}
elseif ($vendor=="Realtor")
{
$realtor = "checked";
}
elseif ($vendor=="MHStaging")
{
$mhstaging = "checked";
}
elseif ($vendor=="DTMSM")
{
$dtmsm = "checked";
}
elseif ($vendor=="Other")
{
$other = "checked";
}

if ($typejob=="TourBuzz")
{
$tb = "checked";
}
elseif ($typejob=="TourFactory")
{
$tfi = "checked";
}
elseif ($typejob=="Just Photos")
{
$jpi = "checked";
}
elseif ($typejob=="Video")
{
$video = "checked";
}
elseif ($typejob=="Just Photos with Slideshow")
{
$jpsi = "checked";
}

if ($photographer=="Victor")
{
$victorSelect = "selected";
}
elseif ($photographer=="Anthony")
{
$anthonySelect = "selected";
}
elseif ($photographer=="Ana")
{
$anaSelect = "selected";
}
elseif ($photographer=="Scott")
{
$scottSelect = "selected";
}
elseif ($photographer=="Christian")
{
$christianSelect = "selected";
}


echo
'		
<h2><strong>Photo Processor Emailer</strong></h2>
<form action="ProcessorEmailerScript.php" method="get">
<b><h2>Make sure that photographer is correct.</b></h2> 
Photographer: <select name="photographer">
	<option value="Victor" '.$victorSelect.'>Victor</option>
	<option value="Anthony" '.$anthonySelect.'>Anthony</option>
	<option value="Ana" '.$anaSelect.'>Ana</option>
	<option value="Scott" '.$scottSelect.'>Scott</option>
	<option value="Christian" '.$christianSelect.'>Christian</option>
</select>
<br />
<br />
Address: 
<input type="text" size="50" name="address" value="'.$address.'"/>
<br />
Zip File: 
<input type="text" size="50" name="zip" />
<br />
Client Name: 
<input type="text" size="50" name="realtor" value="'.$client.'"/>
<br />
<br />
Square Footage: 
<input type="text" size="50" name="sqft" value="'.$sqft.'" readonly="readonly"/>
<br />
<br />
Number of Shots Taken: 
<input type="text" size="50" name="shotcount" value="'.$shotcount.'"/>
<br />
Payment: 
<input type="text" size="50" name="payment" value="'.$payment.'"/>
<br />
<br />
Total Payment: 
<input type="text" size="50" name="totalpayment" value="'.$totalpayment.'"/>
<br />
<br />
Notes for Photo Processor:
<br />
<textarea cols="50" rows="8" name="notes">'.$formattednotes.'</textarea>
<br />
<br />
Was the property ready for you when you got there?
<br />
<input type="radio" name="ready" value="Yes" checked/> Yes
<input type="radio" name="ready" value="No"  /> No
<br />
<br />
How was the property not ready?
<br />
<input type="text" size="75" name="readynotes" value="'.$readynotes.'"/>
<br />
<br />
Vender:
<br />
<input type="radio" name="vendor" value="126 Staging" '.$s126.' /> 126 Staging
<input type="radio" name="vendor" value="Realtor" '.$realtor.' /> Realtor
<input type="radio" name="vendor" value="MHStaging" '.$mhstaging.' /> Modern Hjem
<input type="radio" name="vendor" value="DTMSM" '.$dtmsm.' /> DTMSM
<input type="radio" name="vendor" value="Other" '.$other.' /> Other
<br />
<br />
Type of Job:
<input type="radio" name="typejob" value="TourBuzz" '.$tb.' /> TourBuzz
<input type="radio" name="typejob" value="TourFactory" '.$tfi.' /> TourFactory
<input type="radio" name="typejob" value="Just Photos" '.$jpi.' /> Just Photos
<input type="radio" name="typejob" value="Video" '.$video.' /> Video
<input type="hidden" name="sessionID" value='.$sessionID.' />
<br />
<input type="submit" size="50" value="Submit" />
</form>
'
?>
</body>
</html>