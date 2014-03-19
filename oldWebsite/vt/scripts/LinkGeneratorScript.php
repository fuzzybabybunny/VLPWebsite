<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 

//Gets vendor type, type of job, and processor name from previous form

$vendor = $_POST["vendor"];
$typejob = $_POST["typejob"];
$processorName = $_POST["processorName"];
$shotcount = $_POST["shotcount"];
$realtorFullName = $_POST["realtorFullName"];
$photos=$_POST["amazon"];
$email = "";

/*
$receiptorinvoice="none";
if ($_POST["receiptinvoice"]=="receipt")
{
	$receiptorinvoice="receipt";
}
else
{
	$receiptorinvoice="invoice";
}
*/

//Creates Custom 126Design VT

if($vendor == "126 Staging")
{
$needle = ",";
$pos = strpos ($_POST["address"], $needle);
$shortAddress = substr($_POST["address"], 0, $pos);
$formattedAddress = str_replace(' ',"",$shortAddress);
$directoryAddress = '../' . $formattedAddress . '.php';
$ourFileName = $formattedAddress . '.php';
$fh = fopen($directoryAddress, 'w') or die("can't open file");
fwrite($fh, '<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>' . $_POST["address"] . '</title>
</head>

<body>
<div align="center">
<iframe src ="' . $_POST["full"] . '" scrolling="no" frameBorder="0" width="1000px" height="675px">
<p>Your browser does not support iframes.</p>
</iframe>
<img src="VT-logo.jpg" width="1000" border="0" usemap="#Map"/>
<map name="Map" id="Map">
<area shape="rect" coords="337,1,619,189" href="http://onetwosixdesign.com/" target="_blank" alt="OneTwoSixDesign Staging" />
<area shape="rect" coords="639,0,948,189" href="http://www.victorlinphoto.com/realestate/index.php" target="_blank" alt="Victor Lin Photography" />
</map>
</div>
</body>
</html>');
fclose($fh); 
}

//Creates Custom Modern Hjem VT
elseif($vendor == "MHStaging")
{
$needle = ",";
$pos = strpos ($_POST["address"], $needle);
$shortAddress = substr($_POST["address"], 0, $pos);
$formattedAddress = str_replace(' ',"",$shortAddress);
$directoryAddress = '../' . $formattedAddress . '.html';
$ourFileName = $formattedAddress . '.html';
$fh = fopen($directoryAddress, 'w') or die("can't open file");
fwrite($fh, '<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>' . $_POST["address"] . '</title>
</head>

<body>
<div align="center">
<iframe src ="' . $_POST["full"] . '" scrolling="no" frameBorder="0" width="1185px" height="800px">
<p>Your browser does not support iframes.</p>
</iframe>
<img src="MH-logo.jpg" width="1000" border="0" usemap="#Map"/>
<map name="Map" id="Map">
<area shape="rect" coords="337,1,619,189" href="http://www.modernhjem.com/" target="_blank" alt="Modern Hjem Staging" />
<area shape="rect" coords="639,0,948,189" href="http://www.victorlinphoto.com/realestate/index.php" target="_blank" alt="Victor Lin Photography" />
</map>
</div>
</body>
</html>');
fclose($fh); 
}

/*//Just RealBiz360 Email
	if ($typejob == "TourBuzz")
    {
		$email = $_POST["email"]
.
'<p>Photos and Virtual Tour for '
.
$_POST["address"]
.
'</p><p>Hello '
.
$_POST["realtor"]
.
',</p>
<p>It was a pleasure photographing your listing!</p>
<p><b>Here are the photos (please download and save quickly - this photo download link expires in a week):</p></b>'
.
'<p><a href="' . $photos . '">' . $photos . '</a></p>'
.
'<p><b>The virtual tour (does not expire):</p></b> 
<p>Tour Link:
<p>Branded Tour Link: <a href="' . $_POST["full"] . '">' . $_POST["full"] . '</a></p>
<p>Un-Branded Tour Link: <a href="' . $_POST["mls"] . '">' . $_POST["mls"] . '</a></p>
<p><b>Please follow this tutorial on how to manage your new virtual tour:</p></b>

<p><a href="http://www.victorlinphoto.com/realestate/vuvistatutorial/tours_1.php">http://www.victorlinphoto.com/realestate/vuvistatutorial/tours_1.php</a></p>

<p><b>Login Screen:</p></b>
<p><a href="https://vu.realbiz360.com/login.php">https://vu.realbiz360.com/login.php</a></p>
<p><b>Username:</b> ' . $_POST["username"] . '<br /> <b>Password:</b> ' . $_POST["password"] .  

'</p><p>Please do not hesitate to contact me with any questions.</p>
<p>If you enjoy my work please think of me next time you have a listing.</p>
Thank you!
<br />-Victor
<br />victor@victorlinphoto.com
<br />http://www.victorlinphoto.com
<br />650.248.0289';
	}
	
	//RealBiz360 with 126Design Email
	if ($typejob == "TourBuzz" && $vendor == "126 Staging")
    {
		$email = $_POST["email"]
.
'<p>Photos and Virtual Tour for '
.
$_POST["address"]
.
'</p><p>Hello '
.
$_POST["realtor"]
.
',</p>
<p>It was a pleasure photographing your listing!</p>
<p><b>Here are the photos (please download and save quickly - this photo download link expires in a week):</p></b>'
.
'<p><a href="' . $photos . '">' . $photos . '</a></p>'
.
'<p><b>The virtual tour (does not expire):</p></b> 
<p>Tour Link: <a href="http://www.victorlinphoto.com/vt/' . $ourFileName . '">http://www.victorlinphoto.com/vt/' . $ourFileName . '</a></p>
<p>Un-Branded Tour Link: <a href="' . $_POST["mls"] . '">' . $_POST["mls"] . '</a></p>
<p><b>Please follow this tutorial on how to manage your new virtual tour:</p></b>

<p><a href="http://www.victorlinphoto.com/realestate/vuvistatutorial/tours_1.php">http://www.victorlinphoto.com/realestate/vuvistatutorial/tours_1.php</a></p>

<p><b>Login Screen:</p></b>
<p><a href="https://vu.realbiz360.com/login.php">https://vu.realbiz360.com/login.php</a></p>
<p><b>Username:</b> ' . $_POST["username"] . '<br /> <b>Password:</b> ' . $_POST["password"] .  

'</p><p>Please do not hesitate to contact me with any questions.</p>
<p>If you enjoy my work please think of me next time you have a listing.</p>
Thank you!
<br />-Victor
<br />victor@victorlinphoto.com
<br />http://www.victorlinphoto.com
<br />650.248.0289';
	}
	
	//RealBiz360 with Modern Hjem Email
	if ($typejob == "TourBuzz" && $vendor == "MHStaging")
    {
		$email = $_POST["email"]
.
'<p>Photos and Virtual Tour for '
.
$_POST["address"]
.
'</p><p>Hello '
.
$_POST["realtor"]
.
',</p>
<p>It was a pleasure photographing your listing!</p>
<p><b>Here are the photos (please download and save quickly - this photo download link expires in a week):</p></b>'
.
'<p><a href="' . $photos . '">' . $photos . '</a></p>'
.
'<p><b>The virtual tour (does not expire):</p></b> 
<p>Tour Link: <a href="http://www.victorlinphoto.com/vt/' . $ourFileName . '">http://www.victorlinphoto.com/vt/' . $ourFileName . '</a></p>
<p>Un-Branded Tour Link: <a href="' . $_POST["mls"] . '">' . $_POST["mls"] . '</a></p>
<p><b>Please follow this tutorial on how to manage your new virtual tour:</p></b>

<p><a href="http://www.victorlinphoto.com/realestate/vuvistatutorial/tours_1.php">http://www.victorlinphoto.com/realestate/vuvistatutorial/tours_1.php</a></p>

<p><b>Login Screen:</p></b>
<p><a href="https://vu.realbiz360.com/login.php">https://vu.realbiz360.com/login.php</a></p>
<p><b>Username:</b> ' . $_POST["username"] . '<br /> <b>Password:</b> ' . $_POST["password"] .  

'</p><p>Please do not hesitate to contact me with any questions.</p>
<p>If you enjoy my work please think of me next time you have a listing.</p>
Thank you!
<br />-Victor
<br />victor@victorlinphoto.com
<br />http://www.victorlinphoto.com
<br />650.248.0289';
	}*/
	
	//Just TourBuzz Email
	if ($typejob == "TourBuzz")
    {
		$email = '';
	}
	
	//RealBiz360 with 126Design Email
	if ($typejob == "TourBuzz" && $vendor == "126 Staging")
    {
		$email = '';
	}
	
	//RealBiz360 with Modern Hjem Email
	if ($typejob == "TourBuzz" && $vendor == "MHStaging")
     {
		$email = '';
	}
	
//TourFactory Email	
	elseif ($typejob == "TourFactory")
    {
$TourFactoryURL="none";
if (strpos($_POST['full'], ':') !== false) {
$TourFactoryURL=$_POST['full'];
}
else
{
$TourFactoryURL="http://" . $_POST["full"];
}

$email = $_POST["email"]
.
'<p>Photos and Virtual Tour for '
.
$_POST["address"]
.
'</p><p>Hello '
.
$_POST["realtor"]
.
',</p>
<p>Thank you for your order!</p> 
<p><b>Here are the photos (please download and save quickly - this photo download link expires in a week):</p></b>'
.
'<p><a href="' . $photos . '">' . $photos . '</a></p>'
.
'<p><b>The tour:</p></b> 
<p><a href="' . $TourFactoryURL . '" target="blank">' . $TourFactoryURL . '</a></p>
<p><b>Login Screen:</p></b>
<p><a href="http://www.tourfactory.com/" target="blank">http://www.tourfactory.com/</a></p>
<p>My photos can be downloaded from inside your TourFactory account.</p>
<p>Please contact TourFactory for help on how to manage your TourFactory tour:</p>
<p><a href="http://www.tourfactory.com/company/contactus.asp" target="blank">http://www.tourfactory.com/company/contactus.asp</a></p>
<p>Please think of us next time you have a listing, and <b>earn a $50 credit on your next order by referring a friend to us!*</b></p>
Thank you!
<br />-Victor
<br />victor@victorlinphoto.com
<br />http://www.victorlinphoto.com
<br />650.248.0289
<br />
<br />*Referrals must be new clients and must place an order with us.';
	}
	
//Just Photos Email	
	elseif ($typejob == "Just Photos")
	{
		$email = $_POST["email"]
.
'<p>Photos for '
.
$_POST["address"]
.
'</p><p>Hello '
.
$_POST["realtor"]
.
',</p>
<p>It was a pleasure photographing your listing!</p>
<p><b>Here are the photos (please download and save quickly - this photo download link expires in a week):</p></b>'
.
'<p><a href="' . $photos . '">' . $photos . '</a></p>'
.
'<p>Please think of us next time you have a listing, and <b>earn a $50 credit on your next order by referring a friend to us!*</b></p>
Thank you!
<br />-Victor
<br />victor@victorlinphoto.com
<br />http://www.victorlinphoto.com
<br />650.248.0289
<br />
<br />*Referrals must be new clients and must place an order with us.';
	}
	
	//Video Email	
	elseif ($typejob == "Video")
	{
		$video="";
		$video="http://www.victorlinphoto.com/photodownloads/" . $_POST["video"];

$streaming=$_POST["streaming"];

$email = $_POST["email"]
.
'<p>Video for '
.
$_POST["address"]
.
'</p><p>Hello '
.
$_POST["realtor"]
.
',</p>
<p>It was a pleasure shooting your listing!</p>
<p><b>Here is the video (please right click this link and select "Save As" - this video download link expires in a week):</p></b>'
.
'<p><a href="' . $photos . '">' . $photos . '</a></p>'
.
'<p><b>Here is the video link for streaming online:</p></b>'
.
'<p><a href="' . $_POST["video"] . '">' . $_POST["video"] . '</a></p>'
.
'<p>Please think of us next time you have a listing, and <b>earn a $50 credit on your next order by referring a friend to us!*</b></p>
Thank you!
<br />-Victor
<br />victor@victorlinphoto.com
<br />http://www.victorlinphoto.com
<br />650.248.0289
<br />
<br />*Referrals must be new clients and must place an order with us.';
	}
	
$_SESSION['address'] = $_POST["address"];
$_SESSION['shotcount'] = $shotcount;
$_SESSION['typejob'] = $_POST["typejob"];
$_SESSION['vendor'] = $_POST["vendor"];
$_SESSION['realtorFullName'] = $realtorFullName;
$_SESSION['status'] = $_POST["status"];
$_SESSION['processorname'] = $processorName;
$_SESSION['emailText'] = $email;

echo '<b>Email Correct? Press SUBMIT to log your job.</b></br></br><input type=button value="Back" onClick="history.go(-1)"></br></br>
<FORM METHOD="LINK" ACTION="ProcessorLogger.php">
<INPUT TYPE="submit" VALUE="Submit">
</FORM></br>';
if ($vendor == "MHStaging")
{
echo '<b>Paste this link into TourBuzz for the Branded Tour Link before sending out the email and cc jennifer@modernhjem.com:</b></br></br>http://www.victorlinphoto.com/vt/'.$ourFileName.'</br></br> Processor: '.$processorName.' </br>Number of Shots: '.$shotcount.'</br>';
}

echo $email;

?>
</body>
</html>