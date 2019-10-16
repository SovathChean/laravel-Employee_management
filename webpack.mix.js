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
     .sass('resources/sass/app.scss', 'public/css')
     .styles(['resources/css/libs/blog-post.css',
             'resources/css/libs/bootstrap.css',
             'resources/css/libs/font-awesome.css',
             'resources/css/libs/metisMenu.css',
             'resources/css/libs/sb-admin-2.css'
           ],'public/css/libs.css')
      .scripts([
                'resources/js/libs/jquery.js',
                'resources/js/libs/bootstrap.js',
                'resources/js/libs/metisMenu.js',
                'resources/js/libs/sb-admin-2.js',
                'resources/js/libs/scripts.js'
      ],'public/js/libs.js');
