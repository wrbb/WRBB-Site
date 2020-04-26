<?php
/**
 * Template Name: Review Main Page Template
 *
 * Template for displaying the Reviews main page.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod('understrap_container_type');

?>

<?php if (is_front_page() && is_home()) : ?>
    <?php get_template_part('global-templates/hero'); ?>
<?php endif; ?>

    <div class="wrapper" id="index-wrapper">

        <div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">

            <div class="header-line-container">

                <hr class="header-line">

                <h1 class="entry-title"><span id="article-title">reviews.</span></h1>

            </div>

            <?php $cat_query = new WP_Query('category_name=review-main'); ?>

            <?php if ($cat_query->have_posts()) : ?>

                <div class="row mp-articles">

                    <?php while ($cat_query->have_posts()) : $cat_query->the_post(); ?>

                        <div class="col-sm-3 mpa">

                            <?php get_template_part('loop-templates/content-mainpage', get_post_format()); ?>

                        </div>

                    <?php endwhile; ?>

                </div>

            <?php else : ?>

                <?php get_template_part('loop-templates/content-mainpage', 'none'); ?>

            <?php endif; ?>

            <!-- The pagination component -->
            <?php understrap_pagination(); ?>

        </div><!-- Container end -->

    </div><!-- Wrapper end -->

<?php get_template_part('src/wrbb-templates/playerbar'); ?>

<?php get_footer(); ?>