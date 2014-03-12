<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Custom Link Generator</title>
</head>

<body>
<h2><strong>New Order Emailer</strong></h2>
<iframe src="https://www.google.com/calendar/embed?mode=WEEK&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=victorlinphoto.com_9cpoipo1bgvv736bb6129qu5k0%40group.calendar.google.com&amp;color=%23853104&amp;src=victor%40victorlinphoto.com&amp;color=%23A32929&amp;src=rabidsoggymoose%40gmail.com&amp;color=%23182C57&amp;ctz=America%2FLos_Angeles" style=" border-width:0 " width="800" height="600" frameborder="0" scrolling="no"></iframe>

<?php

		$address = $_GET['address'];
		$realtor = $_GET['realtor'];
		$time = $_GET['time'];
		
echo
'<form name="Form1" method="get">
</br>
Address: 
<input type="text" size="50" name="address" value="'.$address.'"/>
<br />
Time: 
<input type="text" size="50" name="time" value="'.$time.'"/>
<br />
Realtor Name: 
<input type="text" size="50" name="realtor" value="'.$realtor.'"/>
<br />
Realtor Email: 
<input type="text" size="50" name="email" />
<br />
<br />
Notes:
<textarea cols="50" rows="8" name="notes"></textarea>
<br />
<br />
Already Photographed?:
<br />
<input type="radio" name="status" value="yes" /> YES
<input type="radio" name="status" value="no" checked /> NO
<br />
<br />
Type of Job:
<br />
<input type="radio" name="typejob" value="UNKNOWN" /> UNKNOWN
<br /><input type="radio" name="typejob" value="FREE" /> FREE
<br /><input type="radio" name="typejob" value="VT126" checked /> 126
<br /><input type="radio" name="typejob" value="VT1500" /> VT1500
<br /><input type="radio" name="typejob" value="VT2000" /> VT2000
<br /><input type="radio" name="typejob" value="VT3000" /> VT3000
<br /><input type="radio" name="typejob" value="VT4000" /> VT4000
<br /><input type="radio" name="typejob" value="P1500" /> P1500
<br /><input type="radio" name="typejob" value="P2000" /> P2000
<br /><input type="radio" name="typejob" value="P3000" /> P3000
<br /><input type="radio" name="typejob" value="P4000" /> P4000
<br /><input type="radio" name="typejob" value="DTMSM" /> DTMSM
<br /><input type="radio" name="typejob" value="VT126FAR" /> V126FAR
<br /><input type="radio" name="typejob" value="VT126LARGE" /> VT126LARGE
<br /><input type="radio" name="typejob" value="RETURN" /> RETURN TRIP<br />
<br />
<INPUT type="button" value="Submit" name=Submit onclick="return OnButton1();">
<INPUT type="button" value="Photographer Emailer" name=PhotographerEmailer onclick="return OnButton2();">
</br>
</form>
<script language="Javascript">
<!--
function OnButton1()
{
    document.Form1.action = "OrderEmailerScript.php"
	document.Form1.target = "_self";    // Open in same window
    document.Form1.submit();             // Submit the page

    return true;
}

function OnButton2()
{
    document.Form1.action = "PhotographerEmailer.php"
    document.Form1.target = "_blank";    // Open in a new window

    document.Form1.submit();             // Submit the page

    return true;
}
-->
</script>'
?>
</body>
</html>