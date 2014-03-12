<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="victor lin, real estate photographer california, real estate photographer Fremont, real estate photographer San Francisco, real estate photographer San Jose, real estate photographer Mountain View, real estate photographer Palo Alto, real estate photographer Cupertino, real estate photographer Los Altos, real estate photographer Sunnyvale, real estate photographer Milpitas, real estate photographer Santa Clara, real estate photographer Saratoga, real estate photographer Menlo Park, real estate photographer San Carlos, real estate photographer Redwood City, real estate photographer San Mateo, real estate photographer Campbell, real estate photographer Union City, real estate photographer Hayward, real estate photographer Los Gatos." />
<meta name="description" content="Photography in California from Victor Lin Photography covers photography in Fremont, San Francisco, San Jose, Mountain View, Palo Alto, Cupertino, Los Altos, Sunnyvale, Milpitas, Santa Clara, Saratoga, Menlo Park, San Carlos, Redwood City, San Mateo, Campbell, Union City, Hayward, and Los Gatos." />
<title>Victor Lin Photography Order Inquiry Page</title>
<script type="text/javascript" src="js/jquery-1.5.1.js"></script>
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript">jQuery.noConflict();</script>
<script src="js/jquery.inputmask.js" type="text/javascript"></script>

<!--Script to Toggle Descriptions-->
<script>
$(document).ready(function(){
  $("button").click(function(){
    $("p").slideToggle();
  });
});
</script>
</head>

<body id="header_big">

<!--Defines the "Read More" description toggles under each item. ex. $photosLeft is the "Read More" toggle for the Unlimited Photography item on the left. $photos is the "Read More" toggle for the Unlimited Photography item on the right.-->
  <?php
	
	$photos = '<script type="text/javascript">
			$(function() {
$("#toggle10").click(function() {
					$(".toggle10").slideToggle("fast");
					return false;
				});
			});
		</script>

<a href="#" id="toggle10"><b>More Info</b></a>
<br />
<br />
		<div class="toggle10" style="display:none;">
		Includes unlimited daytime HDR photos and a single trip out to the property. A zip file with the bare JPG files will be emailed to you. No website or virtual tour / panoramas.
		<br />
		<a href="/realestate/images.php" target = "_blank"><img src="/images/order_form/photo_stack.png" /></a></div><br/>';
		
		$spw = '<script type="text/javascript">
			$(function() {
$("#toggle20").click(function() {
					$(".toggle20").slideToggle("fast");
					return false;
				});
			});
</script>

<a href="#" id="toggle20"><b>More Info</b></a>
<br />
<br />
<div class="toggle20" style="display:none;">
A web page where the property can be showcased along with all of its media.
<br /><br />
<a href="/realestate/virtualtours.php" target = "_blank"><img src="/images/order_form/virtual_tour_stack.png" /></a></div>
<br/>';

$panos = '<script type="text/javascript">
			$(function() {
$("#toggle100").click(function() {
					$(".toggle100").slideToggle("fast");
					return false;
				});
			});
</script>

<a href="#" id="toggle100"><b>More Info</b></a>
<br />
<br />
<div class="toggle100" style="display:none;">
<b>A Single Property Website is required with this addition.</b> Panoramas are what give the traditional "virtual tour" effect of spinning around in 180 - 360 degrees.
<br />
<br />
<b>When loaded onto a Single Property Website, a panorama...</b>
<br />
<br />
<img src="/images/order_form/panorama.jpg" />
<br />
<br />
<b>Becomes...</b>
<br />
<br />
<video controls>
  <source src="/images/order_form/VT_Clip.mp4" type="video/mp4">
Your browser does not support the video tag.
</video></div>
<br/>';
		
?>

<div id="container">
<div id="header"> 

<script type="text/javascript">
    (function( $ ) {
        $(function() {
            $("#agPhone").inputmask("mask", {"mask": ["(999) 999-9999", "(99) 9999-9999"]});
            $("#propZipCode").inputmask("mask", { mask: "99999[-9999]", greedy: false })
        });
    })(jQuery);
