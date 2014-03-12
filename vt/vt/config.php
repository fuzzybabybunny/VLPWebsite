<?php

// OPEN FILE FOR READING
$file = "config.txt";
$current=file($file, FILE_IGNORE_NEW_LINES);

// STANDARD VARIABLES
$video_yes = "";
$video_no = "";
$slideshow_yes = "";
$slideshow_no = "";

$radioErr = "";
$bgi = 1;
$bgtc = array();

// BACKGROUND TILER SELECTION RADIO HANDLER
if (($current[2] == "NO_VALUE") || ($current[2] == "WRONG_VALUE") || !($current[2] >= 1 && $current[2] <= 8)) {
	$radioErr = "<br>Current value of this variable is \"" . $current[2] . "\" so sither this variable has been assigned incorrectly, or with a <strong class=\"red\">NO_VALUE</strong> or <strong class=\"red\">WRONG_VALUE</strong>, so it has been defaulted to the first available option.";
	$bgtc[1] = "checked";
} else {
	while ($bgi <= 8) {
		if ($current[2] == "$bgi"){
			$bgtc[$bgi] = "checked";
		}
	$bgi++;		
	}
}

// VIDEO / SLIDESHOW CHECKBOX HANDLER
if ($current[3] == "yes") { $video_yes = "checked"; }else{ $video_no = "checked"; }
if ($current[4] == "yes") { $slideshow_yes = "checked"; }else{ $slideshow_no = "checked"; }


// PUSH CONTENTS OF FILE INTO ARRAY
reset($current);
$i = 0;
while ($current[$i] == TRUE) {
	$current[$i] = stripslashes($current[$i]);
	// BLANK VARIABLE HANDLING
	if ($current[$i] == "NO_VALUE") { $current[$i] = ""; }
	if (($i == 3) || ($i == 4) && ($current[$i] == "")) { $current[$i] = "off"; }
	// INCREMENT AND LOOP
	$i++;
}

?>

<!DOCTYPE html> 
 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<title>Victor Lin Photography [Client Website Config]</title> 
<link href="css/reset.css" rel="stylesheet" type="text/css"> 
<link href="css/config.css" rel="stylesheet" type="text/css"> 
 
<!--[if lte IE 9]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<![endif]--> 
 
</head> 
 
<body> 

<h1>Victor Lin Photography [Client Website Config]</h1>
<br />
<div class="info">View your current config file <a href="<? echo($file); ?>" target="_blank">HERE</a>. (Opens new window)<br>
If there is no value, or they do not need to be assigned, simply leave them blank.</div>
<br />

