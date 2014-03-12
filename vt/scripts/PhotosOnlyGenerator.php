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
		$realtor = $_GET['realtor'];
		$name = explode(' ', $realtor);
		$first_name = $name[0];
		
echo
'<h2><strong>Photos Only Link Generator</strong></h2>
<form action="PhotosOnlyGeneratorScript.php" method="post">
Address: 
<input type="text" size="50" name="address" value="'.$address.'"/>
<br />
Zip File: 
<input type="text" size="50" name="zip" />
<br />
Realtor Name: 
<input type="text" size="50" name="realtor" value="'.$first_name.'"/>
<br />
Realtor Email: 
<input type="text" size="50" name="email" />
<br />
<input type="submit" size="50" value="Submit" />
</form>'

?>

</body>
</html>