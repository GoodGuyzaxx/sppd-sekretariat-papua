<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sppd', function (Blueprint $table) {
            $table->id(); // Kunci utama (Primary Key)
            $table->string('nomor_sppd');
            $table->string('kode_no');
            $table->string('lembar_ke')->nullable();

            // === DATA PEGAWAI YANG BERANGKAT ===
            // Menghubungkan ke tabel 'pegawais'. Relasi database adalah praktik terbaik.
            $table->foreignId('id_pegawai')->constrained('pegawai','id_pegawai');
            $table->string('pangkat')->nullable();
            $table->string('tingkat_perjalanan')->nullable();

            // === DASAR & MAKSUD PERJALANAN ===
            $table->string('dasar_perintah_tugas');
            $table->date('dasar_tanggal');
            $table->text('maksud_perjalanan');

            // === DETAIL PERJALANAN ===
            $table->string('alat_angkutan');
            $table->string('tempat_berangkat');
            $table->string('tempat_tujuan');
            $table->string('lama_perjalanan'); // cth: "5 (LIMA) HARI"
            $table->date('tanggal_berangkat');
            $table->date('tanggal_kembali');

            // === ANGGARAN & PENGIKUT ===
            $table->text('pengikut')->nullable();
            $table->string('instansi_pembebanan');
            $table->text('mata_anggaran');

            // STATUS
            $table->string('status')->default('mengajukan');

            // === PENANDATANGAN & KETERANGAN ===
            $table->text('keterangan_lain')->nullable();
            // Menghubungkan ke pegawai yang menandatangani SPPD
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sppds');
    }
};
