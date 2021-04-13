const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Vue Components
 |--------------------------------------------------------------------------
 |
 */

mix.js('resources/vue/params/params.js', 'public/vue/js').version();
mix.js('resources/vue/main/main.js', 'public/vue/js').version();

/*
 |--------------------------------------------------------------------------
 | ADMIN LTE APP
 |--------------------------------------------------------------------------
*/
mix.sass('resources/app/sass/app.scss', 'public/app/css/app.css')
    .styles(['resources/app/css/adminlte.css',
            'resources/app/css/dataTables.bootstrap4.min.css',
            'resources/app/css/select2.min.css',
            'resources/app/css/datepicker.min.css'],
        'public/app/css/adminlte.css')
    .scripts([
        'resources/app/js/jquery.js',
        'resources/app/js/bootstrap.min.js',
        'resources/app/js/jquery.dataTables.min.js',
        'resources/app/js/dataTables.bootstrap4.min.js',
        'resources/app/js/select2.full.min.js',
        'resources/app/js/datepicker.min.js',
        'resources/app/js/adminlte.js',
        'resources/app/js/chart.2.7.1.min.js',
        'resources/app/js/vue-chartjs.min.js',
        'resources/app/js/app.js'
    ], 'public/app/js/app.js').version();

// mix.copy('resources/app/webfonts', 'public/app/webfonts');
// mix.copy('resources/app/fonts', 'public/app/fonts');
mix.copy('resources/app/img', 'public/app/img');


        // 'resources/app/js/chart.min.js',
        // 'resources/app/js/vue-chartjs.min.js',
/*
 |--------------------------------------------------------------------------
 | ADMIN LTE
 |--------------------------------------------------------------------------
*/
// mix.styles([
//     'resources/admin/css/adminlte.css',
//     'resources/admin/css/select2.css',
//     'resources/admin/plugins/fontawesome-free/css/all.min.css'
// ] , 'public/admin/css/admin.css')
//     .scripts([
//     'resources/admin/plugins/jquery/jquery.min.js',
//     'resources/admin/plugins/bootstrap/js/bootstrap.bundle.min.js',
//      'resources/admin/js/adminlte.js',
//      'resources/admin/js/select2.full.js',
//      'resources/admin/js/admin.js',
// ], 'public/admin/js/admin.js').version();

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
