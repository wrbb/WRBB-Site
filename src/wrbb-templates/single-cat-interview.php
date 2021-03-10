<?php
/**
 * The template for displaying all interviews.
 *
 * @package understrap
 */
get_header();
$container = get_theme_mod('understrap_container_type');
?>

<div class="featured-image-caption">
    <?php $key="featured-image-caption"; echo get_post_meta($post->ID, $key, true); ?>
</div>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<hr class="header-line">

        <header class="entry-header">

            <?php the_title( '<h1 class="entry-title"><span class="article-title">', '</span></h1>' ); ?>

            <div class="entry-meta">

                <?php understrap_posted_on($post->ID); ?>

            </div><!-- .entry-meta -->

        </header><!-- .entry-header -->

		<div class="row" id="interview-content">

			<main class="site-main col-sm-8" id="post-main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'article' ); ?>

					<?php understrap_post_nav(); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

			<div class="col-sm-4 sidebar">

				<div class="spotify">
					</strong><h5><?php $key="Spotify Tagline"; echo get_post_meta($post->ID, $key, true); ?></h5></strong>
					<?php $key="Spotify Embed Code"; echo get_post_meta($post->ID, $key, true); ?>
				</div>

				<div class="socials">
					<a href="https://twitter.com/wrbbradio" target="_blank">
						<img src="<?php bloginfo('template_url'); ?>/src/img/twitter.png" alt="Twitter"></a>
					<a href="https://www.facebook.com/WRBBRadio/" target="_blank">
						<img src="<?php bloginfo('template_url'); ?>/src/img/facebook.png" alt="Facebook"></a>
					<a href="https://www.instagram.com/wrbbradio/" target="_blank">
						<img src="<?php bloginfo('template_url'); ?>/src/img/instagram.png" alt="Instagram"></a>
				</div>

				<?php if(get_the_author_meta('description')): ?>
                    <div class="author-box">
                        <div class="author-img">
                            <?php echo get_avatar(get_the_author_meta('user_email'), '30') ?>
                        </div>

                        <p class="author">
                            <a href=<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>>
                                <?php echo get_the_author_meta('first_name');?>
                                <?php echo get_the_author_meta('last_name'); ?>
                            </a>
                        </p>

                        <p class="author-description">
                            <?php esc_textarea(the_author_meta('description')) ?>
                        </p>
                    </div>
                <?php endif; ?>

			</div>

	    </div><!-- .row -->

	    <?php get_template_part('src/wrbb-templates/related-articles', "related-articles") ?>

    </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>