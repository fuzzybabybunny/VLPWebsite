<?php
/**
 * undocumented 
 *
 * @package Genesis
 */

add_action('widgets_init', create_function('', "register_widget('Genesis_eNews_Updates');"));
class Genesis_eNews_Updates extends WP_Widget {

	function Genesis_eNews_Updates() {
		$widget_ops = array( 'classname' => 'enews-widget', 'description' => 'Displays Feedburner email subscribe form' );
		$control_ops = array( 'width' => 200, 'height' => 250, 'id_base' => 'enews' );
		$this->WP_Widget( 'enews', 'Genesis - eNews and Updates', $widget_ops, $control_ops );
	}

	function widget($args, $instance) {
		extract($args);
		
		echo $before_widget.'<div class="enews">';
		
			if (!empty($instance['title']))
				echo $before_title . apply_filters('widget_title', $instance['title']) . $after_title;
			
			echo wpautop( $instance['text'] );
			
			if(!empty($instance['id'])) { ?>
			<form id="subscribe" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo esc_js( $instance['id'] ); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true"><input type="text" value="<?php _e('Enter your email address...', 'genesis'); ?>" id="subbox" onfocus="if (this.value == '<?php _e('Enter your email address...', 'genesis'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Enter your email address...', 'genesis'); ?>';}" name="email"/><input type="hidden" value="<?php echo esc_attr( $instance['id'] ); ?>" name="uri"/><input type="hidden" name="loc" value="en_US"/><input type="submit" value="GO" id="subbutton" /></form>
			<?php }
				
		echo '</div>'.$after_widget;
	}

	function update($new_instance, $old_instance) {
		return $new_instance;
	}

	function form($instance) { ?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'genesis'); ?>:</label><br />
		<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:95%;" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text To Show', 'genesis'); ?>:</label><br />
		<textarea id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" style="width: 95%;" rows="6"><?php echo htmlspecialchars( $instance['text'] ); ?></textarea>
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id('id'); ?>"><?php _e('Google/Feedburner ID', 'genesis'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" value="<?php echo esc_attr( $instance['id'] ); ?>" style="width:95%;" />
		</p>
		
	<?php 
	}
}
?>