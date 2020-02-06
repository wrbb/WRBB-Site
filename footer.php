<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<html>

	<head>

		<link rel ="stylesheet" href="css/styles.css">
		<script src="https://kit.fontawesome.com/ef315d9147.js" crossorigin="anonymous"></script>
		
	</head>

	<div class="wrapper" id="wrapper-footer">

		<div class="<?php echo esc_attr( $container ); ?>">

			<div class="row">

				<div class="col-md-12">

					<footer class="site-footer" id="colophon">

						<div class="site-info">

							<div class= "form">
								<form action= ""> 
									<label>Let's stay in touch!</label><br>
									<input type= "email" name= "email" value= "Email address">
									<input type= "submit" value="Submit"> <br>
								</form>
							</div>

							<div class="social-media" style="text-align: center;">
								<body>
									<br>
									<a href="https://www.facebook.com/WRBBRadio/"><i class="fab fa-facebook fa-lg"></i></a>
									<a href="https://www.instagram.com/wrbbradio/"><i class="fab fa-instagram fa-lg"></i></a>
									<a href="https://twitter.com/wrbbradio"><i class="fab fa-twitter fa-lg"></i></a>
									<a href="https://open.spotify.com/user/pfe0l6pbdx8667wos0gwqtwx9?si=JsuhCoLER_mAmO2S_ppfMQ"><i class="fab fa-spotify fa-lg"></i></a>
									<br>
									<a href=""></a>
								</body>
							</div>

							<div class = "logo-articles">
								<body>
									<a href="">articles</a>
									<a href="">articles</a>
									<a href="http://wrbbradio.org/"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" class="logo" alt="WRBB Logo"></a>
									<a href="">articles</a>
									<a href="">articles</a>
								</body>
							</div>
					
								<a href="<?php  echo esc_url( __( 'http://wordpress.org/','understrap' ) ); ?>">
								<?php printf( 
								/* translators:*/
								esc_html__( 'Proudly powered by %s', 'understrap' ),'WordPress' ); ?></a>
									<span class="sep"> | </span>
						
								<?php printf( // WPCS: XSS ok.
								/* translators:*/
									esc_html__( 'Theme: %1$s by %2$s.', 'understrap' ), $the_theme->get( 'Name' ),  '<a href="'.esc_url( __('http://understrap.com', 'understrap')).'">understrap.com</a>' ); ?> 
					
								(<?php printf( // WPCS: XSS ok.
								/* translators:*/
									esc_html__( 'Version: %1$s', 'understrap' ), $the_theme->get( 'Version' ) ); ?>)
								

						</div><!-- .site-info -->

					</footer><!-- #colophon -->

				</div><!--col end -->

			</div><!-- row end -->

		</div><!-- container end -->

	</div><!-- wrapper end -->

	</div><!-- #page we need this extra closing tag here -->

	<?php wp_footer(); ?>

</html>