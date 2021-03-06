<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/Rahmon
 * @since      1.0.0
 *
 * @package    Rakusu
 * @subpackage Rakusu/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Rakusu
 * @subpackage Rakusu/public
 * @author     rahmohn <https://github.com/Rahmon/rakusu>
 */
class Rakusu_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Rakusu_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Rakusu_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/rakusu-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Rakusu_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Rakusu_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		if ( is_singular( 'post' ) ) {
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/rakusu-public.js', array( 'jquery' ), $this->version, false );
		}

	}

	public function add_social_share( $content ) {
		if ( is_singular( 'post' ) ) {
			$text = get_the_title();
			$url = get_permalink();
			$twitter_share_url = 'https://twitter.com/intent/tweet?' . 'text=' . $text . '&url=' . $url;

			$facebook_share_url = 'https://www.facebook.com/sharer/sharer.php?u=' . $url;

			$social_share_element = '<div>
																<h5>Share</h5>
																<h6>
																	<a href="' . $twitter_share_url . '">Twitter</a>
																</h6>
																<h6>
																	<a href="' . $facebook_share_url . '">Facebook</a>
																</h6>
															</div>';

			$social_share_side = '<div id="rakusu-social-share">' . $social_share_element . '</div>';
			$social_share_bottom = '<div id="rakusu-social-share-bottom">' . $social_share_element . '</div>';

			return $social_share_side . $content . $social_share_bottom;
		} else {
			return $content;
		}
	}

}
