<style type="text/css">
<!--
@import url("../css/master.css");
@import url("../css/site.css");
-->
</style>
<?php 

//gets the page ID and the page number for the webpage
$page_id = basename ($_SERVER["PHP_SELF"]);
list($page_cat,$page_num) = explode("_",substr($page_id,0,strpos($page_id,'.')));

//main navigation bar
echo '<div id="header">
<p id="super_title">RealBiz360 VuVista Tutorial</p>
</div>';
echo   '<br />';
echo   '<div id="sub_nav">';
echo     '<ul>';
echo       '<li><a href="tours_1.php" ';
			if ($page_cat == "tours") {
 		  echo 'class="navon"';
 	  	}	
echo	'>Managing Tours</a></li>';
echo       '<li>|</li>';
echo       '<li><a href="publish_1.php" ';
			if ($page_cat == "publish") {
 		  echo 'class="navon"';
 	  	}	
echo	'>Publishing Tours</a></li>';
echo       '<li>|</li>';
echo       '<li><a href="report_1.php" ';
			if ($page_cat == "report") {
 		  echo 'class="navon"';
 	  	}	
echo	'>Tour Reports</a></li>';
echo       '<li>|</li>';
echo       '<li><a href="flyer_1.php" ';
			if ($page_cat == "flyer") {
 		  echo 'class="navon"';
 	  	}	
echo	'>Flyers</a></li>';
echo       '<li>|</li>';
echo       '<li><a href="cd_1.php" ';
       if ($page_cat == "cd") {
 		  echo 'class="navon"';
 	  	}
echo 	  '>Burning to CD</a></li>';
echo      '<li>|</li>';
echo       '<li><a href="images_1.php" ';
       if ($page_cat == "images") {
 		  echo 'class="navon"';
 	  	}
echo	'>Images</a></li>';
echo       '<li>|</li>';
echo       '<li><a href="profile_1.php" ';
       if ($page_cat == "profile") {
 		  echo 'class="navon"';
 	  	}
echo 	  '>Managing Profile</a></li>';
echo    '</ul>';
echo   '</div>';
echo  '<br />';
echo   '<div id="bottom_nav">';
echo     '<ul>';

//generates the navigation bar for the page numbers
for ( $counter = 1; $counter <= $num_pages; $counter += 1) {
	echo '<li><a href="',$page_cat,'_',$counter,'.php" ';
	if ($counter == $page_num) {
 		  echo 'class="navon"';
 	  	}
	echo '>',$counter,'</a></li>';
	if ($counter == $num_pages) {
 		  echo '';
 	  	}
	else echo '<li>|</li>';
}

echo     '</ul>';
echo  '</div>';
?>
