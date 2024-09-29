<?php

    class Nx_Lottie_Create_Page_Tem{

        public function home_page(){
            // Create home page
            $page_title = 'Lottie Home';
            $page_template = 'lottie-home.php';
            $page_check = get_page_by_title($page_title);
    
            $my_post = array(
                'post_title' => $page_title,
                'post_content' => 'Home',
                'page_template' => 'Lottie Home',
                'post_status' => 'publish',
                'post_name' => 'Lottie Home',
                'post_type' => 'page',
                'post_author' => 1,
            );
    
            // Insert the post into the database
    
            if (!isset($page_check->ID)) {
                $new_page_id = wp_insert_post($my_post);;
                if (!empty($page_template)) {
                    update_post_meta($new_page_id, '_wp_page_template', $page_template);
                }
            }
        } 
        
        public function single_product_page(){
            // Create home page
            $page_title = 'Lottie Single Product';
            $page_template = 'single-product.php';
            $page_check = get_page_by_title($page_title);
    
            $my_post = array(
                'post_title' => $page_title,
                'post_content' => 'Signle Product',
                'page_template' => 'Lottie Single Product',
                'post_status' => 'publish',
                'post_name' => 'Lottie Single Product',
                'post_type' => 'page',
                'post_author' => 1,
            );
    
            // Insert the post into the database
    
            if (!isset($page_check->ID)) {
                $new_page_id = wp_insert_post($my_post);;
                if (!empty($page_template)) {
                    update_post_meta($new_page_id, '_wp_page_template', $page_template);
                }
            }
        }

        public function single_category_page(){
            // Create home page
            $page_title = 'Lottie Single Category';
            $page_template = 'single-category.php';
            $page_check = get_page_by_title($page_title);
    
            $my_post = array(
                'post_title' => $page_title,
                'post_content' => 'Signle Category',
                'page_template' => 'Lottie Single Category',
                'post_status' => 'publish',
                'post_name' => 'Lottie Single Category',
                'post_type' => 'page',
                'post_author' => 1,
            );
    
            // Insert the post into the database
    
            if (!isset($page_check->ID)) {
                $new_page_id = wp_insert_post($my_post);;
                if (!empty($page_template)) {
                    update_post_meta($new_page_id, '_wp_page_template', $page_template);
                }
            }
        }

        public function nx_lottie_cart(){
            // Create home page
            $page_title = 'Lottie Cart';
            $page_template = 'cart.php';
            $page_check = get_page_by_title($page_title);
    
            $my_post = array(
                'post_title' => $page_title,
                'post_content' => 'Lottie Cart',
                'page_template' => 'Lottie Cart',
                'post_status' => 'publish',
                'post_name' => 'Lottie Cart',
                'post_type' => 'page',
                'post_author' => 1,
            );
    
            // Insert the post into the database
    
            if (!isset($page_check->ID)) {
                $new_page_id = wp_insert_post($my_post);;
                if (!empty($page_template)) {
                    update_post_meta($new_page_id, '_wp_page_template', $page_template);
                }
            }
        }

    }