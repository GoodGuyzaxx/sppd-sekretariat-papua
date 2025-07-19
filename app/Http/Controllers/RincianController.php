<?php

namespace App\Http\Controllers;

use App\Models\Rincian;
use App\Models\Sppd;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Riskihajar\Terbilang\Terbilang;

class RincianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Rincian::with(['sppd.pegawai'])->get();
        return view('pages.staff.rincian.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sppd = Sppd::where('status', 'mengajukan')->get();
        return view('pages.staff.rincian.create', compact('sppd'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'id_sppd' => 'required|exists:sppd,id',
            // Tiket Pergi
            'harga_tiket_pergi' => 'required|numeric|min:0',
            'jumlah_tiket_pergi' => 'required|integer|min:1',
            'biaya_tiket_pergi' => 'required|numeric|min:0',
            // Tiket Pulang
            'harga_tiket_pulang' => 'required|numeric|min:0',
            'jumlah_tiket_pulang' => 'required|integer|min:1',
            'biaya_tiket_pulang' => 'required|numeric|min:0',
            // Transportasi Lokal (fixed typo)
            'harga_transportasi_lokal' => 'required|numeric|min:0',
            'jumlah_hari_transportasi' => 'required|integer|min:1',
            'biaya_transportasi_lokal' => 'required|numeric|min:0',
            // Penginapan
            'harga_penginapan' => 'required|numeric|min:0',
            'jumlah_penginapan_hari' => 'required|integer|min:1',
            'biaya_penginapan' => 'required|numeric|min:0',
            // Uang Saku
            'harga_uang_saku' => 'required|numeric|min:0',
            'jumlah_uang_saku' => 'required|integer|min:1',
            'biaya_uang_saku' => 'required|numeric|min:0',
            // Total
            'total_rincian' => 'required|numeric|min:0',
        ]);

        // Calculate totals (using correct field names)
        $biaya_tiket_pergi = $request->harga_tiket_pergi * $request->jumlah_tiket_pergi;
        $biaya_tiket_pulang = $request->harga_tiket_pulang * $request->jumlah_tiket_pulang;
        $biaya_transportasi_lokal = $request->harga_transportasi_lokal * $request->jumlah_hari_transportasi;
        $biaya_penginapan = $request->harga_penginapan * $request->jumlah_penginapan_hari;
        $biaya_uang_saku = $request->harga_uang_saku * $request->jumlah_uang_saku;
        $total_tiket = $biaya_tiket_pergi + $biaya_tiket_pulang;
        $total_rincian = $biaya_tiket_pergi + $biaya_tiket_pulang + $biaya_transportasi_lokal + $biaya_penginapan + $biaya_uang_saku;

        Rincian::create([
            'id_sppd' => $request->id_sppd,
            // Tiket Pergi
            'harga_tiket_pergi' => $request->harga_tiket_pergi,
            'jumlah_tiket_pergi' => $request->jumlah_tiket_pergi,
            // Tiket Pulang
            'harga_tiket_pulang' => $request->harga_tiket_pulang,
            'jumlah_tiket_pulang' => $request->jumlah_tiket_pulang,
            'total_tiket' => $total_tiket,
            // Transportasi Lokal (fixed field name)
            'harga_transportasi_lokal' => $request->harga_transportasi_lokal,
            'jumlah_hari_transportasi' => $request->jumlah_hari_transportasi,
            // Penginapan
            'harga_penginapan' => $request->harga_penginapan,
            'jumlah_penginapan_hari' => $request->jumlah_penginapan_hari,
            // Uang Saku
            'harga_uang_saku' => $request->harga_uang_saku,
            'jumlah_uang_saku' => $request->jumlah_uang_saku,
            'total_rincian' => $total_rincian,
        ]);

//        $data = Sppd::find($request->id_sppd);
//        $data->status = "selesai";
//        $data->save();

        return redirect()->route('staff.rincian.index')->with('success', 'Rincian biaya berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rincian = Rincian::with('sppd.pegawai')->findOrFail($id);
//        $biaya_tiket_pergi = $rincian->harga_tiket_pergi * $rincian->jumlah_tiket_pergi;
//        $biaya_tiket_pulang = $rincian->harga_tiket_pulang * $rincian->jumlah_tiket_pulang;
//        $biaya_transportasi_lokal = $rincian->harga_transportasi_lokal * $rincian->jumlah_hari_transportasi;
//        $biaya_penginapan = $rincian->harga_penginapan * $rincian->jumlah_penginapan_hari;
//        $biaya_uang_saku = $rincian->harga_uang_saku * $rincian->jumlah_uang_saku;
//
//        $total_rincian = $biaya_tiket_pergi + $biaya_tiket_pulang + $biaya_transportasi_lokal + $biaya_penginapan + $biaya_uang_saku;
//        $terbilang = Terbilang::make($total_rincian,' rupiah', 'senilai');
//        dd($terbilang);
        return view('pages.staff.rincian.detail', compact('rincian'));
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
    public function destroy(Rincian $id)
    {
        $id->delete();
        return redirect()->route('staff.rincian.index')->with('success', 'Rincian berhasil dihapus.');
    }

    public function getPdf($id) {
        $rincian = Rincian::with('sppd.pegawai')->findOrFail($id);
        $pdf = PDF::loadView('pages.staff.rincian.rincian_pdf', compact('rincian'));
        $fileName = 'Rincian_Biaya' . $rincian->sppd->pegawai->nama_pegawi . '.pdf';
        return $pdf->stream($fileName);
    }
}
