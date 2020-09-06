<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Services\PatientService;

class PatientController extends Controller
{
    protected $userModel;
    protected $patientService;

    public function __construct(PatientService $patientService, User $userModel)
    {
        $this->userModel = $userModel;
        $this->patientService = $patientService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $patients = User::where('type', 'patient')->get();

        return view('patients', compact('user', 'patients'));
    }

    public function getAvailableByDate(Request $request)
    {
        $serviceResponse = $this->patientService->getAvailableByDate(
            $request->date
        );

        if (!$serviceResponse->success) {
            return response()->json($serviceResponse->errors);
        }

        return response()->json($serviceResponse->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $user = auth()->user();

        $patient = $this->userModel->find($id);

        return view('patient', compact('user', 'patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
