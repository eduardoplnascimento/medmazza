<!DOCTYPE html>
<html lang='{{ str_replace('_', '-', app()->getLocale()) }}'>
    <head>
        <meta charset='utf-8'>
        <meta name='csrf-token' content='{{ csrf_token() }}'>

        <title>MedMazza @yield('title')</title>

        <!-- fontawesome icon -->
        <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/fontawesome-all.min.css') }}">
        <!-- material design icon -->
        <link rel="stylesheet" href="{{ asset('fonts/material/material-icons.css') }}">
        <!-- animation css -->
        <link rel="stylesheet" href="{{ asset('plugins/animation/css/animate.min.css') }}">
        <!-- vendor css -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        <div class='content'>
            <!-- [ Pre-loader ] start -->
            <div class="loader-bg">
                <div class="loader-track">
                    <div class="loader-fill"></div>
                </div>
            </div>
            <!-- [ Pre-loader ] End -->
            @include('layouts.sidebar')
            @include('layouts.navbar')
            @yield('content')
        </div>

        <!-- Required Js -->
        <script src="{{ asset('js/vendor-all.min.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/pcoded.min.js') }}"></script>
        <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
        </script>
        @if (session('success'))
        <script>
            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            })
        </script>
        @endif
        @if (session('error'))
            <script>
                Toast.fire({
                    icon: 'error',
                    title: '{{ session('error') }}'
                })
            </script>
        @endif
    </body>
</html>
