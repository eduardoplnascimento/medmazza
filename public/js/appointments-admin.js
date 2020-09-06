document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        height: '100%',
        expandRows: true,
        locale: 'pt-br',
        initialView: 'timeGridWeek',
        events: "/appointments/load-all",
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

    var html = `
        <table id="tb-patients" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
    `;
    apiResponse.forEach(patient => {
        html += `
            <tr>
                <td style="width: 60px;">
                    <img
                        class="rounded-circle"
                        style="width:40px;"
                        src="/img/pictures/${patient.image}"
                        alt="patient-image"
                    >
                </td>
                <td><h5>${patient.name}</h5></td>
                <td>
                    <button class="btn btn-icon btn-outline-primary" onclick="setAppointment('${date}', ${doctorId}, '${doctorName}', ${patient.id}, '${patient.name}')">
                        <i class="feather icon-play"></i>
                    </button>
                </td>
            </tr>
        `;
    });
    html += `
            </tbody>
        </table>
    `;

    Swal.fire({
        title: `Pacientes disponíveis:`,
        html: html,
        width: '80%',
        showConfirmButton: false,
        showCloseButton: true
    });

    $('#tb-patients').DataTable();
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
