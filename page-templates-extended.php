<?php

/*
Plugin Name: Page Templates Extended
Description: Create templates for a specific page by its ID. If the page doesn't have a template assigned, the plugin looks up in the hierarchy and grabs the first template that exists.
Version: 2.1
Author: Thomas Blomberg Hansen
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

*/

add_action( 'template_redirect', 'page_template_extended' );
function page_template_extended() {
	// Clean up previous versions database entries.
	if ( get_option( 'pte_use_parent_template' ) ) {
		delete_option( 'pte_use_parent_template' );
	}

	if ( defined( 'WP_USE_THEMES' ) && constant( 'WP_USE_THEMES' ) && is_page() ) {
		// Start from the bottom of this pages hierarchy and look up through the parents
		do {
			global $wpdb, $post;

			// Grab page ID
			if ( ! isset( $pte_page_id ) ) {
				$pte_page_id = $post->ID;
			}

			// Locate template file
			$pte_page_template = locate_template( '/page-' . $pte_page_id . '.php' );
			if ( file_exists( $pte_page_template ) ) {
				// We found the template file - DONE
				include_once( $pte_page_template );
				$pte_template_found = true;
			} else {
				// Lets look further up the hierarchy and re-loop
				$pte_page_id = $wpdb->get_var( "SELECT post_parent FROM $wpdb->posts WHERE ID = $pte_page_id" );
				$pte_template_found = false;
			}
		} while ( $pte_template_found == false );
	}
}