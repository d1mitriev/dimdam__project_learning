// This module exports the SC-Vue initialization function of
// this Vue.js app.
//
export { initVueApp as default };

function sanitizeSize(sz) {
	if (!sz)
		return null;
	if (sz.substring(sz.length-2) == 'px') {
		let px = parseInt(sz.substring(0, sz.length-2));
		// Only accept 90px through 600px.
		return (!isNaN(px) && 90 <= px && px <= 600) ? ''+px+'px' : null;
	}
	if (sz.substring(sz.length-1) == '%') {
		let pc = parseInt(sz.substring(0, sz.length-1));
		// Only accept 10% through 100%.
		return (!isNaN(pc) && 10 <= pc && pc <= 100) ? ''+pc+'%' : null;
	}
	return null;
}

// Assume a 'ctx' providing 'el', 'app', 'locale', 'params', etc.
//
function initVueApp(ctx) {
	let params = ctx.params || {};
	let batch = parseInt(params.pgsz);
	if (isNaN(batch) || batch <= 0)
		batch = 10;

	const ht = sanitizeSize(params.height);
	const wd = sanitizeSize(params.width);

	const vm = new Vue({
		el: '#'+ctx.el,
		data: {
			// Indicate that posts are being loaded.
			loading: false,
			// Posts collection model from WP API.
			pcollection: null,
			// Posts loaded.
			posts: []
		},
		mounted() {
			wp.api.loadPromise.done(() => {
				const list = document.querySelector('#'+ctx.el+' div.posts-scrollable');
				if (list) {
					// Adjust width/height.
					if (wd)
						jQuery(list).css('width', wd);
					if (ht)
						jQuery(list).css('height', ht);
					// Set up infinite scroll to load more posts.
					list.addEventListener('scroll', () => {
						if (list.scrollTop + list.clientHeight >= list.scrollHeight)
							this.loadMore();
					});
				}
				// Initial load.
				this.pcollection = new wp.api.collections.Posts();
				this.loadMore();
			});
		},
		methods: {
			loadMore() {
				// Not ready or already loading?
				if (!this.pcollection || this.loading)
					return;
				this.loading = true;

				this.pcollection.fetch({
					data: {
						per_page: batch,
						offset: this.posts.length
					},
					success: (coll, resp, opts) => {
						try {
							var n;
							for (n in resp) {
								this.posts.push(resp[n]);
							}
						}
						finally {
							this.loading = false;
						}
					},
					error: (coll, resp, opts) => {
						this.loading = false;
					},
				});
			},
		}
	});
};

/* vim: set ts=2 noexpandtab syntax=javascript: */
