<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('pages.admin.pegawai.index', compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pegawai' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
            'golongan' => 'required',
        ]);

        Pegawai::create([
            'nama_pegawai' => $request->nama_pegawai,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'golongan' => $request->golongan
        ]);

        return redirect()->route('admin.pegawai.index')->with('success', 'Data berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pegawai = Pegawai::findOrFail($id);
        return view('pages.admin.pegawai.edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $pegawai = Pegawai::findOrFail($id);
        $rules = [
            'nama_pegawai' => 'required',
            'jabatan' => 'required',
            'golongan' => 'required',
            'nip' => 'required',
        ];

        $request->validate($rules);
        $data = [
            'nama_pegawai' => $request->nama_pegawai,
            'nip' => $request->nip,
            'golongan' => $request->golongan,
            'jabatan' => $request->jabatan
        ];

        $pegawai->update($data);

        return redirect()->route('admin.pegawai.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $id)
    {
        $id->delete();

        return redirect()->route('admin.pegawai.index')->with('success', 'Data berhasil dihapus');
    }
}
