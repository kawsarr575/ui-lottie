<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://newexsoft.com
 * @since      1.0.0
 *
 * @package    Nx_Lottie
 * @subpackage Nx_Lottie/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Nx_Lottie
 * @subpackage Nx_Lottie/admin
 * @author     UI Bucket <uibucket@gmail.com>
 */
class Nx_Lottie_Admin {

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
		 * defined in Nx_Lottie_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Nx_Lottie_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name .'_bootstrap', plugin_dir_url( __FILE__ ). '../common/assets/css/nx-lottie-bootstrap.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name .'_remix_icon', 'https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name .'_datatable', plugin_dir_url( __FILE__ ). '../common/assets/css/nx-lottie-datatable.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name .'_select_2', plugin_dir_url( __FILE__ ) . '../common/assets/css/nx-lottie-select2.css', array(), $this->version, 'all' );

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/nx-lottie-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name . 'nx-common', plugin_dir_url( __FILE__ ) . '../common/assets/css/nx-custom.css', array(), $this->version, 'all' );

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
		 * defined in Nx_Lottie_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Nx_Lottie_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		?>

		<script type="text/javascript">
			var plugin_url = '<?php echo plugin_dir_url('')  ?>';
			var admin_url = '<?php echo admin_url(); ?>';
			//var plugin_path = '<?php //echo plugin_dir_path(__FILE__)  ?>';
		</script>

		<?php

		wp_enqueue_script( 'jquery' );
		wp_enqueue_media();

		wp_enqueue_script( $this->plugin_name . '_bootstrap', plugin_dir_url( __FILE__ ). '../common/assets/js/nx-lottie-bootstrap.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name . '_datatable', plugin_dir_url( __FILE__ ). '../common/assets/js/nx-lottie-datatable.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name . '_datatable-bs', plugin_dir_url( __FILE__ ). '../common/assets/js/nx-lottie-bs-datatable.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name . '_select_2', plugin_dir_url( __FILE__ ) . '../common/assets/js/nx-lottie-select2.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name . '_lottie', plugin_dir_url( __FILE__ ) . '../common/assets/js/nx-lottie-lottie-player.js', [], $this->version, true );
		wp_enqueue_script( $this->plugin_name . '_table-filter', plugin_dir_url( __FILE__ ) . '../common/assets/js/nx-lottie-table-filter.js', [], $this->version, true );

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/nx-lottie-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name.'_ajax', plugin_dir_url( __FILE__ ) . 'js/nx-lottie-ajax.js', array( 'jquery' ), $this->version, true );
		wp_localize_script( $this->plugin_name.'_ajax','nx_lottie_admin_ajax_url', array( admin_url('admin-ajax.php')) ); 

	}

	

	/**
     * Register a custom menu page.
     */
    public function admin_menu_page(){

        add_menu_page(
            __('Nx Lottie', 'nx-lottie'),
            __('Nx Lottie', 'nx-lottie'),
            'manage_options',
            'nx-lottie',
            array($this, 'nx_all_lotties_cb'),
            'dashicons-welcome-write-blog',
            // plugins_url( 'myplugin/images/icon.png' ),
            6
        );

        add_submenu_page('nx-lottie', 'All Lotties', 'All Lotties', 'manage_options', 'nx-lottie', array($this, 'nx_all_lotties_cb'));

        add_submenu_page('nx-lottie', 'Add New Lottie', 'Add New Lottie', 'manage_options', 'add-new-product', array($this, 'nx_add_new_lottie_cb'));
        
		add_submenu_page('nx-lottie', 'Add Category', 'Add Category', 'manage_options', 'nx-lottie-categories', array($this, 'nx_lottie_add_category_cb'));

		//add_submenu_page('nx-lottie', 'Settings', 'Settings', 'manage_options', 'nx-lottie-settings', array($this, 'nx_lottie_settings_cb'));
    }

	public function nx_all_lotties_cb(){

		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/product/all-lottie.php';

	}	
	
	public function nx_add_new_lottie_cb(){

		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/product/add-new-product.php';

	}
	
	public function nx_lottie_add_category_cb(){

		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/category/add-category.php';

	}
	
	// public function nx_lottie_settings_cb(){

	// 	require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/setting/settings.php';

	// }

}
