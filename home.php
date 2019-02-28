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

		<hr class="header-line">

		<?php $catquery = new WP_Query( 'cat=3' ); ?>

		<?php if ($catquery->have_posts()) : ?>

			<div class="row mp-articles">

				<?php while ($catquery->have_posts()) : $catquery->the_post(); ?>

					<div class="col-sm-3 mpa">

						<?php get_template_part( 'loop-templates/content-mainpage', get_post_format() ); ?>

					</div>

				<?php endwhile; ?>

			</div>

		<?php else : ?>

			<?php get_template_part( 'loop-templates/content-mainpage', 'none' ); ?>

		<?php endif; ?>

		<!-- The pagination component -->
		<?php understrap_pagination(); ?>

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_template_part( 'src/wrbb-templates/playerbar' ); ?>

<?php get_footer(); ?>