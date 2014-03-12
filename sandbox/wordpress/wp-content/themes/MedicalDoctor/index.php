<?php get_header(); ?>

<div class="row">
	<div class="span8 floatleft">
	<?php if ( have_posts() ) : ?>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		<?php mt_paging_nav(); ?>

	</div>
	
	<div class="span4 floatright">
		<?php get_sidebar(); ?>
	</div>
</div>


<?php get_footer(); ?>