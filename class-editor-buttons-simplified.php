<?php
/*

Copyright 2015 Aki Björklund

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 3, as
published by the Free Software Foundation.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

/**
 * TinyMCE filters for better editor functionality.
 */
class Editor_Buttons_Simplified {

	/**
	 * Hook to TinyMCE filters
	 */
	function __construct() {
		add_filter( 'mce_buttons',          array( $this, 'tinymce_buttons_row_1' ) );
		add_filter( 'mce_buttons_2',        array( $this, 'tinymce_buttons_row_2' ) );
		add_filter( 'tiny_mce_before_init', array( $this, 'tinymce_block_format_mod' ) );
	}

	/**
	 * Remove useless alignment buttons, add formatselect to row 1
	 */
	function tinymce_buttons_row_1( $buttons ) {
		$remove = array( 'strikethrough', 'hr', 'alignleft', 'aligncenter', 'alignright' );
		return array_merge( array( 'formatselect' ), array_diff( $buttons, $remove ) );
	}

	/**
	 * Remove more useless buttons
	 */
	function tinymce_buttons_row_2( $buttons ) {
		$remove = array( 'formatselect', 'underline', 'alignjustify', 'forecolor', 'outdent', 'indent' );
		return array_merge( array( 'strikethrough', 'hr' ), array_diff( $buttons, $remove ) );
	}

	/**
	 * Remove useless heading levels, move pre to bottom.
	 */
	function tinymce_block_format_mod( $settings ) {
		$settings['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4';
		return $settings;
	}
}