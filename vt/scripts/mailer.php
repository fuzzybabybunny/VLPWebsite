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
//Code for Emailing

$subject = $_SESSION['emailsubject'];
$body = $_SESSION['formattedemailtext'];
$email = $_SESSION['email'];
$photographer = $_SESSION['photographer'];
$payment = "";
$payment = $_SESSION['payment'];
$totalpayment = "";
$totalpayment = $_SESSION['totalpayment'];
$price = "";
$price = (5*$_SESSION['sessionID'])/21;
$vender = "";
$vender = $_SESSION['vender'];
$sqft = "";
$sqft = $_SESSION['sqft'];
$address = "";
$address = $_SESSION['address'];
$typejob = "";
$typejob = $_SESSION['typejob'];
$shotcount = "";
$shotcount = $_SESSION['shotcount'];
$realtor = "";
$realtor = $_SESSION['realtor'];
$vlpPhoto = strpos($subject,"VLP Photography Job");
$vlpProc = strpos($subject,"VLP Processing Job");
$vlpNewOrder = strpos($subject,"Your Photography");
$photographerEmail = "";
$readyNotes = $_SESSION['readynotes'];
$ready = $_SESSION['ready'];
$status = "";
$status = $_SESSION['status'];

//LOGS 126 JOBS
if($vender == "126 Staging")
{
	 //Logs 126 JOBS
	date_default_timezone_set('PST');
	$today="";
	$today = date("n/j/Y"); 
	$myFile = "126log.txt";
	$fh = fopen($myFile, 'a') or die("can't open file");
	$stringData = $today."\t".$address."\t".$sqft."\t".$realtor."\t".$status."\t".$payment."\n";
	fwrite($fh, $stringData);
	fclose($fh);
}

//LOGS MANIE JOBS
if($vender == "DTMSM")
{
	 //Logs DTMSM JOBS
	date_default_timezone_set('PST');
	$today="";
	$today = date("n/j/Y"); 
	$myFile = "DTMSMlog.txt";
	$fh = fopen($myFile, 'a') or die("can't open file");
	$stringData = $today."\t".$address."\t".$sqft."\n";
	fwrite($fh, $stringData);
	fclose($fh);
}

//LOGS Modern Hjem JOBS
if($vender == "MHStaging")
{
	 //Logs DTMSM JOBS
	date_default_timezone_set('PST');
	$today="";
	$today = date("n/j/Y"); 
	$myFile = "MHStaginglog.txt";
	$fh = fopen($myFile, 'a') or die("can't open file");
	$stringData = $today."\t".$address."\t".$sqft."\n";
	fwrite($fh, $stringData);
	fclose($fh);
}

//LOGS ALL JOBS
date_default_timezone_set('PST');
	$today="";
	$today = date("n/j/Y"); 
	$myFile = "VLPlog.txt";
	$fh = fopen($myFile, 'a') or die("can't open file");
	$stringData = $typejob."\t".$vender."\t".$realtor."\t".$photographer."\t".$price."\t".$payment."\t".$totalpayment."\t".$today."\t".$address."\t".$sqft."\n\n";
	fwrite($fh, $stringData);
	fclose($fh);

//DETERMINES WHICH PHOTOGRAPHER EMAIL TO USE
if($photographer == "Victor")
{
	$photographerEmail = "Victor Lin <victor@victorlinphoto.com>";
}
elseif($photographer == "Anthony")
{
	$photographerEmail = "Anthony Piatte <apiattetlb@gmail.com>";
}
elseif($photographer == "Ana")
{
	$photographerEmail = "Ana Melendez <rmelendezz@gmail.com>";
}
elseif($photographer == "Scott")
{
	$photographerEmail = "Scott DuBose <sdubose99@yahoo.com>";
}
elseif($photographer == "Christian")
{
	$photographerEmail = "Christian Vetter <cvbusinessphotos@gmail.com>";
}

//IF EMAIL IS A NEW ORDER EMAIL
if($vlpPhoto === false && $vlpProc === false && $vlpNewOrder === 0)
{
	$copy_email = "Victor Lin <victor@victorlinphoto.com>";
	$email_from = "Victor Lin <victor@victorlinphoto.com>";
	$email_to = $email;
}