<form method="post" action="./engine.php">
<table>
	<tr>
		<td colspan="4"><h2>Design Elements</h2></td>
	</tr>
	<tr>
		<td colspan="2"><strong>Body Color in Hex</strong> (ie: "FF00FF")<strong>:</strong><br /># <input type="text" name="BodyColor" value="<? echo($current[0]); ?>" /></td>
		<td colspan="2"><strong>Font Color in Hex</strong> (ie: "FF00FF")<strong>:</strong><br /># <input type="text" name="FontColor" value="<? echo($current[1]); ?>" /></td>
	</tr>
	<tr>
		<td colspan="4"><strong>Background Tiler</strong><? echo($radioErr); ?></td>
	</tr>
	<tr>
		<td><input type="radio" name="BackgroundTiler" value="1" <? echo($bgtc[1]); ?>  class="radio" />Background 1<br><img src="images/background/1.jpg" alt="Background 1" class="backgroundTiler"></td>
		<td><input type="radio" name="BackgroundTiler" value="2" <? echo($bgtc[2]); ?>  class="radio" />Background 2<br><img src="images/background/2.jpg" alt="Background 2" class="backgroundTiler"></td>
		<td><input type="radio" name="BackgroundTiler" value="3" <? echo($bgtc[3]); ?>  class="radio" />Background 3<br><img src="images/background/3.jpg" alt="Background 3" class="backgroundTiler"></td>
		<td><input type="radio" name="BackgroundTiler" value="4" <? echo($bgtc[4]); ?>  class="radio" />Background 4<br><img src="images/background/4.jpg" alt="Background 4" class="backgroundTiler"></td>
	</tr>
	<tr>
		<td><input type="radio" name="BackgroundTiler" value="5" <? echo($bgtc[5]); ?>  class="radio" />Background 5<br><img src="images/background/5.jpg" alt="Background 5" class="backgroundTiler"></td>
		<td><input type="radio" name="BackgroundTiler" value="6" <? echo($bgtc[6]); ?>  class="radio" />Background 6<br><img src="images/background/6.jpg" alt="Background 6" class="backgroundTiler"></td>
		<td><input type="radio" name="BackgroundTiler" value="7" <? echo($bgtc[7]); ?>  class="radio" />Background 7<br><img src="images/background/7.jpg" alt="Background 7" class="backgroundTiler"></td>
		<td><input type="radio" name="BackgroundTiler" value="8" <? echo($bgtc[8]); ?>  class="radio" />Background 8<br><img src="images/background/8.jpg" alt="Background 8" class="backgroundTiler"></td>
	</tr>
	<tr>
		<td colspan="2"><strong>Video and/or Slideshow?</strong><br />
			Video:
			<input type="radio" name="VideoRadio" value="yes" <? echo($video_yes); ?>  class="radio" />YES
			<input type="radio" name="VideoRadio" value="no" <? echo($video_no); ?>  class="radio" />NO
			<br><br>
			Slideshow:
			<input type="radio" name="SlideshowRadio" value="yes" <? echo($slideshow_yes); ?>  class="radio" />YES
			<input type="radio" name="SlideshowRadio" value="no" <? echo($slideshow_no); ?>  class="radio" />NO
		</td>
		<td colspan="2"><strong>Video URL</strong> (if applicable)<strong>:</strong><br><input type="text" name="VideoURL" value="<? echo($current[5]); ?>" /></td>
	</tr>
</table>

<table>
	<tr>
		<td colspan="2"><h2>Property Information</h2></td>
	</tr>
	<tr>
		<td><strong>Street Address:</strong><br /><input type="text" name="PropertyStreetAddy" value="<? echo($current[6]); ?>" /></td>
		<td><strong>Description Title:</strong><br />
			<input type="text" name="PropertyDescTitle" value="<? echo($current[7]); ?>" /></td>
	</tr>
	<tr>
		<td><strong>Street Address 2:</strong><br />
			<input type="text" name="PropertyStreetAddy2" value="<? echo($current[8]); ?>" /></td>
		<td rowspan="4"><strong>Description Blurb:</strong><br />
			<textarea name="PropertyDescBlurb"><? echo($current[9]); ?></textarea></td>
	</tr>
	<tr>
		<td><strong>City:</strong><br />
			<input type="text" name="PropertyCity" value="<? echo($current[10]); ?>" /></td>
	</tr>
	<tr>
		<td><strong>State:</strong><br />
			<input type="text" name="PropertyState" value="<? echo($current[11]); ?>" /></td>
	</tr>
	<tr>
		<td><strong>Zip:</strong><br />
			<input type="text" name="PropertyZip" value="<? echo($current[12]); ?>" /></td>
	</tr>
	</tr>
</table>

