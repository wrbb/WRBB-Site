<?php
/**
 * The main page template file.
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

        <hr id="header-line">

		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->
			<?php //get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>

					<?php for ( $i = 0; have_posts(); $i++ ) : ?>

                        <div class="row">

                            <?php for ( $j = 0; $j < 4; $j++ ) : the_post(); ?>

                                <div class="col-sm-3">

						            <?php get_template_part( 'loop-templates/content-mainpage', get_post_format() ); ?>

                                </div>

                            <?php endfor; ?>

                        </div>

                    <?php endfor; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content-mainpage', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>


	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_template_part( 'src/wrbb-templates/playerbar' ); ?>

<?php get_footer(); ?>