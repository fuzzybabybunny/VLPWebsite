<?php 

/*-----------------------------------------------------------------------------------*/
/* Header init
/*-----------------------------------------------------------------------------------*/

function header_script() {
    
	if ( !is_admin() ) {
		 
		wp_enqueue_style( 'madza-style', get_stylesheet_uri()); 	
		wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/css/bootstrap.css');
		wp_enqueue_style('css-animation', get_template_directory_uri().'/css/animate-custom.css');
		
		wp_enqueue_script( 'jquery' , '1.0' , true);
		wp_enqueue_script('flexjs', get_template_directory_uri() . '/functions/plugins/flex-slider/jquery.flexslider-min.js', array('jquery'), '1.0');
		wp_enqueue_script('superfish', get_template_directory_uri() . '/functions/plugins/superfish/superfish.js', array('jquery'));
	    wp_enqueue_script('supersubs', get_template_directory_uri() . '/functions/plugins/superfish/supersubs.js', array('jquery'), '1.0' , true);
	 	wp_enqueue_script('superfishhover', get_template_directory_uri() . '/functions/plugins/superfish/hoverIntent.js', array('jquery'), '1.0' , true);
	 	wp_enqueue_script('isotope', get_template_directory_uri() . '/functions/js/jquery.isotope.min.js', array('jquery'), '1.0', true);
	    wp_enqueue_script('effect_directory', get_template_directory_uri() . '/functions/js/effects.js', array('jquery','superfish','supersubs','superfishhover'));
	    wp_enqueue_script('pretty_photo', get_template_directory_uri() . '/functions/plugins/prettyphoto/js/jquery.prettyPhoto.js', array('jquery','superfish','supersubs','superfishhover'), '1.0' , true);
	    wp_enqueue_script('easing', get_template_directory_uri() . '/functions/js/jquery.easing.1.3.js', array('jquery','superfish','supersubs','superfishhover'), '1.0' , true);
		wp_enqueue_script('modernizerss', get_template_directory_uri() . '/functions/js/modernizr.custom.js', array('jquery'), '1.0', true );
		wp_enqueue_script('elastislide-js', get_template_directory_uri() . '/functions/plugins/elastislide/jquery.elastislide.js', array('jquery'), '1.0');
		wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/functions/js/jquery-hover-effect.js', array('jquery'), '1.0');
		wp_enqueue_script('bootstrap-jsu', get_template_directory_uri() . '/functions/js/bootstrap.min.js', array('jquery'), '1.0');
		wp_enqueue_script('bootstrap-jsr', get_template_directory_uri() . '/functions/js/retina.js', array('jquery'), '1.0');

		
		wp_enqueue_script('cycle', get_template_directory_uri() . '/functions/js/cycle.js', array('jquery'), '1.0');
		
		$mt_options = get_option("themename_theme_options");
			
		if($mt_options['mt_responsive']!='responsive_no') {  
			
			wp_enqueue_style('responsive-css', get_template_directory_uri().'/css/responsive.css');
			wp_enqueue_style('bootstrap-responsive-css', get_template_directory_uri().'/css/bootstrap-responsive.min.css');
		
		}	
		
		$protocol = is_ssl() ? 'https' : 'http';
		
		wp_enqueue_style( 'madzatheme-fonts', "$protocol://fonts.googleapis.com/css?family=". $mt_options['font_name'] );
		wp_enqueue_style('fontawesome', get_template_directory_uri().'/functions/plugins/FortAwesome/css/font-awesome.min.css');
		
	} else { 
	
		$mt_options = get_option("themename_theme_options");
			
		if($mt_options['mt_responsive']!='responsive_no') {  
			
			wp_enqueue_style('responsive-css', get_template_directory_uri().'/css/responsive.css');
		
		}
	
		wp_enqueue_script('customadmin', get_template_directory_uri() . '/functions/js/jquery.customadmin.js', array('jquery'), '1.0'); 
		
		$protocol = is_ssl() ? 'https' : 'http';
		wp_enqueue_style( 'madzatheme-fonts', "$protocol://fonts.googleapis.com/css?family=". $mt_options['font_name'] );
	
	}

} 

add_action('init', 'header_script');

function mason_script() {
    wp_enqueue_script( 'jquery-masonry' );
}
add_action( 'wp_enqueue_scripts', 'mason_script' );

/*-----------------------------------------------------------------------------------*/
/* Header Hook
/*-----------------------------------------------------------------------------------*/

