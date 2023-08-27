<?php
/**
 * Use this file for all your template filters and actions.
 * Requires PDF Invoices & Packing Slips for WooCommerce 1.4.13 or higher
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function pbe_get_customer_email() {
	
	global $wpdb;
	$prefix = $wpdb->prefix;
	$return = "";
	$post_id = $_GET['order_ids'];

	if ($post_id === "") return $return;

	$user_id = get_post_meta($post_id, "_customer_user", true);
	if ($user_id === "") return $return;
	
	//$return = get_user_meta($user_id, "billing_email", true);
	
	$rs = $wpdb->get_results("SELECT user_email FROM {$prefix}users WHERE ID = $user_id");
	if (is_array($rs) && count($rs) > 0) {
		$return = $rs[0]->user_email;
	}
	
	return $return;
	
	
}

function pbe_get_customer_phone() {
	
	global $wpdb;
	$prefix = $wpdb->prefix;
	$return = "";
	$post_id = $_GET['order_ids'];

	if ($post_id === "") return $return;

	$user_id = get_post_meta($post_id, "_customer_user", true);
	if ($user_id === "") return $return;
	
	$return = get_user_meta($user_id, "billing_phone", true);
	
	return $return;
	
	
}

