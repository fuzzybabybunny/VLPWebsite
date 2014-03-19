<!DOCTYPE html>
<!--[if IE 8]>
<html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width"/>
    <title>Victor Lin Photography, LLC.</title>
    <!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
    <link rel="stylesheet" href="css/normalize.css"/>
    <link rel="stylesheet" href="css/foundation.css"/> 
    <!-- If you are using the gem version, you need this only -->
    <link rel="stylesheet" href="css/app.css"/>
    <script src="js/vendor/custom.modernizr.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.transit.js"></script>
    <script src="js/app.js"></script>
</head>
<body class="theme-right">
<div id="top-area">
    <div class="row" style="position:relative">
        <div class="small-12 large-6 columns">
            <ul class="top-info">
                <li class="info-small">
                    Tom Smith
                    &nbsp;&bull;&nbsp;
                    VictorLinPhoto.com
                    &nbsp;&bull;&nbsp;
                    650.248.0289
                    &nbsp;&bull;&nbsp;
                    victor@victorlinphoto.com
                </li>
                <li style="font-family: open_sanslight_italic;font-size:1.8em;clear:left">Victor Lin Photography, LLC</li>

            </ul>

        </div>
        <div id="top-nav" class="small-12 large-6 columns">
            <ul class="nav-inline">
                <li><a href="#">More Info</a></li>
                <li><a href="#">Map</a></li>
                <li><a href="#">Schools</a></li>
                <li><a href="#">Email Tour</a></li>
                <li><a href="#">View All Tours</a></li>
            </ul>
        </div>
    </div>
</div>
<div id="intro" class="full-height">
    <div class="row">
        <div id="jumpstart" class="large-12 columns text-center table-display">
			<div class="loading"><span>Loading Resources. Please Wait.</span> </div>
            <div class="box"><span>Starts Here</span></div>
        </div>
    </div>
</div>
<div id="primary" class="full-height">
    <div id="the-content" class="full-height">
        <div id="workarea" style="max-height:100%;height:100%;overflow:hidden;">
        </div>
        <div id="mm-box">
            <ul class="mm-btns">
                <li class="prev"> </li>
                <li class="play active"> </li>
                <li class="next "> </li>
            </ul>
        </div>
        <div id="ctrl-box">
            <ul class="ctrl-btns">
                <li><span>Living Room (PID:#001)</span><div class="prog"></div></li>
            </ul>
        </div>
    </div>
</div>
<div id="toggle">Trigger!</div>
<script>
    document.write('<script src=' +
        ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
        '.js><\/script>')
</script>
<script src="js/foundation/foundation.js"></script>
<script src="js/foundation/foundation.alerts.js"></script>
<script src="js/foundation/foundation.clearing.js"></script>
<script src="js/foundation/foundation.cookie.js"></script>
<script src="js/foundation/foundation.dropdown.js"></script>
<script src="js/foundation/foundation.forms.js"></script>
<script src="js/foundation/foundation.joyride.js"></script>
<script src="js/foundation/foundation.magellan.js"></script>
<script src="js/foundation/foundation.orbit.js"></script>
<script src="js/foundation/foundation.placeholder.js"></script>
<script src="js/foundation/foundation.reveal.js"></script>
<script src="js/foundation/foundation.section.js"></script>
<script src="js/foundation/foundation.tooltips.js"></script>
<script src="js/foundation/foundation.topbar.js"></script>
<script src="js/foundation/foundation.interchange.js"></script>
<script>
    $(document).foundation();
    $('#toggle').on('click', function(e) {
        $('#area-1')
            .transition({height:'100px',duration:1000})
            .transition({height:'200px',duration:1000,delay:500})
            .transition({
                rotate3d: '1,1,0,180deg'
            })
            .transition({
                delay:500
            });
    });
    var box_deg = 0;
</script>
</body>
</html>