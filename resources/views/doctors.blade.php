@extends('layouts.app')

@section('title', '| Médicos')
@section('sidebar_doctors', 'active')

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
                                        <h5 class="m-b-10">Médicos</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Médicos</a></li>
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
                                            <h5>Todos os médicos</h5>
                                            @if ($user->type === 'admin')
                                                <div class="card-header-right">
                                                    <a href="{{ route('doctors.create') }}" class="btn btn-icon btn-outline-primary">
                                                        <i class="feather icon-plus"></i>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="card-block text-center">
                                            <div class="row">
                                                @foreach ($doctors as $doctor)
                                                    <div class="col-md-6 col-xl-6">
                                                        <div class="card hover-md" onclick="location.href='{{ route('doctors.show', $doctor->id) }}'">
                                                            <div class="card-block">
                                                                <div class="row align-items-center justify-content-center">
                                                                    <div class="col-auto">
                                                                        <img class="img-fluid rounded-circle" style="width:80px;" src="/img/pictures/{{ $doctor->image }}" alt="doctor">
                                                                    </div>
                                                                    <div class="col">
                                                                        <h5>{{ $doctor->name }}</h5>
                                                                        <span>{{ $doctor->doctor->specialty ?? 'Geral' }}</span>
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
