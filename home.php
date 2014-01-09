<?php
/**
 * The homepage template
 *
 * @package Seal Club
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<ul>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>'; ?>

			<?php endwhile; ?>
			</ul>

			<?php sealclub_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
