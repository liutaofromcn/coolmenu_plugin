<?php
/*
 Plugin Name: Cool Menu Plugin
 Plugin URI: http://cmenu.us
 Description: This is a really great plugin that extends Woocommerce.
 Version: 0.1.0
 Author: Jerry Liu
 Author URI: none
 */

/**
 * Register the custom product type after init
 */
function register_simple_dish_product_type() {
	/**
	 * This should be in its own separate file.
	 */
	class WC_Product_Simple_Dish extends WC_Product_Simple {
		public function get_type($product) {
			return "simple_dish";
		}
	}
}
add_action( 'plugins_loaded', 'register_simple_dish_product_type' );

/**
 * Add to product type drop down.
 */
function add_simple_dish_product( $types ){
	// Key should be exactly the same as in the class
	$types[ 'simple_dish' ] = __( 'Simple Dish' );
	return $types;
}
add_filter( 'product_type_selector', 'add_simple_dish_product' );

/**
 * Hide Attributes data panel.
 */
function hide_attributes_data_panel( $tabs) {
	$tabs['attribute']['class'][] = 'hide_if_simple_dish hide_if_variable_rental';
	return $tabs;
}
add_filter( 'woocommerce_product_data_tabs', 'hide_attributes_data_panel' );