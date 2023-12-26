const fs = require('fs');
const path = require('path');

const appName = path.basename(__dirname);
const bootVar = 'pl2010_vue_init_' + appName;

// Construct a temporary Javascript file (tmp-wrapper.js) as entry
// for webpack.js. It basically imports the CSS stylesheet and the
// init function for the app, and sets up the init function for
// SC-Vue to find.
//
//   import './style.css';
//   import init from './app.js';
//   window.pl2010_vue_init_demo_posts = init;
//
const wrapper = path.resolve(__dirname, 'tmp-wrapper.js');
fs.writeFileSync(
	wrapper,
	'// This is a generated script.'
		+ "\n" + "import './style.css';"
		+ "\n" + "import init from './app.js';"
		+ "\n" + "window." + bootVar + " = init;"
);

module.exports = (env, argv) => ({
	mode: argv.mode || 'production',
	entry: wrapper,
	output: {
		path: path.resolve(__dirname),
		filename: 'index.js',
	},
	module: {
		rules: [
			{
				test: /\.css$/,
				use: [
					'style-loader',
					'css-loader',
				],
			},
		],
	},
});

// vim: set ts=2 noexpandtab fdm=marker:
