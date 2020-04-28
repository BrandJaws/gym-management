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
    .sass('resources/sass/app.scss', 'public/css');

// copy images folder into laravel public folder
mix.copyDirectory('resources/demo1/src/assets/media', 'public/assets/media');

/**
 * plugins specific issue workaround for webpack
 * @see https://github.com/morrisjs/morris.js/issues/697
 * @see https://stackoverflow.com/questions/33998262/jquery-ui-and-webpack-how-to-manage-it-into-module
 */
mix.webpackConfig({
    mode:'development',
    resolve: {
        extensions: ['.js', '.vue', '.json'],
        alias: {
            'morris.js': 'morris.js/morris.js',
            'jquery-ui': 'jquery-ui',
            '@': path.resolve(__dirname, 'resources/js/')
        },
    },
});


/*mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');*/
mix.js('resources/js/main.js', 'public/js')
//.sass('resources/assets/sass/app.scss', 'public/css')
//.styles(['resources/assets/css/main-style.css'], 'public/build/css/main-style.css');
