<?php
/**
 * Single post partial template for podcasts.
 *
 * @package understrap
 */

$cats = array_column(get_the_category(), 'name');
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <header class="entry-header">

        <h1 class="entry-title"><span id="article-title"><?php echo $cats[0] ?></span></h1>

        <?php the_title('<h4 class="entry-title">', '</h4>'); ?>

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