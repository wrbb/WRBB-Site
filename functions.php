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
define('SINGLE_PATH', TEMPLATEPATH . '/src/wrbb-templates');

/**
 * Filter the single_template with our custom function
 */
add_filter('single_template', 'my_single_template');

/**
 * Single template function which will choose our template
 */
function my_single_template() {
    /**
     * Checks for single template by category
     * Check by category slug and ID
     */
    foreach ((array)get_the_category() as $cat) {
        if ( file_exists( SINGLE_PATH . '/single-cat-' . $cat->slug . '.php' ) ) {
            return SINGLE_PATH . '/single-cat-' . $cat->slug . '.php';
        } elseif ( file_exists( SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php' ) ) {
            return SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php';
        }
    }
}

/**
 * Used for article thumbnails on the main page
 * Prints HTML with meta information for the current post-date/time and author.
 * Overrides function in inc/template-tags.php
 */
function mp_understrap_posted_on($post_id)
{
  $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
  if (get_the_time('U') !== get_the_modified_time('U')) {
    $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
  }
  $time_string = sprintf(
    $time_string,
    esc_attr(get_the_date('c')),
    esc_html(get_the_date()),
    esc_attr(get_the_modified_date('c')),
    esc_html(get_the_modified_date())
  );
  $posted_on = sprintf(esc_html_x('%s', 'post date', 'understrap'), $time_string);
	$author_id = get_post_field('post_author', $post_id);
  if ( function_exists( 'coauthors_posts_links' ) ) {
        $byline = coauthors_posts_links(null, null, null, null, false);
  } else {
      $byline = sprintf(
        esc_html_x( 'by %s', 'post author', 'understrap' ),
        '<span class="author vcard"><a class="url fn n" href="' .
        esc_url( get_author_posts_url( get_the_author_meta( 'ID', $author_id ) ) ) . '">' .
        esc_html(get_the_author_meta('first_name', $author_id) . " " . get_the_author_meta('last_name', $author_id)) .
        '</a></span>'
      );
  }
  echo '<p id="mpa-date"> ' . $posted_on . '</p><p id="mpa-author"> ' . $byline . '</p>'; // WPCS: XSS OK.
}
/**
 * Used for article thumbnails on the home page
 * Prints HTML with meta information for the current post-date/time and author.
 * Overrides function in inc/template-tags.php
 *
 * @param int $post_id The ID of the current post
 */
function understrap_posted_on($post_id = 0) {
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
  $posted_on = sprintf(esc_html_x( '%s', 'post date', 'understrap' ), $time_string);
  if ($post_id == 0) {
      $author_id = get_post_field('post_author', $post_id);
      if ( function_exists( 'coauthors_posts_links' ) ) {
            $byline = coauthors_posts_links(null, null, null, null, false);
      } else {
          $byline = sprintf(
            esc_html_x( 'by %s', 'post author', 'understrap' ),
            '<span class="author vcard"><a class="url fn n" href="' .
            esc_url( get_author_posts_url( get_the_author_meta( 'ID', $author_id ) ) ) . '">' .
            esc_html(get_the_author_meta('first_name', $author_id) . " " . get_the_author_meta('last_name', $author_id)) .
            '</a></span>'
          );
    }
  } else {
  	// This function is being called outside the loop, so the $author_id must be specified
	  $author_id = get_post_field('post_author', $post_id);
      if ( function_exists( 'coauthors_posts_links' ) ) {
            $byline = coauthors_posts_links(null, null, null, null, false);
      } else {
          $byline = sprintf(
            esc_html_x( 'by %s', 'post author', 'understrap' ),
            '<span class="author vcard"><a class="url fn n" href="' .
            esc_url( get_author_posts_url( get_the_author_meta( 'ID', $author_id ) ) ) . '">' .
            esc_html(get_the_author_meta('first_name', $author_id) . " " . get_the_author_meta('last_name', $author_id)) .
            '</a></span>'
          );
    }
  }
	echo '<p>' . $byline . '<span class="pipe"> | </span>' . $posted_on . '</p>'; // WPCS: XSS OK.
}

/**
 * Used for podcasts
 * Prints HTML with meta information for the current post-date/time.
 * Overrides function in inc/template-tags.php
 */
function podcast_posted_on() {
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
  $posted_on = sprintf( esc_html_x( '%s', 'post date', 'understrap' ), $time_string );
  echo '<p>' . $posted_on . '</p>'; // WPCS: XSS OK.
}

/*
* Creating a function to create our CPT
*/

function custom_post_type() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Podcasts', 'Post Type General Name' ),
        'singular_name'       => _x( 'Podcast', 'Post Type Singular Name' ),
        'menu_name'           => __( 'Podcasts' ),
        'parent_item_colon'   => __( 'Parent Podcast' ),
        'all_items'           => __( 'All Podcasts' ),
        'view_item'           => __( 'View Podcast' ),
        'add_new_item'        => __( 'Add New Podcast' ),
        'add_new'             => __( 'Add New' ),
        'edit_item'           => __( 'Edit Podcast' ),
        'update_item'         => __( 'Update Podcast' ),
        'search_items'        => __( 'Search Podcast' ),
        'not_found'           => __( 'Not Found' ),
        'not_found_in_trash'  => __( 'Not found in Trash' ),
    );

