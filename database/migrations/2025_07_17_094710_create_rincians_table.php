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
        Schema::create('rincian', function (Blueprint $table) {
            $table->id('id_rincian');
            $table->foreignId('id_sppd')->constrained('sppd','id')->cascadeOnDelete();
            // Tiket Pergi
            $table->decimal('harga_tiket_pergi',10,2);
            $table->integer('jumlah_tiket_pergi');
            // Tiket Pulang
            $table->decimal('harga_tiket_pulang',10,2);
            $table->integer('jumlah_tiket_pulang');
            $table->decimal('total_tiket',10,2);
            // Transportasi Lokal (fixed field name)
            $table->decimal('harga_transportasi_lokal',10,2);
            $table->integer('jumlah_hari_transportasi'); // fixed field name
            // Penginapan
            $table->decimal('harga_penginapan',10,2);
            $table->integer('jumlah_penginapan_hari');
            // Uang Saku
            $table->decimal('harga_uang_saku',10,2);
            $table->integer('jumlah_uang_saku');
            $table->decimal('total_rincian',10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rincian');
    }
};
