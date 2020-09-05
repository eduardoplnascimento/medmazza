<?php

namespace App\Http\Services\Params\Appointments;

use App\Http\Services\Params\BaseServiceParams;

class StoreServiceParams extends BaseServiceParams
{
    public $patient_id;
    public $doctor_id;
    public $start_date;
    public $end_date;
    public $status;
    public $color;

    public function __construct(
        int $patient_id,
        int $doctor_id,
        string $start_date,
        string $end_date,
        string $status = 'pending',
        string $color = 'yellow'
    ) {
        parent::__construct();
    }
}
