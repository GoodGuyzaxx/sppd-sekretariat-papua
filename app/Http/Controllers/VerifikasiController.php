<?php

namespace App\Http\Controllers;

use App\Models\Rincian;
use App\Models\Sppd;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class VerifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Rincian::with(['sppd.pegawai'])->whereHas('sppd', function($query){ $query->where('status', 'terima'); })->get();
        return view('pages.sekre.sppd.index', compact('data'));
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
        $sppd = Sppd::with('pegawai')->findOrFail($id);
        return view('pages.sekre.sppd.show', compact('sppd'));

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

    public function tolak(string $id) {
        $data = Rincian::with(['sppd.pegawai'])->findOrFail($id);
        $data->sppd->status = "tolak";
        $data->save();
        $data->sppd->save();

        return redirect()->back();
    }

    public function terima(string $id) {
        $data = Rincian::with(['sppd.pegawai'])->findOrFail($id);
        $data->sppd->status = "Terverifikasi";
        $data->save();
        $data->sppd->save();

        return redirect()->back();
    }

    public function getPdf($id) {
        $data = Rincian::with('sppd.pegawai')->findOrFail($id);
        $pdf = PDF::loadView('pages.kasubag.laporan.sppd_pdf', compact('data'));
        $fileName = 'SPPD' . $data->sppd->pegawai->nama_pegawi . '.pdf';
        return $pdf->stream($fileName);
    }
}
