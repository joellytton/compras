const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ]);

mix.styles([
    'resources/template/dist/css/font.css',
    'resources/template/plugins/fontawesome-free/css/all.min.css',
    'resources/template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
    'resources/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
    'resources/template/plugins/jqvmap/jqvmap.min.css',
    'resources/template/dist/css/adminlte.css',
    'resources/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
    'resources/template/plugins/daterangepicker/daterangepicker.css',
    'resources/template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'
], 'public/css/all.css');

mix.combine([
    'resources/template/plugins/jquery/jquery.min.js',
    'resources/template/plugins/jquery-ui/jquery-ui.min.js',
    'resources/template/plugins/bootstrap/js/bootstrap.bundle.js',
    'resources/template/plugins/chart.js/Chart.min.js',
    'resources/template/plugins/sparklines/sparkline.js',
    'resources/template/plugins/jquery-knob/jquery.knob.min.js',
    'resources/template/plugins/moment/moment.min.js',
    'resources/template/plugins/daterangepicker/daterangepicker.js',
    'resources/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
    'resources/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.js',
    'resources/template/plugins/sweetalert2/sweetalert2.min.js',
    'resources/template/plugins/moment/moment.min.js',
    'resources/template/plugins/inputmask/jquery.inputmask.min.js',
    'resources/template/dist/js/adminlte.js',
    'resources/js/delete.js',
], 'public/js/all.js');

mix.copy('resources/template/dist/img', 'public/img');
mix.copy('resources/template/plugins/fontawesome-free/webfonts', 'public/webfonts');
mix.copy('resources/template/plugins/summernote', 'public/assets/summernote');
mix.copy('resources/template/plugins/select2', 'public/assets/select2');
mix.copy('resources/template/plugins/select2-bootstrap4-theme', 'public/assets/select2-bootstrap4-theme');
mix.copy('resources/template/plugins/plentz-jquery-maskmoney', 'public/assets/plentz-jquery-maskmoney');
mix.copy('resources/template/plugins/datatables', 'public/assets/datatables');
mix.copy('resources/template/plugins/datatables-bs4/', 'public/assets/datatables-bs4');
mix.copy('resources/template/plugins/datatables-responsive', 'public/assets/datatables-responsive');
mix.copy('resources/template/plugins/datatables-buttons', 'public/assets/datatables-buttons');