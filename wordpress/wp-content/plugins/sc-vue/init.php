<?php
/**
 * Plugin Name: Shortcode for Vue.js
 * Description: Injection of Vue.js based application via shortcode.
 * Version: 1.0
 * Author: Patrick Lai
 * @copyright Copyright (c) 2019,2020 Patrick Lai
 */

//--------------------------------------------------------------
/**
 * Shortcode [pl2010_vue] for Vue.js integration.
 *
 * Attributes:
 *   app - Name for the Vue.js integration app (required).
 *
 * Other attributes are treated as parameters for the integration app.
 *
 * The 'app' attribute refers to the same named directory under the 'apps'
 * directory of this plugin. Two files are expected there, namely index.html
 * and index.js. For example, [pl2010_vue app="demo_01"/] corresponds to
 * '.../apps/demo_01/index.html' and '.../apps/demo_01/index.js'.
 *
 * The index.html contains HTML to be wrapped by the <div> mount point
 * of the Vue.js application. For the 'demo_01' app, this shortcode would
 * return something like this:
 *
 *   <div class="pl2010_vue pl2010_vue_app_demo_01">
 *     ...
 *     content from .../apps/demo_01/index.html
 *     ...
 *   </div>
 *
 * The shortcode also enqueues the 'index.js' script file, which should
 * assign an initialization function to the variable pl2010_vue_init_<app>,
 * (pl2010_vue_init_demo_01 in our example). The shortcode generates
 * Javascript code to call this function with an object with these
 * properties:
 *
 *   app - Application name, i.e. the 'app' attribute given to the shortcode.
 *   params - Parameters for the Vue.js application.
 *   el - The 'el' property for Vue object.
 *   siteurl - WordPress site URL.
 *   locale - Current locale (c.f. {@link get_locale()}).
 *
 * The function may assume the availability of jQuery, Vue, and
 * wpApiSettings.
 */
add_shortcode('pl2010_vue', function($attrs, $content=null, $tag='pl2010_vue') {
	$HERE = plugin_dir_path(__FILE__);
	$BASE = plugin_dir_url(__FILE__);

	// Enqueue dependent Vue.js etc.
	// Note that 'wp-api' is enqueued because Vue.js application typically
	// makes API call.
	// TODO: configurable?
	wp_enqueue_script('wp-api');
	wp_enqueue_script('jquery');
	wp_enqueue_script('vue', "{$BASE}js/vue-2.6.11.min.js", [], null);

	// Classes for error messages.
	$errorClasses = 'error pl2010_vue_error';

	// App name is required. It must be like a Javascript identifier.
	$app = empty($attrs['app']) ? '' : $attrs['app'];
	if ($app == '') {
		return "<div class=\"$errorClasses\">"
			. "Missing 'app' attribute in shortcode '$tag'."
			. '</div>';
	}
	if (!preg_match('%^[[:alpha:]][_[:alpha:][:digit:]]*$%', $app)) {
		return "<div class=\"$errorClasses\">"
			. "Invalid 'app' attribute in shortcode '$tag'."
			. '</div>';
	}

	// Classes for Vue.js <div> mount point.
	$mntPtClasses = "pl2010_vue pl2010_vue_app_{$app}";

	// Allocate a sequence # for building ID for the Vue.js <div> mount point.
	static $LAST_SEQ;
	++$LAST_SEQ;

	// Parameters are provided as shortcode attributes. Separate
	// generic attributes from parameters.
	$params = $attrs;
	$attrs = array_map('trim', shortcode_atts([
		'app' => $app,
	], $attrs, $tag));
	$params = array_diff_key($params, $attrs);

	// Prepare context for Vue initialization.
	$vue_ctx = [
		'app' => $app,
		'params' => $params,
		'el' => "pl2010_vue_{$LAST_SEQ}",
		'siteurl' => get_option('siteurl', ''),
		'locale' => get_locale(),
	];

	// Use an empty script as an anchor for in-line addition.
	// The dependency (on jquery etc.) is for the init JS script as well.
	$initAnchor = "pl2010_vue_init";
	wp_enqueue_script($initAnchor, "{$BASE}js/empty.js", [
		'jquery',
		'vue',
		'wp-api',
	], null);

	// Enqueue init JS, using file mtime as version.
	$initPath = "apps/{$app}/index.js";
	$initName = $initFVar = "pl2010_vue_init_{$app}";
	wp_enqueue_script($initName, $BASE.$initPath, [
		$initAnchor,
	], filemtime($HERE.$initPath));

	// Add JS to call init function, which has access to a local
	// 'vue_ctx' variable that mirrors the PHP $vue_ctx.
	$jsVueCtx = json_encode($vue_ctx);
	$inlineJs = <<<EOS
		var $initFVar;
		jQuery(document).ready(function() {
			const init = window.$initFVar || $initFVar;
			if (init) {
				init($jsVueCtx);
			}
		});
EOS;
	wp_add_inline_script($initAnchor, $inlineJs);

	// Load HTML fragment and render the Vue.js application <div>.
	$html = file_get_contents("{$HERE}/apps/{$app}/index.html");
	return "<div id=\"{$vue_ctx['el']}\" class=\"{$mntPtClasses}\">$html</div>";
});

//--------------------------------------------------------------
// vim: set ts=4 noexpandtab fdm=marker syntax=php: ('zR' to unfold all)
