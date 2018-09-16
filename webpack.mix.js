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
mix.webpackConfig({
    node: {
        fs: 'empty'
    }
});

mix.js('resources/assets/js/app.js', 'public/js/main')
    .sass('resources/assets/sass/app.scss', 'public/css');

mix.babel([
    'public/js/main/app.js',
],'public/js/app.js');
