<?php
/**
 * The template for displaying all interviews.
 *
 * @package understrap
 */

get_header();
$container  = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<hr id="header-line">

		<div class="row" id="interview-content">

			<main class="site-main col-sm-8" id="post-main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'interview' ); ?>

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
						<img src="http://localhost/wordpress/wp-content/themes/WRBB-Site/src/img/twitter.png" alt="Twitter"></a>
					<a href="https://www.facebook.com/WRBBRadio/" target="_blank">
						<img src="http://localhost/wordpress/wp-content/themes/WRBB-Site/src/img/facebook.png" alt="Facebook"></a>
					<a href="https://www.instagram.com/wrbbradio/" target="_blank">
						<img src="http://localhost/wordpress/wp-content/themes/WRBB-Site/src/img/instagram.png" alt="Instagram"></a>
				</div>

				<div class="author-box">
    					<div class="author-img"><?php echo get_avatar(get_the_author_meta('user_email'), '30') ?></div>
    					<p class="author"><a href=<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>>
								<?php esc_html(the_author_meta('display_name')) ?></a></p>
						<?php if (get_the_author_meta('description')) : ?>
    						<p class="author-description"><?php esc_textarea(the_author_meta('description')) ?></p>
						<?php endif; ?>
  				</div>
			
			</div>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
