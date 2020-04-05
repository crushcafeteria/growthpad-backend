let mix = require('laravel-mix');


mix.browserSync({
    files: ['app/**', 'resources/**', 'routes/**'],
    proxy: '127.0.0.1:8000'
});
