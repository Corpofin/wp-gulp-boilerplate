<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); ?>

	<section class="error-404 not-found">
		<header class="page-header">
			<h1 class="page-title"><?php _e( 'Woah! That page can&rsquo;t be found.', 'wpgulpboilerplate' ); ?></h1>
		</header><!-- .page-header -->

		<div class="page-content">
			<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'wpgulpboilerplate' ); ?></p>

			<?php get_search_form(); ?>
		</div><!-- .page-content -->
	</section><!-- .error-404 -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
