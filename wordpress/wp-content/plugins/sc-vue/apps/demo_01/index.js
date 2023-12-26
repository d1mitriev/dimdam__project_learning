// Assume a 'ctx' providing 'el', 'app', 'locale', 'params', etc.
//
// Try the following shortcode:
//
//   [pl2010_vue app="demo_01"/]
//
pl2010_vue_init_demo_01 = pl2010_vue_init_demo_01 || (function(ctx) {
	new Vue({
		el: '#'+ctx.el,
		data: {
			people: [
				{
					name: 'Edna Eckert',
					title: 'Arts Supervisor',
					email: 'edna.eckert@foo.example.com'
				},
				{
					name: 'Greg Gibson',
					title: 'Product Manager',
					email: 'greg.gibson@bar.example.com'
				}
			]
		}
	});
});

/* vim: set ts=2 noexpandtab syntax=javascript: */
