A example app for Vue.js shortcode. This one shows a list of posts,
and its index.js is built using webpack.js.

  $ npm install
  $ npm run build

The init function for the Vue.js is defined in the app.js module.
There is also a style sheet, style.css. The webpack.config.js
script pulls together app.js and style.css, and sets up the init
function in the variable expected by SC-Vue.
