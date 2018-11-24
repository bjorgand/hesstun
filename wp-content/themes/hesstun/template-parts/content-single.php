<?php
/**
 * Template part for displaying a single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hesstun
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
    <div class="post-content__wrap">
         <div class="post-navigation">    
            <?php $prevPost = get_previous_post(true);
                if($prevPost) {?>
                    <div class="nav-box previous">
                    <?php $prevthumbnail = get_the_post_thumbnail($prevPost->ID, array(180,180) );?>
                    <?php previous_post_link('%link',"$prevthumbnail  <p>%title</p>", TRUE); ?>
                    </div>
            <?php } ?>
         </div><!--#cooler-nav div -->

        <section class="post-content">
            <header class="entry-header">

                <?php hesstun_post_thumbnail(); ?>

                <?php
                if ( is_single() ) :
                    the_title( '<h1 class="entry-title">', '</h1>' );
                else :
                    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                endif;

                if ( 'post' === get_post_type() ) :
                    ?>
                    <div class="entry-meta">
                        <?php
                        hesstun_posted_on();
                        ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php
                the_content( sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'hesstun' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ) );

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hesstun' ),
                    'after'  => '</div>',
                ) );
                ?>
            </div><!-- .entry-content -->
        </section>    

        <div class="post-navigation">
             <?php $nextPost = get_next_post(true);
                if($nextPost) { ?>
                <div class="nav-box next">
                        <?php $nextthumbnail = get_the_post_thumbnail($nextPost->ID, array(180,180) );?>
                    <?php next_post_link('%link',"$nextthumbnail  <p>%title</p>", TRUE); ?>
                </div>
            <?php } ?>
        </div><!--#cooler-nav div -->
    </div>    
        
	<footer class="entry-footer">
		<?php hesstun_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
