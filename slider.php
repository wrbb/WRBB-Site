<!-- Code for slider -->
<?php
global $post;
$post_slug = $post->post_name;
$category_name = "";
?>

<?php if ( $post_slug == "feature-page" ) : ?>
	<?php $category_name = "feature-article" ?>
<?php elseif ( $post_slug == "review-main-page" ) : ?>
	<?php $category_name = "review-article" ?>
<?php elseif ( is_front_page() ) : ?>
	<?php $category_name = "main-page-article" ?>
<?php endif; ?>

<?php $cat_query = new WP_Query( array( 'category_name' => $category_name ) ); ?>

<?php $images_for_page_by_slug = array() ?>

<?php if ( $cat_query->have_posts() ) : ?>

	<?php while ( $cat_query->have_posts() ) : $cat_query->the_post(); ?>

		<?php array_push( $images_for_page_by_slug, get_the_post_thumbnail() ) ?>

	<?php endwhile; ?>

<?php endif; ?>

<?php if ( count( $images_for_page_by_slug ) == 0 ) : ?>
	<?php get_template_part( 'default-post', 'default' ); ?>
<?php elseif ( count( $images_for_page_by_slug ) == 1 ) : ?>

<div class="header-image-fullscreen">
    <?php echo $images_for_page_by_slug[0] ?>
</div>

<?php else : ?>

    <div class="slider-wrapper">
        <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">

            <?php if ( count( $images_for_page_by_slug ) == 2 ) : ?>

                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                </ol>
                <!-- Inner slides w/ captions -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" alt="First slide" src= <?php echo $images_for_page_by_slug[0] ?>>
                        <div class="carousel-caption d-none d-md-block">
                            <p onload="fitCaptionText()">Caption for slide 1</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" alt="Second slide" src= <?php echo $images_for_page_by_slug[1] ?>>
                        <div class="carousel-caption d-none d-md-block">
                            <p onload="fitCaptionText()">Caption for slide 2</p>
                        </div>
                    </div>
                </div>

            <?php elseif ( count( $images_for_page_by_slug ) == 3 ) : ?>

                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>
                <!-- Inner slides w/ captions -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" alt="First slide" src= <?php echo $images_for_page_by_slug[0] ?>>
                        <div class="carousel-caption d-none d-md-block">
                            <p onload="fitCaptionText()">Caption for slide 1</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" alt="Second slide" src= <?php echo $images_for_page_by_slug[1] ?>>
                        <div class="carousel-caption d-none d-md-block">
                            <p onload="fitCaptionText()">Caption for slide 2</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" alt="Third slide" src= <?php echo $images_for_page_by_slug[2] ?>>
                        <div class="carousel-caption d-none d-md-block">
                            <p onload="fitCaptionText()">Caption for slide 3</p>
                        </div>
                    </div>
                </div>

            <?php elseif ( count( $images_for_page_by_slug ) == 4 ) : ?>

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
                        <img class="d-block w-100" alt="First slide" src= <?php echo $images_for_page_by_slug[0] ?>>
                        <div class="carousel-caption d-none d-md-block">
                            <p onload="fitCaptionText()">Caption for slide 1</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" alt="Second slide" src= <?php echo $images_for_page_by_slug[1] ?>>
                        <div class="carousel-caption d-none d-md-block">
                            <p onload="fitCaptionText()">Caption for slide 2</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" alt="Third slide" src= <?php echo $images_for_page_by_slug[2] ?>>
                        <div class="carousel-caption d-none d-md-block">
                            <p onload="fitCaptionText()">Caption for slide 3</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" alt="Forth slide" src= <?php echo $images_for_page_by_slug[3] ?>>
                        <div class="carousel-caption d-none d-md-block">
                            <p onload="fitCaptionText()">...</p>
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
                        <img class="d-block w-100" alt="First slide" src= <?php echo $images_for_page_by_slug[0] ?>>
                        <div class="carousel-caption d-none d-md-block">
                            <p onload="fitCaptionText()">Caption for slide 1</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" alt="Second slide" src= <?php echo $images_for_page_by_slug[1] ?>>
                        <div class="carousel-caption d-none d-md-block">
                            <p onload="fitCaptionText()">Caption for slide 2</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" alt="Third slide" src= <?php echo $images_for_page_by_slug[2] ?>>
                        <div class="carousel-caption d-none d-md-block">
                            <p onload="fitCaptionText()">Caption for slide 3</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" alt="Forth slide" src= <?php echo $images_for_page_by_slug[3] ?>>
                        <div class="carousel-caption d-none d-md-block">
                            <p onload="fitCaptionText()">...</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" alt="Fifth slide" src= <?php echo $images_for_page_by_slug[4] ?>>
                        <div class="carousel-caption d-none d-md-block">
                            <p onload="fitCaptionText()">...</p>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <!-- Left and Right slide controls -->
            <a class="carousel-control-prev" href="#carousel" role="button" onclick="slideLeft()" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" onclick="slideRight()" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div>

<?php endif; ?>
<!-- Code for slider -->