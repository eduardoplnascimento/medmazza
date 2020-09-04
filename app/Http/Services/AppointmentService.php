<?php

namespace App\Http\Services;

use Carbon\Carbon;
use App\Models\Appointment;

class AppointmentService
{
    protected $appointmentModel;

    public function __construct(Appointment $appointmentModel)
    {
        $this->appointmentModel = $appointmentModel;
    }

    public function getNextAppointments(?int $limit = null)
    {
        $user = auth()->user();

        $query = $user
            ->appointments()
            ->where('end_date', '>', Carbon::now()->toDateTimeString())
            ->orderBy('start_date');

        if (!is_null($limit)) {
            $query = $query->limit(4);
        }

        return $query->get();
    }

    public function getEndedAppointments(?int $limit = null, bool $isCount = false)
    {
        $user = auth()->user();

        $query = $user
            ->appointments()
            ->where('status', 'confirmed')
            ->where('end_date', '<', Carbon::now()->toDateTimeString())
            ->orderBy('end_date', 'desc');

        if ($isCount) {
            return $query->count();
        }

        if (!is_null($limit)) {
            $query = $query->limit(4);
        }

        return $query->get();
    }

    public function getNextAppointmentDate()
    {
        $user = auth()->user();

        $query = $user
            ->appointments()
            ->where('status', 'confirmed')
            ->orderBy('id', 'desc')
            ->first();

        if (is_null($query)) {
            return '-';
        }

        return $query->start_date->format('d/m H:i');
    }

    public function getConfirmedAppointments(bool $isCount = false)
    {
        $user = auth()->user();

        $query = $user
            ->appointments()
            ->where('status', 'confirmed')
            ->orderBy('start_date', 'desc');

        if ($isCount) {
            return $query->count();
        }

        return $query->get();
    }
}
