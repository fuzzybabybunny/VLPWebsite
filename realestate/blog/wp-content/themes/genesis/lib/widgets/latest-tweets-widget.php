<?php
/**
 * undocumented 
 *
 * @package Genesis
 */

add_action('widgets_init', create_function('', "register_widget('Genesis_Latest_Tweets_Widget');"));
class Genesis_Latest_Tweets_Widget extends WP_Widget {

	function Genesis_Latest_Tweets_Widget() {
		$widget_ops = array( 'classname' => 'latest-tweets', 'description' => 'Display a list of your latest tweets' );
		$control_ops = array( 'width' => 200, 'height' => 250, 'id_base' => 'latest-tweets' );
		$this->WP_Widget( 'latest-tweets', 'Genesis - Latest Tweets', $widget_ops, $control_ops );
	}

	function widget($args, $instance) {
		extract($args);
		
		$scripts = '<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>'."\n".'<script type="text/javascript" src="' . esc_url('http://twitter.com/statuses/user_timeline/'.$instance['twitter_id'].'.json?callback=twitterCallback2&amp;count='.$instance['twitter_num']).'"></script>'."\n";
		
		echo $before_widget;
		
			if ($instance['title']) echo $before_title . apply_filters('widget_title', $instance['title']) . $after_title;
			echo '<ul id="twitter_update_list"></ul>';
			echo $scripts;
		
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		return $new_instance;
	}

	function form($instance) { ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'genesis'); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:95%;" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('twitter_id'); ?>"><?php _e('Twitter Username', 'genesis'); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id('twitter_id'); ?>" name="<?php echo $this->get_field_name('twitter_id'); ?>" value="<?php echo esc_attr( $instance['twitter_id'] ); ?>" style="width: 95%;" />
		</p>
		
		<p>	
			<label for="<?php echo $this->get_field_id('twitter_num'); ?>"><?php _e('Number of Tweets to Show', 'genesis'); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id('twitter_num'); ?>" name="<?php echo $this->get_field_name('twitter_num'); ?>" value="<?php echo esc_attr( $instance['twitter_num'] ); ?>" size="3" />
		</p>
	<?php 
	}
}
?>