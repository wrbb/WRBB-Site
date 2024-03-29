<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();

$category = get_queried_object();
$parent = get_category($category->category_parent);
$is_podcast = $parent->slug == "podcast";
?>

<?php $container = get_theme_mod( 'understrap_container_type' );?>

<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

	<hr class="header-line">

		<div class="row">

			<main class="site-main" id="main">

                <header class="entry-header">
                    <?php single_cat_title( '<h1 class="entry-title"><span class="article-title">', '</span></h1>' ); ?>
                </header><!-- .entry-header -->

                <div class="category-info">
                    <?php
                    $cat_id = $category->term_id;
                    $cat_data = get_option( "category_$cat_id" );
                    if ($is_podcast && isset($cat_data['img'])) :
	                    $show_slug = $wp_query->get_queried_object()->slug;
                    ?>
                        <img src="<?php echo $cat_data['img'] ?>" alt="<?php echo $show_slug ?>" class="podcast-logo">
                    <?php endif; ?>

                    <?php echo category_description(); ?>
                </div>

                <?php if ($is_podcast) : ?>

                    <h2 class="episodes-title">Episodes</h2>

                <?php endif; ?>

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will
						 * be used instead.
						 */
                        if ($is_podcast) {
	                        get_template_part( 'loop-templates/content-archive-podcast', get_post_format() );
                        } else {
	                        get_template_part( 'loop-templates/content-archive', get_post_format() );
                        }
						?>

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

	</div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
