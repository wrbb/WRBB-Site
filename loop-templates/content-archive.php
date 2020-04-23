<?php
/**
 * Search results partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="content-header">

		<?php the_title( sprintf( '<h2><a class = "content-title" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
		'</a></h2>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>

			<div class="content-meta">

				<?php understrap_posted_on(); ?>

			</div><!-- .content-meta -->

			<div class = 'thumbnail'>
				<a href="<?php echo esc_url( get_permalink() ) ?>">
					<img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'thumbnail'); ?>">
				</a>
			</div>

		<?php endif; ?>

	</header><!-- .content-header -->

	<div class="content-summary">

		<?php the_excerpt(); ?>

	</div><!-- .content-summary -->

</article><!-- #post-## -->
