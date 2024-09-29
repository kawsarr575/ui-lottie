<?php

/**
 * Fired during plugin activation
 *
 * @link       https://newexsoft.com
 * @since      1.0.0
 *
 * @package    Nx_Lottie
 * @subpackage Nx_Lottie/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Nx_Lottie
 * @subpackage Nx_Lottie/includes
 * @author     UI Bucket <uibucket@gmail.com>
 */
class Nx_Lottie_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		$create_page_temp = new Nx_Lottie_Create_Page_Tem;
		$create_page_temp->home_page();
		$create_page_temp->single_product_page();
		$create_page_temp->single_category_page();
		$create_page_temp->nx_lottie_cart();

		self::option_table();
		self::create_tables();
		self::create_folder();
		self::add_role();

	}

	public static function create_folder(){

		if ( ! is_dir( ABSPATH . '/wp-content/plugins/lottie-files' ) ) {
			wp_mkdir_p( ABSPATH . '/wp-content/plugins/lottie-files' );
		}
	}

	public static function option_table(){
		$nx_lottie_activation_time = time();
		update_option( 'nx_lottie_activation_time', $nx_lottie_activation_time );

	}


	public static function create_tables(){
		
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		global $wpdb;
		$nx_lottie_product = $wpdb->prefix . "nx_lottie_product"; 
		$nx_lottie_category = $wpdb->prefix . "nx_lottie_category";
		$nx_lottie_cart = $wpdb->prefix . "nx_lottie_cart";
		$wishlist = $wpdb->prefix . "nx_lottie_wishlist";

		$sql1 = "CREATE TABLE $nx_lottie_product (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`user_id` int(11) NOT NULL,
			`type` varchar(20) NOT NULL,
			`name` varchar(200) NOT NULL,
			`preview_file` varchar(2000) NOT NULL,
			`aep_file` VARCHAR(2000) NOT NULL,
			`price` varchar(11) NOT NULL,
			`cat_id` varchar(11) NOT NULL,
			`tags` mediumtext NOT NULL,
			`status` varchar(11) NOT NULL,
			`created_at` datetime NOT NULL DEFAULT current_timestamp(),
			`updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
			PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
		dbDelta( $sql1 );

		$sql2 = "CREATE TABLE $nx_lottie_category (
			`cat_id` int(11) NOT NULL AUTO_INCREMENT,
			`cat_name` varchar(200) NOT NULL,
			`cat_img` varchar(2000) NOT NULL,
			`cat_slug` varchar(200) NOT NULL,
			`created_at` datetime NOT NULL DEFAULT current_timestamp(),
			`updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
			PRIMARY KEY (`cat_id`)
		   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
		dbDelta( $sql2 );
		
		$sql3 = "CREATE TABLE $nx_lottie_cart (
			`cart_id` int(11) NOT NULL AUTO_INCREMENT,
			`user_id` int(11) NOT NULL,
			`p_id` int(11) NOT NULL,
			`created_at` datetime DEFAULT current_timestamp(),
			`updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
			PRIMARY KEY (`id`)
		   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
		dbDelta( $sql3 );
		
		$sql4 = "CREATE TABLE $wishlist (
			`wish_id` int(11) NOT NULL AUTO_INCREMENT,
			`user_id` int(11) NOT NULL,
			`p_id` int(11) NOT NULL,
			`created_at` datetime NOT NULL DEFAULT current_timestamp(),
			`updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
			PRIMARY KEY (`wish_id`)
		   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
		dbDelta( $sql4 );

	}

	/**
	 * 
	 * Add new roll
	*/
	private static function add_role() {
	
		add_role(
			'nx_lottie_customer',
			__( 'NX Lottie Customer' ),
			array(
				'read'         => true,  // true allows this capability
				//'edit_posts'   => true, 
				'upload_files' => false,
				//'publish_pages'   => true,
				//'innovs_dashboard_cap'   => true,
			)
		);
	}

	// private static function add_cap() {  
	// 	$roles = get_editable_roles();
	// 	foreach ($GLOBALS['wp_roles']->role_objects as $key => $role) {
	// 		if (isset($roles[$key]) && $role->has_cap('innovs_dashboard_cap')) {
	// 			$role->add_cap('innovs_dashboard_cap');
	// 		} 
	// 	}
	// 	$role_name = 'administrator';
 	// 	// get the the role object
	// 	$role_object = get_role( $role_name ); 
	// 	// add $cap capability to this role object
	// 	$role_object->add_cap( 'innovs_dashboard_cap' );
	// }

}
