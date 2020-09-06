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

        if ($user->type === 'admin') {
            $appointments = $this->appointmentService->getPendingAppointments();
            $confirmed = $this->appointmentService->getConfirmedAppointments(null, true);
            $ended = $this->appointmentService->getEndedAppointments(null, null, true);

            return view('admin.dashboard', compact('user', 'appointments', 'confirmed', 'ended'));
        }

        $nextDate = $this->appointmentService->getNextAppointmentDate();
        $confirmed = $this->appointmentService->getConfirmedAppointments($user->id, true);
        $ended = $this->appointmentService->getEndedAppointments($user->id, null, true);
        $appointments = $this->appointmentService->getNextAppointments(4);
        $endedAppointments = $this->appointmentService->getEndedAppointments($user->id, 4);

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
