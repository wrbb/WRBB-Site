<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod('understrap_container_type');
$template_url = get_bloginfo('template_url');
$js_data = array('url' => $template_url);
wp_localize_script('jquery', 'php_vars', $js_data);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Playfair+Display"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <?php wp_head(); ?>
    <!-- Inport font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- AJAX-ify all links -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.2/jquery.scrollTo.min.js"></script>
    <!-- History.js -->
    <script src="http://browserstate.github.io/history.js/scripts/bundled/html4+html5/jquery.history.js"></script>

</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">
    <div class="header">
        <div class="container-fluid wrbb-navbar row">
            <div class="col single-dropdown" id="on-air">
                <h3 class="dropdown-title" id="on-air">
                    on-air.
                    <img alt="down arrow" class="down-arrow" id="on-air"
                         src="<?php echo $template_url; ?>/src/img/down-arrow-red.svg"/>
                </h3>
                <div class="dropdown-content" id="on-air">
                    <p><a href="#">on-air schedule.</a> &#8250;</p>
                    <p><a href="#">show archives.</a> &#8250;</p>
                    <p><a href="#">dj report form.</a> &#8250;</p>
                    <p><a href="#">rules and policies.</a> &#8250;</p>
                </div>
            </div>
            <div class="col single-dropdown" id="reviews">
                <h3 class="dropdown-title" id="reviews">
                    reviews.
                    <img alt="down arrow" class="down-arrow" id="reviews"
                         src="<?php echo $template_url; ?>/src/img/down-arrow-red.svg"/>
                </h3>
                <div class="dropdown-content" id="reviews">
                    <p><a href="#">album reviews.</a> &#8250;</p>
                    <p><a href="#">show reviews.</a> &#8250;</p>
                </div>
            </div>
            <div class="col single-dropdown" id="features">
                <h3 class="dropdown-title" id="features">
                    features.
                    <img alt="down arrow" class="down-arrow" id="features"
                         src="<?php echo $template_url; ?>/src/img/down-arrow-red.svg"/>
                </h3>
                <div class="dropdown-content" id="features">
                    <p><a href="#">interviews.</a> &#8250;</p>
                    <p><a href="#">editorials.</a> &#8250;</p>
                </div>
            </div>
            <div class="header-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img alt="white and red logo" src="<?php echo $template_url; ?>/src/img/white-w-red.png"/>
                </a>
            </div>
            <div class="col single-dropdown" id="photos">
                <h3 class="dropdown-title" id="photos">
                    photos.
                </h3>
            </div>
            <div class="col single-dropdown" id="podcasts">
                <h3 class="dropdown-title" id="podcasts">
                    podcasts.
                    <img alt="down arrow" class="down-arrow" id="podcasts"
                         src="<?php echo $template_url; ?>/src/img/down-arrow-red.svg"/>
                </h3>
                <div class="dropdown-content" id="podcasts">
                    <p><a href="#">nu & impodcast.</a> &#8250;</p>
                    <p><a href="#">irc podcast.</a> &#8250;</p>
                    <p><a href="#">black in boston.</a> &#8250;</p>
                    <p><a href="#">brainwaves.</a> &#8250;</p>
                </div>
            </div>
            <div class="col single-dropdown" id="more">
                <h3 class="dropdown-title" id="more">
                    more.
                    <img alt="down arrow" class="down-arrow" id="more"
                         src="<?php echo $template_url; ?>/src/img/down-arrow-red.svg"/>
                </h3>
                <div class="dropdown-content" id="more">
                    <p><a href="#">sports.</a> &#8250;</p>
                    <p><a href="#">get involved.</a> &#8250;</p>
                    <p><a href="#">faqs.</a> &#8250;</p>
                    <p><a href="#">donate.</a> &#8250;</p>
                    <p><a href="#">contact us.</a> &#8250;</p>
                </div>
            </div>
        </div>

        <!-- ******************* The Navbar Area ******************* -->
<!--        <div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">-->
<!---->
<!--            <a class="skip-link screen-reader-text sr-only"-->
<!--               href="#content">--><?php //esc_html_e('Skip to content', 'understrap'); ?><!--</a>-->
<!---->
<!--            <nav class="navbar navbar-expand-md navbar-dark bg-primary">-->
<!---->
<!--                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"-->
<!--                        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">-->
<!--                    <span class="navbar-toggler-icon"></span>-->
<!--                </button>-->
<!---->
                <!-- The WordPress Menu goes here -->
<!--                --><?php //wp_nav_menu(
//                    array(
//                        'theme_location' => 'primary',
//                        'container_class' => 'container-fluid wrbb-navbar',
//                        'menu_class' => 'navbar-nav m-auto',
//                        'fallback_cb' => '',
//                        'menu_id' => 'main-menu',
//                        'depth' => 2,
//                        'walker' => new Understrap_WP_Bootstrap_Navwalker(),
//                    )
//                ); ?>
<!---->
<!--            </nav>--><!-- .site-navigation -->
<!---->
<!--        </div>--><!-- #wrapper-navbar end -->

        <!-- ******************* Slider ******************* -->

        <!--Find slug of current page-->
        <?php
        global $post;
        $post_slug = $post->post_name;
        $slider_slugs = array("main-page", "feature-main-page", "review-main-page");
        ?>

        <!--Display slider with images taken from posts in that category if any of these pages indicated by slug-->
        <?php if (is_front_page() || in_array($post_slug, $slider_slugs)) : ?>
            <?php get_template_part('slider'); ?>
        <?php elseif (has_post_thumbnail()) : ?>
            <!--Static image otherwise-->
            <div class="header-image-fullscreen">
                <?php the_post_thumbnail('full'); ?>
            </div>
        <?php endif; ?>

    </div> <!-- header -->
</div>
