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

/*
* TODO Verificar si la falta de archivos map.js causa un problema.
* Puede que la falta de estos archivo afecte al funcionamiento de algunos modulos
* de NodeJS que los incluyen.
* */
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/scss/app.scss', 'public/css');
