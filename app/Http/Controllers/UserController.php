<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        // Apply middleware to all methods except 'show' (view) method
        $this->middleware('auth');
        $this->middleware('can:manage-users')->except('show');
    }

    public function show()
    {
        $users = User::all();
        return view('data-master.users.show', compact('users'));
    }

    public function create()
    {
        return view('data-master.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:admin,ps',
        ]);

        $password = substr($request->name, 0, 3) . substr($request->email, 0, 3); // Generating password
        $hashedPassword = Hash::make($password);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,
            'role' => $request->role,
        ]);

        return redirect()->route('data.user.page')->with('success', 'User created successfully!');
    }

    public function edit(User $user)
    {
        return view('data-master.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,ps',
        ]);

        if ($request->filled('password')) {
            $password = Hash::make($request->password);
        } else {
            $password = $user->password;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'role' => $request->role,
        ]);

        return redirect()->route('data.user.page')->with('success', 'User updated successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('data.user.page')->with('success', 'User deleted successfully!');
    }
}
