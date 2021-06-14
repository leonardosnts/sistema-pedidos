const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);


mix.styles('resources/views/admin/vendor/css/demo.css', 'public/admin/vendor/css/demo.css')

    .styles('resources/views/admin/vendor/css/fonts.min.css', 'public/admin/vendor/css/fonts.min.css')

    .styles([
        'resources/views/admin/vendor/css/bootstrap.min.css',
        'resources/views/admin/vendor/css/atlantis.min.css',
    ],'public/admin/vendor/css/vendor.css')

    .scripts([
        'resources/views/admin/vendor/js/core/jquery.3.2.1.min.js',
        'resources/views/admin/vendor/js/core/popper.min.js',
        'resources/views/admin/vendor/js/core/bootstrap.min.js',
    ], 'public/admin/vendor/js/core.js')

    .scripts([
        'resources/views/admin/vendor/js/plugin/chart.js/chart.min.js',
        'resources/views/admin/vendor/js/plugin/jquery.sparkline/jquery.sparkline.min.js',
        'resources/views/admin/vendor/js/plugin/chart-circle/circles.min.js',
        'resources/views/admin/vendor/js/plugin/datatables/datatables.min.js',
        'resources/views/admin/vendor/js/plugin/bootstrap-notify/bootstrap-notify.min.js',
        'resources/views/admin/vendor/js/plugin/jqvmap/jquery.vmap.min.js',
        'resources/views/admin/vendor/js/plugin/jqvmap/jquery.vmap.min.js',
        'resources/views/admin/vendor/js/plugin/jqvmap/maps/jquery.vmap.world.js',
        'resources/views/admin/vendor/js/plugin/sweetalert/sweetalert.min.js',
    ], 'public/admin/vendor/js/libs.js')

    .scripts([
        'resources/views/admin/vendor/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js',
        'resources/views/admin/vendor/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js',
    ], 'public/admin/vendor/js/jquery-ui.min.js')


    .scripts('resources/views/admin/vendor/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js', 'public/admin/vendor/js/jquery.scrollbar.min.js')
    .scripts('resources/views/admin/vendor/js/plugin/webfont/webfont.min.js', 'public/admin/vendor/js/webfont.min.js')
    .scripts('resources/views/admin/vendor/js/atlantis.min.js', 'public/admin/vendor/js/atlantis.min.js')
    .scripts('resources/views/admin/vendor/js/setting-demo.js', 'public/admin/vendor/js/setting-demo.js')
    .scripts('resources/views/admin/vendor/js/demo.js', 'public/admin/vendor/js/demo.js')

    .copyDirectory('resources/views/admin/vendor/fonts', 'public/admin/vendor/fonts')
    .copyDirectory('resources/views/admin/vendor/img', 'public/admin/vendor/img')

    // Mix Asset LOGIN
    .styles('resources/views/admin/vendor/login/css/style.css', 'public/login/vendor/css/style.css')

    .scripts('resources/views/admin/vendor/login/js/main.js', 'public/login/vendor/js/main.js')
;


