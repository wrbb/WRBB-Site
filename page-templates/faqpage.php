<?php
/**
 * Template Name: FAQ Page Template
 *
 * Template for displaying FAQ Page
 *
 * @author Nick Harper harper.n@husky.neu.edu
 *
 * @package understrap
 */
get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title"
		content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body style='font-family="sans-serif"'>
<div class="wrapper" id="full-width-page-wrapper">
    <div class="<?php echo esc_attr( $container ); ?>" id="content">
        <hr id="header-line">
        <h2 class="entry-header"><span class="single-title">FAQ.</span></h2>
    </div>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <p>WRBB is a non-commercial, non-profit, free-form station run by students at Northeastern University in
                Boston providing the surrounding areas with a musical diversity not available on any of Boston’s
                commercial stations. In addition to an eclectic mix of shows, all major Northeastern basketball,
                baseball, and hockey games are also broadcasted live. There are lots of things going on with WRBB so
                stay tuned, check back often for updates, and spread the word about the hottest station in the
                Back Bay. </p>
            <strong class="question" id="1">What does "RBB" stand for?</strong>
                <div class="answer" id="1">
                    <p>rbb stands for whatever
                    </p>
                </div>
            <strong class="question" id="2""></br>Other important question?</strong>
                <div class="answer" id="2">
                    <p>important answer
                    </p>
                </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
</body>
</html>
