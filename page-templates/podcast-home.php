<?php
/**
 * Template Name: Podcast Home Template
 *
 * Template for the podcast menu.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod('understrap_container_type');

$shows = array('360-huntington', 'black-in-boston', 'brainwaves', 'hu-nu', 'irc-podcast', 'mind-over-matter', 'nu-impodcast', 'nupolitics')
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr($container); ?>" id="content">

		<hr id="header-line">

		<h2 class="entry-header"><span id="article-title">WRBB Podcasts</span></h2>

		<?php for ($i = 0; $i < count($shows); $i++) :
			$show = $shows[$i];
			$catquery = new WP_Query('category_name=' . $show . '&post_type=podcasts');
			$catquery->the_post();
			$catID = get_the_category(); ?>
			<?php if ($i % 2 == 0) : ?>
				<div class="podcast-info d-flex row">
			<?php else : ?>
				<div class="podcast-info d-flex row flex-md-row-reverse flex-lg-row-reverse">
			<?php endif; ?>
					<div class="col-sm-4">
						<img src="<?php bloginfo('template_url'); ?>/src/img/podcasts/<?php echo $show ?>.jpg" alt="<?php echo $show->slug ?>" class="podcast-logo pulse">
					</div>

					<div class="col-sm-4">
						<?php echo category_description( $catID[0] ); ?>
					</div>

					<div class="col-sm-4">
						<div class="latest-episode">
							<h4><u>Latest Episode</u></h4>
							<p class="podcast-date"><?php echo get_the_date() ?></p>
							<h5><?php echo $post->post_title ?></h5>
							<p class="podcast-notes"><?php echo wp_trim_words($post->post_content, 50) ?></p>
							<a href="<?php echo get_permalink() ?>">
								<img class="play-button" src="<?php bloginfo('template_url') ?>/src/img/play-button.svg">
								<span class="listen-now">LISTEN NOW</span>
							</a>
						</div>
					</div>
				</div>
		<?php endfor ?>

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>