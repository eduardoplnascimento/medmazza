<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Services\UserService;

class UserController extends Controller
{
    protected $userModel;
    protected $userService;

    public function __construct(UserService $userService, User $userModel)
    {
        $this->userModel = $userModel;
        $this->userService = $userService;
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $updateResponse = $this->userService->update($user->id, $request);

        if (!$updateResponse->success) {
            return redirect(route('users.edit', $user->id))->withError('Erro ao editar usuário!');
        }

        return redirect(route('users.edit', $user->id))->withSuccess('Usuário editado com sucesso!');
    }

    public function edit()
    {
        $user = auth()->user();
        return view('config', compact('user'));
    }
}
