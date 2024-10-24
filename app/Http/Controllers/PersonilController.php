<?php
namespace App\Http\Controllers;

use App\Models\Personil;
use Illuminate\Http\Request;

class PersonilController extends Controller
{
    public function index()
    {
        $personil = Personil::all();
        return view('admin.personil.index', compact('personil'));
    }

    public function create()
    {
        return view('admin.personil.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'personil' => 'required|string|max:255',
        ]);

        Personil::create($request->all());

        return redirect()->route('Personil.index')->with('success', 'Personil berhasil ditambahkan');
    }

    public function edit(Personil $personil)
    {
        return view('admin.personil.edit', compact('personil'));
    }

    public function update(Request $request, Personil $personil)
    {
        $request->validate([
            'personil' => 'required|string|max:255',
        ]);

        $personil->update($request->all());

        return redirect()->route('Personil.index')->with('success', 'Personil berhasil diperbarui');
    }

    public function destroy(Personil $personil)
    {
        $personil->delete();

        return redirect()->route('Personil.index')->with('success', 'Personil berhasil dihapus');
    }
}
