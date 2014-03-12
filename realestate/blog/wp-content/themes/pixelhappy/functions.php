<?php
// Start the engine
require_once(TEMPLATEPATH.'/lib/init.php');

// Add wp-cycle slideshow
add_action('genesis_header', 'pixelhappy_include_slideshow');
function pixelhappy_include_slideshow() {
    if( function_exists('wp_cycle') ) wp_cycle();
}

// Add widgeted footer section
add_action('genesis_before_footer', 'pixelhappy_include_footer_widgets'); 
function pixelhappy_include_footer_widgets() {
    require(CHILD_DIR.'/footer-widgeted.php');
}

// Restablish the post info line
remove_action('genesis_before_post_content', 'genesis_post_info');
add_action('genesis_before_post_content', 'pixelhappy_post_info');
function pixelhappy_post_info() {
    if(is_page()) return; // don't do post-info on pages
    echo '<div class="post-info">'."\n\t\t\t\t";
        genesis_post_date('', '');
        genesis_post_author_posts_link(__('By', 'genesis'));
		genesis_post_categories_link(', ', __('Filed Under', 'genesis'));
        edit_post_link(__('(Edit)', 'genesis'), '', ''); // if logged in
    echo "\n\t\t\t\t".'</div>'."\n\n";
}

// Restablish the post meta line
remove_action('genesis_after_post_content', 'genesis_post_meta');
add_action('genesis_after_post_content', 'pixelhappy_post_meta');
function pixelhappy_post_meta() {
	if(is_page()) return; // don't do post-meta on pages
	echo '<div class="post-meta">'."\n\t\t\t\t";
		genesis_post_tags_link(', ', __('Tagged', 'genesis'));
        genesis_post_comments_link(__('Leave a Comment', 'genesis'), __('1 Comment', 'genesis'), __('% Comments', 'genesis'));
	echo "\n\t\t\t\t".'</div>'."\n\n";
}

// Register sidebars
genesis_register_sidebar(array(
	'name'=>'Footer #1',
	'description' => 'This is the first column of the footer section.',
	'before_title'=>'<h4 class="widgettitle">','after_title'=>'</h4>'
));
genesis_register_sidebar(array(
	'name'=>'Footer #2',
	'description' => 'This is the second column of the footer section.',
	'before_title'=>'<h4 class="widgettitle">','after_title'=>'</h4>'
));
genesis_register_sidebar(array(
	'name'=>'Footer #3',
	'description' => 'This is the third column of the footer section.',
	'before_title'=>'<h4 class="widgettitle">','after_title'=>'</h4>'
));
?>