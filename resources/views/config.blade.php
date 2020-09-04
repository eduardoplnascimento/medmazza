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
                                            <div class="bg-c-blue config-avatar shadow-3">
                                                <img src='{{ asset('img/pictures/' . $user->image) }}'>
                                            </div>
                                            <form class="link-form" action='{{ route('users.update', $user->id) }}' method='POST'>
                                                {{ csrf_field() }}
                                                <input name="_method" type="hidden" value="PUT">
                                                <input id='user-name' class='form-control' type='text' name='name' placeholder="Nome" value='{{ $user->name }}'>
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
    <!-- [ Main Content ] end -->
@endsection
