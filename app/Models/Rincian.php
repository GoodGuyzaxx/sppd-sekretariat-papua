<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rincian extends Model
{
    use HasFactory;

    protected $table ='rincian';

    protected $primaryKey ='id_rincian';

    protected $fillable = [
        'id_sppd',
        'harga_tiket_pergi',
        'jumlah_tiket_pergi',
        'harga_tiket_pulang',
        'jumlah_tiket_pulang',
        'total_tiket',
        'harga_transportasi_lokal',
        'jumlah_hari_transportasi',
        'harga_penginapan',
        'jumlah_penginapan_hari',
        'harga_uang_saku',
        'jumlah_uang_saku',
        'total_rincian',
    ];

    public function sppd()
    {
        return $this->belongsTo(Sppd::class,'id_sppd','id');
    }
}