//IF EMAIL IS A VLP PROCESSING JOB
elseif($vlpPhoto === false && $vlpProc === 0 && $vlpNewOrder === false)
{
	//Logs the Processor's Job
	date_default_timezone_set('PST');
	$today="";
	$today = date("n/j/Y"); 
	$myFile = "processorlog.txt";
	$fh = fopen($myFile, 'a') or die("can't open file");
	$stringData = $today."\t".$realtor."\t".$address."\t".$sqft."\t".$shotcount."\t".$realtor."\n";
	fwrite($fh, $stringData);
	fclose($fh);
	
	$copy_email = "Victor Lin <victor@victorlinphoto.com>".",".$photographerEmail;
	$email_from = $photographerEmail;
	$email_to = "Alex Hsu <alex@victorlinphoto.com>";
	//LOGS THE PHOTOGRAPHER'S JOB
		if($photographer == "Anthony")
		{
			date_default_timezone_set('PST');
			$today="";
			$today = date("n/j/Y"); 
			$myFile = "anthonylog.txt";
			$fh = fopen($myFile, 'a') or die("can't open file");
			$stringData = $today."\t".$realtor."\t".$address."\t".$sqft."\t".$ready."\t".$readyNotes."\t".$payment."\t".$totalpayment."\n";
			fwrite($fh, $stringData);
			fclose($fh);
		}
		if($photographer == "Ana")
		{
			date_default_timezone_set('PST');
			$today="";
			$today = date("n/j/Y"); 
			$myFile = "analog.txt";
			$fh = fopen($myFile, 'a') or die("can't open file");
			$stringData = $today."\t".$realtor."\t".$address."\t".$sqft."\t".$ready."\t".$readyNotes."\t".$payment."\t".$totalpayment."\n";
			fwrite($fh, $stringData);
			fclose($fh);
		}
		if($photographer == "Christian")
		{
			date_default_timezone_set('PST');
			$today="";
			$today = date("n/j/Y"); 
			$myFile = "christianlog.txt";
			$fh = fopen($myFile, 'a') or die("can't open file");
			$stringData = $today."\t".$realtor."\t".$address."\t".$sqft."\t".$ready."\t".$readyNotes."\t".$payment."\t".$totalpayment."\n";
			fwrite($fh, $stringData);
			fclose($fh);
		}
		if($photographer == "Scott")
		{
			date_default_timezone_set('PST');
			$today="";
			$today = date("n/j/Y"); 
			$myFile = "scottlog.txt";
			$fh = fopen($myFile, 'a') or die("can't open file");
			$stringData = $today."\t".$realtor."\t".$address."\t".$sqft."\t".$ready."\t".$readyNotes."\t".$payment."\t".$totalpayment."\n";
			fwrite($fh, $stringData);
			fclose($fh);
		}
		if($photographer == "Victor")
		{
			date_default_timezone_set('PST');
			$today="";
			$today = date("n/j/Y"); 
			$myFile = "victorlog.txt";
			$fh = fopen($myFile, 'a') or die("can't open file");
			$stringData = $today."\t".$realtor."\t".$address."\t".$sqft."\t".$ready."\t".$readyNotes."\t".$payment."\t".$totalpayment."\n";
			fwrite($fh, $stringData);
			fclose($fh);
		}
}

//IF EMAIL IS A VLP PHOTOGRAPHER JOB
elseif($vlpPhoto === 0 && $vlpProc === false && $vlpNewOrder === false)
{
	$copy_email = "Victor Lin <victor@victorlinphoto.com>";
	$email_from = "Victor Lin <victor@victorlinphoto.com>";
	$email_to = $photographerEmail;
}

$errors = array();

	// To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "From: $email_from\r\nCc: $copy_email";
	//echo "vlpProc: ".$vlpProc." vlpPhoto: ".$vlpPhoto." vlpNewOrder: ".$vlpNewOrder;
	//echo "Email To: ".$email_to."<br>Email From: ".$email_from."<br>Copy Email: ".$copy_email."<br>".$headers."</br></br>".$subject."</br></br>".$body."</br>";
	//echo "Type of Job: ".$typejob;
   
    if(mail($email_to,$subject,$body,$headers))
    {
        echo "Email successful! Your job has been logged! Copy of email below:</br></br>";
		echo "Email To: ".$email_to."<br>Email From: ".$email_from."<br>Copy Email: ".$copy_email."<br>".$headers."</br></br>".$subject."</br></br>".$body."</br>";
    }
    else
    {
        echo "Whoops. We hit a bug sending out the email. Please go back and try again.";
    }

session_destroy();
?>
</body>
</html>