<table>
	<tr>
		<td colspan="2"><h2>Disclosure Information</h2> ("/disclosure/" concatenated, just insert file_name.ext):</td>
	</tr>
	<tr>
		<td><strong>Disclosure 1</strong><br />
			Text: <input type="text" name="Disclosure1Title" value="<? echo($current[13]); ?>" /><br />
			URL: <input type="text" name="Disclosure1URL" value="<? echo($current[14]); ?>" /></td>
		<td><strong>Disclosure 2</strong><br />
			Text: <input type="text" name="Disclosure2Title" value="<? echo($current[15]); ?>" /><br />
			URL: <input type="text" name="Disclosure2URL" value="<? echo($current[16]); ?>" /></td>
	</tr>
	<tr>
		<td><strong>Disclosure 3</strong><br />
			Text: <input type="text" name="Disclosure3Title" value="<? echo($current[17]); ?>" /><br />
			URL: <input type="text" name="Disclosure3URL" value="<? echo($current[18]); ?>" /></td>
		<td><strong>Disclosure 4</strong><br />
			Text: <input type="text" name="Disclosure4Title" value="<? echo($current[19]); ?>" /><br />
			URL: <input type="text" name="Disclosure4URL" value="<? echo($current[20]); ?>" /></td>
	</tr>
	<tr>
		<td colspan="2"><strong>Disclosure 5</strong><br />
			Text: <input type="text" name="Disclosure5Title" value="<? echo($current[21]); ?>" /><br />
			URL: <input type="text" name="Disclosure5URL" value="<? echo($current[22]); ?>" /></td>
	</tr>
</table>

<table>
	<tr>
		<td colspan="2"><h2>Realtor Information</h2></td>
	</tr>
	<tr>
		<td><strong>Realtor Name:</strong><br />
			<input type="text" name="RealtorName" value="<? echo($current[23]); ?>" /></td>
		<td><strong>Direct Phone</strong> (No Characters... EX: 1234567890)<strong>:</strong><br />
			<input type="text" name="RealtorDirectPhone" value="<? echo($current[24]); ?>" /></td>
	</tr>
	<tr>
		<td><strong>Realtor Photo</strong> ("/images/" concatenated, just insert file_name.ext)<strong>:</strong><br />
			<input type="text" name="RealtorPhoto" value="<? echo($current[25]); ?>" /></td>
		<td><strong>Email:</strong><br />
			<input type="text" name="RealtorEmail" value="<? echo($current[26]); ?>" /></td>
	</tr>
	<tr>
		<td><strong>Sub Line 1:</strong><br />
			<input type="text" name="RealtorSubLine1" value="<? echo($current[27]); ?>" /></td>
		<td><strong>License (DRE) #:</strong><br />
			<input type="text" name="RealtorLicenseNumber" value="<? echo($current[28]); ?>" /></td>
	</tr>
	<tr>
		<td><strong>Sub Line 2:</strong><br />
			<input type="text" name="RealtorSubLine2" value="<? echo($current[29]); ?>" /></td>
		<td><strong>Realtor Website:</strong><br />
			<input type="text" name="RealtorWebsite" value="<? echo($current[30]); ?>" /></td>
	</tr>
</table>

<table>
	<tr>
		<td colspan="2"><h2>Realtor Company Information</h2></td>
	</tr>
	<tr>
		<td><strong>Company Name:</strong><br />
			<input type="text" name="CompanyName" value="<? echo($current[31]); ?>" /></td>
		<td><strong>Company Logo</strong> ("/images/" concatenated, just insert file_name.ext)<strong>:</strong><br />
			<input type="text" name="CompanyLogo" value="<? echo($current[32]); ?>" /></td>
	</tr>
	<tr>
		<td><strong>Street Address:</strong><br />
			<input type="text" name="CompanyStreetAddy" value="<? echo($current[33]); ?>" /></td>
		<td><strong>Office Phone </strong>(No Characters... EX: 1234567890)<strong>:</strong><br />
			<input type="text" name="CompanyOfficePhone" value="<? echo($current[34]); ?>" /></td>
	</tr>
	<tr>
		<td><strong>Street Address 2:</strong><br />
			<input type="text" name="CompanyStreetAddy2" value="<? echo($current[35]); ?>" /></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><strong>City:</strong><br />
			<input type="text" name="CompanyCity" value="<? echo($current[36]); ?>" /></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><strong>State:</strong><br />
			<input type="text" name="CompanyState" value="<? echo($current[37]); ?>" /></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><strong>Zip:</strong><br />
			<input type="text" name="CompanyZip" value="<? echo($current[38]); ?>" /></td>
		<td>&nbsp;</td>
	</tr>
</table>

<input type="submit" id="submit" />

</form>

<br /><br />

</body>
</html>
