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

mix.react('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');


mix.styles([
    // 'resources/assets/css/libs/bootstrap.css',
    'resources/assets/css/dropzone.min.css',
    'resources/assets/css/libs/font-awesome.css',
    'resources/assets/css/libs/metisMenu.css',
    'resources/assets/css/libs/sb-admin-2.css',
    'resources/assets/css/libs/styles.css'
], 'public/css/libs.css');

mix.styles([
    'resources/assets/css/libs/blog-post.css',
], 'public/css/blog-post.css');


mix.styles([
    'resources/assets/css/libs/bootstrap4.4.1.min.css',
], 'public/css/bootstrap4.4.1.min.css');

mix.styles([
    'resources/assets/css/libs/sidebar.css',
], 'public/css/sidebar.css');


mix.scripts([
    // 'resources/assets/js/libs/bootstrap4.min.js',
    'resources/assets/js/libs/dropzone.min.js',
    // 'resources/assets/js/libs/jquery3.min.js',
    'resources/assets/js/libs/metisMenu.js',
    'resources/assets/js/libs/sb-admin-2.js',
    'resources/assets/js/libs/scripts.js',
    // 'resources/assets/js/libs/popper.min.js'
], 'public/js/libs.js');

mix.scripts([
    'resources/assets/js/libs/sidebar.js'
],'public/js/sidebar.js');

mix.scripts([
    'resources/assets/js/libs/bootstrap.js',
    'resources/assets/js/libs/jquery.js',
],'public/js/old.js');

mix.scripts([
    'resources/assets/js/libs/bootstrap4.min.js',
    'resources/assets/js/libs/jquery3.min.js',
    'resources/assets/js/libs/popper.min.js'
],'public/js/new.js');
