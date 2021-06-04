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

                            <br>

							<div class="social-media" style="text-align: center;">
                                <a href="https://www.facebook.com/WRBBRadio/"><i class="fab fa-facebook fa-lg"></i></a>
                                <a href="https://www.instagram.com/wrbbradio/"><i class="fab fa-instagram fa-lg"></i></a>
                                <a href="https://twitter.com/wrbbradio"><i class="fab fa-twitter fa-lg"></i></a>
                                <a href="https://open.spotify.com/user/pfe0l6pbdx8667wos0gwqtwx9?si=JsuhCoLER_mAmO2S_ppfMQ"><i class="fab fa-spotify fa-lg"></i></a>
							</div>

                            <br>

							<div class="row logo-articles">
                                <?php
                                $album_review_link = get_category_link(get_category_by_slug("album-review"));
                                $show_review_link = get_category_link(get_category_by_slug("show-review"));
                                $editorial_link = get_category_link(get_category_by_slug("editorial"));
                                $interview_link = get_category_link(get_category_by_slug("interview"));
                                ?>
                                <div class="col-lg-5 cat-links">
                                    <a href="<?php echo esc_url($album_review_link) ?>" class="cat-link">
                                        album reviews.
                                    </a>
                                    <a href="<?php echo esc_url($show_review_link) ?>" class="cat-link">
                                        show reviews.
                                    </a>
                                </div>
                                <div class="col-lg-2"
                                    <a href="http://wrbbradio.org/">
                                        <img src="<?php bloginfo('template_url'); ?>/img/logo.png" class="logo" alt="WRBB Logo">
                                    </a>
                                </div>
                                <div class="col-lg-5 cat-links">
                                    <a href="<?php echo esc_url($editorial_link) ?>" class="cat-link">
                                        editorials.
                                    </a>
                                    <a href="<?php echo esc_url($interview_link) ?>" class="cat-link">
                                        interviews.
                                    </a>
                                </div>
							</div>

                            <br>
					
                            <?php printf(
                            /* translators:*/
                            esc_html__( 'Proudly powered by %s', 'understrap' ),'<a href="'.esc_url( __( 'http://wordpress.org/','understrap' )).'">WordPress</a>' ); ?>

                            <?php printf( // WPCS: XSS ok.
                            /* translators:*/
                                esc_html__( 'and %s.', 'understrap' ), '<a href="'.esc_url( __('http://understrap.com', 'understrap')).'">UnderStrap</a>' ); ?>


						</div><!-- .site-info -->

					</footer><!-- #colophon -->

				</div><!--col end -->

			</div><!-- row end -->

		</div><!-- container end -->

	</div><!-- wrapper end -->

    <?php get_template_part( 'src/wrbb-templates/playerbar' ); ?>

	</div><!-- #page we need this extra closing tag here -->

	<?php wp_footer(); ?>

</html>