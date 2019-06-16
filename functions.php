<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

/**
 * Initialize theme default settings
 */
require get_template_directory() . '/inc/theme-settings.php';

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Register widget area.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom pagination for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Comments file.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Load WooCommerce functions.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';

function unique_multidim_array($array, $key) { 
    $temp_array = array(); 
    $i = 0; 
    $key_array = array(); 
    
    foreach($array as $val) { 
        if (!in_array($val[$key], $key_array)) { 
            $key_array[$i] = $val[$key]; 
            $temp_array[$i] = $val; 
        } 
        $i++; 
    } 
    return $temp_array; 
}

/*
* Define a constant path to our single template folder
*/
define(SINGLE_PATH, TEMPLATEPATH . '/src/wrbb-templates');
 
/**
* Filter the single_template with our custom function
*/
add_filter('single_template', 'my_single_template');
 
/**
* Single template function which will choose our template
*/
function my_single_template($single) {
  global $wp_query, $post;
 
  /**
  * Checks for single template by category
  * Check by category slug and ID
  */
  foreach((array)get_the_category() as $cat) :
 
    if(file_exists(SINGLE_PATH . '/single-cat-' . $cat->slug . '.php'))
      return SINGLE_PATH . '/single-cat-' . $cat->slug . '.php';
 
    elseif(file_exists(SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php'))
      return SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php';
 
    endforeach;
}

/**
 * Used for articles
 * Prints HTML with meta information for the current post-date/time and author.
 * Overrides function in inc/template-tags.php
 */
function understrap_posted_on() {
  $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
  if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
    $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
  }
  $time_string = sprintf( $time_string,
    esc_attr( get_the_date( 'c' ) ),
    esc_html( get_the_date() ),
    esc_attr( get_the_modified_date( 'c' ) ),
    esc_html( get_the_modified_date() )
  );
  $posted_on = sprintf(
    esc_html_x( '%s', 'post date', 'understrap' ),
    '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
  );
  $byline = sprintf(
    esc_html_x( 'by %s', 'post author', 'understrap' ),
    '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
  );
  echo '<p>' . $byline . '<span style="color: red"> | </span>' . $posted_on . '</p>'; // WPCS: XSS OK.
}

/**
 * Used for article thumbnails on the home page
 * Prints HTML with meta information for the current post-date/time and author.
 * Overrides function in inc/template-tags.php
 */
function mp_understrap_posted_on() {
  $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
  if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
    $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
  }
  $time_string = sprintf( $time_string,
    esc_attr( get_the_date( 'c' ) ),
    esc_html( get_the_date() ),
    esc_attr( get_the_modified_date( 'c' ) ),
    esc_html( get_the_modified_date() )
  );
  $posted_on = sprintf(
    esc_html_x( '%s', 'post date', 'understrap' ),
    '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
  );
  $byline = sprintf(
    esc_html_x( '%s', 'post author', 'understrap' ),
    '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
  );
  echo '<p id="mpa-date">' . $posted_on . '</p><p id="mpa-author"> ' . $byline . '</p>'; // WPCS: XSS OK.
}