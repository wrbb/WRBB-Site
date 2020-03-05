<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<!-- Get post ID of current page (in wordpress, page is a post) -->
<?php global $post;
$global_post = $post;
$page_id = $post->ID;
?>

<?php
// get category slug in wordpress
if (is_single()) {
    $cats = get_the_category();
    $cat = $cats[0];
} else {
    $cat = get_category(get_query_var('cat'));
}
$cat_slug = $cat->slug;
?>

<!-- Import Roboto font -->
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

<!-- Container for entire related articles section -->
<div class="related-articles-container">

    <h1>related articles.</h1>

    <!-- Underline for related articles -->
    <hr id="related-articles-line">

    <!-- Wrapper for 3 related articles partitioned into columns -->
    <div class="related-articles-columns">

        <!-- Get tags of current page -->
        <?php $page_tags = get_the_tags($id = $page_id); ?>

        <?php $page_tags_slugs = array();
        if ($page_tags) {
            foreach ($page_tags as $tag) {
                array_push($page_tags_slugs, $tag->slug);
            }
        }
        ?>

        <!-- Queries wordpress backend for all posts of category "main-page-article" -->
        <!--        --><?php //$catquery = new WP_Query( array ('orderby' => 'rand', 'category_name' => $category_name ) ); ?>
        <?php $cat_query = new WP_Query(array('orderby' => 'rand', 'category_name' => $cat_slug)); ?>

        <!-- Queries wordpress backend for posts that have tags similar to tags of current page -->
        <?php $tag_query = new WP_Query(array('orderby' => 'rand', 'tag_slug__in' => $page_tags_slugs)); ?>

        <?php $postCount = 0; ?>

        <!-- begin by filling Related Articles with posts that have same category as current page -->
        <?php if ($cat_query->have_posts()) : ?>

            <div class="row mp-articles">

                <?php while ($postCount < 3 && $cat_query->have_posts()) : $cat_query->the_post(); ?>

                    <?php if (get_the_title() !== $global_post->post_title) : ?>

                        <div class="col-sm-4 mpa">
                            <div class="related-article">
                                <?php get_template_part('loop-templates/content-mainpage', get_post_format()); ?>
                            </div>
                        </div>

                        <?php $postCount++; ?>

                    <?php endif; ?>

                <?php endwhile; ?>

        <?php endif; ?>

        <!-- If there weren't enough posts with same category to current page, fill remaining positions
        of 3 total positions with other 'main-page-article' posts of same tag -->
        <?php if ($postCount < 3) : ?>

                <?php while ($postCount < 3 && $tag_query->have_posts()) : $tag_query->the_post(); ?>

                    <?php if (get_the_title() !== $global_post->post_title) : ?>

                        <div class="col-sm-4 mpa">
                            <div class="related-article">
                                <?php get_template_part('loop-templates/content-mainpage', get_post_format()); ?>
                            </div>
                        </div>

                        <?php $postCount++; ?>

                    <?php endif; ?>

                <?php endwhile; ?>

            </div>

        <?php endif; ?>

    </div><!-- End of container for related articles columns -->

</div> <!-- End of container for entire related articles section -->