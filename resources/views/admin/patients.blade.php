@extends('layouts.app')

@section('title', '| Pacientes')
@section('sidebar_patients', 'active')

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
                                        <h5 class="m-b-10">Pacientes</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Pacientes</a></li>
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
                                            <h5>Todos os pacientes</h5>
                                            <div class="card-header-right">
                                                <a href="{{ route('patients.create') }}" class="btn btn-icon btn-outline-primary">
                                                    <i class="feather icon-user-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-block text-center">
                                            <table id="tb-patients" class="display" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Imagem</th>
                                                        <th>Nome</th>
                                                        <th>Email</th>
                                                        <th>Editar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($patients as $patient)
                                                        <tr>
                                                            <td style="width: 60px;">
                                                                <img
                                                                    class="rounded-circle"
                                                                    style="width:40px;"
                                                                    src="{{ asset('img/pictures/' . $patient->image) }}"
                                                                    alt="patient-image"
                                                                >
                                                            </td>
                                                            <td>{{ $patient->name }}</td>
                                                            <td>{{ $patient->email }}</td>
                                                            <td>
                                                                <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-icon btn-outline-primary">
                                                                    <i class="feather icon-play"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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
            $('#tb-patients').DataTable();
        } );
    </script>
@endsection
