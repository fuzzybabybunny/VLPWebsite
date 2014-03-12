<?php

$file = "config.txt"; // CONFIG FILE
$hashSearch = "#";

$fileWriter = fopen($file, "w"); // OPEN FILE FOR WRITING

// STANDARD VARIABLES
$nl = "\r\n";
$i = 0;
$current = array();
$key2error = "";
$video = "<strong class=\"red\">NO</strong>";
$slideshow = "<strong class=\"red\">NO</strong>";

/* *** *** *** FILE INPUT *** *** *** */

// PUSH POST VARS INTO ARRAY
foreach ($_POST as $key => $val) {
	$val = trim($val);
	$$key = addslashes($val);
	
	// COLOR HASH CHECKING
	if ($key == 0) { $val = str_replace($hashSearch, "", $val); }
	if ($key == 1) { $val = str_replace($hashSearch, "", $val); }
	
	// BACKGROUND TILER SELECTION RADIO ERROR HANDLER
	if ($key == 2 && !($val >= 1 && $val <= 8) || ($val == "NO_VALUE") || ($val == "WRONG_VALUE")) {
		$key2error = "Current value of this variable is \"" . $val . "\" so sither this variable has been assigned incorrectly, or with a <strong class=\"red\">NO_VALUE</strong> or <strong class=\"red\">WRONG_VALUE</strong>, so it has been defaulted to the first available option.";
		$val = 1;
	}

	if ($val == "") { $val = "NO_VALUE"; }  // BLANK VARIABLE HANDLING

	array_push($current, $val); // PUSH CURRENT POST $VAR TO $CURRENT[X]
	
	fwrite($fileWriter, $val . $nl); // WRITE TO FILE
}

fclose($fileWriter); // CLOSE FILE

//echo "<br /><br /><h2>Post Processing</h2><hr /><br /><br />";
//print_r($current); // PRINT ARRAY FOR DEV PURPOSES
//echo "<br /><br /><hr /><br /><br />";


/* *** *** *** DISPLAY *** *** *** */

// VIDEO/SLIDESHOW HANDLER
$videoToggle = $current[3];
$slideshowToggle = $current[4];
if ($videoToggle == "yes") { $video = "<strong class=\"green\">YES</strong>"; }
if ($slideshowToggle == "yes") { $slideshow = "<strong class=\"green\">YES</strong>"; }


// HANDLERS FOR IMAGE LINKS
$realtorPhoto = "(<a href=\"images/" . $current[25] . "\" target=\"_blank\">IMG</a> - Opens new window)";
$companyLogo = "(<a href=\"images/" . $current[32] . "\" target=\"_blank\">IMG</a> - Opens new window)";

reset($current);
$i = 0;

//HANDLERS FOR BLANK IMAGE LINKS
if ($current[25] == "NO_VALUE") { $realtorPhoto = ""; }	
if ($current[32] == "NO_VALUE") { $companyLogo = ""; }	

// HANDLER ALL OTHER BLANK FIELDS
while ($current[$i] == TRUE) {
	if ($current[$i] == "NO_VALUE") { $current[$i] = "<strong class=\"red\">NO_VALUE</strong> (stored as a blank line)"; }
	$current[$i] = stripslashes($current[$i]);
	$i++;
}

$page = <<<EOV

<!DOCTYPE html> 

<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<title>Victor Lin Photography [Client Website Confirm]</title> 
<link href="css/reset.css" rel="stylesheet" type="text/css"> 
<link href="css/config.css" rel="stylesheet" type="text/css"> 
 
<!--[if lte IE 9]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<![endif]--> 
 
</head> 
 
<body> 

<h1>Victor Lin Photography [Client Website Confirm]</h1>

<br />
<div class="info">View your config file <a href="$file" target="_blank">HERE</a>. (Opens new window)<br /><a href="config.php">Return to config page.</a></div>
<br />

