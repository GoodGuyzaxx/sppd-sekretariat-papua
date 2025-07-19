<?php

namespace App\Http\Controllers;

use App\Models\Rincian;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Rincian::all();
        return view('pages.staff.laporan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getPdf($id) {
        $data = Rincian::with('sppd.pegawai')->findOrFail($id);
        $pdf = PDF::loadView('pages.staff.laporan.laporan_sppd', compact('data'));
        $fileName = 'SPPD' . $data->sppd->pegawai->nama_pegawi . '.pdf';
        return $pdf->stream($fileName);
    }
}
