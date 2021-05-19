<?php
/**
 * Template Name: FAQ Page Template
 *
 * Template for displaying FAQ Page
 *
 * @author Nick Harper      harper.n@northeastern.edu
 * @author Spencer LaChance lachance.s@northeastern.edu
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="full-width-page-wrapper">

    <div class="<?php echo esc_attr( $container ); ?>" id="content">

        <hr class="header-line">

        <div class="faq-content content-area" id="primary">

            <main class="site-main" id="main" role="main">

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'loop-templates/content', 'page' ); ?>

                <?php endwhile; // end of the loop. ?>

            </main><!-- #main -->

        </div><!-- #primary -->

    </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
