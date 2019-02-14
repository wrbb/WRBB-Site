<?php
/**
 * Template Name: Schedule Page Template
 *
 * Template for displaying a schedule page.
 *
 * @package understrap
 */
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
		<?php get_header(); ?>
	</head>
	<body>
		<iframe style="width:90%; height:90%; margin:auto;" src="https://spinitron.com/WRBB/calendar"></iframe>
	</body>
	<?php get_footer(); ?>
</html>