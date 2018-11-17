const mix = require('laravel-mix');

mix // Frontend
    .js('resources/assets/frontend/js/app.js', 'public/js/frontend/app.js')
    .sass('resources/assets/frontend/sass/app.scss', 'public/css/frontend/app.css')
    .copy('resources/assets/frontend/images', 'public/images')
;

mix // Admin
    .js('resources/assets/admin/js/app.js', 'public/js/admin/app.js')
    .sass('resources/assets/admin/sass/app.scss', 'public/css/admin/app.css')
    .copy('resources/assets/admin/images', 'public/images')
;
