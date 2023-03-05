<?php
/**
 * Plugin Name: Custom Post Types and Taxonomies
 * Version: 1.5
 * Plugin URI: https://rueegger.me
 * Description: Dieses Plugin managt die Post Types und Taxonomies für Helfen-helfen Schweiz
 * Author: Samuel Rüegger
 * Author URI: https://rueegger.me
 *
 * Text Domain: hh-cpt-tax
 */

function cptui_register_my_cpts() {


	/**
	 * Post Type: Mitstreiter.
	 */

	$labels = [
		"name" => __( "Mitstreiter", "hh-wptheme" ),
		"singular_name" => __( "Mitstreiter", "hh-wptheme" ),
		"menu_name" => __( "Mitstreiter", "hh-wptheme" ),
		"all_items" => __( "Alle Mitstreiter", "hh-wptheme" ),
		"add_new_item" => __( "Neuer Mitstreiter", "hh-wptheme" ),
		"edit_item" => __( "Mitstreiter bearbeiten", "hh-wptheme" ),
		"new_item" => __( "Neuer Mitstreiter", "hh-wptheme" ),
		"view_item" => __( "Mitstreiter ansehen", "hh-wptheme" ),
		"view_items" => __( "Mitstreiter ansehen", "hh-wptheme" ),
		"search_items" => __( "Mitstreiter suchen", "hh-wptheme" ),
		"not_found" => __( "Es wurden keine Mitstreiter gefunden", "hh-wptheme" ),
		"not_found_in_trash" => __( "Es wurden keine Mitstreiter im Papierkorb gefunden", "hh-wptheme" ),
	];

	$args = [
		"label" => __( "Mitstreiter", "hh-wptheme" ),
		"labels" => $labels,
		"description" => "Die Mitstreiter von Helfen helfen Schweiz",
		"public" => false,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "mitstreiter",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array('slug' => 'mitstreiter', 'with_front' => false),
		"query_var" => true,
		"menu_icon" => "dashicons-visibility",
		"supports" => [ "title", "custom-fields" ],
	];

	register_post_type( "hh_mitstreiter", $args );


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

	/**
	 * Post Type: Jobs
	 */

	$labels = [
		"name" => __( "Jobs", "hh-wptheme" ),
		"singular_name" => __( "Job", "hh-wptheme" ),
		"menu_name" => __( "Jobs", "hh-wptheme" ),
		"all_items" => __( "Alle Jobs", "hh-wptheme" ),
		"add_new_item" => __( "Neuer Job hinzufügen", "hh-wptheme" ),
		"edit_item" => __( "Job bearbeiten", "hh-wptheme" ),
		"new_item" => __( "Job hinzufügen", "hh-wptheme" ),
		"view_item" => __( "Job anzeigen", "hh-wptheme" ),
		"view_items" => __( "Job anzeigen", "hh-wptheme" ),
		"search_items" => __( "Jobs durchsuchen", "hh-wptheme" ),
		"not_found" => __( "Keine Jobs gefunden", "hh-wptheme" ),
		"not_found_in_trash" => __( "Keine Jobs im Papierkorb gefunden", "hh-wptheme" ),
		"featured_image" => __( "Beitragsbild für Job", "hh-wptheme" ),
		"set_featured_image" => __( "Beitragsbild für Job festlegen", "hh-wptheme" ),
		"remove_featured_image" => __( "Beitragsbild entfernen", "hh-wptheme" ),
		"name_admin_bar" => __( "Job", "hh-wptheme" ),
		"item_published" => __( "Job veröffentlicht", "hh-wptheme" ),
		"item_updated" => __( "Job aktualisiert", "hh-wptheme" ),
	];

	$args = [
		"label" => __( "Jobs", "hh-wptheme" ),
		"labels" => $labels,
		"description" => "Dieser Post Type verwaltet die Jobs für Helfen helfen Schweiz",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "partner",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array('slug' => 'jobs', 'with_front' => false),
		"query_var" => true,
		"menu_icon" => "dashicons-building",
		"supports" => [ "title", "custom-fields", "revisions", "author" ],
	];

	register_post_type( "hh_jobs", $args );

	/**
	 * Post Type: Presse
	 */

	$labels = [
		"name" => __( "Presse", "hh-wptheme" ),
		"singular_name" => __( "Presse", "hh-wptheme" ),
		"menu_name" => __( "Presse", "hh-wptheme" ),
		"all_items" => __( "Alle Presse Einträge", "hh-wptheme" ),
		"add_new_item" => __( "Neuer Presse Eintrag hinzufügen", "hh-wptheme" ),
		"edit_item" => __( "Presse Beitrag bearbeiten", "hh-wptheme" ),
		"new_item" => __( "Presse Beitrag hinzufügen", "hh-wptheme" ),
		"view_item" => __( "Presse Beitrag anzeigen", "hh-wptheme" ),
		"view_items" => __( "Presse Beitrag anzeigen", "hh-wptheme" ),
		"search_items" => __( "Presse Beiträge durchsuchen", "hh-wptheme" ),
		"not_found" => __( "Keine Presse Beiträge gefunden", "hh-wptheme" ),
		"not_found_in_trash" => __( "Keine Presse Beiträge im Papierkorb gefunden", "hh-wptheme" ),
		"featured_image" => __( "Beitragsbild für Presse", "hh-wptheme" ),
		"set_featured_image" => __( "Beitragsbild für ParPressetner festlegen", "hh-wptheme" ),
		"remove_featured_image" => __( "Beitragsbild entfernen", "hh-wptheme" ),
		"name_admin_bar" => __( "Presse", "hh-wptheme" ),
		"item_published" => __( "Presse Beitrag veröffentlicht", "hh-wptheme" ),
		"item_updated" => __( "Presse Beitrag aktualisiert", "hh-wptheme" ),
	];

	$args = [
		"label" => __( "PartPressener", "hh-wptheme" ),
		"labels" => $labels,
		"description" => "Dieser Post Type verwaltet die Presse Beiträge für Helfen helfen Schweiz",
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
		"menu_icon" => "dashicons-megaphone",
		"supports" => [ "title", "custom-fields", "revisions", "author" ],
	];

	register_post_type( "hh_presse", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );


function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Kurskategorien.
	 */

	$labels = [
		"name" => __( "Mitstreiter-Kategorien", "hh-wptheme" ),
		"singular_name" => __( "Mitstreiter-Kategorie", "hh-wptheme" ),
		"menu_name" => __( "Kategorien", "hh-wptheme" ),
		"all_items" => __( "Alle Mitstreiter-Kategorien", "hh-wptheme" ),
		"edit_item" => __( "Mitstreiter-Kategorie bearbeiten", "hh-wptheme" ),
		"view_item" => __( "Mitstreiter-Kategorie ansehen", "hh-wptheme" ),
		"add_new_item" => __( "Neue Mitstreiter-Kategorie", "hh-wptheme" ),
		"search_items" => __( "Mitstreiter-Kategorien suchen", "hh-wptheme" ),
		"not_found" => __( "Keine Mitstreiter-Kategorien gefunden", "hh-wptheme" ),
	];

	$args = [
		"label" => __( "Mitstreiter-Kategorien", "hh-wptheme" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'mitstreiter-kategorie', 'with_front' => false, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "hh_mitstreiterkategorien",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
	];
	register_taxonomy( "hh_mitstreiterkategorien", [ "hh_mitstreiter" ], $args );

	/**
	 * Taxonomy: Partnerkategorien.
	 */

	 $labels = [
		"name" => __( "Partner-Kategorien", "hh-wptheme" ),
		"singular_name" => __( "Partner-Kategorie", "hh-wptheme" ),
		"menu_name" => __( "Kategorien", "hh-wptheme" ),
		"all_items" => __( "Alle Partner-Kategorien", "hh-wptheme" ),
		"edit_item" => __( "Partner-Kategorie bearbeiten", "hh-wptheme" ),
		"view_item" => __( "Partner-Kategorie ansehen", "hh-wptheme" ),
		"add_new_item" => __( "Neue Partner-Kategorie", "hh-wptheme" ),
		"search_items" => __( "Partner-Kategorien suchen", "hh-wptheme" ),
		"not_found" => __( "Keine Partner-Kategorien gefunden", "hh-wptheme" ),
	];

	$args = [
		"label" => __( "Partner-Kategorien", "hh-wptheme" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'partner-kategorie', 'with_front' => false, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "hh_partnerkategorien",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
	];
	register_taxonomy( "hh_partnerkategorien", [ "hh_partner" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );