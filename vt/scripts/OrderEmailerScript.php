<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New Order Generator Script</title>
</head>

<body>
<?php 

$name="";
$realtor="";
$realtor=$_GET["realtor"];
$email=$_GET["email"];
$name = explode(' ', $realtor);
$first_name = $name[0];
$paymentText = "";
$storeLink="";

$storeitem="none";
$itemname="none";
if ($_GET["typejob"]=="UNKNOWN")
{
$storeitem="http://www.victorlinphoto.com/realestate/store/";
$itemname="Victor Lin Photography Store";
$paymentText="<b>To confirm your appointment,</b> please pay in advance through our secure website. Simply click on the following link, enter in the information required in red asterisks, add the desired item to your cart, and go through the checkout process to pay for this property.<br/>";
}
elseif ($_GET["typejob"]=="FREE")
{
$storeitem="";
$itemname="FREE VT with 126Design Staging";
$paymentText="";
}
elseif ($_GET["typejob"]=="VT126")
{
$storeitem="http://www.victorlinphoto.com/realestate/store/virtual-tour-with-onetwosixdesign-staging.html";
$itemname="Victor Lin Photography Store - $75 VT with 126Design Staging";
$paymentText="<b>To confirm your appointment,</b> please pay in advance through our secure website. Simply click on the following link, enter in the information required in red asterisks, add the desired item to your cart, and go through the checkout process to pay for this property.<br/>";
}
elseif ($_GET["typejob"]=="VT1500")
{
$storeitem="http://www.victorlinphoto.com/realestate/store/virtual-tour-for-under-1-500-sq-ft-property.html";
$itemname="Victor Lin Photography Store - $125 VT";
$paymentText="<b>To confirm your appointment,</b> please pay in advance through our secure website. Simply click on the following link, enter in the information required in red asterisks, add the desired item to your cart, and go through the checkout process to pay for this property.<br/>";
}
elseif ($_GET["typejob"]=="VT2000")
{
$storeitem="http://www.victorlinphoto.com/realestate/store/virtual-tour-for-1-501-2-000-sq-ft-property.html";
$itemname="Victor Lin Photography Store - $150 VT";
$paymentText="<b>To confirm your appointment,</b> please pay in advance through our secure website. Simply click on the following link, enter in the information required in red asterisks, add the desired item to your cart, and go through the checkout process to pay for this property.<br/>";
}
elseif ($_GET["typejob"]=="VT3000")
{
$storeitem="http://www.victorlinphoto.com/realestate/store/virtual-tour-for-2-001-3-000-sq-ft-property.html";
$itemname="Victor Lin Photography Store - $175 VT";
$paymentText="<b>To confirm your appointment,</b> please pay in advance through our secure website. Simply click on the following link, enter in the information required in red asterisks, add the desired item to your cart, and go through the checkout process to pay for this property.<br/>";
}
elseif ($_GET["typejob"]=="VT4000")
{
$storeitem="http://www.victorlinphoto.com/realestate/store/virtual-tour-for-3-001-4-000-sq-ft-property.html";
$itemname="Victor Lin Photography Store - $200 VT";
$paymentText="<b>To confirm your appointment,</b> please pay in advance through our secure website. Simply click on the following link, enter in the information required in red asterisks, add the desired item to your cart, and go through the checkout process to pay for this property.<br/>";
}
elseif ($_GET["typejob"]=="P1500")
{
$storeitem="http://www.victorlinphoto.com/realestate/store/photography-for-a-property-1-500-sq-ft-and-less.html";
$itemname="Victor Lin Photography Store - $100 Photography";
$paymentText="<b>To confirm your appointment,</b> please pay in advance through our secure website. Simply click on the following link, enter in the information required in red asterisks, add the desired item to your cart, and go through the checkout process to pay for this property.<br/>";
}
elseif ($_GET["typejob"]=="P2000")
{
$storeitem="http://www.victorlinphoto.com/realestate/store/photography-for-a-property-1-501-2-000-sq-ft.html";
$itemname="Victor Lin Photography Store - $125 Photography";
$paymentText="<b>To confirm your appointment,</b> please pay in advance through our secure website. Simply click on the following link, enter in the information required in red asterisks, add the desired item to your cart, and go through the checkout process to pay for this property.<br/>";
}
elseif ($_GET["typejob"]=="P3000")
{
$storeitem="http://www.victorlinphoto.com/realestate/store/photography-for-a-property-2-001-3-000-sq-ft.html";
$itemname="Victor Lin Photography Store - $150 Photography";
$paymentText="<b>To confirm your appointment,</b> please pay in advance through our secure website. Simply click on the following link, enter in the information required in red asterisks, add the desired item to your cart, and go through the checkout process to pay for this property.<br/>";
}
elseif ($_GET["typejob"]=="P4000")
{
$storeitem="http://www.victorlinphoto.com/realestate/store/photography-for-a-property-3-001-4-000-sq-ft.html";
$itemname="Victor Lin Photography Store - $175 Photography";
$paymentText="<b>To confirm your appointment,</b> please pay in advance through our secure website. Simply click on the following link, enter in the information required in red asterisks, add the desired item to your cart, and go through the checkout process to pay for this property.<br/>";
}
elseif ($_GET["typejob"]=="DTMSM")
{
$storeitem="http://www.victorlinphoto.com/realestate/store/photography-for-a-property-1-501-2-000-sq-ft.html";
$itemname="Victor Lin Photography Store - $125 Photography";
$paymentText="<b>To confirm your appointment,</b> please pay in advance through our secure website. Simply click on the following link, enter in the information required in red asterisks, add the desired item to your cart, and go through the checkout process to pay for this property.<br/>";
}
elseif ($_GET["typejob"]=="VT126FAR")
{
$storeitem="http://www.victorlinphoto.com/realestate/store/virtual-tour-with-onetwosixdesign-staging-long-distance.html";
$itemname="Victor Lin Photography Store - VT with 126Design Staging";
$paymentText="<b>To confirm your appointment,</b> please pay in advance through our secure website. Simply click on the following link, enter in the information required in red asterisks, add the desired item to your cart, and go through the checkout process to pay for this property.<br/>";
}
elseif ($_GET["typejob"]=="VT126LARGE")
{
$storeitem="http://www.victorlinphoto.com/realestate/store/virtual-tour-with-onetwosixdesign-staging-large.html";
$itemname="Victor Lin Photography Store - VT with 126Design Staging";
$paymentText="<b>To confirm your appointment,</b> please pay in advance through our secure website. Simply click on the following link, enter in the information required in red asterisks, add the desired item to your cart, and go through the checkout process to pay for this property.<br/>";
}
elseif ($_GET["typejob"]=="RETURN")
{
$storeitem="http://www.victorlinphoto.com/realestate/store/return-trip.html";
$itemname="Victor Lin Photography Store - Return Trip";
$paymentText="<b>To confirm your appointment,</b> please pay in advance through our secure website. Simply click on the following link, enter in the information required in red asterisks, add the desired item to your cart, and go through the checkout process to pay for this property.<br/>";
}

