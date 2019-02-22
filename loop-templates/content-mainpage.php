<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">
	
		<img src="<?php echo get_the_post_thumbnail_url( $post->ID ); ?>">

		<div class="mpa-meta">

			<?php the_title( sprintf( '<h4 id="title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h4>' ); ?>

			<?php if ( 'post' == get_post_type() ) : ?>
				<p id="date"><?php echo get_the_time(get_option('date_format'), $post->ID); ?></p>
				<p id="author"><?php
					$author_id = get_post_field ('post_author', $post->ID);
					$display_name = get_the_author_meta( 'display_name' , $author_id ); 
					echo $display_name;
				?></p>
			<?php endif; ?>
			
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

</article><!-- #post-## -->
