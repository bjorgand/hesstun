<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Hesstun
 */


/**
 * Set up the WordPress core custom header feature.
 *
 * @uses hesstun_header_style()
 */
function hesstun_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'hesstun_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'ffffff',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'hesstun_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'hesstun_custom_header_setup' );

if ( ! function_exists( 'hesstun_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see hesstun_custom_header_setup().
	 */
	function hesstun_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
		// If the user has set a custom color for the text use that.
		else :
			?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
			
			
		<?php 
		// Are we on the front page?
        // If so, then we apply the layout for the front page custom header
		if (is_front_page() ) : 
			?> 
			
			.site-header {
				text-align: center;
				background-color: transparent;
			}
            
            .site-branding {
                display: inline-block;
                width: 30%;
            }

            .custom-logo-link img {
                display: inline-block;
            }
            
			.custom-logo-link, .main-navigation ul {
                text-align: center;
				justify-content: center;
			}

			.custom-logo-link {
				vertical-align: middle;
			}
			
			img.custom-logo {
				height: 120px;
			}
			
			<?php endif; ?>	
			
		</style>
		<?php
	}
endif;
