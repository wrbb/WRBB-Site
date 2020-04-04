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
$cats = get_the_category();

// Get tags of current page and save them in array
$page_tags = get_the_tags($id = $page_id);

// Create an array of all category ID's for this post
$cat_ids = array();
if ($cats) {
    foreach ($cats as $cat) {
        array_push($cat_ids, $cat->term_id);
    }
}

// Create an array of all tag slugs for this post
$page_tags_slugs = array();
if ($page_tags) {
    foreach ($page_tags as $tag) {
        array_push($page_tags_slugs, $tag->slug);
    }
}

// Array of categories that we never want posts that have them to be displayed. Add to array with ',' and the category
$categories_to_ignore = array("main-page-article");

//Queries wordpress backend for posts that have tags related to tag slugs of current page
$tag_query = new WP_Query(array('orderby' => 'rand', 'tag_slug__in' => $page_tags_slugs));

//Queries wordpress backend for all posts of categories related to this article's categories by id
$cat_query = new WP_Query(array('orderby' => 'rand', 'category__in' => $cat_ids));

// Create an array from which we will eventually select and render posts called '$posts_to_render'
$posts_to_render = array();
// Create an array that holds posts that have both a matching tag and category
$posts_with_matching_categories = array();

while ($tag_query->have_posts()) : $tag_query->the_post();

    $post_passes_tests = true;

    // Don't add the current page being displayed as a related article to render
    if (get_the_ID() === $page_id) {
        $post_passes_tests = false;
        continue;
    }

    // Don't add any tag post with a category in $categories_to_ignore
    $tag_post_categories = wp_get_post_categories($post_id = get_the_ID());
    foreach ($tag_post_categories as $tag_post_category) {
        if (in_array(get_the_category_by_ID($tag_post_category), $categories_to_ignore)) {
            $post_passes_tests = false;
            break;
        }
    }

    if ($post_passes_tests) {
        // Add this post to $posts_to_render, and if this post has a matching category as well, add
        // to $posts_with_matching_categories to use later
        foreach ($tag_post_categories as $tag_post_category) {
            if (in_array($tag_post_category, $cat_ids)) {
                array_push($posts_with_matching_categories, get_the_ID());
                break;
            }
        }
        array_push($posts_to_render, get_the_ID());
    }
endwhile;

if (sizeof($posts_to_render) < 3) {
    while ($cat_query->have_posts()) : $cat_query->the_post();

        $post_passes_tests = true;

        // Don't add the current page being displayed in related articles
        if (get_the_ID() === $page_id) {
            $post_passes_tests = false;
            continue;
        }

        // Don't add a post that has a category in a pre-selected list of categories we don't want to be displayed
        $cat_post_categories = wp_get_post_categories($post_id = get_the_ID());
        foreach ($cat_post_categories as $cat_post_category) {
            if (in_array(get_the_category_by_ID($cat_post_category), $categories_to_ignore)) {
                $post_passes_tests = false;
                break;
            }
        }

        if ($post_passes_tests) {
            array_push($posts_to_render, get_the_ID());
        }
    endwhile;
}
// Remove any duplicate values from array that may have been added as a result of being both a category and tag match
$posts_to_render = array_unique($posts_to_render);

// The post priority is 1. Post has matching tags and categories, 2. just matching tags, 3. post has matching
// categories. Use array_diff and concatenation to move posts with matching categories and tags to the front
$posts_to_render = array_diff($posts_to_render, $posts_with_matching_categories);
$posts_to_render = $posts_with_matching_categories + $posts_to_render;

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

        <div class="row mp-articles">

            <!-- begin by filling Related Articles with posts that have same category as current page -->
            <?php if ($posts_to_render) : ?>

                <?php for ($i = 0; $i < 3; $i++) { ?>

                    <div class="col-sm-4 mpa">
                        <div class="related-article">
                            <?php get_template_part('loop-templates/content-mainpage',
                                get_post_format($post = $posts_to_render[$i])); ?>
                        </div>
                    </div>

                <?php } ?>

            <?php endif; ?>

        </div><!-- End of container for related articles columns -->

    </div> <!-- End of container for entire related articles section -->