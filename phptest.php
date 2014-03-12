<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<script language="javascript">

var mode = 'small'; //this is like a global variable or something.

function zoom() {
    /* I'm snatching the two tags in question from the HTML document. */
    var photo = document.getElementById('me');
    var caption = document.getElementById('caption');
   
    /* Using that global I'll decide what this
       function will do with those two tags. */
    if (mode == 'small') {
        photo.width = 450;
        photo.height = 600;
        caption.innerHTML = "I'm so sexy!";
        mode = 'large';
    } else {
        photo.width = 150;
        photo.height = 200;
        caption.innerHTML = "I guess the sexiness was too much for you.";
        mode = 'small';
    }
}

</script>

<p>PHP SECTION</p>

<p>This is HTML code</p>
<?
  echo '<p>', $_GET['a'] * $_GET['b'], '</p>'; 
?>
<p>This is HTML code again</p>


<p>JS SECTION</p>

<img id="me" src="images/aboutme.jpg" width="300" height="400" />
<img src="images/submit_form.jpg" onmouseup="zoom()" />
<p id="caption">Click on the SUBMIT button to zoom in.</p> 


</body>
</html>