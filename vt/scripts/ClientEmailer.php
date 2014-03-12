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

$body = "";
$photographer = $_SESSION['photographer'];
$photographerPhone = "";
$client = $_SESSION['client'];
$name = explode(' ', $client);
$clientfirstname = $name[0];
$clientemail = $_SESSION['clientemail'];
$address = "";
$address = $_SESSION['address'];
$photographerEmail = "";
$email_from = "Victor Lin Photography Admin <admin@victorlinphoto.com>";
$email_to = $clientemail;
$subject = "";

//DETERMINES WHICH PHOTOGRAPHER EMAIL TO USE
if($photographer == "Victor")
{
	$photographerEmail = "Victor Lin <victor@victorlinphoto.com>";
	$photographerPhone = "1.650.248.0289";
	$copy_email = "Victor Lin <victor@victorlinphoto.com>, Victor Lin Photography Admin <admin@victorlinphoto.com>";
}
elseif($photographer == "Anthony")
{
	$photographerEmail = "Anthony Piatte <apiattetlb@gmail.com>";
	$photographerPhone = "1.510.750.7092";
	$copy_email = "Victor Lin <victor@victorlinphoto.com>, Victor Lin Photography Admin <admin@victorlinphoto.com>, Anthony Piatte <apiattetlb@gmail.com>";
}
elseif($photographer == "Ana")
{
	$photographerEmail = "Ana Melendez <rmelendezz@gmail.com>";
	$photographerPhone = "1.408.449.1408";
	$copy_email = "Victor Lin <victor@victorlinphoto.com>, Victor Lin Photography Admin <admin@victorlinphoto.com>, Ana Melendez <rmelendezz@gmail.com>";
}
elseif($photographer == "Scott")
{
	$photographerEmail = "Scott DuBose <sdubose99@yahoo.com>";
	$photographerPhone = "1.408.313.1649";
	$copy_email = "Victor Lin <victor@victorlinphoto.com>, Victor Lin Photography Admin <admin@victorlinphoto.com>, Scott DuBose <sdubose99@yahoo.com>";
}
elseif($photographer == "Christian")
{
	$photographerEmail = "Christian Vetter <cvbusinessphotos@gmail.com>";
	$photographerPhone = "1.808.551.6756";
	$copy_email = "Victor Lin <victor@victorlinphoto.com>, Victor Lin Photography Admin <admin@victorlinphoto.com>, Christian Vetter <cvbusinessphotos@gmail.com>";
}

$errors = array();

	// To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "From: $email_from\r\nCc: $copy_email";
	
$subject = 'Photographer Contact Info, Your Responsibilities, and House Preparation for your Photo Shoot at '.$address;
	
$body = '</p><p>Hello '
.
$clientfirstname
.
',</p>
<p>Thank you for your order! Below is some very important information regarding your shoot.</p>
<p><b>Prepping your House</b></p>
<p>It is <b>required</b> that you have the following done <b>1 HOUR</b> before the photographer arrives at the property: </p>
<p><a href="http://victorlinphoto.com/realestate/Photography%20Checklist.pdf">http://victorlinphoto.com/realestate/Photography%20Checklist.pdf</a></p>
<p>If your property is not ready when we get there, we will have to leave your property unfinished if we cannot shoot it in time for our next appointment. You will then have to pay for an additional return trip to finish the shooting at another time.</p>
<p><b>Last Minute Schedule Changes</b></p>
<p>For any last minute schedule changes on the day of shooting, contact your photographer <b>'.$photographer.'</b> directly at <b>'.$photographerPhone.'</b> at least <b>one hour</b> before our scheduled arrival time. <b>Do not</b> contact anyone else or this will delay updates. Rescheduling less than an hour before our scheduled arrival time may be subject to <b>rescheduling fees.</b></p>
<p><b>Specific Areas to Focus On</b></p>
<p>If there are specific areas or details that you would like the photographer to focus on, please let him or her know. We cannot assume responsibility for missed shots if we are not notified of them.</p>
<p><b>Invoice Payment Terms</b></p>
<p>An invoice will be emailed to you. Please pay within 7 days. If we do not receive payment within 20 days a 20% late fee will automatically be added to your invoice.</p>
<p><b>Refer a friend and earn $50!</b></p>
<p>Refer a friend and if they turn out to be a new client and places an order with us, a $50 credit will be added to your account to be used for your next order!</p>

Again, thank you for your order!
<br />
<br />admin@victorlinphoto.com
<br />http://www.victorlinphoto.com';
   
    if(mail($email_to,$subject,$body,$headers))
    {
        echo "Email successful! The client has been emailed. Copy of email below:</br></br>";
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
