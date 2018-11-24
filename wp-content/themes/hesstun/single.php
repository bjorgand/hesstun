<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Hesstun
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
            
            hesstun_post_navigation();
            
		endwhile; // End of the loop.
		?>
            
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

// Not planning on using the sidebar menu at all, but will see…
//get_sidebar();
get_footer();
