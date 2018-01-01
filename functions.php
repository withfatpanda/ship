<?php
/**
 * Ship functions and definitions
 *
 * @package ship
 */

/**
 * Asset loading functionality.
 */
require get_template_directory() . '/src/php/inc/assets.php';

/**
 * Load the Blade template engine.
 */
\FatPanda\WordPress\Ship\Blade::load();

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/src/php/inc/extras.php';

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/src/php/inc/setup.php';

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
require get_template_directory() . '/src/php/inc/widgets.php';

/**
 * Load functions to secure your WP install.
 */
require get_template_directory() . '/src/php/inc/security.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/src/php/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/src/php/inc/template-tags.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/src/php/inc/pagination.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/src/php/inc/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/src/php/inc/custom-comments.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/src/php/inc/jetpack.php';

/**
 * Load WooCommerce functions.
 */
require get_template_directory() . '/src/php/inc/woocommerce.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/src/php/inc/editor.php';
