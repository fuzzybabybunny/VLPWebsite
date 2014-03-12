
<div id="nav">
  <div id="nav_left">
    <ul>
      <li><a href="../realestate/index.php" class="navon"><img src="../images/nav/nav_realestate.jpg" alt="Real Estate"/></a></li>
    </ul>
  </div>
  <div id="nav_right">
    <ul>
      <li><a href="../about.php" ><img src="../images/nav/nav_about.jpg" alt="About" /></a></li>
      <li>|</li>
      <li style="margin-right:0px;"><a href="../contact.php" ><img src="../images/nav/nav_contact.jpg" alt="Contact" /></a></li>
    </ul>
  </div>
</div>
<?php 
//gets the page ID and the page number for the webpage
$page_id = basename ($_SERVER["PHP_SELF"]);
$page_cat = substr($page_id,0,strpos($page_id,'.'));
echo '<div id="sub_nav">
    <ul>
      <li><a href="index.php" ';
	  if ($page_cat == "index") {
 		  echo 'class="navon"';
 	  	}	
echo		'>Introduction</a></li>
      <li>|</li>
      <li><a href="images.php" ';
	  if ($page_cat == "images") {
 		  echo 'class="navon"';
 	  	}	
echo		'>Images</a></li>
      <li>|</li>
      <li><a href="videos.php" ';
	  if ($page_cat == "videos") {
 		  echo 'class="navon"';
 	  	}	
echo		'>Videos</a></li>
      <li>|</li>
      <li><a href="virtualtours.php" ';
	  if ($page_cat == "virtualtours") {
 		  echo 'class="navon"';
 	  	}	
echo		'>Single Property Websites</a></li>
      <li>|</li>
      <li><a href="technique.php" ';
	  if ($page_cat == "technique") {
 		  echo 'class="navon"';
 	  	}	
echo		'>Technique</a></li>
      <li>|</li>
      <li><a href="prices.php" ';
	  if ($page_cat == "prices" || $page_cat == "order" || $page_cat == "orderconfirm" || $page_cat == "ordersuccess") {
 		  echo 'class="navon"';
 	  	}	
echo		'>Prices & Ordering</a></li>
      <li>|</li>
      <li><a href="testimonials.php" ';
	  if ($page_cat == "testimonials") {
 		  echo 'class="navon"';
 	  	}	
echo		'>Testimonials</a></li>
 <!--<li>|</li>
     <li><a href="tutorials.php" ';
	  if ($page_cat == "tutorials") {
 		  echo 'class="navon"';
 	  	}	
echo		'>Tutorials</a></li>-->
    </ul>
  </div>'
?>