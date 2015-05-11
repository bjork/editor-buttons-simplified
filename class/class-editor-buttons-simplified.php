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

	protected $plugin_url;

	/**
	 * Hook to TinyMCE filters
	 */
	function __construct( $plugin_url ) {
		$this->plugin_url = $plugin_url;
		add_filter( 'mce_buttons',          array( $this, 'tinymce_buttons' ) );
		add_filter( 'tiny_mce_before_init', array( $this, 'tinymce_block_format_mod' ) );
		add_filter( 'mce_external_plugins', array( $this, 'add_tinymce_plugin' ) );

		// Remove row 2 in case the kitchen sink is on from before.
		add_filter( 'mce_buttons_2', '__return_empty_array' );
	}

	/**
	 * Remove useless buttons, add formatselect
	 */
	function tinymce_buttons( $buttons ) {
		$remove = array( 'alignleft', 'aligncenter', 'alignright', 'wp_adv' );
		$add = array( 'charmap', 'pastetext', 'removeformat', 'undo', 'redo', 'wp_help', 'ebs_more' );
		return array_merge( array( 'formatselect' ), array_diff( $buttons, $remove ), $add );
	}

	/**
	 * Remove useless heading levels.
	 */
	function tinymce_block_format_mod( $settings ) {
		$settings['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4';
		return $settings;
	}

	/**
	 * Description
	 */
	function add_tinymce_plugin() {
		$plugins_array = array( 'ebs_more_plugin' => $this->plugin_url . '/assets/js/ebs_more_plugin.js' );
		return $plugins_array;
	}
}