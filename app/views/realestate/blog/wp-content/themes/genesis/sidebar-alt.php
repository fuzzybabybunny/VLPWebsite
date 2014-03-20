<div id="sidebar-alt">
		
	<?php
	genesis_before_sidebar_alt_widget_area();
	if (!dynamic_sidebar('Sidebar Alt')) :
		$args = array('before_widget' => '<div class="widget"><div class="widget-wrap">','after_widget'  => "</div></div>\n",'before_title'  => '<h4 class="widgettitle">','after_title'   => "</h4>\n");
		the_widget('WP_Widget_Archives', '', $args);
		the_widget('WP_Widget_Links', '', $args);
		the_widget('WP_Widget_Meta', '', $args);
	endif;
	genesis_after_sidebar_alt_widget_area();
	?>
	
</div>