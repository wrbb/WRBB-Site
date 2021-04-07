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

// Create an array from which we will eventually select and render posts
$posts_to_render = array();

// Get tags of current page and save them in array
$page_tags = get_the_tags($id = $page_id);

// Create an array of all tag slugs for this post
$page_tags_slugs = array();
if ($page_tags) {
	foreach ($page_tags as $tag)
		array_push($page_tags_slugs, $tag->slug);
    //Queries wordpress backend for posts that have tags related to tag slugs of current page
	$tag_query = new WP_Query(array('orderby' => 'rand', 'tag_slug__in' => $page_tags_slugs));

	while ($tag_query->have_posts()) : $tag_query->the_post();
		// Don't add the current post being displayed to related articles
		if (get_the_ID() !== $page_id)
			array_push($posts_to_render, get_the_ID());
	endwhile;
}

// get category slug in wordpress
$cats = get_the_category();

// Array of categories that we never want posts that have them to be displayed. Add to array with ',' and the category
$categories_to_ignore = array("main-page-article", "feature-article", "review-article");

// Create an array of all category ID's for this post
$cat_ids = array();
if ($cats && sizeof($posts_to_render) < 3) {
    foreach ($cats as $cat) {
        if (!in_array($cat->slug, $categories_to_ignore))
            array_push($cat_ids, $cat->term_id);
    }
    //Queries wordpress backend for all posts of categories related to this article's categories by id
	$cat_query = new WP_Query(array('orderby' => 'rand', 'category__in' => $cat_ids));

	while ($cat_query->have_posts()) : $cat_query->the_post();
        // Don't add the current post being displayed to related articles
        if (get_the_ID() !== $page_id)
	        array_push($posts_to_render, get_the_ID());
    endwhile;
}

// Remove any duplicate values from array that may have been added as a result of being both a category and tag match
$posts_to_render = array_values(array_unique($posts_to_render));
?>

<?php if (sizeof($posts_to_render) >= 3) : ?>

    <!-- Container for entire related articles section -->
    <div class="related-articles-container">

        <h2>related articles.</h2>

        <!-- Underline for related articles -->
        <hr class="header-line" id="ra-line">

        <!-- Wrapper for 3 related articles partitioned into columns -->
        <div>

            <div class="row ra-articles">

                <?php for ($i = 0; $i < 3; $i++) { ?>

                    <div class="col-sm-4 related-article">
                        <?php get_template_part('loop-templates/content-mainpage',
                            get_post_format($post = $posts_to_render[$i])); ?>
                    </div>

                <?php } ?>

            </div><!-- .row -->

        </div>

    </div><!-- .related-articles-container -->

<?php endif; ?>