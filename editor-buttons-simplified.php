<?php

/*
Plugin Name: Editor Buttons Simplified
Plugin URI: http://www.gravityforms.com
Description: Makes adjustments to TinyMCE editor buttons to make it more usable and not contain any harmful buttons.
Version: 0.1
Author: Aki Björklund
Author URI: http://akibjorklund.com
*/

add_action( 'admin_init', 'ebs_init' );

function ebs_init() {
	add_filter( 'mce_buttons',          'ebs_tinymce_buttons_row_1' );
	add_filter( 'mce_buttons_2',        'ebs_tinymce_buttons_row_2' );
	add_filter( 'tiny_mce_before_init', 'ebs_tinymce_block_format_mod' );
}

/**
 * Remove useless alignment buttons, add formatselect to row 1
 */
function ebs_tinymce_buttons_row_1( $buttons ) {
	$remove = array( 'strikethrough', 'hr', 'alignleft', 'aligncenter', 'alignright' );
	return array_merge( array( 'formatselect' ), array_diff( $buttons, $remove ) );
}

/**
 * Remove more useless buttons
 */
function ebs_tinymce_buttons_row_2( $buttons ) {
	$remove = array( 'formatselect', 'underline', 'alignjustify', 'forecolor', 'outdent', 'indent' );
	return array_merge( array( 'strikethrough', 'hr' ), array_diff( $buttons, $remove ) );
}

/**
 * Remove useless heading levels, move pre to bottom.
 */
function ebs_tinymce_block_format_mod( $settings ) {
	$settings['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4';
	return $settings;
}