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

mix .setPublicPath('./wp-content/themes/antilope/public')
    .js('wp-content/themes/antilope/resources/js/script.js', 'wp-content/themes/antilope/public/js/')
    .sass('wp-content/themes/antilope/resources/sass/style.scss', 'wp-content/themes/antilope/public/css/')
    .options({
        processCssUrls: false
    })
    .disableSuccessNotifications()
    .browserSync({
        proxy: 'antilope.test',
        notify: false
    })
    .version();
