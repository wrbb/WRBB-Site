<?php
/**
 * Single post partial template for podcasts.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <header class="entry-header">

        <?php the_title( '<h1 class="entry-title"><span class="article-title">', '</span></h1>' ); ?>

        <div class="entry-meta">

            <?php podcast_posted_on(); ?>

        </div><!-- .entry-meta -->

    </header><!-- .entry-header -->

    <div class="entry-content">

        <?php echo get_post_meta(get_the_ID(), 'podbean-embed-code', true); ?>

        <h6>Show Notes</h6>

        <?php the_content(); ?>

        <?php
		wp_link_pages(array(
			'before' => '<div class="page-links">' . __('Pages:', 'understrap'),
			'after'  => '</div>',
		));
		?>

    </div><!-- .entry-content -->

	<?php
	$spotify_url = get_post_meta(get_the_ID(), 'podcast-spotify-url', true);
	$apple_url = get_post_meta(get_the_ID(), 'podcast-apple-url', true);
	$google_url = get_post_meta(get_the_ID(), 'podcast-google-url', true);
	$audible_url = get_post_meta(get_the_ID(), 'podcast-audible-url', true);
	?>

    <div class="podcast-links">
        <?php if ($spotify_url) : ?>
            <a class="podcast-link fa-3x" href="<?php echo $spotify_url ?>">
                <i class="fab fa-spotify"></i>
            </a>
        <?php endif ?>

        <?php if ($apple_url) : ?>
            <a class="podcast-link fa-3x" href="<?php echo $apple_url ?>">
                <i class="fab fa-apple"></i>
            </a>
        <?php endif ?>

        <?php if ($google_url) : ?>
            <a class="podcast-link fa-3x" href="<?php echo $google_url ?>">
                <i class="fab fa-google"></i>
            </a>
        <?php endif ?>

        <?php if ($audible_url) : ?>
            <a class="podcast-link fa-3x" href="<?php echo $audible_url ?>">
                <i class="fab fa-audible"></i>
            </a>
        <?php endif ?>
    </div>

</article><!-- #post-## --> 