<?php

namespace App\Http\Services;

use DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Services\Responses\ServiceResponse;

class UserService
{
    protected $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function store(Request $request, string $type): ServiceResponse
    {
        try {
            $user = User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'type'      => $type,
                'password'  => Hash::make($request->password)
            ]);

            // Verifica se informou o arquivo e se é válido
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                // Define um aleatório para o arquivo baseado no timestamps atual
                $name = Str::random(6);
                $extension = $request->image->extension();
                $nameFile = "{$name}.{$extension}";

                // Faz o upload:
                $upload = $request->image->storeAs('img/pictures', $nameFile);

                // Verifica se NÃO deu certo o upload (Redireciona de volta)
                if (!$upload) {
                    return redirect()
                        ->back()
                        ->withError('Falha ao fazer upload da imagem')
                        ->withInput();
                }

                $user->image = $nameFile;
                $user->save();
            }

            if ($type === 'patient') {
                Patient::create([
                    'user_id' => $user->id
                ]);
                $user->refresh();

                $patient = $user->patient;
                $patient->blood_type = $request->blood;
                $patient->social_number = $request->social;
                $patient->save();
            }

            if ($type === 'doctor') {
                Doctor::create([
                    'user_id' => $user->id
                ]);
                $user->refresh();

                $doctor = $user->doctor;
                $doctor->specialty = $request->specialty;
                $doctor->save();
            }

            if ($type === 'admin') {
                $user->api_token = Str::random(80);
                $user->save();
            }
        } catch (\Throwable $th) {
            return new ServiceResponse(
                false,
                'Erro ao editar usuário!',
                null,
                $th
            );
        }

        return new ServiceResponse(
            true,
            'Usuário editado com sucesso!',
            $user
        );
    }

    public function update(int $userId, Request $request): ServiceResponse
    {
        try {
            $user = $this->userModel->find($userId);

            if ($user->type === 'patient' && is_null($user->patient)) {
                Patient::create([
                    'user_id' => $user->id
                ]);
                $user->refresh();
            }

            if ($user->type === 'doctor' && is_null($user->doctor)) {
                Doctor::create([
                    'user_id' => $user->id
                ]);
                $user->refresh();
            }

            // Verifica se informou o arquivo e se é válido
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                // Define um aleatório para o arquivo baseado no timestamps atual
                $name = Str::random(6);
                $extension = $request->image->extension();
                $nameFile = "{$name}.{$extension}";

                // Faz o upload:
                $upload = $request->image->storeAs('img/pictures', $nameFile);

                // Verifica se NÃO deu certo o upload (Redireciona de volta)
                if (!$upload) {
                    return redirect()
                        ->back()
                        ->withError('Falha ao fazer upload da imagem')
                        ->withInput();
                }

                $user->image = $nameFile;
            }

            if ($user->type === 'patient') {
                $patient = $user->patient;
                $patient->blood_type = $request->blood;
                $patient->social_number = $request->social;
                $patient->save();
            }

            if ($user->type === 'doctor') {
                $doctor = $user->doctor;
                $doctor->specialty = $request->specialty;
                $doctor->save();
            }

            $user->name = $request->name;
            $user->save();
        } catch (\Throwable $th) {
            return new ServiceResponse(
                false,
                'Erro ao editar usuário!',
                null,
                $th
            );
        }

        return new ServiceResponse(
            true,
            'Usuário editado com sucesso!',
            $user
        );
    }

    public function destroy(int $userId): ServiceResponse
    {
        try {
            $user = $this->userModel->find($userId);
            $user->delete();
        } catch (\Throwable $th) {
            return new ServiceResponse(
                false,
                'Erro ao remover usuário!',
                null,
                $th
            );
        }

        return new ServiceResponse(
            true,
            'Usuário removido com sucesso!',
            $user
        );
    }
}
