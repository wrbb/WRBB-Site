<?php
/**
 * Single post partial template for podcasts.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <header class="entry-header">

        <?php the_title( '<h1 class="entry-title"><span id="article-title">', '</span></h1>' ); ?>

        <div class="entry-meta">

            <?php podcast_posted_on(); ?>

        </div><!-- .entry-meta -->

    </header><!-- .entry-header -->

    <div class="entry-content">

        <iframe width="100%" height="166" scrolling="no" frameborder="no" allow="autoplay" src=<?php echo esc_url(get_post_meta(get_the_ID(), 'podcast-url', true)) ?>></iframe>

        <h6>Show Notes</h6>

        <?php the_content(); ?>

        <?php
		wp_link_pages(array(
			'before' => '<div class="page-links">' . __('Pages:', 'understrap'),
			'after'  => '</div>',
		));
		?>

    </div><!-- .entry-content -->

</article><!-- #post-## --> 