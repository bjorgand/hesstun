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
				<?php
				printf( esc_html__( 'En WordPress side av'), 'Bjørg Helene Andorsen','<a href="http://bjorghelene.no/" rel="designer">Bjørg Helene Andorsen</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
