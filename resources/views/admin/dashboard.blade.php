@extends('layouts.app')

@section('title', '| Dashboard')
@section('sidebar_dashboard', 'active')

@section('content')
    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card User-Activity">
                                        <div class="card-header">
                                            <h5>Novos Agendamentos</h5>
                                        </div>
                                        <div class="card-block text-center">
                                            <table id="tb-appointments" class="display" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Paciente</th>
                                                        <th>Médico</th>
                                                        <th>Início</th>
                                                        <th>Término</th>
                                                        <th>Confirmar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($appointments as $appointment)
                                                        <tr>
                                                            <td>{{ $appointment->patient->name }}</td>
                                                            <td>{{ $appointment->doctor->name }}</td>
                                                            <td>{{ $appointment->start_date }}</td>
                                                            <td>{{ $appointment->end_date }}</td>
                                                            <td>
                                                                <a href="{{ route('appointments.confirm', $appointment->id) }}" class="btn btn-icon btn-outline-success">
                                                                    <i class="feather icon-check-circle"></i>
                                                                </a>
                                                                <a href="{{ route('appointments.cancel', $appointment->id) }}" class="btn btn-icon btn-outline-danger">
                                                                    <i class="feather icon-slash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
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

    <script src="{{ asset('plugins/datatables/datatables.min.js') }}" defer></script>
    <script>
        $(document).ready(function() {
            $('#tb-appointments').DataTable();
        } );
    </script>
@endsection
