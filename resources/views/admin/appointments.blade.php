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
                                            <h5>Todos os Agendamentos</h5>
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
        <input id='send_patient' type='hidden' name='patient' value=''>
    </form>
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
                events: "{{ route('appointments.load-all') }}",
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
                dateClick: async function(info) {
                    if (info.date.getHours() === 13) return;
                    const apiUrl = `/doctors/available?date=${info.dateStr}`;
                    const apiResponse = await fetch(apiUrl).then(response => response.json());

                    var html = '<div class="row">';
                    apiResponse.forEach(doctor => {
                        html += `
                            <div class="col-md-6 col-xl-6">
                                <div class="card hover-md" onclick="getPatient('${info.dateStr}', ${doctor.id}, '${doctor.name}')">
                                    <div class="card-block">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-auto">
                                                <img class="img-fluid rounded-circle" style="width:80px;" src="/img/pictures/${doctor.image}" alt="doctor">
                                            </div>
                                            <div class="col">
                                                <h5>${doctor.name}</h5>
                                                <span>${doctor.specialty ?? 'Geral'}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                    });
                    html += '</div>';

                    Swal.fire({
                        title: `Médicos disponíveis:`,
                        html: html,
                        width: '80%',
                        showConfirmButton: false,
                        showCloseButton: true
                    });
                },
            });
            calendar.render();
        });
        async function getPatient(date, doctorId, doctorName) {
            Swal.close();
            const apiUrl = `/patients/available?date=${date}`;
            const apiResponse = await fetch(apiUrl).then(response => response.json());

            var html = '<div class="row">';
            apiResponse.forEach(patient => {
                html += `
                    <div class="col-md-6 col-xl-6">
                        <div class="card hover-md" onclick="setAppointment('${date}', ${doctorId}, '${doctorName}', ${patient.id}, '${patient.name}')">
                            <div class="card-block">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-auto">
                                        <img class="img-fluid rounded-circle" style="width:80px;" src="/img/pictures/${patient.image}" alt="patient">
                                    </div>
                                    <div class="col">
                                        <h5>${patient.name}</h5>
                                        <span>${patient.blood_type ?? '-'}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
            html += '</div>';

            Swal.fire({
                title: `Pacientes disponíveis:`,
                html: html,
                width: '80%',
                showConfirmButton: false,
                showCloseButton: true
            });
        }
        function setAppointment(date, doctorId, doctorName, patientId, patientName) {
            Swal.close();
            Swal.fire({
                title: 'Tem certeza?',
                text: `Agendar consulta com ${doctorName} para ${patientName}?`,
                icon: 'warning',
                showCancelButton: true,
                customClass: {
                    confirmButton: 'btn btn-outline-success',
                    cancelButton: 'btn btn-outline-danger'
                },
                buttonsStyling: false,
                confirmButtonText: 'Sim, pode agendar!',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $('#send_date').val(date);
                    $('#send_doctor').val(doctorId);
                    $('#send_patient').val(patientId);
                    $('#send_form').submit();
                }
            });
        }
    </script>
    <!-- [ Main Content ] end -->
@endsection
