<?php

namespace Wappz\Posttypes;

use Wappz\Assets;

function get_post_types() {
	static $post_types;
	if ( empty( $post_types ) ) {
		$manifest = Assets\get_manifest();
		if ( $manifest->get_path( 'custom_post_types.enabled' ) ) {
			return $manifest->get_path( 'custom_post_types.config' );
		}
	}

	return [];
}

function register_post_types() {
	$post_types = get_post_types();
	if ( ! empty( $post_types ) ) {
		foreach ( $post_types as $post_type_id => $configuration ) {
			register_post_type( $post_type_id, $configuration );
		}
	}
}

function get_taxonomies() {
	static $taxonomies;
	if ( empty( $taxonomies ) ) {
		$manifest = Assets\get_manifest();
		if ( $manifest->get_path( 'taxonomies.enabled' ) ) {
			return $manifest->get_path( 'taxonomies.config' );
		}
	}

	return [];
}

function register_taxonomies() {
	$taxonomies = get_post_types();
	if ( ! empty( $taxonomies ) ) {
		foreach ( $taxonomies as $taxonomy_id => $configuration ) {
			$supported_post_types = $configuration['post_types'];
			unset( $configuration['post_types'] );

			register_taxonomy( $taxonomy_id, $supported_post_types, $configuration );
		}
	}
}

add_action( 'init', __NAMESPACE__ . '\\register_post_types' );
