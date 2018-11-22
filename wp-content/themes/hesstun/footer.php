<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hesstun
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		
		<nav id="secondary-navigation" class="footer-navigation">
			<button class="menu-toggle" aria-controls="secondary-menu" aria-expanded="false"><?php esc_html_e( 'Footer', 'hesstun' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-2',
				'menu_id'        => 'Footer',
			) );
			?>
		</nav><!-- #site-navigation -->
		
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'hesstun' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'hesstun' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'hesstun' ), 'hesstun', '<a href="http://bjorghelene.no/">Bjørg Helene Andorsen</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
