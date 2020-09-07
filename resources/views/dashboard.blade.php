@extends('layouts.app')

@section('title', '| Dashboard')
@section('sidebar_dashboard', 'active')

@section('content')
    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->

                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <!--[ card-dash ] start-->
                                <div class="col-md-4 col-xl-4">
                                    <div class="card shadow-sm">
                                        <div class="card-block customer-visitor">
                                            <h2 class="text-right mt-2 f-w-300">Próximo</h2>
                                            <span class="text-right d-block h5">{{ $nextDate }}</span>
                                            <i class="material-icons text-c-blue">today</i>
                                        </div>
                                    </div>
                                </div>
                                <!--[ card-dash ] end-->
                                <!--[ card-dash ] start-->
                                <div class="col-md-4 col-xl-4">
                                    <div class="card shadow-sm">
                                        <div class="card-block customer-visitor">
                                            <h2 class="text-right mt-2 f-w-300">{{ $confirmed }}</h2>
                                            <span class="text-right d-block h5">Marcados</span>
                                            <i class="material-icons text-c-blue">event_available</i>
                                        </div>
                                    </div>
                                </div>
                                <!--[ card-dash ] end-->
                                <!--[ card-dash ] start-->
                                <div class="col-md-4 col-xl-4">
                                    <div class="card shadow-sm">
                                        <div class="card-block customer-visitor">
                                            <h2 class="text-right mt-2 f-w-300">{{ $ended }}</h2>
                                            <span class="text-right d-block h5">Terminados</span>
                                            <i class="material-icons text-c-blue">schedule</i>
                                        </div>
                                    </div>
                                </div>
                                <!--[ card-dash ] end-->
                                <div class="dash-items-row">
                                    <!--[ last-appointments ] start-->
                                    <div class="col-xl-8 col-md-12">
                                        <div class="card User-Activity dash-items-col">
                                            <div class="card-header">
                                                <h5>Próximos Atendimentos</h5>
                                            </div>
                                            <div class="card-block pb-0">
                                                @if ($appointments->isNotEmpty())
                                                    <div class="table-responsive">
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="2">{{ $user->type === 'patient' ? 'Médico' : 'Paciente' }}</th>
                                                                    <th>Data</th>
                                                                    <th>Status</th>
                                                                    <th class="text-right"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($appointments as $appointment)
                                                                    <tr onclick="location.href='{{ route('appointments.show', $appointment->id) }}'" style="cursor: pointer;">
                                                                        <td style="width: 70px;">
                                                                            <img
                                                                                class="m-r-10 rounded-circle"
                                                                                style="width:40px;"
                                                                                src="{{ asset('img/pictures/' . ($user->type === 'patient' ? $appointment->doctor->image : $appointment->patient->image)) }}"
                                                                                alt="doctor-image"
                                                                            >
                                                                        </td>
                                                                        <td>
                                                                            <h6 class="m-0">
                                                                                {{
                                                                                    $user->type === 'patient'
                                                                                        ? $appointment->doctor->name
                                                                                        : $appointment->patient->name
                                                                                }}
                                                                            </h6>
                                                                        </td>
                                                                        <td>
                                                                            <h6 class="m-0">{{ $appointment->start_date->format('d/m H:i') }}</h6>
                                                                        </td>
                                                                        <td>
                                                                            <h6 class="m-0 text-c-{{ $appointment->color }}">{{ $appointment->present()->status }}</h6>
                                                                        </td>
                                                                        <td class="text-right"><i class="fas fa-circle text-c-{{ $appointment->color }} f-10"></i></td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @else
                                                    <p>Sem agendamentos</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!--[ last-appointments ] end-->
                                    <!--[ last-consults ] start-->
                                    <div class="col-xl-4 col-md-12">
                                        <div class="card User-Activity dash-items-col">
                                            <div class="card-header">
                                                <h5>Últimas Consultas</h5>
                                            </div>
                                            <div class="card-block pb-0">
                                                @if ($endedAppointments->isNotEmpty())
                                                    <div class="table-responsive">
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="2">{{ $user->type === 'patient' ? 'Médico' : 'Paciente' }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($endedAppointments as $endedAppointment)
                                                                    <tr>
                                                                        <td style="width: 70px;">
                                                                            <img
                                                                                class="m-r-10 rounded-circle"
                                                                                style="width:40px;"
                                                                                src="{{ asset('img/pictures/' . ($user->type === 'patient' ? $endedAppointment->doctor->image : $endedAppointment->patient->image)) }}"
                                                                                alt="doctor-image"
                                                                            >
                                                                        </td>
                                                                        <td>
                                                                            <h6 class="m-0">
                                                                                {{
                                                                                    $user->type === 'patient'
                                                                                        ? $endedAppointment->doctor->name
                                                                                        : $endedAppointment->patient->name
                                                                                }}
                                                                            </h6>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @else
                                                    <p>Sem consultas</p>
                                                @endif
                                                @if ($user->type === 'patient')
                                                    <a href="{{ route('appointments.index') }}" class="btn btn-outline-primary" style="width: 100%; margin-bottom: 20px;">
                                                        <i class="feather icon-plus-circle"></i>Agendar Consulta
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!--[ last-consults ] end-->
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
