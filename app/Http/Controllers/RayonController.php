<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use App\Models\User;
use Illuminate\Http\Request;

class RayonController extends Controller
{
    public function index()
    {
        $rayons = Rayon::all();
        return view('data-master.rayons.index', compact('rayons'));
    }

    public function create()
    {
        $pembimbingSiswas = User::where('role', 'ps')->get();
        return view('data-master.rayons.create', compact('pembimbingSiswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id,role,ps',
            'rayon' => 'required|string|max:255',
        ]);

        Rayon::create($request->all());

        return redirect()->route('rayons.index')->with('success', 'Rayon created successfully');
    }

    public function show(Rayon $rayon)
    {
        return view('data-master.rayons.show', compact('rayon'));
    }

    public function edit(Rayon $rayon)
    {
        $pembimbingSiswas = User::where('role', 'ps')->get();
        return view('data-master.rayons.edit', compact('rayon', 'pembimbingSiswas'));
    }

    public function update(Request $request, Rayon $rayon)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id,role,ps',
            'rayon' => 'required|string|max:255',
        ]);

        $rayon->update($request->all());

        return redirect()->route('rayons.index')->with('success', 'Rayon updated successfully');
    }

    public function destroy(Rayon $rayon)
    {
        $rayon->delete();

        return redirect()->route('rayons.index')->with('success', 'Rayon deleted successfully');
    }
}
