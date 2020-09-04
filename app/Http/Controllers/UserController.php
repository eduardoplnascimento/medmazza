<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $user = auth()->user();
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
