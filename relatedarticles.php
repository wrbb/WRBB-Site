<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

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

        <!-- Get post ID of current page (in wordpress, page is a post) -->
        <?php global $post;
            $page_id = $post->ID;
        ?>

        <!-- Get tags of current page -->
        <?php $page_tags = get_the_tags( $page_id ); ?>

            <!-- Queries wordpress backend for all posts of category "main-page-article" -->
            <?php $catquery = new WP_Query( array ('orderby' => 'rand', 'category_name=main-page-article' ) ); ?>

            <!-- Queries wordpress backend for posts that have tags similar to tags of current page -->
            <?php $tag_query = new WP_Query( array( 'orderby' => 'rand', 'tag_slug__in' => $page_tags ) ); ?>

            <?php $postCount = 0; ?>

            <!-- begin by filling Related Articles with posts that have same tags as current page -->
            <?php if ($tag_query->have_posts() ) : ?>
                
                <div class="relate-articles-columns">

                    <?php while ($postCount < 3 && $tag_query->have_posts()) : $tag_query->the_post(); ?>

                        <div class="column">
                            <?php get_template_part( 'loop-templates/content-mainpage', get_post_format() ); ?>
                        </div>

                        <?php $postCount++; ?>

                    <?php endwhile; ?>

                </div>

            <?php endif; ?>

            <!-- If there weren't enough posts with similar tag to current page, fill remaining positions
            of 3 total positions with other 'main-page-article' posts -->
            <?php if ($postCount < 3) : ?>

                <div class="relate-articles-columns">

                    <?php while ($postCount < 3 && $catquery->have_posts()) : $catquery->the_post(); ?>

                        <div class="column">
                            <?php get_template_part( 'loop-templates/content-mainpage', get_post_format() ); ?>
                        </div>

                        <?php $postCount++; ?>

                    <?php endwhile; ?>

                </div>

            <?php endif; ?>
    
    </div><!-- End of container for related articles columns -->

</div> <!-- End of container for entire related articles section -->