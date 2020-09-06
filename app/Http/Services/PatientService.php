<?php

namespace App\Http\Services;

use DB;
use Carbon\Carbon;
use App\Models\User;
use App\Http\Services\Responses\ServiceResponse;

class PatientService
{
    protected $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function getAvailableByDate(string $date): ServiceResponse
    {
        try {
            $date = Carbon::parse($date)->toDateTimeString();

            $patients = $this->userModel
                ->where('users.type', 'patient')
                ->whereNotIn('users.id', function ($query) use ($date) {
                    $query->from('appointments')
                        ->select('appointments.patient_id')
                        ->where('appointments.start_date', $date)
                        ->where('status', '!=', 'cancelled');
                })
                ->leftJoin('patients', 'users.id', 'patients.user_id')
                ->get(['users.id', 'users.name', 'users.image', 'patients.blood_type']);
        } catch (\Throwable $th) {
            return new ServiceResponse(
                false,
                'Erro ao buscar pacientes!',
                null,
                $th
            );
        }

        return new ServiceResponse(
            true,
            'Busca por pacientes com sucesso!',
            $patients
        );
    }
}