$notes=$_GET["notes"]; 
$formattednotes=str_replace(Chr(13),'<br/>', $notes); 

$messagetext="";
$invoiceorappointment="";
if ($_GET["status"]=="yes")
{
$invoiceorappointment="Invoice";
$messagetext=",<br/><br/> Thank you for choosing Victor Lin Photography! Please pay immediately through our secure website. Simply click on the following link, enter in the information required in red asterisks, add the desired item to your cart, and go through the checkout process to pay for this property.<br/>";
}
elseif ($_GET["status"]=="no")
{
$invoiceorappointment="Appointment";
$messagetext=",<br/><br/> Thank you for your appointment with Victor Lin Photography! <br/><br/><b>Please have the following done 30 minutes before the photographer arrives at the property:</b><br/><br/><a href='http://victorlinphoto.com/realestate/Photography%20Checklist.pdf'target='_blank'>Preparing Your Home for Photography</a><br/><br/>".$paymentText;
}

if ($_GET["typejob"]=="FREE")
{
$storeLink="";
}
else
{
$storeLink='<br/><a href="'.$storeitem.'" target="_blank">'.$itemname.'</a>';
}

$time="";
$time='<br/><br/><b>Time:</b><br/><br/>'.$_GET["time"];

$emailsubject="";
$emailbody="";
$formattedemailtext="";

$emailsubject= 
'Your Photography '.$invoiceorappointment.' for '.$_GET["address"];

$emailbody=
'Hello '
.
$first_name
.
$messagetext
.
$storeLink
.
'<br/><br/><b>Property:</b><br/><br/>'
.
$_GET["address"]
.
$time
.
'<br/><br /><b>Thank you '
.
$first_name
.
'!</b>
<br />-Victor
<br />victor@victorlinphoto.com
<br />http://www.victorlinphoto.com
<br />650.248.0289';

$formattedemailtext='<html><body>'.$emailbody.'</body></html>';

$_SESSION['emailsubject'] = $emailsubject;
$_SESSION['formattedemailtext'] = $formattedemailtext;
$_SESSION['email'] = $email;

echo '<b>Email Correct?</b></br></br><input type=button value="Back" onClick="history.go(-1)"></br></br><FORM METHOD="LINK" ACTION="mailer.php">
<INPUT TYPE="submit" VALUE="Submit">
</FORM></br>';

echo $emailsubject."</br></br>";
echo $formattedemailtext;
?>

</body>
</html>