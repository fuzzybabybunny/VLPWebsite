<?php
$page = $_REQUEST['page'];


// OPEN FILE FOR READING
$file = "config.txt";
$current=file($file, FILE_IGNORE_NEW_LINES);

// STANDARD VARIABLES
$url = "index.php";

//$video_yes = "";
//$video_no = "";
//$slideshow_yes = "";
//$slideshow_no = "";

//$radioErr = "";
//$bgi = 1;
//$bgtc = array();

// BACKGROUND TILER SELECTION RADIO HANDLER
//if (($current[2] == "NO_VALUE") || ($current[2] == "WRONG_VALUE") || !($current[2] >= 1 && $current[2] <= 8)) {
//	$radioErr = "<br>Current value of this variable is \"" . $current[2] . "\" so sither this variable has been assigned incorrectly, or with a <strong class=\"red\">NO_VALUE</strong> or <strong class=\"red\">WRONG_VALUE</strong>, so it has been defaulted to the first available option.";
//	$bgtc[1] = "checked";
//} else {
//	while ($bgi <= 8) {
//		if ($current[2] == "$bgi"){
//			$bgtc[$bgi] = "checked";
//		}
//	$bgi++;		
//	}
//}

$state = array(
		'Alabama' => "AL",
		'Alaska' => "AK",
		'Arizona' => "AZ",
		'Arkansas' => "AR",
		'California' => "CA",
		'Colorado' => "CO",
		'Connecticut' => "CT",
		'Delaware' => "DE",
		'Florida' => "FL",
		'Georgia' => "GA",
		'Hawaii' => "HI",
		'Idaho' => "ID",
		'Illinois' => "IL",
		'Indiana' => "IN",
		'Iowa' => "IA",
		'Kansas' => "KS",
		'Kentucky' => "KY",
		'Louisiana' => "LA",
		'Maine' => "ME",
		'Maryland' => "MD",
		'Massachusetts' => "MA",
		'Michigan' => "MI",
		'Minnesota' => "MN",
		'Mississippi' => "MS",
		'Missouri' => "MO",
		'Montana' => "MT",
		'Nebraska' => "NE",
		'Nevada' => "NV",
		'New Hampshire' => "NH",
		'New Jersey' => "NJ",
		'New Mexico' => "NM",
		'New York' => "NY",
		'North Carolina' => "NC",
		'North Dakota' => "ND",
		'Ohio' => "OH",
		'Oklahoma' => "OK",
		'Oregon' => "OR",
		'Pennsylvania' => "PA",
		'Rhode Island' => "RI",
		'South Carolina' => "SC",
		'South Dakota' => "SD",
		'Tennessee' => "TN",
		'Texas' => "TX",
		'Utah' => "UT",
		'Vermont' => "VT",
		'Virgin Islands' => "VI",
		'Virginia' => "VA",
		'Washington' => "WA",
		'West Virginia' => "WV",
		'Wisconsin' => "WI",
		'Wyoming' => "WY"
);

$state_for_schools = ($state[$current[11]]);

$schools_link = "http://nces.ed.gov/globallocator/index.asp?search=1&miles=5&sortby=name&School=1&PrivSchool=1&Library=1&zipcode=" . $current[12] . "&state=" . $state_for_schools . "&city=" . $current[10];

$video_content = "<iframe width=\"920\" height=\"550\" src=\"" . $current[5] . "?wmode=transparent\" frameborder=\"0\" allowfullscreen></iframe>";

$photo_embed_modifier = "";

