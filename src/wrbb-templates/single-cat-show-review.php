<?php
/**
 * The template for displaying all show reviews.
 *
 * @package understrap
 */
get_header();
$container  = get_theme_mod( 'understrap_container_type' );
?>

<html>

<head>
	<link rel ="stylesheet" href="css/styles.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<hr id="header-line">

		<div class="row" id="show-review-content">

			<main class="site-main col-md-8" id="post-main">

				<?php while ( have_posts() ) : the_post(); // Load post content?>

					<?php get_template_part( 'loop-templates/content', 'show-review' ); ?>

<<<<<<< Updated upstream
					<?php understrap_post_nav(); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>
=======
>>>>>>> Stashed changes
				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

            <div class="col-md-4 sidebar">
                
                <div class="spotify">
                    <div id= "tagline">
                        </strong><h5><?php $key="Spotify Tagline"; echo get_post_meta($post->ID, $key, true); ?></h5></strong>
                    </div>
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

                <div class="author-box">
                        <div class="author-img"><?php echo get_avatar(get_the_author_meta('user_email'), '30') ?></div>
                            
                        <p class="author"><a href=<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>>
                        <?php echo get_the_author_meta('first_name');?>
                        <?php echo get_the_author_meta('last_name'); ?></a></p>

                        <?php if (get_the_author_meta('description')) : ?>
                            <p class="author-description"><?php esc_textarea(the_author_meta('description')) ?></p>
                        <?php endif; ?>
                </div>
<<<<<<< Updated upstream
            </div>
        </div><!-- .row -->
    </div><!-- Container end -->
</div><!-- Wrapper end -->

=======
                
            </div>

		</div><!-- .row -->

		<header class="related"> related articles. </header>
		<hr id= "related-line">

		<div class="post-navigation">
				<?php $args = array(
				'posts_per_page' => 3,
				'orderby' => 'most_recent'
				); $the_query = new WP_Query( $args ); ?>

				<?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div class =nav-content>
						<img src= "<?php echo get_the_post_thumbnail_url($post_id, 'thumbnail'); ?>" class="thumbnails" alt="Post Thumbnails">
						<a href="<?php the_permalink();?>"><h4 class="title"><?php the_title(); ?></h4></a>
						<p class="date"><?php the_date(); ?></p>

						<p class="author"><a href=<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>>
						<?php echo get_the_author_meta('first_name');?>
						<?php echo get_the_author_meta('last_name'); ?>
						</p></a>
					</div>
				<?php endwhile; else: ?> <?php endif; ?>
				<?php wp_reset_postdata(); ?>
		</div>

		<?php while ( have_posts() ) : the_post(); // Load related posts and comments ?>
					
			<?php
			// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>
			

</div><!-- Container end -->

</div><!-- Wrapper end -->
>>>>>>> Stashed changes

</html>

<?php get_footer(); ?>