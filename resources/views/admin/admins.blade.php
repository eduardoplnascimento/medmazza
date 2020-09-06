@extends('layouts.app')

@section('title', '| Usuários')
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
                                        <h5 class="m-b-10">Usuários</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Usuários</a></li>
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
                                            <h5>Todos os Usuários</h5>
                                            <div class="card-header-right">
                                                <a href="{{ route('admins.create') }}" class="btn btn-icon btn-outline-primary">
                                                    <i class="feather icon-user-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-block text-center">
                                            <div class="row">
                                                @foreach ($admins as $admin)
                                                    <div class="col-md-6 col-xl-6">
                                                        <div class="card hover-md" onclick="location.href='{{ route('admins.show', $admin->id) }}'">
                                                            <div class="card-block">
                                                                <div class="row align-items-center justify-content-center">
                                                                    <div class="col-auto">
                                                                        <img class="img-fluid rounded-circle" style="width:80px;" src="/img/pictures/{{ $admin->image }}" alt="admin">
                                                                    </div>
                                                                    <div class="col">
                                                                        <h5>{{ $admin->name }}</h5>
                                                                        <span>{{ $admin->email }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
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
