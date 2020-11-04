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
    .sass('resources/sass/welcome.scss', 'public/css')
    .sass('resources/sass/horizontal-layout.scss', 'public/css')
    .sass('resources/sass/admin.index.scss', 'public/css')
;

mix.browserSync('http://proyectoidiseno.test/');

if (mix.inProduction())
    mix.version();
