<!-- Code for image slider. Will display a different version of the slider depending on how many posts that page has.  -->
<?php
global $post;
$post_slug = $post->post_name;
$category_name = "";

// Establish the name of the category to do a WP_Query on
if ($post_slug == "feature-main-page")
    $category_name = "main-page-article+feature";
elseif ($post_slug == "review-main-page")
    $category_name = "main-page-article+review";
elseif (is_front_page())
    $category_name = "main-page-article";

$cat_query = new WP_Query(array('category_name' => $category_name));

$images_for_page_by_slug = array();
$captions_for_page_by_slug = array();
$links_for_page_by_slug = array();
$post_count = 0;

// Grab each posts' image thumbnail and title for the slider
if ($cat_query->have_posts()) {
	while ($cat_query->have_posts()) : $cat_query->the_post();
	    array_push($images_for_page_by_slug, get_the_post_thumbnail());
		array_push($captions_for_page_by_slug, get_the_title());
		array_push($links_for_page_by_slug, get_permalink());
		$post_count ++;
	endwhile;
}
?>

<!--If the page has no posts, show a default image-->
<?php if ($post_count == 0) : ?>
    <div class="slider-wrapper">
        <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 singular-image"
                         src="<?php bloginfo('template_url'); ?>/black-w-red.png" alt="Twitter">
                </div>
            </div>
        </div>
    </div>

<?php else : ?>
    <div class="slider-wrapper">
        <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">

            <?php if ($post_count > 1) : ?>
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <?php for ($i = 1; $i < min(5, $post_count); $i++) : ?>
                        <li data-target="#carousel" data-slide-to="<?php echo $i; ?>"></li>
                    <?php endfor; ?>
                </ol>
            <?php endif; ?>

            <!-- Inner slides w/ captions -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                        <div class="d-block w-100 h-100">
                            <a href="<?php echo $links_for_page_by_slug[0]; ?>">
                                <?php echo $images_for_page_by_slug[0]; ?>
                            </a>
                        </div>
                        <div class="carousel-caption">
                            <a href="<?php echo $links_for_page_by_slug[0]; ?>">
                                <h3><?php echo $captions_for_page_by_slug[0] ?></h3>
                            </a>
                        </div>
                </div>
                <?php for ($i = 1; $i < min(5, $post_count); $i++) : ?>
                    <div class="carousel-item">
                        <div class="d-block w-100 h-100">
                            <a href="<?php echo $links_for_page_by_slug[$i]; ?>">
                                <?php echo $images_for_page_by_slug[$i]; ?>
                            </a>
                        </div>
                        <div class="carousel-caption">
                            <a href="<?php echo $links_for_page_by_slug[$i]; ?>">
                                <h3><?php echo $captions_for_page_by_slug[$i] ?></h3>
                            </a>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>

	        <?php if ($post_count > 1) : ?>
                <!-- Left and Right slide controls -->
                <div class="l-r-controls">
                    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            <?php endif; ?>

        </div>
    </div>
<?php endif; ?>
