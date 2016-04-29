<?php
/**
 * The main template file
 */

get_header(); ?>

		<?php if ( have_posts() ) : ?>

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();
			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<header class="entry-header">
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php
						/* translators: %s: Name of current post */
						the_content( sprintf(
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wpgulpboilerplate' ),
							get_the_title()
						) );

						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'wpgulpboilerplate' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'wpgulpboilerplate' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) );
					?>
				</div><!-- .entry-content -->

				<footer class="entry-footer">
					<?php wpgulpboilerplate_entry_meta(); ?>
					<?php
						edit_post_link(
							sprintf(
								/* translators: %s: Name of current post */
								__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'wpgulpboilerplate' ),
								get_the_title()
							),
							'<span class="edit-link">',
							'</span>'
						);
					?>
				</footer><!-- .entry-footer -->
			</article><!-- #post-## -->

			<?php
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'wpgulpboilerplate' ),
				'next_text'          => __( 'Next page', 'wpgulpboilerplate' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'wpgulpboilerplate' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :


		endif;
		?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