// Set other options for Custom Post Type

    $args = array(
        'label'               => __( 'podcasts' ),
        'description'         => __( 'Podcast info and embed' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies'          => array( 'genres', 'category' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',

		'taxonomies'          => array( 'category' ),
    );

    // Registering your Custom Post Type
    register_post_type( 'podcasts', $args );

}

add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if( is_category() ) {
    $post_type = get_query_var('post_type');
    if($post_type)
        $post_type = $post_type;
    else
        $post_type = array('nav_menu_item', 'post', 'podcasts'); // don't forget nav_menu_item to allow menus to work!
    $query->set('post_type',$post_type);
    return $query;
    }
}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'custom_post_type', 0 );

function podcast_func( $atts ){
	$a = shortcode_atts( array(
    	'numberposts' => 1,
		'category' => '',
		'offset' => 0,
		'post_type' => 'podcasts',
		'post_status' => 'publish, private',
	), $atts );

	$recent_posts = wp_get_recent_posts( $a );
	$info = $atts['information'];
	if ($info == 'post_link') {
		return get_permalink(reset($recent_posts)["ID"]);
	} elseif ($info == 'post_date') {
		return date('F-j-Y', strtotime(reset($recent_posts)[$info]));
	} elseif ($info == 'post_content') {
		$content_post = get_post(reset($recent_posts)["ID"]);
		$content = $content_post->post_content;
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		return "<p>" . wp_trim_words( $content, 35 ) . "</p>";
	}
	return reset($recent_posts)[$info];
	wp_reset_query();
}
add_shortcode( 'podcast', 'podcast_func' );
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

/**
 * Adds a custom read more link to all excerpts, manually or automatically generated
 *
 * @param string $post_excerpt Posts's excerpt.
 *
 * @return string
 */
function understrap_all_excerpts_get_more_link( $post_excerpt ) {
	return $post_excerpt . ' [...]';
}


// Below code taken from https://wordpress.stackexchange.com/a/8747
// Give users the option to add featured images to categories (meant for podcast logos)
add_action ( 'edit_category_form_fields', 'extra_category_fields');

//add extra fields to category edit form callback function
function extra_category_fields( $tag ) {    //check for existing featured ID
	$t_id = $tag->term_id;
	$cat_meta = get_option( "category_$t_id");
	?>
	<tr class="form-field">
		<th scope="row" valign="top">
			<label for="cat_Image_url"><?php _e('Podcast Logo URL'); ?></label>
		</th>
		<td>
			<input type="text" name="Cat_meta[img]" id="Cat_meta[img]" size="3" style="width:60%;" value="<?php echo $cat_meta['img'] ? $cat_meta['img'] : ''; ?>"><br />
			<span class="description"><?php _e('Enter the URL for the podcast logo image that you want displayed on the podcast pages.'); ?></span>
		</td>
	</tr>
	<?php
}

// save extra category extra fields hook
add_action( 'edited_category', 'save_extra_category_fields' );

// save extra category extra fields callback function
function save_extra_category_fields( $term_id ) {
	if ( isset( $_POST['Cat_meta'] ) ) {
		$t_id     = $term_id;
		$cat_meta = get_option( "category_$t_id" );
		$cat_keys = array_keys( $_POST['Cat_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset( $_POST['Cat_meta'][ $key ] ) ) {
				$cat_meta[ $key ] = $_POST['Cat_meta'][ $key ];
			}
		}
		//save the option array
		update_option( "category_$t_id", $cat_meta );
	}
}
