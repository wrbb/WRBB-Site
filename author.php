<?php
/**
 * The template for displaying the author pages.
 *
 * Learn more: https://codex.wordpress.org/Author_Templates
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>


<div class="wrapper" id="author-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
<!--			--><?php //get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

                <hr class="header-line">

				<header class="page-header">

					<?php
					$curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug',
						$author_name ) : get_userdata( intval( $author ) );
					?>

                    <h3 class="entry-header">
                        <span class="article-title">
                            <?php esc_html_e( 'Articles by', 'understrap' ); ?>
                            <?php echo esc_html( $curauth->nickname ); ?>

                        </span>
                    </h3>


                    <h4>
                        <div class="row">

                            <div class="col-2 align-self-center px-1">
                                <?php esc_html_e( 'About: ', 'understrap' ); ?>
                                <?php echo esc_html( $curauth->first_name ) . " " . esc_html( $curauth->last_name ); ?>
                            </div>

                            <div class="col-10 float-left">
                                <?php if ( ! empty( $curauth->ID ) ) : ?>
                                    <?php echo get_avatar( $curauth->ID ); ?>
                                <?php endif; ?>

                            </div>
                        </div>
                    </h4>


<!--                    avatar -->
<!--					--><?php //if ( ! empty( $curauth->ID ) ) : ?>
<!--						--><?php //echo get_avatar( $curauth->ID ); ?>
<!--					--><?php //endif; ?>



					<dl>
                        <?php if ( ! empty( $curauth->user_description ) ) : ?>

                            <dt><?php esc_html_e( 'Profile', 'understrap' ); ?></dt>
                            <dd>
                                <?php echo esc_html( $curauth->user_description ); ?>

                            </dd>
                        <?php endif; ?>


						<?php if ( ! empty( $curauth->user_url ) ) : ?>
							<dt></dt>

                            <dd>
                                <a href="<?php echo esc_url( $curauth->user_url ); ?>">
                                    <span><i class="fas fa-link"></i></span>
                                    <?php echo esc_html( $curauth->user_url ); ?>
                                </a>
							</dd>
						<?php endif; ?>


					</dl>


				</header><!-- .page-header -->

				<ul class="list-group list-group-flush">

					<!-- The Loop -->
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>

                            <?php if (strcmp(get_post_status(), "publish") == 0) :?>

                                <li class="list-group-item">

                                    <div class="row">
                                        <div class="col-3 align-self-center">
                                           <?php echo get_the_post_thumbnail() ?>
                                        </div>

                                        <div class="col-8">
                                            <h3>
                                                <a rel="bookmark" href="<?php the_permalink() ?>"
                                                   title="<?php esc_html_e( 'Permanent Link:', 'understrap' ); ?> <?php the_title(); ?>"
                                                    class="article-title">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h3>


                                            <div class="">
                                                <?php understrap_posted_on(); ?>
                                            </div>

                                            <p>
                                                <?php the_excerpt(); ?>
                                            </p>



                                            <?php esc_html_e( 'in',
                                                'understrap' ); ?>
                                            <?php the_category( '&' ); ?>
                                        </div>

                                    </div>
                                </li>
                            <?php endif; ?>
						<?php endwhile; ?>

					<?php else : ?>

						<?php get_template_part( 'loop-templates/content', 'none' ); ?>

					<?php endif; ?>

					<!-- End Loop -->

				</ul>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
