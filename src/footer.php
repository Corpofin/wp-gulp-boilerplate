<?php
/**
 * The template for displaying the footer
 */
?>

		</main><!-- .site-content -->

		<footer class="site-footer" role="contentinfo">

			<div class="site-info">
				<span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'wpgulpboilerplate' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'wpgulpboilerplate' ), 'WordPress' ); ?></a>
			</div><!-- .site-info -->

		</footer><!-- .site-footer -->


	</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
