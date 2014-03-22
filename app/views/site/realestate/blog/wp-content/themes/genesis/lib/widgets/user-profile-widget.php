<?php
/**
 * @todo Document this file
 * @since 0.1.8
 */

add_action('widgets_init', create_function('', "register_widget('Genesis_User_Profile_Widget');"));
class Genesis_User_Profile_Widget extends WP_Widget {

	function Genesis_User_Profile_Widget() {
		$widget_ops = array( 'classname' => 'user-profile', 'description' => 'Displays user profile block with Gravatar' );
		$control_ops = array( 'width' => 200, 'height' => 250, 'id_base' => 'user-profile' );
		$this->WP_Widget( 'user-profile', 'Genesis - User Profile', $widget_ops, $control_ops );
	}

	function widget($args, $instance) {
		extract($args);
		
		echo $before_widget;
		
			if (!empty($instance['title']))
				echo $before_title . apply_filters('widget_title', $instance['title']) . $after_title;
			
			if(!empty($instance['alignment']))
				$text .= '<span class="align'.esc_attr( $instance['alignment'] ).'">';
				
				$text .= get_avatar($instance['user'], $instance['size']);
			
			if(!empty($instance['alignment']))
				$text .= '</span>';
				
			if($instance['author_info'] == 'text')
				$text .= $instance['bio_text']; // This needs to be sanitized ~ Mark Jaquith
			else
				$text .= get_the_author_meta('description', $instance['user']);
				
			$text .= ($instance['page']) ? ' <a class="pagelink" href="'.get_page_link($instance['page']).'">[Read More&hellip;]</a>' : '';
			
			$text .= ($instance['posts_link']) ? '<div class="posts_link"><a href="'.get_author_posts_url($instance['user']).'">'.__('View My Blog Posts', 'genesis').'</a></div>' : '';
			
			echo wpautop($text);
		
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		return $new_instance;
	}

	function form($instance) { ?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e("Title"); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:95%;" /></p>
		
		<p><?php _e('Select a user. The email address for this account will be used to pull the Gravatar image.', 'genesis'); ?></p>
		<p><?php wp_dropdown_users(array('name' => $this->get_field_name('user'), 'selected' => $instance['user'])); ?></p>
		
		<p><label for="<?php echo $this->get_field_id('size'); ?>"><?php _e('Gravatar Size'); ?>:</label>
			<select id="<?php echo $this->get_field_id('size'); ?>" name="<?php echo $this->get_field_name('size'); ?>">
				<option style="padding-right:10px;" value="45" <?php selected(45, $instance['size']); ?>><?php _e('Small (45px)', 'genesis'); ?></option>
				<option style="padding-right:10px;" value="65" <?php selected(65, $instance['size']); ?>><?php _e('Medium (65px)', 'genesis'); ?></option>
				<option style="padding-right:10px;" value="85" <?php selected(85, $instance['size']); ?>><?php _e('Large (85px)', 'genesis'); ?></option>
				<option style="padding-right:10px;" value="125" <?php selected(125, $instance['size']); ?>><?php _e('Extra Large (125px)', 'genesis'); ?></option>
			</select></p>
		
		<p><label for="<?php echo $this->get_field_id('alignment'); ?>"><?php _e('Gravatar Alignment'); ?>:</label>
			<select id="<?php echo $this->get_field_id('alignment'); ?>" name="<?php echo $this->get_field_name('alignment'); ?>">
				<option style="padding-right:10px;" value="">- None -</option>
				<option style="padding-right:10px;" value="left" <?php selected('left', $instance['alignment']); ?>><?php _e('Left', 'genesis'); ?></option>
				<option style="padding-right:10px;" value="right" <?php selected('right', $instance['alignment']); ?>><?php _e('Right', 'genesis'); ?></option>
			</select></p>
		
		<p><?php _e('Select which text you would like to use as the author description', 'genesis'); ?></p>
		<p>
			<input type="radio" name="<?php echo $this->get_field_name('author_info'); ?>" id="<?php echo $this->get_field_id('author_info'); ?>_val1" value="bio" <?php checked('bio', $instance['author_info']); ?>/> <label for="<?php echo $this->get_field_id('author_info'); ?>_val1"><?php _e('Author Bio', 'genesis'); ?></label><br />
			
			<input type="radio" name="<?php echo $this->get_field_name('author_info'); ?>" id="<?php echo $this->get_field_id('author_info'); ?>_val2" value="text" <?php checked('text', $instance['author_info']); ?>/> <label for="<?php echo $this->get_field_id('author_info'); ?>_val2"><?php _e('Custom Text (below)', 'genesis'); ?></label><br />
			<textarea id="<?php echo $this->get_field_id('bio_text'); ?>" name="<?php echo $this->get_field_name('bio_text'); ?>" style="width: 95%;" rows="6"><?php echo htmlspecialchars( $instance['bio_text'] ); ?></textarea>
		</p>
		
		<p><?php _e('Choose your extended "About Me" page from the list below. This will be the page linked to at the end of the about me section.', 'genesis'); ?></p>
		<p><?php wp_dropdown_pages(array('name' => $this->get_field_name('page'), 'show_option_none' => '- None -', 'selected' => $instance['page'])); ?></p>
		
		<p><input id="<?php echo $this->get_field_id('posts_link'); ?>" type="checkbox" name="<?php echo $this->get_field_name('posts_link'); ?>" value="1" <?php checked(1, $instance['posts_link']); ?>/> <label for="<?php echo $this->get_field_id('posts_link'); ?>"><?php _e('Show Author Archive Link?', 'genesis'); ?></label></p>
	<?php 
	}
}
?>