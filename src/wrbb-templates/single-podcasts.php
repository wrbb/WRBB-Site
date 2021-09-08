<?php
/**
 * The template for displaying all podcasts.
 *
 * @package understrap
 */

get_header();
$container  = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<hr class="header-line">

        <main class="site-main" id="post-main">

            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'loop-templates/content', 'podcast' ); ?>

            <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->

    </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
