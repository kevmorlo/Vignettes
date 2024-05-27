<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->check() && auth()->user()->role != 'admin') {
            abort(403);
        } else {
            return Inertia::render('User/Index', [
                'users' => User::all(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->check() && auth()->user()->role != 'admin') {
            abort(403);
        } else {
            return Inertia::render('User/Create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return back()->with('success', 'User created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if (auth()->check() && auth()->user()->role != 'admin') {
            abort(403);
        } else {
            return Inertia::render('User/Show', [
                'user' => $user->load('thumbnail'),
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if (auth()->check() && auth()->user()->role != 'admin') {
            abort(403);
        } else {
            return Inertia::render('User/Edit', [
                'user' => $user,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if (auth()->check() && auth()->user()->role != 'admin') {
            abort(403);
        } else {
            $user->update($request->all());
            return back()->with('success', 'User updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (auth()->check() && auth()->user()->role != 'admin') {
            abort(403);
        } else {
            $result = $user->delete();
            if ($result) {
                return back()->with('success', 'User deleted.');
            } else {
                return back()->with('error', 'Nothing to delete');
            }
        }
    }
}
