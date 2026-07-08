<?php
/**
 * Plugin Name: WP ACF Blocks
 * Description: Custom Gutenberg blocks built with ACF Pro Block API v3 and PHP render templates.
 * Version:     1.0.0
 * Requires at least: 6.5
 * Requires PHP: 8.1
 * Author: GetDark
 * Text Domain: wpacfb
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'WPACFB_DIR', plugin_dir_path( __FILE__ ) );
define( 'WPACFB_URL', plugin_dir_url( __FILE__ ) );

add_action( 'init', 'wpacfb_register_blocks' );

function wpacfb_register_blocks(): void {
    $blocks = [ 'video-facade', 'cards-grid' ];

    foreach ( $blocks as $block ) {
        register_block_type( WPACFB_DIR . 'blocks/' . $block );
    }
}