</script>
<script type="text/javascript" src="jdf-beta.js"></script>
<link rel="stylesheet" href="jd.prop-form.style.css" />
<link rel="stylesheet" href="jd.loc-prop.style.css" />
</head>
<body id="header_big">
    <div style="width:435px;float:left;">
        <div class="prop-order-form">
            <div class="prop-order-label" style="display:none">
                <h2>Inquiry For: Mountain View, Jang Dummy</h2>
            </div>
            <div class="prop-order-fieldset">
                <ul id="jd-prop-form">
                    <li id="jd-prop-form-0">
                        <label>
                            <strong>Select Property Location *</strong>
                        </label>
                        <div class="jd-input-cont jd-select-cont">
                            <select class="jd-field-1" id="jd-prop-loc-list" name="prop_loc" onchange="validateForm1('a1')"><option value="0">-- Please Select --</option></select>
                        </div>
                    </li>
                    <li>
                        <label>
                            <strong>Agent Name * </strong>
                        </label>
                        <div class="jd-input-cont"><input type="text"  autocomplete="off" value="" name="agName" id="agName" class="jd-field-1 jd-field-person" placeholder="Full Name" /></div>
                    </li>
                    <li>
                        <label>
                            <strong>Your Name * </strong>
                            <div class="jd-field-2"><input type="checkbox" class="jd-tog-enable" onchange="jdfTog(this, '#urName');"> <span>Same as above</span></div>
                        </label>
                        <div class="jd-input-cont"><input type="text"  autocomplete="off" value="" name="urName" id="urName" class="jd-field-1 jd-field-person" placeholder="Full Name" /></div>
                    </li>
                    <li>
                        <label><strong>Agent's Phone * </strong></label>
                        <div class="jd-input-cont"><input type="text"  autocomplete="off" value="" name="agPhone" id="agPhone" class="jd-field-1" placeholder="(___) ___-____" /></div>
                    </li>
                    <li>
                        <label><strong>Agent's Email * </strong></label>
                        <div class="jd-input-cont"><input type="text"  autocomplete="off" value="" name="agEmail" id="agEmail" class="jd-field-1 jd-field-email" placeholder="Agent Email Address" /></div>
                    </li>
                    <li>
                        <label>
                            <strong>Your Email * </strong>
                            <div class="jd-field-2"><input type="checkbox" class="jd-tog-enable" onchange="jdfTog(this, '#urEmail');"> <span>Same as above</span></div>
                        </label>
                        <div class="jd-input-cont"><input type="text"  autocomplete="off" value="" name="urEmail" id="urEmail" class="jd-field-1 jd-field-email" placeholder="Email Address" /></div>
                    </li>

                    <li>
                        <label><strong>Property Location * </strong></label>
                        <div class="jd-input-cont"><input type="text"  autocomplete="off" value="" class="jd-field-1 jd-field-address" placeholder="Address Line #1" /></div>
                        <div class="jd-input-cont"><input type="text"  autocomplete="off" value="" class="jd-field-1 jd-field-address-2" placeholder="Address Line #2 (optional)" /></div>
                    </li>
                    <li>
                        <label><strong>City * </strong></label>
                        <div class="jd-input-cont"><input type="text"  autocomplete="off" value="" class="jd-field-1 jd-field-city" placeholder="City" /></div>
                    </li>
                    <li>
                        <label><strong>State * </strong></label>
                        <div class="jd-input-cont"><input type="text"  autocomplete="off" value="" class="jd-field-1 jd-field-state" placeholder="State" /></div>
                    </li>
                    <li>
                        <label><strong>Zip Code * </strong></label>
                        <div class="jd-input-cont"><input type="text"  autocomplete="off" id="propZipCode" value="" class="jd-field-1" placeholder="Zip Code" /></div>
                    </li>
                    <li>
                        <label><strong>Square footage of all living spaces * </strong> <span class="jd-field-sub-label">(subject to verification)</span></label>
                        <div class="jd-input-cont jd-select-cont">
                            <select class="jd-field-1" onchange="chkFieldOpt(this, '#jd-field-opt-1')">
                                <option value="">-- Please Select --</option>
                                <option value="1">Under 1,500 sqft</option>
                                <option value="2">1,501 - 2,000 sqft</option>
                                <option value="3">2,001 - 3,000 sqft</option>
                                <option value="4">3,001 - 4,000 sqft</option>
                                <option value="-1">If 4,001 sqft or over, please specify:</option>
                            </select>
                        </div>
                        <div class="jd-input-cont jd-field-optional" id="jd-field-opt-1"><input type="text"  autocomplete="off" value="" class="jd-field-1 jd-field-footage" placeholder="Specify square footage. 4001 or above." /></div>
                    </li>
                    <li id="jd-svc-list">
                        <label><strong>What services would you like? * </strong></label>
                        <table cellpadding="0" cellspacing="0" style="width:100%;margin-top:5px;" class="jd-sub-field-list">
                            <tr>
                                <td>
                                    <label><input type="checkbox" class="jd-field-3 jd-srv-item" />
                                        Unlimited HDR Photos - No panoramas
                                        <br/>
                                        <?php echo $photos; ?>
                                        <span class="jd-field-helper">[?]
                                            <span class="jd-field-helper-data"><img src="/images/order_form/photo stack.png" /><br />Includes unlimited daytime HDR photos and a single trip out to the property. A zip file with the bare JPG files will be emailed to you. No custom website address or virtual tour / panoramas.</span>
                                        </span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><input type="checkbox" class="jd-field-3" />
                                        Single Property Website: $25
                                        <br/>
                                        
                                        <?php echo $spw; ?>
                                        <span class="jd-field-helper">[?]
                                            <span class="jd-field-helper-data">A web page where the property can be showcased along with all of its media.</span>
                                        </span>
                                    </label>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label><input type="checkbox" class="jd-field-3" onchange="chkFieldOpt2(this,'#jd-field-opt-2')" />Custom Website Address: $20
                                    <span class="jd-field-helper">[?]
                                            <span class="jd-field-helper-data">Also known as a URL, a custom web address where viewers can go to view the Single Property Website ( example: www.1234MainSt.com )</span>
                                    </span>
                                    </label>
                                    <div class="jd-opt-sub-label">
                                        <label class="jd-field-optional jd-field-opt-2">What would you like your custom website address for your Single Property Website to be? </label>
                                    </div>
                                    <div class="jd-input-cont jd-field-optional" id="jd-field-opt-2">

                                        <input type="text"  autocomplete="off" value="" class="jd-field-1" placeholder="http://your-single-property-website.com/" /></div>
                                </td>
                            </tr>
                             <tr>
                                <td colspan="2">
                                    <label><input type="checkbox" class="jd-field-3" />Panoramas / Virtual Tour Effect: $20
                                    <br />
                                    <?php echo $panos; ?>
                                    <span class="jd-field-helper">[?]
                                            <span class="jd-field-helper-data"><strong>A Single Property Website is required with this addition.</strong> Panoramas are what give the traditional "virtual tour" effect of spinning around in 180 - 360 degrees.</span>
                                    </span>
                                   	</label>
                                </td>
                            </tr>
                             <tr>
                                <td colspan="2">
                                    <label><input type="checkbox" class="jd-field-3" />RUSH Delivery before 6PM: $50
                                    <span class="jd-field-helper">[?]
                                            <span class="jd-field-helper-data">Our normal turnaround times for photos is 8AM the next day. We can rush and deliver them to you before 6PM on the same day of shooting with this service. Single Property Websites and Videos will be delivered at a later time.</span>
                                    </span>
                                   	</label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label><input type="checkbox" class="jd-field-3" />Upload to Agent's TourFactory Account: FREE with Single Property Website orders, $25 for orders without.
                                    <span class="jd-field-helper">[?]
                                            <span class="jd-field-helper-data">Some agents already have TourFactory accounts and prefer to use TourFactory as their Single Property Website platform. We offer uploading to their existing TourFactory accounts for FREE. Agent assumes all responsibility for TourFactory fees.</span>
                                    </span>
                                   	</label>
                                </td>
                            </tr>
                            <tr>

                                <td>
                                    <label><input type="checkbox" class="jd-field-3" />Full Motion Video Tour shot with Video Cameras
                                    <span class="jd-field-helper">[?]
                                            <span class="jd-field-helper-data">We will come with professional video equipment and shoot a 3 - 8 minute video of the property. The video file will be made available for download. Turnaround time is 2 days from the date of shooting.</span>
                                        </span>
                                        </label>
                                </td>
                            </tr>
                            <tr>

                                <td>
                                    <label><input type="checkbox" class="jd-field-3" />
                                      Twilight Photography <span class="jd-field-helper">[?]
                                            <span class="jd-field-helper-data">Exterior photos that are shot right after the sun sets. It shows interior lights glowing through the windows and can include very dramatic skies if the weather is right.</span>
                                        </span>
                                        </label>
                                </td>
                            </tr>
                            <tr>

                                <td>
                                    <label><input type="checkbox" class="jd-field-3" />
                                    Twilight Videography
                                    <span class="jd-field-helper">[?]
                                            <span class="jd-field-helper-data">Exterior videos that are shot right after the sun sets. It shows interior lights glowing through the windows and can include very dramatic skies if the weather is right. </span>
                                        </span>
                                        </label>
                                </td>
                            </tr>
                            <tr>

                                <td>
                                    <label><input type="checkbox" class="jd-field-3" />Weekend Service: $50
                                    <span class="jd-field-helper">[?]
                                            <span class="jd-field-helper-data">Subject to photographer availability.</span>
                                        </span>
                                        </label>
                                </td>
                            </tr>
                            <tr>

                                <td>
                                    <label><input type="checkbox" class="jd-field-3" />Preliminary Exterior Shots
                                    <span class="jd-field-helper">[?]
                                            <span class="jd-field-helper-data">For clients who want quick exterior shots for putting on the market with. Interior shots will be scheduled for a later date.</span>
                                        </span>
                                        </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><input type="checkbox" class="jd-field-3" />Reshoot
                                    <span class="jd-field-helper">[?]
                                            <span class="jd-field-helper-data">Select this if you need us to make an additional, separate trip back to the property.</span>
                                        </span>
                                        </label>
                                </td>
                            </tr>
                        </table>
                    </li>

                </ul>

            </div>
            <div style="float:right">
                <div id="jd-ptotal-box">
                    <h1>$0.00</h1>
                    Estimated Cost
                </div>
            </div>
        </div>
	</div>
