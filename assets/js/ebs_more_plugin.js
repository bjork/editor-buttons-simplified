/* global jQuery, getUserSetting, setUserSetting */
( function( $, getUserSetting, setUserSetting ) {
	tinymce.PluginManager.add( 'ebs_more_plugin', function( editor, url ) {

		// Get base url of assets.
		var assets_url = url.replace( 'assets/js', 'assets' );

		// Show or hide extra buttons. Show = '1' to show, '0', to hide.
		function showHide( show ) {
			$('.mce-wp-dfw').nextAll( ':not(#ebs_more)' ).each( function () {
				var that = $(this);
				'0' === show ? that.hide() : that.css( 'display', 'inline-block' );
			} );
		}

		// Define the command that executes when the more button is clicked.
		editor.addCommand( 'ebs_expand', function() {
			var setting = $( '#ebs_more' ).prev().is( ':visible' ) ? '0' : '1';
			setUserSetting( 'ebs_show_more', setting );
			showHide( setting );
		} );

		// On init, toggle buttons by setting.
		editor.on( 'init', function( editor ) {
			var setting = getUserSetting( 'ebs_show_more' );
			// Default to not showing everything.
			if ( '' === setting ) {
				setting = '0';
			}
			showHide( setting );
		} );

		// Add More buttons button to the collection of available buttons.
		editor.addButton( 'ebs_more', {
			id      : 'ebs_more',
			tooltip : 'More buttons',
			image   : assets_url + '/img/dots.png',
			cmd     : 'ebs_expand'
		} );
	} );
} )( jQuery, getUserSetting, setUserSetting );