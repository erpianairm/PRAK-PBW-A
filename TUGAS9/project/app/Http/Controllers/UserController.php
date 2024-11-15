<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index()

    {
       $users = User::query()->latest()->get();

       return view('users.index', [
        'users' => $users,
       ]);
       
    }

    public function create()

    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:255', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);
        User::create($request->only('name', 'email', 'password'));

        return redirect('/users');
    }
}
