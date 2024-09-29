<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://newexsoft.com
 * @since      1.0.0
 *
 * @package    Nx_Lottie
 * @subpackage Nx_Lottie/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Nx_Lottie
 * @subpackage Nx_Lottie/public
 * @author     UI Bucket <uibucket@gmail.com>
 */
class Nx_Lottie_Public {

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
		 * defined in Nx_Lottie_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Nx_Lottie_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name .'_ubuntu-font', 'https://fonts.googleapis.com/css2?family=Anek+Latin:wght@100;200;300;400;500;600;700;800&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name .'_bootstrap', plugin_dir_url( __FILE__ ). '../common/assets/css/nx-lottie-bootstrap.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name .'_remix_icon', 'https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name .'_datatable', plugin_dir_url( __FILE__ ). '../common/assets/css/nx-lottie-datatable.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name .'_select_2', plugin_dir_url( __FILE__ ) . '../common/assets/css/nx-lottie-select2.css', array(), $this->version, 'all' );

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/nx-lottie-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name . 'nx-common', plugin_dir_url( __FILE__ ) . '../common/assets/css/nx-custom.css', array(), $this->version, 'all' );

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
		 * defined in Nx_Lottie_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Nx_Lottie_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		
		?>
		<script>
			var site_url = "<?php echo site_url(); ?>";
		</script>
		<?php
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( $this->plugin_name . '_bootstrap', plugin_dir_url( __FILE__ ). '../common/assets/js/nx-lottie-bootstrap.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name . '_datatable', plugin_dir_url( __FILE__ ). '../common/assets/js/nx-lottie-datatable.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name . '_datatable-bs', plugin_dir_url( __FILE__ ). '../common/assets/js/nx-lottie-bs-datatable.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name . '_select_2', plugin_dir_url( __FILE__ ) . '../common/assets/js/nx-lottie-select2.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name . '_lottie', plugin_dir_url( __FILE__ ) . '../common/assets/js/nx-lottie-lottie-player.js', [], $this->version, true );
		wp_enqueue_script( $this->plugin_name . '_table-filter', plugin_dir_url( __FILE__ ) . '../common/assets/js/nx-lottie-table-filter.js', [], $this->version, true );

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/nx-lottie-public.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name . '_ajax', plugin_dir_url( __FILE__ ) . 'js/nx-lottie-ajax.js', array( 'jquery' ), $this->version, false );
		wp_localize_script( $this->plugin_name.'_ajax','nx_lottie_public_ajax_url', array( 'ajaxurl' => admin_url('admin-ajax.php')) ); 

	}

}
