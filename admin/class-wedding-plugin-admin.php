<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://calvert.media
 * @since      1.0.0
 *
 * @package    Wedding_Plugin
 * @subpackage Wedding_Plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wedding_Plugin
 * @subpackage Wedding_Plugin/admin
 * @author     Matt Calvert <matt@calvert.media>
 */
class Wedding_Plugin_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wedding_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wedding_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wedding-plugin-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wedding_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wedding_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wedding-plugin-admin.js', array( 'jquery' ), $this->version, false );

	}

    public function acf_op_init() {

		// Check function exists.
		if( function_exists('acf_add_options_page') ) {

            // Register Options Page
            $options_page = acf_add_options_page( array(
                'page_title'    => __('Theme General Settings'),
                'menu_title'    => __('Theme Settings'),
                'menu_slug'     => 'theme-general-settings',
                'capability'    => 'edit_posts',
                'redirect'      => false,
                'position'      => '3.1',
                'icon_url'      => 'dashicons-admin-generic'
            ) );

            $front_page = acf_add_options_page( array(
                'page_title'    => __('Front Page Settings'),
                'menu_title'    => __('Front Page Settings'),
                'parent_slug'     => $options_page['menu_slug'],
            ) );

        }

    }

}
