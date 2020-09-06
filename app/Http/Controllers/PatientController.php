<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Services\UserService;
use App\Http\Services\PatientService;

class PatientController extends Controller
{
    protected $userModel;
    protected $userService;
    protected $patientService;

    public function __construct(
        User $userModel,
        UserService $userService,
        PatientService $patientService
    ) {
        $this->userModel = $userModel;
        $this->userService = $userService;
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
        $patients = User::where('type', 'patient')->orderBy('name')->get();

        return view('admin.patients', compact('user', 'patients'));
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
        $user = auth()->user();

        if ($user->type === 'admin') {
            return view('admin.patient-create', compact('user'));
        }

        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        if ($user->type !== 'admin') {
            return redirect(route('patients.index'))->withError('Usuário sem permissões!');
        }

        $storeResponse = $this->userService->store($request, 'patient');

        if (!$storeResponse->success) {
            return redirect(route('patients.index'))->withError('Erro ao criar usuário!');
        }

        return redirect(route('patients.index'))->withSuccess('Usuário criado com sucesso!');
    }

    /**
     * Display and show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $user = auth()->user();

        $patient = $this->userModel->find($id);

        return view('admin.patient', compact('user', 'patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $updateResponse = $this->userService->update($id, $request);

        if (!$updateResponse->success) {
            return redirect(route('patients.show', $id))->withError('Erro ao editar usuário!');
        }

        return redirect(route('patients.show', $id))->withSuccess('Usuário editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $user = auth()->user();

        if ($user->type !== 'admin') {
            return redirect(route('patients.index'))->withError('Usuário sem permissões!');
        }

        $destroyResponse = $this->userService->destroy($id);

        if (!$destroyResponse->success) {
            return redirect(route('patients.index'))->withError('Erro ao remover usuário!');
        }

        return redirect(route('patients.index'))->withSuccess('Usuário removido com sucesso!');
    }
}
