<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use Illuminate\Http\Request;

class TahunController extends Controller
{
    public function tahun()
    {
        $tahun = Tahun::all();
        return view('admin.dashboard.index_tahun', compact('tahun'));
    }

    // public function create()
    // {
    //     return view('admin.dashboard.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'data_tahun' => 'required|integer|unique:tahun,data_tahun',
    //     ]);

    //     Tahun::create($request->all());

    //     return redirect()->route('admin.dashboard.tahun')->with('success', 'Tahun created successfully.');
    // }

    public function create()
    {
        return view('admin.dashboard.create_tahun');
    }

    public function store(Request $request)
    {
        $request->validate([
            'data_tahun' => 'required|integer|min:1900|max:2100', // Example validation
        ]);

        Tahun::create([
            'data_tahun' => $request->data_tahun,
        ]);

        return redirect()->route('Tahun.index')->with('success', 'Data Tahun berhasil ditambahkan.');
    }


    // public function edit(Tahun $tahun)
    // {
    //     return view('admin.dashboard.edit', compact('tahun'));
    // }

    // public function update(Request $request, Tahun $tahun)
    // {
    //     $request->validate([
    //         'data_tahun' => 'required|integer|unique:tahun,data_tahun,' . $tahun->id,
    //     ]);

    //     $tahun->update($request->all());

    //     return redirect()->route('admin.dashboard.tahun')->with('success', 'Tahun updated successfully.');
    // }

    public function edit($id)
    {
        $tahun = Tahun::findOrFail($id);
        return view('admin.dashboard.edit_tahun', compact('tahun'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'data_tahun' => 'required|integer|min:1900|max:2100', // Example validation
        ]);

        $tahun = Tahun::findOrFail($id);
        $tahun->data_tahun = $request->data_tahun;
        $tahun->save();

        return redirect()->route('Tahun.index')->with('success', 'Data Tahun berhasil diperbarui.');
    }


    public function destroy(Tahun $tahun)
    {
        $tahun->delete();

        return redirect()->route('admin.dashboard.index_tahun')->with('success', 'Tahun deleted successfully.');
    }
}
