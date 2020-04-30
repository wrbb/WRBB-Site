<?php
/**
 * Template for a single post entry on a category page
 *
 * @package understrap
 */
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="cat-page-entry">

	    <div class='thumbnail-image' id="cat-page">
		    <a href="<?php echo esc_url( get_permalink() ) ?>">
			    <img src="<?php echo get_the_post_thumbnail_url( $post->ID ); ?>">
		    </a>
	    </div>

	    <div class="article-preview">

		    <?php the_title( sprintf( '<h2><a class="content-title" href="%s" rel="bookmark">',
			    esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		    <?php if ( 'post' == get_post_type() ) : ?>

			    <div class="content-meta">

				    <?php understrap_posted_on(); ?>

			    </div><!-- .content-meta -->

		    <?php endif; ?>

            <div class="content-summary">

	            <?php the_excerpt(); ?>

            </div><!-- .content-summary -->

	    </div><!-- .article-preview -->

	</div><!-- .cat-page-entry -->

</article><!-- #post-## -->
