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

var paths = {
    'bower' : './resources/assets/bower_components/',
    'js' : './resources/assets/js/',
    'bootstrap_sass' : './resources/assets/bower_components/bootstrap-sass/assets/',
    'fontawesome' : './resources/assets/bower_components/components-font-awesome/'
}



elixir.config.sourcemaps = false;

elixir(function(mix) {
    mix.copy([
        paths.bootstrap_sass+'fonts/bootstrap/*',
        paths.fontawesome+'fonts/fontawesome'
        ], './public/assets/fonts' );

    mix.sass([
        'app.scss',
        paths.fontawesome+'scss'
        ], './public/assets/css/library.css' );

    mix.styles([
        './public/assets/css/line.css'
    ],  './public/assets/css/public.css');

    mix.scripts([
        paths.bower+'jquery/dist/jquery.js', 
        paths.bower+'bootstrap-sass/assets/javascripts/bootstrap.js',
    ], 'public/assets/js/library.js');

    mix.scripts([
        paths.js+'*.js', 
    ], 'public/assets/js/app.js');

});