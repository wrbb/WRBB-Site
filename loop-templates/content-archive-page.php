<?php
/**
 * Template for a single post entry on a category page
 *
 * @package understrap
 */
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="cat-page-entry" id="page">

        <div id="cat-page">
            <a href="<?php echo esc_url( get_permalink() ) ?>">
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php echo get_the_post_thumbnail_url( $post->ID ); ?>">
                <?php else : ?>
                    <img src="<?php bloginfo('template_url'); ?>/img/logo.png">
                <?php endif ?>
            </a>
        </div>

	    <div class="page-preview">

		    <?php the_title( sprintf( '<h2><a class="content-title" href="%s" rel="bookmark">',
			    esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	    </div><!-- .article-preview -->

	</div><!-- .cat-page-entry -->

</article><!-- #post-## -->
