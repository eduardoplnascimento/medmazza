<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
        $user = auth()->user();
        $doctors = User::where('type', 'doctor')->get();

        return view('doctors', compact('user', 'doctors'));
    }

    public function getAvailableByDate(Request $request)
    {
        $serviceResponse = $this->doctorService->getAvailableByDate(
            $request->date
        );

        if (!$serviceResponse->success) {
            return response()->json($serviceResponse->error);
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

        $doctor = $this->userModel->find($id);

        return view('doctor', compact('user', 'doctor'));
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
