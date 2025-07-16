<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $provinces = [
            ['nama_provinsi' => 'Aceh'],
            ['nama_provinsi' => 'Sumatera Utara'],
            ['nama_provinsi' => 'Sumatera Barat'],
            ['nama_provinsi' => 'Riau'],
            ['nama_provinsi' => 'Jambi'],
            ['nama_provinsi' => 'Sumatera Selatan'],
            ['nama_provinsi' => 'Bengkulu'],
            ['nama_provinsi' => 'Lampung'],
            ['nama_provinsi' => 'Kepulauan Bangka Belitung'],
            ['nama_provinsi' => 'Kepulauan Riau'],
            ['nama_provinsi' => 'DKI Jakarta'],
            ['nama_provinsi' => 'Jawa Barat'],
            ['nama_provinsi' => 'Jawa Tengah'],
            ['nama_provinsi' => 'DI Yogyakarta'],
            ['nama_provinsi' => 'Jawa Timur'],
            ['nama_provinsi' => 'Banten'],
            ['nama_provinsi' => 'Bali'],
            ['nama_provinsi' => 'Nusa Tenggara Barat'],
            ['nama_provinsi' => 'Nusa Tenggara Timur'],
            ['nama_provinsi' => 'Kalimantan Barat'],
            ['nama_provinsi' => 'Kalimantan Tengah'],
            ['nama_provinsi' => 'Kalimantan Selatan'],
            ['nama_provinsi' => 'Kalimantan Timur'],
            ['nama_provinsi' => 'Kalimantan Utara'],
            ['nama_provinsi' => 'Sulawesi Utara'],
            ['nama_provinsi' => 'Sulawesi Tengah'],
            ['nama_provinsi' => 'Sulawesi Selatan'],
            ['nama_provinsi' => 'Sulawesi Tenggara'],
            ['nama_provinsi' => 'Gorontalo'],
            ['nama_provinsi' => 'Sulawesi Barat'],
            ['nama_provinsi' => 'Maluku'],
            ['nama_provinsi' => 'Maluku Utara'],
            ['nama_provinsi' => 'Papua Barat'],
            ['nama_provinsi' => 'Papua'],
            ['nama_provinsi' => 'Papua Selatan'],
            ['nama_provinsi' => 'Papua Tengah'],
            ['nama_provinsi' => 'Papua Pegunungan'],
            ['nama_provinsi' => 'Papua Barat Daya'],
        ];

        // Menambahkan timestamp (created_at dan updated_at) ke setiap data
        $data = array_map(function ($province) {
            return array_merge($province, [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }, $provinces);

        // Insert data ke dalam tabel 'provinsi'
        DB::table('provinsi')->insert($data);
    }
}
