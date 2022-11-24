<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    
    <link href="{{ asset('build/assets/mosaic/css/vendors/flatpickr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('build/assets/mosaic/css/style_main.css') }}" rel="stylesheet">

    
    @vite(
        'resources/css/app.css',
        'resources/js/app.js',
        )


</head>
<body
    class="font-inter antialiased bg-slate-100 text-slate-600"
    :class="{ 'sidebar-expanded': sidebarExpanded }"
    x-data="{ sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true' }"
    x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))"
>
    <div>
        @yield('content')
    </div>

    <script src="{{ asset('build/assets/mosaic/js/vendors/alpinejs.min.js') }}"></script>
    <script src="{{ asset('build/assets/mosaic/js/vendors/chart.js') }}"></script>
    <script src="{{ asset('build/assets/mosaic/js/vendors/moment.js') }}"></script>
    <script src="{{ asset('build/assets/mosaic/js/vendors/chartjs-adapter-moment.js') }}"></script>
    <script src="{{ asset('build/assets/mosaic/js/dashboard-charts.js') }}"></script>
    <script src="{{ asset('build/assets/mosaic/js/vendors/flatpickr.js') }}"></script>
    <script src="{{ asset('build/assets/mosaic/js/flatpickr-init.js') }}"></script>


</body>
</html>