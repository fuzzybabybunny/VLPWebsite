<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Link Generator</title>
</head>

<body>

<?php
		$address = $_GET['address'];
		$realtorFirstName = $_GET['realtorFirstName'];
		$realtor = $_GET['realtor'];
		$vendor = $_GET['vendor'];
		$typejob = $_GET['typejob'];
		$reminder = "";
		$links = "";
		$userpass = "";
		$processorName = "";
		$MHForm = "";
	
	//Reminder Title for Emailing
	if($vendor == "126 Staging")
  	{
	$reminder = "<p>
  	Remember to cc 126@onetwosixdesign.com !";
	}
	elseif($vendor == "MHStaging")
	{
	$reminder = "<p>
  	Remember to cc jennifer@modernhjem.com !";
	}
	elseif($vendor == "DTMSM")
	{
	$reminder = "<p>
  	Send to manie@donttellmeshowme.com !";
	}

	//Place to input the address and zip file
	if ($typejob == "TourBuzz")
    {
		$links = '<br /><b>Simply Press Submit to Log your Job and send the job out via TourBuzz. Be sure to forward the tour to me.</b><br /><br />';
	}
	elseif ($typejob == "TourFactory")
	{
		$links = 'Full Featured Link: 
    <input type="text" size="50" name="full" />
    <br />';
	}
	elseif ($typejob == "Video")
	{
	$links = 'Video Link: 
    <input type="text" size="50" name="video" />
    <br />';
	}
	
	//If ModernHjem
	if ($vendor == "MHStaging")
    {
		$MHForm = 'Branded Tour Link: 
    <input type="text" size="50" name="full"/>
    <br />';
	}
	
	
	//Place to input the username and password for virtual tours
	//if ($typejob == "RealBiz360")
    //{
	//$userpass = 'Username: 
    //<input type="text" size="50" name="username" />
    //<br />
    //Password: 
    //<input type="text" size="50" name="password" />
    //<br />';
	//}
	
//Beginning of Form
echo		
'<form action="LinkGeneratorScript.php" method="post">
  <h2><strong>Custom Link Generator</strong></h2>
  '
  .$reminder.
'<br />
	<br />
	Processor:
	<select name="processorName">
	<option value="Alex">Alex</option>
	<option value="Christian">Christian</option>
	<option value="Victor">Victor</option>
	</select>
	<br />
	Address:
    <input type="text" size="50" name="address" value="'.$address.'"/>
	<br />
	Full Amazon Download Link: 
	<input type="text" size="100" name="amazon" />
	<br />
	'
.$MHForm.
'<br />'
.$links.	
	'Realtor Name: 
    <input type="text" size="50" name="realtor" value="'.$realtorFirstName.'"/>
    <br />
    Realtor Email: 
    <input type="text" size="50" name="email" />
    <br />'
.$userpass.
    'Vender: 
    <input type="text" size="50" name="vendor" value="'.$vendor.'"/>
    <br />
	Type of Job: 
    <input type="text" size="50" name="typejob" value="'.$typejob.'"/>
    <br />
	Shot Count: 
    <input type="text" size="50" name="shotcount" value="'.$_GET['shotcount'].'"/>
    <br />
	Realtor Full Name: 
    <input type="text" size="50" name="realtorFullName" value="'.$realtor.'"/>
    <br />
	<input type="submit" size="50" value="Submit" />
  </p>
</form>'

?>

</body>
</html>