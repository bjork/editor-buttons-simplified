<?php
/*
Plugin Name: Editor Buttons Simplified
Plugin URI: http://akibjorklund.com/2015/editor-buttons-simplified
Description: Makes adjustments to TinyMCE editor buttons to make it more usable and not contain any harmful buttons.
Version: 0.2
Author: Aki Björklund
Author URI: http://akibjorklund.com
*/

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

require_once 'class/class-editor-buttons-simplified.php';

add_action( 'admin_init', function () {
	new Editor_Buttons_Simplified( plugins_url( '', __FILE__ ) );
} );