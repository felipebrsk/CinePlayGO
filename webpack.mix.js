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
mix

.js('resources/js/app.js', 'public/js')
.sass('resources/sass/app.scss', 'public/css')

.styles ([
	"resources/views/assets/css/bootstrap.css",
	"resources/views/assets/css/bootstrap.min.css",
	"resources/views/assets/css/bootstrap-grid.css",
	"resources/views/assets/css/bootstrap-grid.min.css",
	"resources/views/assets/css/bootstrap-reboot.css",
	"resources/views/assets/css/bootstrap-reboot.min.css",
],	"public/assets/css/bootstrap.css")

.styles ('resources/views/assets/css/login.css', 'public/assets/css/login.css')

.postCss("resources/css/main.css", "public/css", [
     require("tailwindcss"),
    ]);