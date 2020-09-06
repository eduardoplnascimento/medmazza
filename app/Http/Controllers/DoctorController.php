<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Services\DoctorService;
use App\Http\Services\UserService;

class DoctorController extends Controller
{
    protected $userModel;
    protected $userService;
    protected $doctorService;

    public function __construct(
        User $userModel,
        UserService $userService,
        DoctorService $doctorService
    ) {
        $this->userModel = $userModel;
        $this->userService = $userService;
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
        $doctors = User::where('type', 'doctor')->orderBy('name')->get();

        return view('doctors', compact('user', 'doctors'));
    }

    public function getAvailableByDate(Request $request)
    {
        $serviceResponse = $this->doctorService->getAvailableByDate(
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
            return view('admin.doctor-create', compact('user'));
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
            return redirect(route('doctors.index'))->withError('Usuário sem permissões!');
        }

        $storeResponse = $this->userService->store($request, 'doctor');

        if (!$storeResponse->success) {
            return redirect(route('doctors.index'))->withError('Erro ao criar usuário!');
        }

        return redirect(route('doctors.index'))->withSuccess('Usuário criado com sucesso!');
    }

    /**
     * Display and how the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $user = auth()->user();

        $doctor = $this->userModel->find($id);

        if ($user->type === 'admin') {
            return view('admin.doctor', compact('user', 'doctor'));
        }

        return view('doctor', compact('user', 'doctor'));
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
            return redirect(route('doctors.show', $id))->withError('Erro ao editar usuário!');
        }

        return redirect(route('doctors.show', $id))->withSuccess('Usuário editado com sucesso!');
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
            return redirect(route('doctors.index'))->withError('Usuário sem permissões!');
        }

        $destroyResponse = $this->userService->destroy($id);

        if (!$destroyResponse->success) {
            return redirect(route('doctors.index'))->withError('Erro ao remover usuário!');
        }

        return redirect(route('doctors.index'))->withSuccess('Usuário removido com sucesso!');
    }
}
