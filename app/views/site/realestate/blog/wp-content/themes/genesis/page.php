<?php get_header(); ?>

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">
	
	<?php genesis_before_content(); ?>
	<div id="content" class="hfeed">

		<?php genesis_before_loop(); ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); // the loop ?>

			<?php genesis_before_post(); ?>
			<div <?php post_class('post'); ?>>

				<?php genesis_before_post_title(); ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php genesis_after_post_title(); ?>

				<?php genesis_before_post_content(); ?>
				<div class="entry-content">
				<?php
					the_content(__('Read more', 'genesis'));
					wp_link_pages( array( 'before' => '<p class="pages">' . __( 'Pages:', 'genesis' ), 'after' => '</p>' ) );
					edit_post_link(__('(Edit)', 'genesis'), '', '');
				?>
				</div><!-- end .entry-content -->
				<?php genesis_after_post_content(); ?>

			</div><!-- end .postclass -->
			<?php genesis_after_post(); ?>
			
			<?php
				// begin code which disables comments if you select that option on the theme options page	
				if(genesis_get_option('comments_pages'))
				comments_template('', TRUE);
			?>

		<?php endwhile; // end of one post ?>
		<?php genesis_after_endwhile(); ?>
		
		<?php else : // if no posts exist ?>
		<?php genesis_loop_else(); ?>
			
			<p><?php _e('Sorry, no posts matched your criteria.', 'genesis'); ?></p>
			
		<?php endif; // end loop ?>
		<?php genesis_after_loop(); ?>

	</div><!-- end #content -->
	<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?>