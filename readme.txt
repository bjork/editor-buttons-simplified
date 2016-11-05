=== Plugin Name ===
Contributors: akibjorklund
Tags: tinymce
Requires at least: 3.9
Tested up to: 4.7
Stable tag: 0.2.2
License: GPLv3

Editor Buttons Simplified is a simple WordPress plugin that makes adjustments to the TinyMCE editor buttons to make it more usable.

== Description ==

The main purpose of the plugin is to start a discussion on how we could improve the editor in WordPress. This plugin is thus a very opinionated one. The button selection is done with reusable content in mind. All buttons that would results in harmful markup are removed.

The plugin also removes the kitchen sink button. Instead, there is an icon with three dots. Pressing that expands the row to contain all the available buttons. This works better with a responsive page than hard coded lines of buttons which in some widths break into four separate lines.

A detailed description of design decisions can be found [on my blog](http://akibjorklund.com/2015/editor-buttons-simplified).

== Installation ==

1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Changelog ==

= 0.2.2 =
* Bump version to test if helps with the compatibility (Tested up to) header.

= 0.2.1 =
* Add support for WordPress 4.7 which does some changes to the toolbar.

= 0.2 =
* Get rid of separate rows of buttons, since they do not work well with a responsive layout. Instead, expand the only row with more buttons.

= 0.1 =
* Initial release