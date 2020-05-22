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

<div id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<hr class="header-line" id="mp-line">

		<?php $cat_query = new WP_Query( 'category_name=main-page-article' ); ?>

		<?php if ($cat_query->have_posts()) : ?>

			<div class="row mp-articles">

				<?php for ($i = 0; $i < 8 && $cat_query->have_posts(); $i++) : $cat_query->the_post(); ?>

					<div class="col-sm-3">

						<?php get_template_part( 'loop-templates/content-mainpage', get_post_format() ); ?>

					</div>

				<?php endfor; ?>

			</div>

		<?php endif; ?>

		<!-- The pagination component -->
		<?php understrap_pagination(); ?>

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
