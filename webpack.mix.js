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

 mix.scripts([
         'resources/js/app.js',
         'resources/js/axios.js',
         'resources/js/dom-drag.js',
         'resources/js/vue.js',
         'resources/js/jquery.js'
       ], 'public/dist/js/app.js')
  .sass('resources/sass/app.scss', 'public/dist/css');
