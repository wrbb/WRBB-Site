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

			<main class="site-main" id="main">

                <hr class="header-line">

				<header class="page-header">

					<?php
					$curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug',
						$author_name ) : get_userdata( intval( $author ) );
					?>

                    <h1 class="entry-header">
                        <span class="article-title">
                            <?php esc_html_e( 'Articles by', 'understrap' ); ?>
                            <?php echo esc_html( $curauth->nickname ); ?>

                        </span>
                    </h1>

                    <hr>
                    
                    <?php if(! empty( $curauth->user_description )): ?>
                        <h5 class="flex-column bio-title">
                            <?php esc_html_e( 'About ', 'understrap' ); ?>
                            <?php
                                echo
                                esc_html( $curauth->first_name ) . " " .
                                esc_html( $curauth->last_name );
                            ?>
                        </h5>
                    <?php endif; ?>

					<dl>
                        <?php if ( ! empty( $curauth->user_description ) ) : ?>

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


				</header>

				<ul class="list-group list-group-flush">

					<!-- The Loop -->
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>

                            <?php
                            if (strcmp(get_post_status(), "publish") == 0) {
	                            /*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a
	                             * file called content-___.php (where ___ is the Post Format name)
	                             * and that will be used instead.
                                 */
	                            get_template_part(
                                    'loop-templates/content-archive', get_post_format()
                                );
                            }
                            ?>

						<?php endwhile; ?>

					<?php else : ?>

						<?php get_template_part( 'loop-templates/content', 'none' ); ?>

					<?php endif; ?>

				</ul>

			</main>

			<?php understrap_pagination(); ?>

	    </div>

    </div>

</div>

<?php get_footer(); ?>
