// Assume a 'ctx' providing 'el', 'app', 'locale', 'params', etc.
//
// Try the following shortcodes:
//
//   [pl2010_vue app="demo_02"/]
//   [pl2010_vue app="demo_02" message="Yo!"/]
//
pl2010_vue_init_demo_02 = pl2010_vue_init_demo_02 || (function(ctx) {
	new Vue({
		el: '#'+ctx.el,
		data: {
			greetings: (ctx.params||{}).message || 'Hello there!'
		}
	});
});

/* vim: set ts=2 noexpandtab syntax=javascript: */
