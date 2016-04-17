// add jQuery [https://laravel-news.com/2015/10/setup-bootstrap-sass-with-laravel-elixir/]
window.$ = window.jQuery = require('jquery')
require('bootstrap-sass');

$( document ).ready(function() {
    console.log($.fn.tooltip.Constructor.VERSION);
});

//# sourceMappingURL=app.js.map
