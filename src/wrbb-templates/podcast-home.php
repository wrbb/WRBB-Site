<?php
/**
 * Podcast Menu
 *
 * @author Spencer LaChance
 * @package understrap
 */

get_header();
$container = get_theme_mod('understrap_container_type');

$podcast_id = get_category_by_slug('podcast')->term_id;
$shows = get_categories(
	array( 'parent' => $podcast_id )
);
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr($container); ?>" id="content">

		<hr class="header-line">

		<h1 class="entry-header"><span class="article-title">WRBB Podcasts</span></h1>

		<?php for ($i = 0; $i < count($shows); $i++) :
			$show_slug = $shows[$i]->slug;
			$cat_query = new WP_Query('category_name=' . $show_slug . '&post_type=podcasts');
			$cat_query->the_post();
			$cat_obj = get_the_category();
			$cat_id = $cat_obj[0]->cat_ID;
            $cat_data = get_option( "category_$cat_id" );
        ?>
            <?php if ($i == 0) : ?>
                <div class="podcast-info d-flex row first">
			<?php elseif ($i % 2 == 0) : ?>
				<div class="podcast-info d-flex row">
			<?php else : ?>
				<div class="podcast-info d-flex row flex-md-row-reverse flex-lg-row-reverse">
			<?php endif; ?>
                    <?php if (isset($cat_data['img'])) : ?>
                        <div class="col-sm-4">
                            <img src="<?php echo $cat_data['img'] ?>" alt="<?php echo $show_slug ?>" class="podcast-logo">
                        </div>
					<?php endif; ?>

					<div class="col-sm-4">
						<?php echo category_description( $cat_obj[0] ); ?>
					</div>

					<div class="col-sm-4">
						<div class="latest-episode">
							<h4><u>Latest Episode</u></h4>
							<p class="podcast-date"><?php echo get_the_date() ?></p>
                            <a href="<?php echo get_permalink() ?>">
                                <h5><?php echo $post->post_title ?></h5>
                            </a>
							<p class="podcast-notes">
                                <?php echo wp_trim_words($post->post_content, 50) ?>
                            </p>
						</div>
                        <a class="more-link" href="<?php echo get_category_link($cat_obj[0]); ?>">
                            More episodes.
                        </a>
					</div>
				</div>
		<?php endfor ?>

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>