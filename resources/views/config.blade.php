@extends('layouts.app')

@section('title', '| Configuração')
@section('sidebar_config', 'active')

@section('content')
    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">Configuração</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Configuração</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card User-Activity">
                                        <div class="card-header">
                                            <h5>{{ $user->name }}</h5>
                                        </div>
                                        <div class="card-block pb-0">
                                            <form class="link-form" action='{{ route('users.update', $user->id) }}' method='POST' enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="bg-c-blue config-avatar shadow-3">
                                                    <img src='{{ asset('img/pictures/' . $user->image) }}'>
                                                </div>
                                                <div class="controls" style="display: none;">
                                                    <input type="file" name="image"/>
                                                </div>
                                                <input name="_method" type="hidden" value="PUT">
                                                <input id='user-name' class='form-control' type='text' name='name' placeholder="Nome" value='{{ $user->name }}'>
                                                @if ($user->type === 'patient')
                                                    <input class='form-control mt-3' type='text' name='social' placeholder="CPF" value='{{ $user->patient->social_number ?? '' }}'>
                                                    <div class="form-group mt-2">
                                                        <label for="blood-type">Tipo Sanguíneo</label>
                                                        <select class="form-control" id="blood-type" name="blood">
                                                            <option value="{{ $user->patient->blood_type ?? '' }}">{{ $user->patient->blood_type ?? 'Selectionar' }}</option>
                                                            <option value="A+">A+</option>
                                                            <option value="A-">A-</option>
                                                            <option value="B+">B+</option>
                                                            <option value="B-">B-</option>
                                                            <option value="AB+">AB+</option>
                                                            <option value="AB-">AB-</option>
                                                            <option value="O+">O+</option>
                                                            <option value="O-">O-</option>
                                                        </select>
                                                    </div>
                                                @endif
                                                @if ($user->type === 'doctor')
                                                    <input class='form-control mt-3' type='text' name='specialty' placeholder="Especialização" value='{{ $user->doctor->specialty ?? '' }}'>
                                                @endif
                                                <br>
                                                <button class='btn btn-outline-primary' type='submit'>Enviar</button>
                                                <br>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(".config-avatar").click(function(event) {
            var previewImg = $(this).children("img");

            $(this)
                .siblings()
                .children("input")
                .trigger("click");

            $(this)
                .siblings()
                .children("input")
                .change(function() {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        var urll = e.target.result;
                        $(previewImg).attr("src", urll);
                        previewImg.parent().css("background", "transparent");
                        previewImg.show();
                    };
                    reader.readAsDataURL(this.files[0]);
                });
        });
    </script>
    <!-- [ Main Content ] end -->
@endsection
