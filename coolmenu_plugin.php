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
// function cm_register_simple_dish_product_type() {
// 	/**
// 	 * This should be in its own separate file.
// 	 */
// 	class WC_Product_Simple_Dish extends WC_Product_Simple {
// 		public function get_type($product) {
// 			return "simple_dish";
// 		}
// 	}
// }
// add_action( 'plugins_loaded', 'cm_register_simple_dish_product_type' );

// /**
//  * Add simple dish to product type drop down and remove other product types from the dropdown list
//  */
// function cm_add_simple_dish_product( $types ){
// 	// Key should be exactly the same as in the class
// 	$types[ 'simple_dish' ] = __( 'Simple Dish' );
// //	unset( $types['simple'] );
// 	unset( $types['grouped'] );
// 	unset( $types['external'] );
// 	unset( $types['variable'] );
// 	return $types;
// }
// add_filter( 'product_type_selector', 'cm_add_simple_dish_product' );

/**
 * Set simple dish as default product type
 */
// function cm_change_default_product_type() {
// 	return 'simple_dish';
// }
//add_filter( 'default_product_type', 'cm_change_default_product_type' );


/**
 * Hide all other tabs for simple product
 */
function cm_hide_other_data_tabs($tabs){

//	unset($tabs['general']);
//	$tabs['general']['class'] = 'show_if_simple_dish show_if_simple';

	unset($tabs['inventory']);
	unset($tabs['shipping']);
	unset($tabs['linked_product']);
	unset($tabs['attribute']);
	unset($tabs['advanced']);

	return($tabs);

}
add_filter('woocommerce_product_data_tabs', 'cm_hide_other_data_tabs');

/**
 * Hide downloadable and virtual checkbox
 */
function cm_hide_downloadable_virtual($options)
{
	unset($options['virtual']);
	unset($options['downloadable']);
	return $options;
}
add_filter('product_type_options', 'cm_hide_downloadable_virtual');

/**
 * Remove add media button
 */
remove_action( 'media_buttons', 'media_buttons' );

/**
 * Hide Attributes data panel.
function hide_attributes_data_panel( $tabs) {
	$tabs['attribute']['class'][] = 'hide_if_simple_dish hide_if_variable_rental';
	return $tabs;
}
add_filter( 'woocommerce_product_data_tabs', 'hide_attributes_data_panel' );
 */
