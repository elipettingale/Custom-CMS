const { mix } = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();

mix // Admin
    .js(__dirname + '/Resources/assets/admin/js/dashboard.js', 'js/admin')
    .sass(__dirname + '/Resources/assets/admin/sass/dashboard.scss', 'css/admin')
;

if (mix.inProduction()) {
    mix.version();
}
