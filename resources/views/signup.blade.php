<!DOCTYPE html>
<html lang='{{ str_replace('_', '-', app()->getLocale()) }}'>

<head>
    <meta charset='utf-8'>
    <meta name='csrf-token' content='{{ csrf_token() }}'>

    <title>MedMazza | Registrar</title>
    <link rel="icon" href="{{ asset('img/landing/favicon.png') }}">
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
    <div class="auth-wrapper">
        <div class="auth-content subscribe">
            <div class="card">
                <div class="row no-gutters">
                    <div
                        class="col-md-4 col-lg-6 d-none d-md-flex d-lg-flex theme-bg align-items-center justify-content-center">
                        <img src="{{ asset('img/landing/doctors3.png') }}" alt="lock images" class="img-fluid">
                    </div>
                    <div class="col-md-8 col-lg-6">
                        <div class="card-body text-center">
                            <div class="row justify-content-center">
                                <div class="col-sm-10">
                                    <h3 class="mb-4">Registrar</h3>
                                    <form action="{{ route('signup') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="name" placeholder="Nome">
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="email" class="form-control" name="email" placeholder="Email">
                                        </div>
                                        <div class="input-group mb-4">
                                            <input type="password" class="form-control" name="password" placeholder="Senha">
                                        </div>
                                        <div class="input-group mb-4">
                                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confimar senha">
                                        </div>
                                        <button type="submit" class="btn btn-primary shadow-2 mb-4">Registrar</button>
                                    </form>
                                    <p class="mb-0 text-muted">Já tem uma conta? Faça <a href="{{ route('login') }}">
                                            login</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
            title: '{{ session("success") }}'
        })
    </script>
    @endif
    @if (session('error'))
    <script>
        Toast.fire({
            icon: 'error',
            title: '{{ session("error") }}'
        })
    </script>
    @endif
</body>

</html>
