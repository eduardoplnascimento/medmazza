<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $user = auth()->user();

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
        return redirect(route('users.edit', $user->id))->withSuccess('Usuário editado com sucesso!');
    }

    public function edit()
    {
        $user = auth()->user();
        return view('config', compact('user'));
    }
}
