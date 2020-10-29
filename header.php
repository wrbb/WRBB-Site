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
    <meta name="apple-mobile-web-app-title"
        content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" type="text/css"
        href="//fonts.googleapis.com/css?family=Playfair+Display"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <?php wp_head(); ?>
    <!-- Inport font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous">
    <!-- AJAX-ify all links -->
    <script
        src="http://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.2/jquery.scrollTo.min.js"
    ></script>
    <!-- History.js -->
    <script
        src="http://browserstate.github.io/history.js/scripts/bundled/html4+html5/jquery.history.js"
    ></script>

</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">
    <div class="header">

        <!-- ******************* The Navbar Area ******************* -->
        <div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite" class="wrbb-navbar">

            <div class="header-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img alt="white and red logo"
                         src="<?php echo $template_url; ?>/src/img/white-w-red.png"/>
                </a>

            </div>

            <div clas="searchform-container">
                <?php get_template_part('searchform'); ?>
            </div>

            <a class="skip-link screen-reader-text sr-only"
               href="#content"><?php esc_html_e('Skip to content', 'understrap'); ?></a>


            <nav class="navbar-expand-md navbar-dark">

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- The WordPress Menu goes here -->
                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_class' => 'navbar-nav wrbb-menu',
                        'fallback_cb' => '',
                        'depth' => 2,
                        'walker' => new Understrap_WP_Bootstrap_Navwalker(),
                    )
                ); ?>

            </nav><!-- .site-navigation -->


        </div><!-- #wrapper-navbar end -->

        <!-- ******************* Slider ******************* -->

        <!--Find slug of current page-->
        <?php
        global $post;
        $post_slug = $post->post_name;
        $slider_slugs = array("main-page", "feature-main-page", "review-main-page");
        ?>

        <!--Display slider with images taken from posts in that category if any of these pages
        indicated by slug-->
        <?php if (is_front_page() || in_array($post_slug, $slider_slugs)) : ?>
            <?php get_template_part('slider'); ?>
        <?php elseif (has_post_thumbnail() && !is_archive()) : ?>
            <!--Static image otherwise-->
            <div class="header-image-fullscreen">
                <?php the_post_thumbnail('full'); ?>
            </div>
        <?php else: ?>
            <script>
                jQuery('.wrbb-navbar').css({'position' : 'static', 'background-color' : 'black'});
            </script>
        <?php endif; ?>


    </div> <!-- header -->
</div>
