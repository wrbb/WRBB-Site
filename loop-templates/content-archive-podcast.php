<?php
/**
 * Template for a single podcast entry on a show page
 *
 * @package understrap
 */
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <div class="article-preview">

        <?php the_title( sprintf( '<h4><a class="content-title" href="%s" rel="bookmark">',
            esc_url( get_permalink() ) ), '</a></h4>' ); ?>

        <div class="content-meta">
            <?php podcast_posted_on(); ?>
        </div>

        <div class="content-summary">
            <!-- The entire content of each podcast "post" should just be show notes. -->
            <?php the_content(); ?>
        </div>

    </div><!-- .article-preview -->

</article><!-- #post-## -->
