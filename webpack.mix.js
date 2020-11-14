const mix = require('laravel-mix');
/*
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
*/
/*
 |--------------------------------------------------------------------------
 | ADMIN LTE APP
 |--------------------------------------------------------------------------
*/
mix.sass('resources/app/sass/app.scss', 'public/app/css/app.css')
    .styles('resources/app/css/adminlte.css','public/app/css/adminlte.css')
    .scripts([
        'resources/app/js/app.js',
        'resources/app/js/adminlte.js'
    ], 'public/app/js/app.js').version();
mix.copy('resources/app/webfonts', 'public/app/webfonts');
mix.copy('resources/app/img', 'public/app/img');



/*
 |--------------------------------------------------------------------------
 | ADMIN LTE
 |--------------------------------------------------------------------------
*/
mix.styles([
    'resources/admin/css/adminlte.css',
    'resources/admin/css/select2.css',
    'resources/admin/plugins/fontawesome-free/css/all.min.css'
] , 'public/admin/css/admin.css')
    .scripts([
    'resources/admin/plugins/jquery/jquery.min.js',
    'resources/admin/plugins/bootstrap/js/bootstrap.bundle.min.js',
     'resources/admin/js/adminlte.js',
     'resources/admin/js/select2.full.js',
     'resources/admin/js/admin.js',
], 'public/admin/js/admin.js').version();

/*

mix.styles([
    'resources/admin/css/select2.css',
] , 'public/admin/css/admin.css')
    .scripts([
        'resources/admin/plugins/jquery/jquery.min.js',
        'resources/admin/plugins/bootstrap/js/bootstrap.bundle.min.js',
        'resources/admin/js/adminlte.js',
        'resources/admin/js/select2.full.js',
        'resources/admin/js/admin.js'
    ], 'public/admin/js/admin.js').version();

*/