function header_hooks() {
	global $post;

	
	
  
  		echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=yes"/> ';
	
	

    if ( is_singular() ) { wp_enqueue_script( "comment-reply" ); }  
	
	
	$favicon = get_option("themename_theme_options");		 
	 ?>		
		
		
		<link rel="icon" href="<?php echo $favicon['mt_favicon']; ?>" type="image/x-icon" >
		<link rel="shortcut icon" href="<?php echo $favicon['mt_favicon'];  ?>" type="image/x-icon" >

		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" >
		<link rel="profile" href="http://gmpg.org/xfn/11" >
		<script type="text/javascript">
			jQuery(document).ready(function() { 
				jQuery(document).pngFix(); 
			}); 
			
			jQuery(document).ready(function(){ 
			jQuery("ul.sf-menu, div.sf-menu ul").supersubs({ 
			    minWidth:    6,   
			    maxWidth:    27,               
			    extraWidth:  1     
			                       
			}).superfish({ 
				speed:         'fast',
			    delay:     100            // 1.2 second delay on mouseout 
			});                           
			                
			});
		</script>
	
	
	<!--[if lt IE 9]>
	<script type="text/javascript">
	(function(a,b){function k(a,b){var c=a.createElement("p"),d=a.getElementsByTagName("head")[0]||a.documentElement;return c.innerHTML="x<style>"+b+"</style>",d.insertBefore(c.lastChild,d.firstChild)}function l(){var a=r.elements;return typeof a=="string"?a.split(" "):a}function m(a){var b=i[a[g]];return b||(b={},h++,a[g]=h,i[h]=b),b}function n(a,c,f){c||(c=b);if(j)return c.createElement(a);f=f||m(c);var g;return f.cache[a]?g=f.cache[a].cloneNode():e.test(a)?g=(f.cache[a]=f.createElem(a)).cloneNode():g=f.createElem(a),g.canHaveChildren&&!d.test(a)?f.frag.appendChild(g):g}function o(a,c){a||(a=b);if(j)return a.createDocumentFragment();c=c||m(a);var d=c.frag.cloneNode(),e=0,f=l(),g=f.length;for(;e<g;e++)d.createElement(f[e]);return d}function p(a,b){b.cache||(b.cache={},b.createElem=a.createElement,b.createFrag=a.createDocumentFragment,b.frag=b.createFrag()),a.createElement=function(a){return r.shivMethods?n(a):b.createElem(a)},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+l().join().replace(/\w+/g,function(a){return b.createElem(a),b.frag.createElement(a),'c("'+a+'")'})+");return n}")(r,b.frag)}function q(a){a||(a=b);var c=m(a);return r.shivCSS&&!f&&!c.hasCSS&&(c.hasCSS=!!k(a,"article,aside,figcaption,figure,footer,header,hgroup,nav,section{display:block}mark{background:#FF0;color:#000}")),j||p(a,c),a}var c=a.html5||{},d=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,e=/^<|^(?:a|b|button|code|div|fieldset|form|h1|h2|h3|h4|h5|h6|i|iframe|img|input|label|li|link|ol|option|p|param|q|script|select|span|strong|style|table|tbody|td|textarea|tfoot|th|thead|tr|ul)$/i,f,g="_html5shiv",h=0,i={},j;(function(){var a=b.createElement("a");a.innerHTML="<xyz></xyz>",f="hidden"in a,j=a.childNodes.length==1||function(){try{b.createElement("a")}catch(a){return!0}var c=b.createDocumentFragment();return typeof c.cloneNode=="undefined"||typeof c.createDocumentFragment=="undefined"||typeof c.createElement=="undefined"}()})();var r={elements:c.elements||"abbr article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output progress section summary time video",shivCSS:c.shivCSS!==!1,supportsUnknownElements:j,shivMethods:c.shivMethods!==!1,type:"default",shivDocument:q,createElement:n,createDocumentFragment:o};a.html5=r,q(b)})(this,document)
	</script>
	<![endif]--> 
	
	<?php

	get_template_part('style');   
	$css = get_option("themename_theme_options");
	if($css['mt_css']!=""){ 
	
		?><style type="text/css"><?php echo $css['mt_css']; ?></style><?php
		
    }
    
    remove_action('wp_head', 'rsd_link');
	
	remove_action('wp_head', 'wlwmanifest_link');
        
}

add_action('wp_head', 'header_hooks');


/* --------------------------------------------------------------------------------------- Body Class */

function style_typer($classesa) {

	global $post;	
	
		if(get_post_meta($post->ID, "mt_layout_styler_page", true)!="") {
			
			if(get_post_meta($post->ID, "mt_layout_styler_page", true)=="full") {
				$classesa[] = 'layout_style_full';
				return $classesa;
			} else if(get_post_meta($post->ID, "mt_layout_styler_page", true)=="box") {
				$classesa[] = 'layout_style_box';
				return $classesa;
			} else if(get_post_meta($post->ID, "mt_layout_styler_page", true)=="free") {
				$classesa[] = 'layout_style_free';
				return $classesa;
			} else if(get_post_meta($post->ID, "mt_layout_styler_page", true)=="full_free") {
				$classesa[] = 'layout_style_full_free';
				return $classesa;
			} 
			
		} else {
			
			if(get_option("layout_style")=="full") {
				$classesa[] = 'layout_style_full';
				return $classesa;
			} else if(get_option("layout_style")=="box") {
				$classesa[] = 'layout_style_box';
				return $classesa;
			} else if(get_option("layout_style")=="free") {
				$classesa[] = 'layout_style_free';
				return $classesa;
			} else if(get_option("layout_style")=="full_free") {
				$classesa[] = 'layout_style_full_free';
				return $classesa;
			} 
		}
		
}

add_filter('body_class','style_typer');







add_filter('body_class','mt_style_header');

function mt_style_header($mt_style_header) {

	global $post;	
	
	$mt_options = get_option("themename_theme_options");
		
		if($mt_options['mt_header_s']=="style_1") {
			$mt_style_header[] = 'mt_style_header_1';
			return $mt_style_header;
		} else if($mt_options['mt_header_s']=="style_2") {
			$mt_style_header[] = 'mt_style_header_2';
			return $mt_style_header;
		} else if($mt_options['mt_header_s']=="style_3") {
			$mt_style_header[] = 'mt_style_header_3';
			return $mt_style_header;
		} else if($mt_options['mt_header_s']=="style_4") {
			$mt_style_header[] = 'mt_style_header_4';
			return $mt_style_header;
		} 
		
}

add_filter('body_class','mt_style_header');


/*-----------------------------------------------------------------------------------*/
/* Footer Hook
/*-----------------------------------------------------------------------------------*/

function jquery_plugins_footer() {

    if ( !is_admin() ) {  
    
    	?><script type="text/javascript">
    			jQuery(document).ready(function(){jQuery("a[data-rel^='prettyPhoto']").prettyPhoto();});
    	</script><?php
        
        echo ot_get_option('mt_custom_html');
       
    }
}
add_action('wp_footer', 'jquery_plugins_footer');
?>