$photo_content = "<div class=\"sites-embed-content sites-embed-type-ggs-gadget\"><div><iframe title=\"Steegle.com - Picasa Web Album Slideshow (iframe)\" width=\"920\" height=\"550\" scrolling=\"no\" frameborder=\"0\" id=\"1266209511\" name=\"1266209511\" allowtransparency=\"true\" class=\"igm\" src=\"//nlvo8uav3lockdm1og8ekenvcfgubv13-a-sites-opensocial.googleusercontent.com/gadgets/ifr?url=http://hosting.gmodules.com/ig/gadgets/file/110509162544058635853/picasa-slideshow-steegle.xml&amp;container=enterprise&amp;view=default&amp;lang=en&amp;country=ALL&amp;sanitize=0&amp;v=4fcc2472b8c62d27&amp;libs=core:dynamic-height&amp;mid=107&amp;parent=https://sites.google.com/site/tedkpagonistestsite/#up_iframeURL=https://picasaweb.google.com/103496437899094175337/VictorLinPhotographyGallerySample?authuser%3D0%26feat%3Ddirectlink&amp;st=e%3DAIHE3cANMeBpBoQ8NWmd%252F6qpOqtvA01tYOmqjUdnePq1Iw%252FlEi7pFRGFJfHvvh3Au8nTG%252FweGgomm1xWz%252FxonK3NKaMdWdZEnYQ8YnRVLKflmb7dBWWWqbRj9okGtq8sHCuCSLZ48i0u%26c%3Denterprise&amp;rpctoken=-4629280902815537354\"></iframe><script>JOT_postEvent('registerForRpc', this, ['-4629280902815537354', 1266209511, '//nlvo8uav3lockdm1og8ekenvcfgubv13-a-sites-opensocial.googleusercontent.com/gadgets/ifr?url\75http://hosting.gmodules.com/ig/gadgets/file/110509162544058635853/picasa-slideshow-steegle.xml\46container\75enterprise\46view\75default\46lang\75en\46country\75ALL\46sanitize\0750\46v\0754fcc2472b8c62d27\46libs\75core:dynamic-height\46mid\075107\46parent\75https://sites.google.com/site/tedkpagonistestsite/#up_iframeURL\75https://picasaweb.google.com/103496437899094175337/VictorLinPhotographyGallerySample?authuser%3D0%26feat%3Ddirectlink\46st\75e%3DAIHE3cANMeBpBoQ8NWmd%252F6qpOqtvA01tYOmqjUdnePq1Iw%252FlEi7pFRGFJfHvvh3Au8nTG%252FweGgomm1xWz%252FxonK3NKaMdWdZEnYQ8YnRVLKflmb7dBWWWqbRj9okGtq8sHCuCSLZ48i0u%26c%3Denterprise\46rpctoken\75-4629280902815537354'])</script></div></div>";


//$photo_content = "<embed type=\"application/x-shockwave-flash\" src=\"https://picasaweb.google.com/s/c/bin/slideshow.swf\" width=\"920\" height=\"550\" wmode=\"transparent\" flashvars=\"host=picasaweb.google.com&captions=1&hl=en_US&feat=flashalbum&RGB=0x000000&feed=https%3A%2F%2Fpicasaweb.google.com%2Fdata%2Ffeed%2Fapi%2Fuser%2F103496437899094175337%2Falbumid%2F5646836558995977777%3Falt%3Drss%26kind%3Dphoto%26hl%3Den_US\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\"></embed>";

