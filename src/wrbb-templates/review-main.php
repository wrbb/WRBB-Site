<?php
/**
 * Template for displaying the Reviews main page.
 *
 * @author Duncan Echols-Jones
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

        <hr class="header-line">
        <header class="entry-header">
            <h1 class="entry-title"><span class="article-title">reviews.</span></h1>
        </header>

        <?php $cat_query = new WP_Query(array('category_name' => 'main-page-article+review')); ?>

        <?php if ($cat_query->have_posts()) : ?>

            <div class="row frmp-articles">

	            <?php for ($i = 0; $i < 8 && $cat_query->have_posts(); $i++) : $cat_query->the_post(); ?>

                    <div class="col-sm-3 mpa">

                        <?php get_template_part('loop-templates/content-mainpage', get_post_format()); ?>

                    </div>

                <?php endfor; ?>

            </div>

        <?php else : ?>

            <?php get_template_part('loop-templates/content-mainpage', 'none'); ?>

        <?php endif; ?>

    </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>