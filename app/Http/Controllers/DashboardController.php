<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Services\AppointmentService;

class DashboardController extends Controller
{

    protected $appointmentService;

    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }

    public function index()
    {
        $user = auth()->user();

        $nextDate = $this->appointmentService->getNextAppointmentDate();

        $confirmed = $this->appointmentService->getConfirmedAppointments(true);

        $ended = $this->appointmentService->getEndedAppointments(null, true);

        $appointments = $this->appointmentService->getNextAppointments(4);

        $endedAppointments = $this->appointmentService->getEndedAppointments(4);

        return view('dashboard', compact(
            'user',
            'nextDate',
            'confirmed',
            'ended',
            'appointments',
            'endedAppointments'
        ));
    }

    public function config()
    {
        $user = auth()->user();

        return view('config', compact('user'));
    }
}
