<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

$emailText = $_SESSION['emailText'];
$processorName = $_SESSION['processorname'];
$address = $_SESSION['address'];
$shotcount = $_SESSION['shotcount'];
$realtorFullName = $_SESSION['realtorFullName'];

if ($emailText == "")
{
echo "Job Logged! <br/>";
}
else
{
echo $emailText;
}

	//Logs the Processor's Job
	if($processorName == "Christian")
	{
		date_default_timezone_set('PST');
		$today="";
		$today = date("n/j/Y"); 
		$myFile = "christianlog.txt";
		$fh = fopen($myFile, 'a') or die("can't open file");
		$stringData = $today."\t".$address."\t".$shotcount."\t".$realtorFullName."\n";
		fwrite($fh, $stringData);
		fclose($fh);
	}
	elseif($processorName == "Victor")
	{
		date_default_timezone_set('PST');
		$today="";
		$today = date("n/j/Y"); 
		$myFile = "victorlog.txt";
		$fh = fopen($myFile, 'a') or die("can't open file");
		$stringData = $today."\t".$address."\t".$shotcount."\t".$realtorFullName."\n";
		fwrite($fh, $stringData);
		fclose($fh);
	}
	if($processorName == "Alex")
	{
		date_default_timezone_set('PST');
		$today="";
		$today = date("n/j/Y"); 
		$myFile = "alexlog.txt";
		$fh = fopen($myFile, 'a') or die("can't open file");
		$stringData = $today."\t".$address."\t".$shotcount."\t".$realtorFullName."\n";
		fwrite($fh, $stringData);
		fclose($fh);
	}

$errors = array();

session_destroy();
?>
</body>
</html>