<script type="text/javascript">
    var jdSel_tmp1 = $();

    var loc_list = new Array();

    function jdfTog(e,t){var n=$(e);if(n.is(":checked")){$(t).parents("li").prev().find("input.jd-field-1").keyup(function(){$(t).val($(this).val())});$(t).attr("readonly","readonly").val($(t).parents("li").prev().find("input.jd-field-1").val());$(t).parent().addClass("jd-field-readonly").removeClass("jd-field-err")}else{$(t).parent().removeClass("jd-field-readonly");$(t).attr("readonly","").val("").focus()}}function chkFieldOpt(e,t){if($(e).val()!==""){if($(e).val()=="-1"){$("#jd-svc-list").addClass("disabled");$(t).show().find("input[type=text]").focus()}else{$("#jd-svc-list").removeClass("disabled");$(t).hide()}}else{$("#jd-svc-list").addClass("disabled");$(t).hide()}}function chkFieldOpt2(e,t){if($(e).is(":checked")){$(t).show().find("input[type=text]").focus();$(t).prev(".jd-opt-sub-label").css("display","block")}else{$(t).hide();$(t).prev(".jd-opt-sub-label").hide()}}function validateForm1(e){if(e=="a1"){var t=$("select[name=prop_loc]");if(t.val()!==""){t.attr("disabled",true);t.parent(".jd-input-cont").addClass("jd-field-valid").addClass("jd-field-readonly");setTimeout(function(){$("li.disabled:not(#jd-svc-list)").removeClass("disabled")},250)}}}function chkEmail(e){var t=/[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/igm;if(e==""||!t.test(e)){return false}else{return true}}function fixPTBox(){var e=$("#jd-ptotal-box");e.css("right",-e.outerWidth())}function validatePhone(e){var t=/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;if(t.test(e)){var n=e.replace(t,"($1) $2-$3");return true}else{return false}}for(var i=0;i<jdPropObj.length;i++){loc_list[i]=jdPropObj[i].name+":"+i}loc_list=loc_list.sort();for(var i=0;i<loc_list.length;i++){$("#jd-prop-loc-list").append("<option>"+loc_list[i].split(":")[0]+"</option>")}$("ul#jd-prop-form li").not(":eq(0)").each(function(){$(this).addClass("disabled")});$("ul#jd-prop-form li").each(function(){$(this).append($("<div />",{"class":"f2b"}))});$(".loc-prop-item-list li").click(function(){$(".loc-prop-selected").removeClass("loc-prop-selected");$(this).addClass("loc-prop-selected")});var lastEventCache="";$(".jd-field-email").blur(function(e){if(!chkEmail($.trim($(this).val()))){var t=this;setTimeout(function(){$(t).focus()},10)}}).keyup(function(){if(!chkEmail($(this).val())){$(this).parent(".jd-input-cont").addClass("jd-field-err").removeClass("jd-field-valid")}else{$(this).parent(".jd-input-cont").removeClass("jd-field-err").addClass("jd-field-valid")}});$(".jd-field-footage").blur(function(e){var t=parseInt($(this).val());if(isNaN(t)||t<4001){var t=this;setTimeout(function(){$(t).focus()},10)}}).keyup(function(){var e=parseInt($(this).val());if(isNaN(e)||e<4001){$(this).parent(".jd-input-cont").addClass("jd-field-err").removeClass("jd-field-valid");$("#jd-svc-list").addClass("disabled")}else{$(this).parent(".jd-input-cont").removeClass("jd-field-err").addClass("jd-field-valid");$("#jd-svc-list").removeClass("disabled")}}).focus(function(){var e=$(this).val();if(e===""){$(this).val(4001)}});$(".jd-field-person, .jd-field-state, .jd-field-city, .jd-field-address").blur(function(e){var t=$.trim($(this).val());if(t.length<4){var t=this;setTimeout(function(){$(t).focus()},10)}}).keyup(function(){var e=$.trim($(this).val());if(e.length<4){$(this).parent(".jd-input-cont").addClass("jd-field-err").removeClass("jd-field-valid")}else{$(this).parent(".jd-input-cont").removeClass("jd-field-err").addClass("jd-field-valid")}});$(".jd-tog-enable").trigger("click");var ptBox_cache=$("#jd-svc-list").offset().top;$("#jd-ptotal-box").css("top",ptBox_cache+"px");$(window).scroll(function(){var e=$(window);var t=$("#jd-ptotal-box");if(e.scrollTop()>ptBox_cache){if(!t.hasClass("jd-isfixed")){t.addClass("jd-isfixed")}}else{if(t.hasClass("jd-isfixed")){t.removeClass("jd-isfixed")}}});$(".jd-srv-item").change(function(){$("#jd-ptotal-box").css("width","auto")});console.log(validatePhone("(650) 248-0289"))
</script>
</body>
</html>