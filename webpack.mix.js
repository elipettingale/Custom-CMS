const mix = require('laravel-mix');

mix // Global
    .copy('resources/assets/images/stock', 'public/images/stock')
;

mix // Admin
    .js('resources/assets/js/admin/app.js', 'public/js/admin/app.js')
    .sass('resources/assets/sass/admin/app.scss', 'public/css/admin/app.css')
    .copy('resources/assets/images/admin', 'public/images')
;

mix // Frontend
    .js('resources/assets/js/frontend/app.js', 'public/js/frontend/app.js')
    .sass('resources/assets/sass/frontend/app.scss', 'public/css/frontend/app.css')
    .copy('resources/assets/images/frontend', 'public/images')
;
