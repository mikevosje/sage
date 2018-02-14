<?php

namespace Wappz\Assets;

/**
 * Get paths for assets
 */
class Json_Manifest {
	private $manifest;

	public function __construct( $manifest_path ) {
		if ( file_exists( $manifest_path ) ) {
			$this->manifest = json_decode( file_get_contents( $manifest_path ), true );

			return $this->manifest;
		}

		$this->manifest = array();

		return $this->manifest;
	}

	public function get() {
		return $this->manifest;
	}

	public function get_path( $key = '', $default = null ) {
		$collection = $this->manifest;
		if ( is_null( $key ) ) {
			return $collection;
		}
		if ( isset( $collection[ $key ] ) ) {
			return $collection[ $key ];
		}
		foreach ( explode( '.', $key ) as $segment ) {
			if ( ! isset( $collection[ $segment ] ) ) {
				return $default;
			}

			$collection = $collection[ $segment ];
		}

		return $collection;
	}
}

function asset_path( $filename ) {
	$dist_path = get_template_directory_uri() . '/dist/';
	$directory = dirname( $filename ) . '/';
	$file      = basename( $filename );
	static $manifest;

	if ( empty( $manifest ) ) {
		$manifest_path = get_template_directory() . '/dist/assets.json';
		$manifest      = new Json_Manifest( $manifest_path );
	}

	if ( array_key_exists( $file, $manifest->get() ) ) {
		return $dist_path . $directory . $manifest->get()[ $file ];
	}

	return $dist_path . $directory . $file;
}

function get_manifest() {
	$manifest_path = __DIR__ . '/../resources/assets/config.json';

	static $manifest;
	isset( $manifest ) || $manifest = new Json_Manifest( $manifest_path );

	return $manifest;
}

function get_config( $config_path ) {
	static $config;
	if ( ! isset( $config[ $config_path ] ) ) {
		$manifest = get_manifest();
		if ( $manifest->get_path( $config_path . '.enabled' ) ) {
			$config[ $config_path ] = $manifest->get_path( $config_path . '.config' );
		}

		if ( ! $config[ $config_path ] ) {
			$config[ $config_path ] = false;
		}
	}

	return $config[ $config_path ];
}

/**
 * Load webfont config from manifest.json
 * @return string | bool
 */
function webfont_loader() {
	$manifest = get_manifest();

	if ( $manifest->get_path( 'webfonts.enabled' ) ) {
		return wp_json_encode( $manifest->get_path( 'webfonts.config' ) );
	}

	return false;
}

/**
 * Get image sizes from manifest file
 * @return array
 */
function get_image_sizes() {
	static $sizes;
	if ( empty( $sizes ) ) {
		$manifest = get_manifest();
		if ( $manifest->get_path( 'custom_image_sizes.enabled' ) ) {
			$sizes = $manifest->get_path( 'custom_image_sizes.config' );

			return $sizes;
		}
	}

	return array();
}

function get_acf_option_pages() {
	static $option_pages;
	if ( empty( $option_pages ) ) {
		$manifest = get_manifest();
		if ( $manifest->get_path( 'acf_options_pages.enabled' ) ) {
			$option_pages = $manifest->get_path( 'acf_options_pages.config' );

			return $option_pages;
		}
	}

	return array();
}

function ajax_enabled() {
	static $enabled;
	if ( empty( $enabled ) ) {
		$manifest = get_manifest();
		$enabled  = $manifest->get_path( 'config.ajax_enabled' );
	}

	return $enabled;
}
