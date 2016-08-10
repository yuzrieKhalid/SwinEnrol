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
    const fontAwesomePath = './node_modules/font-awesome/';
    const bootstrapPath = './node_modules/bootstrap-sass/assets/';
    const jQueryPath = './node_modules/jquery/dist/';

    const datepickerPath = './node_modules/bootstrap-datepicker/dist/';
    const touchspinPath = './node_modules/bootstrap-touchspin/dist/';

    mix.sass([
        'app.scss',
        datepickerPath + 'css/bootstrap-datepicker.css',
        touchspinPath + 'jquery.bootstrap-touchspin.css'
    ], 'public/css/app.css');

    mix.babel([
        'app.js',
        jQueryPath + 'jquery.js',
        bootstrapPath + 'javascripts/bootstrap.js',
        datepickerPath + 'js/bootstrap-datepicker.js',
        touchspinPath + 'jquery.bootstrap-touchspin.js'
    ], 'public/js/app.js');

    mix.copy(bootstrapPath + 'fonts/**', 'public/fonts');
    mix.copy(fontAwesomePath + 'fonts/**', 'public/fonts/fontawesome');

});
