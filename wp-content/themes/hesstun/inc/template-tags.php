<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Hesstun
 */

if ( ! function_exists( 'hesstun_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function hesstun_posted_on() {
		        
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Publisert %s', 'post date', 'hesstun' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);
        
        $byline = sprintf(
            /* translators: %s: post author. */
            esc_html_x( 'Skrevet av %s', 'post author', 'hesstun' ),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
        );

        echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.        
        

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

        edit_post_link(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Edit <span class="screen-reader-text">%s</span>', 'hesstun' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ),
            ' <span class="edit-link">',
            '</span>'
        );
	}

endif;

if ( ! function_exists( 'hesstun_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function hesstun_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
           
            // TO DO: Thinking of adding the plugin  easy category icons to add symbols next to them 
            
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'hesstun' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( '%1$s', 'hesstun' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			//$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'hesstun' ) );
			//if ( $tags_list ) {
				/* translators: 1: list of tags. */
			//	printf( '<span class="tags-links">' . esc_html__( '%1$s', 'hesstun' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			//}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Legg igjen en kommentar<span class="screen-reader-text"> on %s</span>', 'hesstun' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}
	}

endif;

if ( ! function_exists( 'hesstun_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function hesstun_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;

/**
 * Post navigation (previous / next post) for single posts.
 */
function hesstun_post_navigation() {

    the_post_navigation( array(
		'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Neste', 'hesstun' ) . '</span> ' .
			'<span class="screen-reader-text">' . __( 'Neste innlegg:', 'hesstun' ) . '</span> ' .
			'<span class="post-title">%title</span>',
		'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Forrige', 'hesstun' ) . '</span> ' .
			'<span class="screen-reader-text">' . __( 'Forrige innlegg:', 'hesstun' ) . '</span> ' .
			'<span class="post-title">%title</span>',
	) );
}

/**
 * Post navigation (previous / next post) for single posts, where the navigation is split up on
 * on each side of the actual post content … Please work.
 */

/** function hesstun_post_navigation_left() {
    
    previous_post_link('Previous post: %link', '[ %title ]');
    
}

function hesstun_post_navigation_right() {
    
    
    next_post_link('Next post: %link', '[ %title ]');
    
}
*/

