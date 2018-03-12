const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    //mix.copy('nodule_modules/summernote/dist/summernote.css','public/css/');
    mix.styles([
        'summernote/dist/summernote.css',
        'bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css'
    ], 'public/css/custom.css', 'node_modules');
    mix.sass('app.scss')
        .webpack('app.js');

});