let mix = require('laravel-mix');

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

mix.less('resources/assets/less/home.less', 'public/css')
   .less('resources/assets/less/auth.less', 'public/css')
   .less('resources/assets/less/main.less', 'public/css')
   .less('resources/assets/less/welcome.less', 'public/css')
   .less('resources/assets/less/write.less', 'public/css');
