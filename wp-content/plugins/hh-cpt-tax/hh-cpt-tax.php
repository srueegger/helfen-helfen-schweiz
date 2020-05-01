<?php
/**
 * Plugin Name: Custom Post Types and Taxonomies
 * Version: 1.0.0
 * Plugin URI: https://rueegger.me
 * Description: Dieses Plugin managt die Post Types und Taxonomies für Helfen-helfen Schweiz
 * Author: Samuel Rüegger
 * Author URI: https://rueegger.me
 *
 * Text Domain: hh-cpt-tax
 */

function cptui_register_my_cpts() {

	/**
	 * Post Type: Köpfe.
	 */

	$labels = [
		"name" => __( "Köpfe", "hh-wptheme" ),
		"singular_name" => __( "Kopf", "hh-wptheme" ),
		"menu_name" => __( "Köpfe", "hh-wptheme" ),
		"all_items" => __( "Alle Köpfe", "hh-wptheme" ),
		"add_new_item" => __( "Neuer Kopf", "hh-wptheme" ),
		"edit_item" => __( "Kopf bearbeiten", "hh-wptheme" ),
		"new_item" => __( "Neuer Kopf", "hh-wptheme" ),
		"view_item" => __( "Kopf ansehen", "hh-wptheme" ),
		"view_items" => __( "Köpfe ansehen", "hh-wptheme" ),
		"search_items" => __( "Köpfe suchen", "hh-wptheme" ),
		"not_found" => __( "Es wurden keine Köpfe gefunden", "hh-wptheme" ),
		"not_found_in_trash" => __( "Es wurden keine Köpfe im Papierkorb gefunden", "hh-wptheme" ),
	];

	$args = [
		"label" => __( "Köpfe", "hh-wptheme" ),
		"labels" => $labels,
		"description" => "Die Köpfe von Helfen helfen Schweiz",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "koepfe",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => false,
		"delete_with_user" => false,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => false,
		"query_var" => true,
		"menu_icon" => "dashicons-groups",
		"supports" => [ "title", "custom-fields" ],
	];

	register_post_type( "koepfe", $args );

	/**
	 * Post Type: Partner
	 */

	$labels = [
		"name" => __( "Partner", "hh-wptheme" ),
		"singular_name" => __( "Partner", "hh-wptheme" ),
		"menu_name" => __( "Partner", "hh-wptheme" ),
		"all_items" => __( "Alle Partner", "hh-wptheme" ),
		"add_new_item" => __( "Neuer Partner hinzufügen", "hh-wptheme" ),
		"edit_item" => __( "Partner bearbeiten", "hh-wptheme" ),
		"new_item" => __( "Partner hinzufügen", "hh-wptheme" ),
		"view_item" => __( "Partner anzeigen", "hh-wptheme" ),
		"view_items" => __( "Partner anzeigen", "hh-wptheme" ),
		"search_items" => __( "Partner durchsuchen", "hh-wptheme" ),
		"not_found" => __( "Keine Partner gefunden", "hh-wptheme" ),
		"not_found_in_trash" => __( "Keine Partner im Papierkorb gefunden", "hh-wptheme" ),
		"featured_image" => __( "Beitragsbild für Partner", "hh-wptheme" ),
		"set_featured_image" => __( "Beitragsbild für Partner festlegen", "hh-wptheme" ),
		"remove_featured_image" => __( "Beitragsbild entfernen", "hh-wptheme" ),
		"name_admin_bar" => __( "Partner", "hh-wptheme" ),
		"item_published" => __( "Partner veröffentlicht", "hh-wptheme" ),
		"item_updated" => __( "Partner aktualisiert", "hh-wptheme" ),
	];

	$args = [
		"label" => __( "Partner", "hh-wptheme" ),
		"labels" => $labels,
		"description" => "Dieser Post Type verwaltet die Partner für Helfen helfen Schweiz",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "partner",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => false,
		"delete_with_user" => false,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => false,
		"query_var" => true,
		"menu_icon" => "dashicons-star-filled",
		"supports" => [ "title", "custom-fields", "revisions", "author" ],
	];

	register_post_type( "hh_partner", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );