/* global jQuery, getUserSetting, setUserSetting, tinymce */
(function( $, getUserSetting, setUserSetting, tinymce ) {
	tinymce.PluginManager.add( 'ebs_more_plugin', function( editor, url ) {

		// Get base url of assets.
		var assets_url = url.replace( 'assets/js', 'assets' );

		var expandButton;

		// Show or hide extra buttons. Show = true to show, false to hide.
		function showHide( show ) {
			$('.mce-wp-dfw').nextAll( ':not(#ebs_more)' ).each( function () {
				var that = $(this);
				show ? that.css( 'display', 'inline-block' ) : that.hide();
			} );
			expandButton.active( show );
			setStateSetting( show );
		}

		function getStateSetting() {
			var setting = getUserSetting( 'ebs_show_more' );
			if ( '' === setting || '0' === setting ) {
				return false;
			}
			return true;
		}

		function setStateSetting( value ) {
			setUserSetting( 'ebs_show_more', value ? '1' : '0' );
		}

		// Define the command that executes when the more button is clicked.
		editor.addCommand( 'ebs_expand', function() {
			showHide( ! getStateSetting() );
		});

		// On init, toggle buttons by setting.
		editor.on( 'init', function( editor ) {
			showHide( getStateSetting() );
		});

		// Add More buttons button to the collection of available buttons.
		editor.addButton( 'ebs_more', {
			id      : 'ebs_more',
			tooltip : 'More buttons',
			image   : assets_url + '/img/dots.png',
			cmd     : 'ebs_expand',
			onPostRender: function () {
				// Store reference to the button.
				expandButton = this;
			}
		});
	});
})( jQuery, getUserSetting, setUserSetting, tinymce );