//$photo_content = "<img src=\"https://www.google.com/chart?chc=sites&amp;cht=d&amp;chdp=sites&amp;chl=%5B%5BGoogle+Gadget'%3D16'f%5Cbf%5Chv'a%5C%3D458'0'%3D457'0'dim'%5Cbox1'b%5CDBD9BB'fC%5CDBD9BB'eC%5C15'sk'%5C%5B%22Steeglecom+-+Picasa+Web+Album+Slideshow+iframe%22'%5Dh'a%5CV%5C%3D12'f%5Cbf%5C%5DV%5Cta%5C%3D459'%3D0'%3D458'%3D547'dim'%5C%3D459'%3D0'%3D458'%3D547'vdim'%5Cbox1'b%5Cva%5CFFFEF0'fC%5CDBD9BB'eC%5Csites_gadget'i%5Chv-0-0'a%5C%5Do%5CLauto'f%5C&amp;sig=AAwXVwDTAx8feJI2Zx5OOIIz_4M\" class=\"igm\" frameborder=\"0\" scrolling=\"no\" allowtransparency=\"true\" width=\"920\" height=\"550\" igsrc=\"http://159.gmodules.com/ig/ifr?mid=159&amp;synd=trogedit&amp;url=http%3A%2F%2Fhosting.gmodules.com%2Fig%2Fgadgets%2Ffile%2F110509162544058635853%2Fpicasa-slideshow-steegle.xml&amp;up_iframeURL=https%3A%2F%2Fpicasaweb.google.com%2F103496437899094175337%2FVictorLinPhotographyGallerySample%3Fauthuser%3D0%26feat%3Ddirectlink&amp;h=550&amp;w=920\" style=\"display: block; text-align: left; \" props=\"url:http#58//hosting.gmodules.com/ig/gadgets/file/110509162544058635853/picasa-slideshow-steegle.xml;showBorder:false;showBorderTitle:null;borderTitle:;title:;view:default;scrolling:no;width:920;height:550;screenshot:https#58//ssl.gstatic.com/sites/p/8e410b/system/app/images/cleardot.gif;params:up_iframeURL=https%3A%2F%2Fpicasaweb.google.com%2F103496437899094175337%2FVictorLinPhotographyGallerySample%3Fauthuser%3D0%26feat%3Ddirectlink;align:left\" type=\"ggs-gadget\">";


//$photo_content = "<embed type=\"application/x-shockwave-flash\" src=\"https://picasaweb.google.com/s/c/bin/slideshow.swf\" width=\"920\" height=\"550\" flashvars=\"host=picasaweb.google.com&captions=1&hl=en_US&feat=flashalbum&RGB=0x000000&feed=https%3A%2F%2Fpicasaweb.google.com%2Fdata%2Ffeed%2Fapi%2Fuser%2F103496437899094175337%2Falbumid%2F5612331677517335601%3Falt%3Drss%26kind%3Dphoto%26authkey%3DGv1sRgCI3wmbmKg_XPIg%26hl%3Den_US\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" style=\"z-index: -1;\"></embed>";


//$photo_content = "<table style=\"width:194px;\"><tr><td align=\"center\" style=\"height:194px;background:url(https://picasaweb.google.com/s/c/transparent_album_background.gif) no-repeat left\"><a href=\"https://picasaweb.google.com/103496437899094175337/VictorLinPhotographyGallerySample?authuser=0&feat=embedwebsite\"><img src=\"https://lh3.googleusercontent.com/-QyE7GKPsl84/Tl2X7qOk9jE/AAAAAAAAAqg/EJhXfNIohRk/s160-c/VictorLinPhotographyGallerySample.jpg\" width=\"160\" height=\"160\" style=\"margin:1px 0 0 4px;\"></a></td></tr><tr><td style=\"text-align:center;font-family:arial,sans-serif;font-size:11px\"><a href=\"https://picasaweb.google.com/103496437899094175337/VictorLinPhotographyGallerySample?authuser=0&feat=embedwebsite\" style=\"color:#4D4D4D;font-weight:bold;text-decoration:none;\">Victor Lin Photography Gallery Sample</a></td></tr></table>";

$map_content = "<iframe width=\"920\" height=\"550\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\"http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=1+Infinite+Loop,+Cupertino,+CA+95014&amp;aq=0&amp;sll=41.375215,-81.315994&amp;sspn=0.01367,0.014892&amp;vpsrc=0&amp;gl=us&amp;ie=UTF8&amp;hq=&amp;hnear=1+Infinite+Loop,+Cupertino,+California+95014&amp;ll=37.331676,-122.030382&amp;spn=0.037536,0.078878&amp;z=14&amp;iwloc=A&amp;output=embed\"></iframe>";

$video_menu_button = "";
$photos_menu_button = "";

