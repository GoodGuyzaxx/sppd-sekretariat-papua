<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Sppd;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SppdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $data = Sppd::with('pegawai')->where('status', ['mengajukan', 'tolak', 'terima'])->get();
        $data = Sppd::with('pegawai')->get();
        return view('pages.staff.sppd.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pegawais = Pegawai::all();
        return view('pages.staff.sppd.create', compact('pegawais'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi input dari form
        $validator = Validator::make($request->all(), [
            'nomor_sppd'          => 'required|string|max:255',
            'kode_no'             => 'required|string|max:255',
            'lembar_ke'           => 'nullable|string|max:255',
            'id_pegawai'          => 'required|exists:pegawai,id_pegawai',
            'pangkat'             => 'nullable|string|max:255',
            'tingkat_perjalanan'  => 'nullable|string|max:255',
            'dasar_perintah_tugas'=> 'required|string|max:255',
            'dasar_tanggal'       => 'required|date',
            'maksud_perjalanan'   => 'required|string',
            'alat_angkutan'       => 'required|string|max:255',
            'tempat_berangkat'    => 'required|string|max:255',
            'tempat_tujuan'       => 'required|string|max:255',
            'lama_perjalanan'     => 'required|string|max:255',
            'tanggal_berangkat'   => 'required|date',
            'tanggal_kembali'     => 'required|date|after_or_equal:tanggal_berangkat',
            'pengikut'            => 'nullable|string',
            'instansi_pembebanan' => 'required|string|max:255',
            'mata_anggaran'       => 'required|string',
            'keterangan_lain'     => 'nullable|string',
        ]);

        // Jika validasi gagal, kembali ke halaman create dengan error dan input sebelumnya
        if ($validator->fails()) {
            return redirect()->route('staff.sppd.create')
                ->withErrors($validator)
                ->withInput();
        }

        Sppd::create($request->all());

        // 3. Redirect ke halaman index dengan pesan sukses
        return redirect()->route('staff.sppd.index')
            ->with('success', 'Data SPPD berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $sppd = Sppd::with('pegawai')->findOrFail($id);
        return view('pages.staff.sppd.show', compact('sppd'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Sppd::with('pegawai')->findOrFail($id);
        $pegawais = Pegawai::all(); // Fetch all pegawai for the dropdown

        return view('pages.staff.sppd.edit', compact('data', 'pegawais'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $sppd = Sppd::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nomor_sppd'          => 'required|string|max:255',
            'kode_no'             => 'required|string|max:255',
            'lembar_ke'           => 'nullable|string|max:255',
            'id_pegawai'          => 'required|exists:pegawai,id_pegawai',
            'pangkat'             => 'nullable|string|max:255',
            'tingkat_perjalanan'  => 'nullable|string|max:255',
            'dasar_perintah_tugas'=> 'required|string|max:255',
            'dasar_tanggal'       => 'required|date',
            'maksud_perjalanan'   => 'required|string',
            'alat_angkutan'       => 'required|string|max:255',
            'tempat_berangkat'    => 'required|string|max:255',
            'tempat_tujuan'       => 'required|string|max:255',
            'lama_perjalanan'     => 'required|string|max:255',
            'tanggal_berangkat'   => 'required|date',
            'tanggal_kembali'     => 'required|date|after_or_equal:tanggal_berangkat',
            'pengikut'            => 'nullable|string',
            'instansi_pembebanan' => 'required|string|max:255',
            'mata_anggaran'       => 'required|string',
            'keterangan_lain'     => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('staff.sppd.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $sppd->update($request->all());

        return redirect()->route('staff.sppd.index')->with('success', 'Data Berhail Diubah!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sppd $sppd)
    {
        $sppd->delete();
        return redirect()->route('staff.sppd.index')->with('success', 'Data Berhasil Dihapus!');
    }


    public function getSppdPdf($id){
        // 1. Ambil data SPPD berdasarkan ID, termasuk data pegawai yang berelasi.
        //    Gunakan findOrFail untuk otomatis menampilkan halaman 404 jika data tidak ditemukan.
        $sppd = Sppd::with('pegawai')->findOrFail($id);
        if (in_array($sppd->status, ['terima', 'selesai', 'Terverifikasi'])) {
            // 2. Muat view PDF dengan data yang sudah diambil.
            $pdf = Pdf::loadView('pages.staff.sppd.sppd', compact('sppd'));

            // 3. Atur nama file PDF yang akan di-download.
            $fileName = 'SPPD-' . $sppd->pegawai->nama_pegawai . '-' . $sppd->nomor_sppd . '.pdf';

            // 4. Tampilkan PDF di browser (stream) atau langsung unduh (download).
            return $pdf->stream($fileName);
        }
        return redirect()->route('staff.sppd.index')->with('error', 'SPPD Belum Di Setujui!');

    }
}
