const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/assets/js/compiled.min.js')
    .vue()
    .version()
    .webpackConfig({experiments: {topLevelAwait: true}});

mix.js('resources/js/login.js', 'public/assets/js/login.min.js')
    .vue()
    .version()
    .webpackConfig({experiments: {topLevelAwait: true}});
