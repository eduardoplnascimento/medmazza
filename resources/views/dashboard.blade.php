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
                                            <span class="text-right d-block h5">04/08 - 14:30</span>
                                            <i class="material-icons text-c-blue">today</i>
                                        </div>
                                    </div>
                                </div>
                                <!--[ card-dash ] end-->
                                <!--[ card-dash ] start-->
                                <div class="col-md-4 col-xl-4">
                                    <div class="card shadow-sm">
                                        <div class="card-block customer-visitor">
                                            <h2 class="text-right mt-2 f-w-300">0</h2>
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
                                            <h2 class="text-right mt-2 f-w-300">0</h2>
                                            <span class="text-right d-block h5">Terminados</span>
                                            <i class="material-icons text-c-blue">schedule</i>
                                        </div>
                                    </div>
                                </div>
                                <!--[ card-dash ] end-->
                                <div class="dash-items-row">
                                    <!--[ last-activities ] start-->
                                    <div class="col-xl-8 col-md-12">
                                        <div class="card User-Activity dash-items-col">
                                            <div class="card-header">
                                                <h5>Próximos Atendimentos</h5>
                                            </div>
                                            <div class="card-block pb-0">
                                                @if (true)
                                                    <div class="table-responsive">
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="2">Médico</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @for ($i=1; $i<4; $i++)
                                                                    <tr onclick="location.href='{{ route('users.edit', $user->id) }}'" style="cursor: pointer;">
                                                                        <td style="width: 70px;">
                                                                            <img class="m-r-10" style="width:40px;" src="{{ asset('img/pictures/' . $i . '.jpg') }}" alt="doctor-image">
                                                                        </td>
                                                                        <td>
                                                                            <h6 class="m-0">{{ $user->name }}</h6>
                                                                        </td>
                                                                        <td>
                                                                            <h6 class="m-0 text-c-yellow">Pendente</h6>
                                                                        </td>
                                                                    </tr>
                                                                @endfor
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @else
                                                    <p>Sem agendamentos</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!--[ last-activities ] end-->
                                    <!--[ last-courses ] start-->
                                    <div class="col-xl-4 col-md-12">
                                        <div class="card User-Activity dash-items-col">
                                            <div class="card-header">
                                                <h5>Últimas Consultas</h5>
                                            </div>
                                            <div class="card-block pb-0">
                                                @if (true)
                                                    <div class="table-responsive">
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="2">Médico</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @for ($i=1; $i<4; $i++)
                                                                    <tr onclick="location.href='{{ route('users.edit', $user->id) }}'" style="cursor: pointer;">
                                                                        <td style="width: 70px;">
                                                                            <img class="m-r-10" style="width:40px;" src="{{ asset('img/pictures/' . $i . '.jpg') }}" alt="doctor-image">
                                                                        </td>
                                                                        <td>
                                                                            <h6 class="m-0">{{ $user->name }}</h6>
                                                                        </td>
                                                                    </tr>
                                                                @endfor
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @else
                                                    <p>Sem consultas</p>
                                                @endif
                                                <button type="button" class="btn btn-outline-primary" style="width: 100%; margin-bottom: 20px;"><i class="feather icon-plus-circle"></i>Agendar Consulta</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--[ last-courses ] end-->
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
