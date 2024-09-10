<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerpustakaanRequest;
use App\Models\Perpustakaan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PerpustakaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Perpustakaans = Perpustakaan::all();
        return view('perpustakaan.index', compact('Perpustakaans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('perpustakaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PerpustakaanRequest $request)
    {
        Perpustakaan::query()->create($request->validated());
        return redirect()->route('perpustakaan.index')->with('success', 'Data success dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Perpustakaan = Perpustakaan::query()->findOrFail($id);
        return view('perpustakaan.edit', compact('Perpustakaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => ['required', Rule::unique('perpustakaans')->ignore($id)],
            'alamat' => 'required',
            'buku' => 'required',
        ]);
        Perpustakaan::query()->findOrFail($id)->update($request->all());
        return redirect()->route('perpustakaan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Perpustakaan::query()->findOrFail($id)->delete();
        return redirect()->route('perpustakaan.index')->with('success', 'Data berhasil dihapus!');
    }
}