if ($current[3] == "yes" && $current[4] == "yes") {
	$video_menu_button = "<a href=\"" . $url . "?page=video\" class=\"linkContainer\"><span class=\"linkText\">Video</span></a>";
	$photos_menu_button = "<a href=\"" . $url . "?page=photos\" class=\"linkContainer\"><span class=\"linkText\">Photos</span></a>";
	$menu_width_adjuster = "a.linkContainer { width: 180px; margin-left: 5px; }";
	switch ($page) {
		case "photos":
			$main_content = $photo_content;
			break;
		case "map":
			$main_content = $map_content;
			break;
		default:
			$main_content = $video_content;
			break;
	}
} else {
	$menu_width_adjuster = "a.linkContainer { width: 224px; margin-left: 8px; }";
	if ($current[3] == "yes" && $current[4] == "no") {
		$video_menu_button = "<a href=\"" . $url . "?page=video\" class=\"linkContainer\"><span class=\"linkText\">Video</span></a>";
		switch ($page) {
			case "map":
				$main_content = $map_content;
				break;
			default:
				$main_content = $video_content;
				break;
		}
	}
	if ($current[3] == "no" && $current[4] == "yes") {
		$photos_menu_button = "<a href=\"" . $url . "?page=photos\" class=\"linkContainer\"><span class=\"linkText\">Photos</span></a>";
		switch ($page) {
			case "map":
				$main_content = $map_content;
				break;
			default:
				$main_content = $photo_content;
				break;
		}
	}
	if ($current[3] == "no" && $current[4] == "no") {
		$menu_width_adjuster = "a.linkContainer { width: 300px; margin-left: 10px; }";
		switch ($page) {
			case "map":
				$main_content = $map_content;
				break;
			default:
				$main_content = $map_content;
				break;
		}
	}
}
			


// VIDEO / SLIDESHOW CHECKBOX HANDLER
//if ($current[3] == "yes") { $video_yes = "checked"; }else{ $video_no = "checked"; }
//if ($current[4] == "yes") { $slideshow_yes = "checked"; }else{ $slideshow_no = "checked"; }


// PUSH CONTENTS OF FILE INTO ARRAY
reset($current);
$i = 0;
while ($current[$i] == TRUE) {
	$current[$i] = stripslashes($current[$i]);
	// BLANK VARIABLE HANDLING
	if ($current[$i] == "NO_VALUE") { $current[$i] = ""; }
	if (($i == 3) || ($i == 4) && ($current[$i] == "")) { $current[$i] = "off"; }
	// INCREMENT AND LOOP
	$i++;
}

?>



<!DOCTYPE html>

<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<title><? echo($current[6]); ?>, <? echo($current[10]); ?> :: Presented By <? echo($current[23]); ?></title> 
<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/index.css" rel="stylesheet" type="text/css">

