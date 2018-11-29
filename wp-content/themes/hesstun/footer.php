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

   <div class="icon">

        <svg style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <defs>

        <symbol id="icon-arrow-up2" viewBox="0 0 32 32">
        <title>arrow-up</title>
        <path d="M27.414 12.586l-10-10c-0.781-0.781-2.047-0.781-2.828 0l-10 10c-0.781 0.781-0.781 2.047 0 2.828s2.047 0.781 2.828 0l6.586-6.586v19.172c0 1.105 0.895 2 2 2s2-0.895 2-2v-19.172l6.586 6.586c0.39 0.39 0.902 0.586 1.414 0.586s1.024-0.195 1.414-0.586c0.781-0.781 0.781-2.047 0-2.828z"></path>
        </symbol>    

        </defs>
        </svg>

    </div>

	<footer id="colophon" class="site-footer">
		
            <div class="hamnoya-links">
                <a href="https://www.facebook.com/groups/47703682723/">Du finner oss på Facebook</a>
            </div>

            <hr>

            <nav id="secondary-navigation" class="footer-navigation">
                <p>Lære mer om nærmiljøet vårt, eller om jakt og slekt?</p>
                <button class="menu-toggle" aria-controls="secondary-menu" aria-expanded="false"><?php esc_html_e( 'Footer', 'hesstun' ); ?></button>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-2',
                    'menu_id'        => 'Footer',
                ) );
                ?>
            </nav><!-- #site-navigation -->

            <hr>

            <div class="site-info">

                <p>Hamnøya Grendelag © 2018 | by <a href="http://bjorghelene.no" rel="designer"/>Bjørg Helene Andorsen</a></p>

            </div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
