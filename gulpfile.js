var elixir = require('laravel-elixir');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    var fontAwesomePath = 'node_modules/font-awesome';
    var bootstrapPath = 'node_modules/bootstrap-sass/assets';
    var jQueryPath = 'node_modules/jquery/dist';

    mix.sass('app.scss', 'public/css/app.css');
    mix.scripts('app.js', 'public/js/app.js')

    mix.copy(bootstrapPath + '/fonts', 'public/fonts')
    mix.copy(bootstrapPath + '/javascripts/bootstrap.min.js', 'public/js')
    mix.copy(fontAwesomePath + '/css/font-awesome.min.css', 'public/fonts/fontawesome');
    mix.copy(fontAwesomePath + '/fonts', 'public/fonts/fontawesome')


    mix.copy(jQueryPath + '/jquery.min.js', 'public/js');
});
