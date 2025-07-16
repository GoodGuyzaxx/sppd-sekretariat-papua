<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sppd extends Model
{
    use HasFactory;

    protected $table = 'sppd';


    protected $fillable = [
        'nomor_sppd', 'kode_no', 'lembar_ke', 'id_pegawai', 'pangkat',
        'tingkat_perjalanan', 'dasar_perintah_tugas', 'dasar_tanggal',
        'maksud_perjalanan', 'alat_angkutan', 'tempat_berangkat', 'tempat_tujuan',
        'lama_perjalanan', 'tanggal_berangkat', 'tanggal_kembali', 'pengikut',
        'instansi_pembebanan', 'mata_anggaran', 'keterangan_lain', 'status'
    ];

    // Relasi ke model Pegawai
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }



}
