<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\DoctorService;

class DoctorController extends Controller
{
    protected $userModel;
    protected $doctorService;

    public function __construct(DoctorService $doctorService, User $userModel)
    {
        $this->userModel = $userModel;
        $this->doctorService = $doctorService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = $this->userModel
            ->where('type', 'doctor')
            ->with('appointments')
            ->get();

        return response()->json($doctors);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $doctor = $this->userModel
            ->with('appointments')
            ->find($id);

        return response()->json($doctor);
    }
}
