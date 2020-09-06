@extends('layouts.app')

@section('title', '| Administrador')
@section('sidebar_admins', 'active')

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
                                        <h5 class="m-b-10">Administrador</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('admins.index') }}">Administradores</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Administrador</a></li>
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
                                            <h5>{{ $admin->name }}</h5>
                                        </div>
                                        <div class="card-block pb-0">
                                            <div class="text-center m-b-30">
                                                <div class="bg-c-blue config-avatar shadow-3" style="cursor: auto;">
                                                    <img src='{{ asset('img/pictures/' . $admin->image) }}'>
                                                </div>
                                                <div class="controls" style="display: none;">
                                                    <input type="file" name="image"/>
                                                </div>
                                                <h5>{{ $admin->name }}</h5>
                                                <span>{{ $admin->email }}</span>
                                            </div>
                                            <form action="{{ route('admins.destroy', $admin->id) }}" method="post" class="mb-3">
                                                {{ csrf_field() }}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class='btn btn-block btn-outline-danger' type='submit'>Remover</button>
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
