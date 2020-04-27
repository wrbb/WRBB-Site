<!-- Code for image slider. Will display a different version of the slider depending on how many posts that page has.  -->
<?php
global $post;
$post_slug = $post->post_name;
$category_name = "";
?>

<!--Establish the name of the category to do a WP_Query on-->
<?php if ($post_slug == "feature-main-page") : ?>
    <?php $category_name = "feature-main" ?>
<?php elseif ($post_slug == "review-main-page") : ?>
    <?php $category_name = "review-main" ?>
<?php elseif (is_front_page()) : ?>
    <?php $category_name = "main-page-article" ?>
<?php endif; ?>

<?php $cat_query = new WP_Query(array('category_name' => $category_name)); ?>

<?php
$images_for_page_by_slug = array();
$captions_for_page_by_slug = array();
$post_count = 0;
?>

<!--Grab each posts' image thumbnail and title for the slider-->
<?php if ($cat_query->have_posts()) : ?>

    <?php while ($cat_query->have_posts()) : $cat_query->the_post(); ?>

        <?php
        array_push($images_for_page_by_slug, get_the_post_thumbnail());
        array_push($captions_for_page_by_slug, get_the_title());
        $post_count++;
        ?>

    <?php endwhile; ?>

<?php endif; ?>

<!--If the page has no posts-->
<?php if ($post_count == 0) : ?>
    <div class="slider-wrapper">
        <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 singular-image"
                         src="<?php bloginfo('template_url'); ?>/src/img/twitter.png" alt="Twitter">
                </div>
            </div>
        </div>
    </div>

    <!--If the page has 1 post-->
<?php elseif ($post_count == 1) : ?>
    <div class="slider-wrapper">
        <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="d-block w-100">
                        <?php echo $images_for_page_by_slug[0]; ?>
                    </div>
                </div>
                <div class="carousel-caption d-none d-md-block">
                    <p><?php echo $captions_for_page_by_slug[0]; ?></p>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!--If the page has 2 or more posts posts-->
<?php else : ?>
    <div class="slider-wrapper">
        <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">

            <?php if ($post_count == 2) : ?>
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                </ol>
                <!-- Inner slides w/ captions -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-block w-100">
                            <?php echo $images_for_page_by_slug[0]; ?>
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                            <p><?php echo $captions_for_page_by_slug[0] ?></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-block w-100">
                            <?php echo $images_for_page_by_slug[1]; ?>
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                            <p><?php echo $captions_for_page_by_slug[1] ?></p>
                        </div>
                    </div>
                </div>

            <?php elseif ($post_count == 3) : ?>

                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>
                <!-- Inner slides w/ captions -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-block w-100">
                            <?php echo $images_for_page_by_slug[0]; ?>
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                            <p><?php echo $captions_for_page_by_slug[0] ?></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-block w-100">
                            <?php echo $images_for_page_by_slug[1]; ?>
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                            <p><?php echo $captions_for_page_by_slug[1] ?></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-block w-100">
                            <?php echo $images_for_page_by_slug[2]; ?>
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                            <p><?php echo $captions_for_page_by_slug[2] ?></p>
                        </div>
                    </div>
                </div>

            <?php elseif ($post_count == 4) : ?>

                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                    <li data-target="#carousel" data-slide-to="3"></li>
                </ol>
                <!-- Inner slides w/ captions -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-block w-100">
                            <?php echo $images_for_page_by_slug[0]; ?>
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                            <p><?php echo $captions_for_page_by_slug[0] ?></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-block w-100">
                            <?php echo $images_for_page_by_slug[1]; ?>
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                            <p><?php echo $captions_for_page_by_slug[1] ?></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-block w-100">
                            <?php echo $images_for_page_by_slug[2]; ?>
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                            <p><?php echo $captions_for_page_by_slug[2] ?></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-block w-100">
                            <?php echo $images_for_page_by_slug[3]; ?>
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                            <p><?php echo $captions_for_page_by_slug[3] ?></p>
                        </div>
                    </div>
                </div>

            <?php else : ?>

                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                    <li data-target="#carousel" data-slide-to="3"></li>
                    <li data-target="#carousel" data-slide-to="4"></li>
                </ol>
                <!-- Inner slides w/ captions -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-block w-100">
                            <?php echo $images_for_page_by_slug[0]; ?>
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                            <p><?php echo $captions_for_page_by_slug[0] ?></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-block w-100">
                            <?php echo $images_for_page_by_slug[1]; ?>
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                            <p><?php echo $captions_for_page_by_slug[1] ?></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-block w-100">
                            <?php echo $images_for_page_by_slug[2]; ?>
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                            <p><?php echo $captions_for_page_by_slug[2] ?></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-block w-100">
                            <?php echo $images_for_page_by_slug[3]; ?>
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                            <p><?php echo $captions_for_page_by_slug[3] ?></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-block w-100">
                            <?php echo $images_for_page_by_slug[4]; ?>
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                            <p><?php echo $captions_for_page_by_slug[4] ?></p>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <!-- Left and Right slide controls -->
            <div class="l-r-controls">
                <a class="carousel-control-prev" href="#carousel" role="button" onclick="slideLeft()" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" onclick="slideRight()"
                   data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </div>

<?php endif; ?>
<!-- Code for slider -->