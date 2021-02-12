const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/}));

const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();


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

const tailwindcss = require('tailwindcss')

mix.js('Resources/assets/js/app.js', 'dist/js')
    .sass('Resources/assets/sass/app.scss', 'dist/css')
    .options({
        processCssUrls: false,
        postCss: [ tailwindcss('./tailwind.config.js') ],
    })
    .autoload({
        'jquery': ['$', 'window.jQuery', 'jQuery']
    })
    .copyDirectory('Resources/assets/fonts', '../../public/dist/fonts')
    .copyDirectory('Resources/assets/images', '../../public/dist/images')


if (mix.inProduction()) {
    mix.version();
}