<style type="text/css">
	html { background-image: url(images/background/<? echo($current[2]); ?>.jpg); }
	body { color: #<? echo($current[1]); ?>; }
	a.linkContainer { border-bottom-color: #<? echo($current[0]); ?>; }
	.linkText, .boxTitle, .boxTitleLine, #pageDivider { background-color: #<? echo($current[0]); ?>; }
	#header { color: #<? echo($current[0]); ?>; }
</style>

<!--[if lte IE 9]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<![endif]-->

<!-- Start javascript document reference -->
<script type="text/javascript" src="javascript/jquery.fancybox/jquery-1.3.2.min.js"></script> 
<script type="text/javascript" src="javascript/jquery.fancybox/jquery.fancybox-1.2.1.js"></script> 
<link type="text/css" rel="stylesheet" href="javascript/jquery.fancybox/jquery.fancybox.css" /> 
 
<style type="text/css">
	<? echo($menu_width_adjuster); ?>
</style>
 
<script type="text/javascript"> 
$(document).ready(function() { 
	$("a.expand").fancybox({'imageScale': true});
	$("a.jqShare").fancybox({
		'hideOnContentClick': 	false,
		'frameWidth': 			210,
		'frameHeight': 		37		});
	$("a.jqDisclaimer").fancybox({
		'hideOnContentClick': 	false,
		'frameWidth': 			300,
		'frameHeight': 		150		});
	$("a.jqDisclosure").fancybox({
		'hideOnContentClick': 	false,
		'frameWidth': 			450,
		'frameHeight': 		485		});
	$("a.jqRequest").fancybox({
		'hideOnContentClick': 	false,
		'frameWidth': 			800,
		'frameHeight': 		485		});
	})
</script>
<!-- End javascript document reference -->

</head>

<body>

<div class="wrapper">

<div id="header">
	<h2><? echo($current[23]); ?> Presents</h2>
	<h1><? echo($current[6]); ?></h1>
	<h2><? echo($current[10]); ?></h2>
</div>


<div id="dynamicContent">
	<div id="menu">
		<? echo($video_menu_button); ?>
		<? echo($photos_menu_button); ?>
		<a href="<? echo($url); ?>?page=map" class="linkContainer">
			<span class="linkText">Map</span>
		</a>
		<a href="<? echo($schools_link); ?>" class="linkContainer" target="_blank">
			<span class="linkText">Schools</span>
		</a>
		<a href="share.html" class="linkContainer jqShare">
			<span class="linkText">Share</span>
		</a>
		<div class="clear"></div>
	</div>
	<? echo($main_content); ?>
</div>

<div class="clear"></div>


<div id="propertyAbout">
	<div class="boxTitle"><? echo($current[7]); ?></div>
	<div class="boxTitleLine"></div>
	<p><? echo($current[9]); ?></p>
	<p><? echo($current[6]); ?>
		<br><? echo($current[8]); ?>
		<br><? echo($current[10]); ?>, <? echo($current[11]); ?>
		<br><? echo($current[12]); ?>
	</p>
	<a href="disclaimer.html" id="disclaimerLink" class="jqDisclaimer">Disclaimer</a>
</div>

<div id="realtorAbout">
	<div class="boxTitle"><? echo($current[23]); ?></div>
	<div class="boxTitleLine"></div>
	<img src="images/<? echo($current[25]); ?>" style="max-height: 200px; max-width: 120px;">
	<p><? echo($current[27]); ?></p>
	<p><? echo($current[29]); ?></p>
	<p>Phone: <? echo($current[24]); ?></p>
	<p>Email: <a href="mailto:<? echo($current[26]); ?>"><? echo($current[26]); ?></a></p>
	<p>Website: <a href="<? echo($current[30]); ?>" target="_blank"><? echo($current[30]); ?></a></p>
	<p>DRE #: <? echo($current[28]); ?></p>
	<div class="clear"></div>
	<a href="request.html" class="linkContainer button jqRequest">
		<span class="linkText">Request A Showing</span>
	</a>
	<div class="clear"></div>
	<a href="disclosure.html" class="linkContainer button jqDisclosure">
		<span class="linkText">Disclosure</span>
	</a>
</div>

<div class="clear"></div>
<div id="pageDivider"></div>
<div class="clear"></div>

<div id="companyAbout">
	<div class="boxTitle">About <? echo($current[31]); ?></div>
	<div class="boxTitleLine"></div>
	<p><? echo($current[33]); ?>
	<br><? echo($current[35]); ?>
	<br><? echo($current[36]); ?>, <? echo($current[37]); ?>
	<br><? echo($current[38]); ?>
	<br><br>Phone: <? echo($current[33]); ?></p>
<div class="clear"></div>	
</div>

<img id="companyLogo" src="images/<? echo($current[32]); ?>">

<div class="push"></div>

<div class="clear"></div>

</div>

<div class="clear"></div>

<div class="footer">
	<a href="http://victorlinphoto.com/"><img src="images/vlp_white.png" class="vlp"></a>
</div>

<div class="clear"></div>

</body>
</html>

