<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>

    @vite( 'resources/css/mosaic/vendors/flatpickr.min.css')

    @vite( 'resources/css/mosaic/style_main.css')
    
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


    @vite('resources/js/mosaic/vendors/alpinejs.min.js')
    {{-- @vite('resources/js/mosaic/vendors/chart.js') --}}
    {{-- @vite('resources/js/mosaic/vendors/moment.js') --}}
    {{-- @vite('resources/js/mosaic/dashboard-charts.js') --}}
    @vite('resources/js/mosaic/vendors/flatpickr.js')
    @vite('resources/js/mosaic/flatpickr-init.js')



</body>
</html>