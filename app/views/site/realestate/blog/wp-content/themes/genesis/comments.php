<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="alert"><?php _e('This post is password protected. Enter the password to view comments.', 'genesis'); ?></p>
	<?php
		return;
	}
?>
<?php genesis_before_comments(); ?>
<div id="comments">	
<?php if ( have_comments() ) : ?>
	<h3><?php _e('Comments', 'genesis'); ?></h3>

	<ol class="comment-list">
		<?php genesis_list_comments(); ?>
	</ol>
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
<?php else : // this is displayed if there are no comments so far ?>
	<?php if ('open' == $post->comment_status) : ?>
	<!-- If comments are open, but there are no comments. -->
	<?php echo apply_filters('genesis_no_comments_text', ''); ?>

	<?php else : // comments are closed ?>
	<!-- If comments are closed. -->
	<?php echo apply_filters('genesis_comments_closed_text', ''); ?>

	<?php endif; // endif comments are open, but there are no comments ?>
<?php endif; // endif have comments ?>
</div><!--end #comments-->
<?php genesis_after_comments(); ?>

<?php genesis_before_pings(); ?>
<?php if(!empty($comments_by_type['pings'])) : // if have pings ?>
<div id="pings">
	<h3><?php _e('Trackbacks/Pingbacks', 'genesis'); ?></h3>

	<ol class="ping-list">
		<?php genesis_list_pings(); ?>
	</ol>
</div><!-- end #pings -->

<?php else : // this is displayed if there are no pings ?>

	<?php echo apply_filters('genesis_no_pings_text', ''); ?>

<?php endif; // endif have pings ?>
<?php genesis_after_pings(); ?>

<?php genesis_before_respond(); ?>
<div id="respond">
<?php if ('open' == $post->comment_status) : ?>

<h3><?php comment_form_title( __('Speak Your Mind', 'genesis'), 'Reply to %s' ); ?></h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php _e('You must be', 'genesis'); ?> <a href="<?php bloginfo('wpurl') ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e('logged in', 'genesis'); ?></a> <?php _e('to post a comment', 'genesis'); ?>.</p>
<?php else : ?>

<?php genesis_before_comments_form(); ?>
<?php genesis_comments_form(); ?>
<?php genesis_after_comments_form(); ?>

<?php endif; // endif registration required and not logged in ?>
<?php endif; // endif comments open ?>
</div><!--end  #respond-->
<?php genesis_after_respond(); ?>