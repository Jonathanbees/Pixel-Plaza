<?php

namespace App\Http\Controllers;

use App\Models\CustomUser;
use Illuminate\Http\Request;

class CustomUserController extends Controller
{
    public function index()
    {
        $users = CustomUser::select('id', 'username')->get();

        return view('custom-users.index', compact('users'));
    }

    public function create()
    {
        return view('custom-users.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:custom_users',
            'password' => 'required|string|min:8',
        ]);

        $user = CustomUser::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('custom-users.index')->with('success', 'Elemento creado satisfactoriamente.');
    }

    public function show($id)
    {
        $user = CustomUser::findOrFail($id);

        return view('custom-users.show', compact('user'));
    }

    public function destroy($id)
    {
        $user = CustomUser::findOrFail($id);
        $user->delete();

        return redirect()->route('custom-users.index')->with('success', 'Elemento eliminado satisfactoriamente.');
    }
}
