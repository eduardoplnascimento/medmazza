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
    <script src="{{ asset('plugins/fullcalendar/main.min.js') }}"></script>
    <script src="{{ asset('plugins/fullcalendar/locales-all.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                height: '100%',
                expandRows: true,
                locale: 'pt-br',
                initialView: 'timeGridWeek',
                events: "{{ route('appointments.load') }}",
                allDaySlot: false,
                slotMinTime: '08:00:00',
                slotMaxTime: '19:00:00',
                slotDuration: '01:00',
                showNonCurrentDates: false,
                hiddenDays: [0, 6],
                businessHours: [
                    {
                        daysOfWeek: [ 1, 2, 3, 4, 5 ],
                        startTime: '08:00',
                        endTime: '13:00'
                    },
                    {
                        daysOfWeek: [ 1, 2, 3, 4, 5 ],
                        startTime: '14:00',
                        endTime: '19:00'
                    }
                ],
                dateClick: function(info) {
                    console.log(info.date.getHours());
                    console.log(info.date.getDay());
                    alert('Date: ' + info.dateStr);
                },
            });
            calendar.render();
        });
    </script>
    <!-- [ Main Content ] end -->
@endsection
