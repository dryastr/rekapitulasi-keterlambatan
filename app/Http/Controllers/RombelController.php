<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rombel;

class RombelController extends Controller
{
    public function show()
    {
        $rombels = Rombel::all();
        return view('data-master.rombels.show', compact('rombels'));
    }

    public function create()
    {
        return view('data-master.rombels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rombel' => 'required|string|max:255',
        ]);

        Rombel::create($request->all());

        return redirect()->route('data.rombel.page')->with('success', 'Rombel created successfully');
    }

    public function edit(Rombel $rombel)
    {
        return view('data-master.rombels.edit', compact('rombel'));
    }

    public function update(Request $request, Rombel $rombel)
    {
        $request->validate([
            'rombel' => 'required|string|max:255',
        ]);

        $rombel->update($request->all());

        return redirect()->route('data.rombel.page')->with('success', 'Rombel updated successfully');
    }

    public function destroy($id)
    {
        $rombel = Rombel::findOrFail($id);
        $rombel->delete();

        return redirect()->route('data.rombel.page')->with('success', 'Rombel deleted successfully');
    }
}
