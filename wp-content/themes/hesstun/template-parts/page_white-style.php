<?php /* Template Name: Hvit stil */ ?>

<?php
get_header();
?>

	<div id="primary" class="content-area white-style">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>
             
		</main><!-- #main --> 
	</div><!-- #primary -->
<?php
// Not planning on using the sidebar, but will see…
// get_sidebar();
get_footer();
