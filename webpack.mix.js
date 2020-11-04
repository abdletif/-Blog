const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.styles('resources/css/all.min.css','public/css/all.min.css');

mix.styles('resources/css/clean-blog.min.css','public/css/clean-blog.min.css');


mix.js('resources/js/clean-blog.min.js','public/js/clean-blog.min.js');

mix.js('node_modules/jquery/dist/jquery.min.js','public/js/jquery.min.js');

mix.js('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
                                       'public/js/bootstrap.bundle.min.js');
