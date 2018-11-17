const { mix } = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();

mix // Admin
    .js(__dirname + '/Resources/assets/admin/js/audit.js', 'js/admin')
;

if (mix.inProduction()) {
    mix.version();
}
