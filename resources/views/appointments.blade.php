@extends('layouts.app')

@section('title', '| Agendamentos')
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
                                        <h5 class="m-b-10">Agendamentos</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Agendamentos</a></li>
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
                                            <h5>Seus Agendamentos</h5>
                                        </div>
                                        <div class="card-block pb-5" style="height: 600px;">
                                            <div id="calendar"></div>
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
    <form id='send_form' action='{{ route('appointments.store') }}' method='POST' style='display:none'>
        {{ csrf_field() }}
        <input id='send_date' type='hidden' name='date' value=''>
        <input id='send_doctor' type='hidden' name='doctor' value=''>
    </form>
    <script src="{{ asset('plugins/fullcalendar/main.min.js') }}"></script>
    <script src="{{ asset('plugins/fullcalendar/locales-all.min.js') }}"></script>
    <script src="{{ asset('js/appointments.js') }}"></script>
    @if ($user->type === 'doctor')
        <script>const canInteract = false;</script>
    @endif
    <!-- [ Main Content ] end -->
@endsection
