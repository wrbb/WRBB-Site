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

/**
 * adapted from https://github.com/spinitron/v2-api-demo/blob/master/app/SpinitronApiClient.php
 * 
 * @return string JSON document
 * @throws \Exception
 */
function queryApiShowById($id)
{
    $fullUrl = 'https://spinitron.com/api/shows/'.$id.'?access-token=ARdWnef9Fie7lKWspQzn5efv';
    $stream = fopen($fullUrl, 'rb', false);
    if ($stream === false) {
        throw new Exception('Error opening stream for ' . $fullUrl);
    }
    $response = stream_get_contents($stream);
    if ($response === false) {
        throw new Exception('Error requesting ' . $fullUrl . ': ' . var_export(stream_get_meta_data($stream), true));
    }
    return $response;
}

/**
 * adapted from https://github.com/spinitron/v2-api-demo/blob/master/app/SpinitronApiClient.php
 * 
 * @return string JSON document
 * @throws \Exception
 */
function queryApiPlaylistsById($id)
{
    $fullUrl = 'https://spinitron.com/api/playlists?show_id='.$id.'&count=6&access-token=ARdWnef9Fie7lKWspQzn5efv';
    $stream = fopen($fullUrl, 'rb', false);
    if ($stream === false) {
        throw new Exception('Error opening stream for ' . $fullUrl);
    }
    $response = stream_get_contents($stream);
    if ($response === false) {
        throw new Exception('Error requesting ' . $fullUrl . ': ' . var_export(stream_get_meta_data($stream), true));
    }
    return $response;
}

/**
 * adapted from https://github.com/spinitron/v2-api-demo/blob/master/app/SpinitronApiClient.php
 * 
 * @return string JSON document
 * @throws \Exception
 */
function queryApiPersonaById($id)
{
    $fullUrl = 'https://spinitron.com/api/personas/'.$id.'?access-token=ARdWnef9Fie7lKWspQzn5efv';
    $stream = fopen($fullUrl, 'rb', false);
    if ($stream === false) {
        throw new Exception('Error opening stream for ' . $fullUrl);
    }
    $response = stream_get_contents($stream);
    if ($response === false) {
        throw new Exception('Error requesting ' . $fullUrl . ': ' . var_export(stream_get_meta_data($stream), true));
    }
    return $response;
}