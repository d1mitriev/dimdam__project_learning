=== SC-Vue ===
Contributors: scoop082110
Donate link: https://www.paypal.me/scoop082110
Tags: vue
Requires at least: 5.4
Tested up to: 5.7.2
Stable tag: 1.0.1
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Easily inject Vue.js app into WordPress via shortcode.

== Description ==

SC-Vue provides a shortcode to inject [Vue.js](https://vuejs.org/) apps
into WordPress pages and posts. For example, the following shortcode
would inject the 'demo_posts' app:

`
  [pl2010_vue app="demo_posts"/]
`

An app is made up of two files, index.js and index.html. They reside
in a subdirectory bearing the app's name under the 'apps' directory
in the plugin. For the 'demo_posts' app, that means:

* *WP\_PLUGIN\_DIR*/sc-vue/apps/demo_posts/index.js
* *WP\_PLUGIN\_DIR*/sc-vue/apps/demo_posts/index.html

The index.js Javascript file sets up an initialization function for
creating a Vue model. That model controls a &lt;div&gt; DOM element that
SC-Vue renders; the content of that &lt;div&gt; comes from index.html.

See apps/demo_01 and apps/demo_02 for simple examples of index.js
and index.html. For a more complex and realistic example that uses
[webpack.js](https://webpack.js.org/) to packs Javascript and styles
into a single index.js, see apps/demo_posts. Additional details may
be found in the documentation of the shortcode function in init.php.

== Installation ==

1.  Upload the plugin files to the '*WP\_PLUGIN\_DIR*/sc-vue'
    directory, or install the plugin through the 'Plugin's screen in
    WordPress.
1.  Activate the plugin.
1.  Install any additional Vue app in  '*WP\_PLUGIN\_DIR*/sc-vue/apps'.
    Note that app name must be simple identifier that begins with a letter
	followed by any number of digits, letters, and the underscore.
1.  Startg using shortcode `[pl2010_vue app="..."/]`!

== Frequently Asked Questions ==

= Does this work with WordPress version X? =

This plugin is developed on WordPress 5.4. It has not been tried on any
other version.

= Does this work with PHP 5.x? =

This plugin is developed with PHP 7.x. Backporting to PHP 5.x
should not be difficult however.

== Changelog ==

= 1.0 =
* First version published.

== Upgrade Notice ==

None yet.
