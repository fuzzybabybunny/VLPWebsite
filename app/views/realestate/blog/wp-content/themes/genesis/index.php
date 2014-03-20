<?php get_header(); ?>

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

	<?php genesis_before_content(); ?>
	<div id="content" class="hfeed">

		<?php genesis_before_loop(); ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); // the loop ?>

			<?php genesis_before_post(); ?>
			<div <?php post_class(); ?>>
                            
				<?php genesis_before_post_title(); ?>
				<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<?php genesis_after_post_title(); ?>

				<?php genesis_before_post_content(); ?>
				<div class="entry-content">
				<?php
					if(sp_get_option('content_archive') == 'full') :
						the_content(__('[Read more...]', 'genesis'));
					else :
					if(genesis_get_option('thumbnail'))
					genesis_image(array('format' => 'html', 'size' => genesis_get_option('image_size'), 'attr' => array('class' => 'alignleft post-image')));
					the_excerpt();
					endif;
				?>
				</div><!-- end .entry-content -->
				<?php genesis_after_post_content(); ?> 

			</div><!-- end .postclass -->
			<?php genesis_after_post(); ?>

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