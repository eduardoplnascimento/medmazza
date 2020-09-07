@extends('layouts.app')

@section('title', '| Agendamento')
@section('sidebar_appointments', 'active')

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
                                        <h5 class="m-b-10">Agendamento</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('appointments.index') }}">Agendamentos</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Agendamento</a></li>
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
                                            <h5>
                                                {{
                                                    $appointment->start_date->format('d/m H:i') .
                                                    ' - ' .
                                                    ($user->type === 'patient'
                                                        ? $appointment->doctor->name
                                                        : $appointment->patient->name)
                                                }}
                                            </h5>
                                        </div>
                                        <div class="card-block text-center">
                                            <div class="text-center m-b-30">
                                                <h5 class="mt-3">
                                                    {{
                                                        $user->type === 'patient'
                                                            ? $appointment->doctor->name
                                                            : $appointment->patient->name
                                                    }}
                                                </h5>
                                                <span class="d-block mb-4">{{ $appointment->present()->status }}</span>
                                                <img
                                                    class="img-fluid rounded-circle"
                                                    style="width: 200px;max-width:100%;"
                                                    src="{{ asset('img/pictures/' . ($user->type === 'patient' ? $appointment->doctor->image : $appointment->patient->image)) }}"
                                                    alt="doctor"
                                                >
                                            </div>
                                            <div class="row m-t-30">
                                                <div class="col-md-6 col-lg-6">
                                                    <h5>{{ $appointment->start_date->format('d/m H:i') }}</h5>
                                                    <span class="text-muted">Data de início</span>
                                                </div>
                                                <div class="col-md-6 col-lg-6">
                                                    <h5>{{ $appointment->end_date->format('d/m H:i') }}</h5>
                                                    <span class="text-muted">Data de término</span>
                                                </div>
                                            </div>
                                            @if ($appointment->status === 'pending')
                                                <div class="designer m-t-30">
                                                    <a
                                                        href="{{ route('appointments.cancel', $appointment->id) }}"
                                                        class="btn btn-danger shadow-2 text-uppercase btn-block"
                                                    >
                                                        Cancelar
                                                    </a>
                                                </div>
                                            @endif
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
