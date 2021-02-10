<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

        <div class="thumbnail-image">
		    <a href="<?php echo esc_url( get_permalink() ) ?>">
			    <img src="<?php echo get_the_post_thumbnail_url( $post->ID ); ?>">
		    </a>
        </div>

		<div class="mpa-meta">
			<?php the_title( sprintf( '<h5 class="thumbnail-title"><a href="%s" rel="bookmark">',
				esc_url( get_permalink() ) ), '</a></h5>' );

			if ( 'post' == get_post_type() ) {
				mp_understrap_posted_on( $post->ID );
			} ?>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

</article><!-- #post-## -->
