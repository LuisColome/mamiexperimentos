<?php
/**
 * ACF Customizations
 *
 * @package      EAGenesisChild
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

class BE_ACF_Customizations {

	public function __construct() {

		// Only allow fields to be edited on development
		if ( ! defined( 'WP_LOCAL_DEV' ) || ! WP_LOCAL_DEV ) {
			//add_filter( 'acf/settings/show_admin', '__return_false' );
		}

		// Register options page
		add_action( 'init', array( $this, 'register_options_page' ) );

		// Register Blocks
		add_action('acf/init', array( $this, 'register_blocks' ) );
	}

	/**
	 * Register Options Page
	 *
	 */
	function register_options_page() {
	    if ( function_exists( 'acf_add_options_page' ) ) {
	        acf_add_options_page( array(
	        	'title'      => __( 'Site Options', 'lcm_mamiexperimentos' ),
	        	'capability' => 'manage_options',
	        ) );
	    }
	}

	/**
	 * Register Blocks
	 * @link https://www.billerickson.net/building-gutenberg-block-acf/#register-block
	 *
	 * Categories: common, formatting, layout, widgets, embed
	 * Dashicons: https://developer.wordpress.org/resource/dashicons/
	 * ACF Settings: https://www.advancedcustomfields.com/resources/acf_register_block/
	 */
	function register_blocks() {

		if( ! function_exists('acf_register_block_type') )
			return;

        // Register a resources block.
        acf_register_block_type(array(
            'name'              => 'resources',
            'title'             => __('Recursos'),
            'description'       => __('A custom resources gallery block.'),
            'icon' 				=> 'screenoptions',
            'keywords' 			=> array('columns', 'images', 'subpages', 'pages', 'gallery', 'resources'),
            'render_template'   => 'partials/blocks/recursos/recursos.php',
            'category'          => 'media',
        ));

         // Register a resources block.
         acf_register_block_type(array(
            'name'              => 'adsense-custom-block',
            'title'             => __('AdSense Custom Block'),
            'description'       => __('A custom block to insert AdSense ads.'),
            'icon' 				=> 'screenoptions',
            'keywords' 			=> array('ads', 'adsense', 'AdSense', 'publi'),
            'render_template'   => 'partials/blocks/ads/ads.php',
            'category'          => 'media',
        ));

	}
}
new BE_ACF_Customizations();