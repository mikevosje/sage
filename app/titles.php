<?php

namespace Wappz\Titles;

/**
 * Page titles
 */
function title() {
	if ( is_home() ) {
		if ( get_option( 'page_for_posts', true ) ) {
			return get_the_title( get_option( 'page_for_posts', true ) );
		}

		return __( 'Latest Posts', 'wecustom' );
	} elseif ( is_archive() ) {
		return post_type_archive_title('', false);
	} elseif ( is_search() ) {
		return sprintf( __( 'Search Results for %s', 'wecustom' ), get_search_query() );
	} elseif ( is_404() ) {
		return __( 'Not Found', 'wecustom' );
	}

	return get_the_title();
}