<table>
	<tr>
		<td colspan="2"><h2>Design Elements</h2></td>
	</tr>
	<tr>
		<td><strong>Body Color in Hex:</strong><br /># $current[0] <span class="colorBlock" style="background-color: #$current[0];"></span></td>
		<td><strong>Font Color in Hex:</strong><br /># $current[1] <span class="colorBlock" style="background-color: #$current[1];"></span></td>
	</tr>
	<tr>
		<td>
			<strong>Video:</strong> $video<br />
			<strong>Slideshow:</strong> $slideshow<br />
			<strong>Video URL</strong> (if applicable)<strong>:</strong><br /><a href="$current[5]" target="_blank">$current[5]</a>
		</td>
		<td><strong>Background $current[2]</strong><br /><img src="images/background/$current[2].jpg" class="backgroundTiler" /></td>
	</tr>
</table>


<table>
	<tr>
		<td colspan="2"><h2>Property Information</h2></td>
	</tr>
	<tr>
		<td><strong>Street Address:</strong><br />$current[6]</td>
		<td><strong>Description Title:</strong><br />$current[7]</td>
	</tr>
	<tr>
		<td><strong>Street Address 2:</strong><br />$current[8]</td>
		<td rowspan="4"><strong>Description Blurb:</strong><br />$current[9]</td>
	</tr>
	<tr>
		<td><strong>City:</strong><br />$current[10]</td>
	</tr>
	<tr>
		<td><strong>State:</strong><br />$current[11]</td>
	</tr>
	<tr>
		<td><strong>Zip:</strong><br />$current[12]</td>
	</tr>
</table>

<table>
	</tr>
		<td colspan="2"><h2>Disclosure Information</h2> ("/disclosure/" concatendated, but not stored)</td>
	</tr>
	<tr>
		<td><strong>Disclosure 1</strong><br />
			Title: $current[13]<br />
			URL: <a href="/disclosure/$current[14]" target="_blank">/disclosure/$current[14]</a></td>
		<td><strong>Disclosure 2</strong><br />
			Title: $current[15]<br />
			URL: <a href="/disclosure/$current[16]" target="_blank">/disclosure/$current[16]</a></td>
	</tr>
	<tr>
		<td><strong>Disclosure 3</strong><br />
			Title: $current[17]<br />
			URL: <a href="/disclosure/$current[18]" target="_blank">/disclosure/$current[18]</a></td>
		<td><strong>Disclosure 4</strong><br />
			Title: $current[19]<br />
			URL: <a href="/disclosure/$current[20]" target="_blank">/disclosure/$current[20]</a></td>
	</tr>
	<tr>
		<td colspan="2"><strong>Disclosure 5</strong><br />
			Title: $current[21]<br />
			URL: <a href="/disclosure/$current[22]" target="_blank">/disclosure/$current[22]</a></td>
	</tr>
</table>


<table>
	<tr>
		<td colspan="2"><h2>Realtor Information</h2></td>
	</tr>
	<tr>
		<td><strong>Realtor Name:</strong><br />$current[23]</td>
		<td><strong>Direct Phone:</strong><br />$current[24]</td>
	</tr>
	<tr>
		<td><strong>Realtor Photo:</strong><br />(images/) $current[25] $realtorPhoto</td>
		<td><strong>Email:</strong><br /><a href="mailto:$current[26]">$current[26]</a></td>
	</tr>
	<tr>
		<td><strong>Sub Line 1:</strong><br />$current[27]</td>
		<td><strong>License (DRE) #:</strong><br />$current[28]</td>
	</tr>
	<tr>
		<td><strong>Sub Line 2:</strong><br />$current[29]</td>
		<td><strong>Realtor Website:</strong> <a href="$current[30]" target="_blank">$current[30]</a></td>
	</tr>
</table>

<table>
	<tr>
		<td colspan="2"><h2>Realtor Company Information</h2></td>
	</tr>
	<tr>
		<td><strong>Company Name:</strong><br />$current[31]</td>
		<td><strong>Company Logo:</strong><br />(images/) $current[32] $companyLogo</td>
	</tr>
	<tr>
		<td><strong>Street Address:</strong><br />$current[33]</td>
		<td><strong>Office Phone:</strong><br />$current[34]</td>
	</tr>
	<tr>
		<td><strong>Street Address 2:</strong><br />$current[35]</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><strong>City:</strong><br />$current[36]</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><strong>State:</strong><br />$current[37]</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><strong>Zip:</strong><br />$current[38]</td>
		<td>&nbsp;</td>
	</tr>
</table>

EOV;

$page .= <<<EOV
<br /><br />

</body>
</html>

EOV;

echo($page);

?>