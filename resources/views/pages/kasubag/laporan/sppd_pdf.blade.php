<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Perjalanan Dinas - {{ $data->sppd->pegawai->nama_pegawai ?? 'Nama Pegawai' }}</title>
    <style>
        @page {
            /* Ukuran F4 atau Folio */
            size: 21.5cm 33cm;
            /* Margin standar untuk dokumen resmi, disesuaikan agar muat 1 halaman */
            margin: 1.5cm 1.5cm; /* Mengurangi margin */
        }
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            color: black;
            line-height: 1.4;
        }

        /* Page break untuk halaman kedua dan ketiga */
        .page-break {
            page-break-before: avoid; /* Mengubah ini agar tidak selalu break */
        }

        /* Styling untuk halaman 2 */
        .page-2 {
            font-family: 'Times New Roman', Times, serif;
            font-size: 10pt;
        }

        .form-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #000;
        }

        .form-table td {
            border: 1px solid #000;
            padding: 8px;
            vertical-align: top;
        }

        .form-row {
            height: 100px;
        }

        .form-row-tall {
            height: 100px;
        }

        .signature-area {
            margin-top: 30px;
            text-align: start;
            font-size: 10pt;
        }

        .signature-area-tall {
            margin-top: 40px;
            text-align: start;
            font-size: 10pt;
        }

        /* Styling untuk halaman 3 - Rincian Biaya */
        .page-3 {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            line-height: 1.4;
        }

        .container {
            width: 100%;
        }

        .header {
            text-align: center;
            font-weight: bold;
            margin-bottom: 100px;
        }

        .header h1 {
            font-size: 14pt;
            margin: 0;
            text-transform: uppercase;
        }

        .header p {
            font-size: 12pt;
            margin: 0;
            font-weight: normal;
        }

        .content-table {
            width: 100%;
            border-collapse: collapse;
        }

        .content-table td {
            padding: 4px 8px;
            vertical-align: top;
        }

        .label-column {
            width: 25%;
        }

        .colon-column {
            width: 3%;
        }

        .amount-column {
            width: 22%;
            vertical-align: top;
        }

        .amount-line {
            display: flex;
            justify-content: space-between;
        }

        .total-row td {
            font-weight: bold;
            border-top: 1.5px solid black;
            padding-top: 8px;
        }

        .terbilang-cell {
            font-style: italic;
            font-weight: bold;
            padding-top: 15px !important;
        }

        /* Mencegah blok tanda tangan terpotong di halaman berbeda */
        .signature-section {
            margin-top: 40px;
            width: 45%;
            margin-left: 55%;
            text-align: center;
            page-break-inside: avoid; /* Penting! */
        }

        .signature-space {
            height: 70px;
        }

        .signature-name {
            font-weight: bold;
            text-decoration: underline;
        }

        /* Menyesuaikan ukuran font untuk halaman 1 agar lebih ringkas */
        .sppd-table-font {
            font-size: 10pt; /* Mengurangi ukuran font untuk tabel SPPD */
        }
    </style>
</head>
<body>

{{-- ================= HALAMAN 1 - SPPD ================= --}}
<div style="text-align: center; font-weight: bold;">
    SEKRETARIAT DEWAN PERWAKILAN RAKYAT PAPUA
</div>
<hr style="border: none; border-top: 1px solid black; margin-top: 5px;">

<table style="width: 100%;">
    <tr>
        <td style="width: 60%;"></td>
        <td style="width: 40%;">
            <table>
                <tr>
                    <td>Lembar Ke</td>
                    <td style="padding: 0 5px;">:</td>
                    <td>{{ $data->sppd->lembar_ke ?? '' }}</td>
                </tr>
                <tr>
                    <td>Kode No.</td>
                    <td style="padding: 0 5px;">:</td>
                    <td>{{ $data->sppd->kode_no ?? '090' }}</td>
                </tr>
                <tr>
                    <td>Nomor</td>
                    <td style="padding: 0 5px;">:</td>
                    <td>{{ $data->sppd->nomor_sppd ?? '' }}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<h3 style="text-align: center; text-decoration: underline; margin-top: 10px; margin-bottom: 20px;">
    SURAT PERJALANAN DINAS
</h3>

{{-- ================= TABEL UTAMA ================= --}}
<table style="width: 100%; border-collapse: collapse;" class="sppd-table-font">
    <tbody>
    <tr style="border: 1px solid black;">
        <td style="width: 40%; border: 1px solid black; padding: 8px; vertical-align: top;">1. Pejabat berwenang yang memberi perintah</td>
        <td style="width: 60%; border: 1px solid black; padding: 8px; vertical-align: top;">{{ $data->sppd->pejabat_pemberi_perintah ?? 'SEKRETARIS DPR PAPUA' }}</td>
    </tr>
    <tr style="border: 1px solid black;">
        <td style="border: 1px solid black; padding: 8px; vertical-align: top;">2. Nama Anggota/Pegawai yang diperintahkan</td>
        <td style="border: 1px solid black; padding: 8px; vertical-align: top;">{{ $data->sppd->pegawai->nama_pegawai ?? 'N/A' }}</td>
    </tr>
    <tr style="border: 1px solid black;">
        <td style="border: 1px solid black; padding: 8px; vertical-align: top;">
            3. a. Pangkat dan golongan ruang gaji<br>
            &nbsp;&nbsp;&nbsp;&nbsp;menurut PP.6 Tahun 1997<br>
            b. Jabatan<br>
            c. Gaji pokok<br>
            d. Tingkat menurut peraturan perjalanan
        </td>
        <td style="border: 1px solid black; padding: 8px; vertical-align: top;">
            a. {{ $data->sppd->pangkat ?? '' }}<br>
            b. {{ $data->sppd->pegawai->jabatan ?? 'N/A' }}<br>
            c. {{ $data->sppd->gaji_pokok ?? '' }}<br>
            d. {{ $data->sppd->tingkat_perjalanan ?? '' }}
        </td>
    </tr>
    <tr style="border: 1px solid black;">
        <td style="border: 1px solid black; padding: 8px; vertical-align: top;">4. Dasar</td>
        <td style="border: 1px solid black; padding: 8px; vertical-align: top;">
            SURAT PERINTAH TUGAS PIMPINAN DEWAN<br>
            <div style="padding-left: 15px;">
                NOMOR &nbsp;&nbsp;&nbsp;: {{ $data->sppd->dasar_perintah_tugas ?? '' }}<br>
                TANGGAL : {{ $data->sppd->dasar_tanggal ? \Carbon\Carbon::parse($data->sppd->dasar_tanggal)->isoFormat('D MMMM YYYY') : '' }}
            </div>
        </td>
    </tr>
    <tr style="border: 1px solid black;">
        <td style="border: 1px solid black; padding: 8px; vertical-align: top;">5. Maksud Perjalanan Dinas</td>
        <td style="border: 1px solid black; padding: 8px; vertical-align: top;">{{ $data->sppd->maksud_perjalanan ?? '' }}</td>
    </tr>
    <tr style="border: 1px solid black;">
        <td style="border: 1px solid black; padding: 8px; vertical-align: top;">6. Alat Angkutan yang digunakan</td>
        <td style="border: 1px solid black; padding: 8px; vertical-align: top;">{{ $data->sppd->alat_angkutan ?? 'ANGKUTAN DARAT' }}</td>
    </tr>
    <tr style="border: 1px solid black;">
        <td style="border: 1px solid black; padding: 8px; vertical-align: top;">
            7. a. Tempat berangkat<br>
            b. Tempat tujuan
        </td>
        <td style="border: 1px solid black; padding: 8px; vertical-align: top;">
            a. {{ $data->sppd->tempat_berangkat ?? 'JAYAPURA' }}<br>
            b. {{ $data->sppd->tempat_tujuan ?? 'KAB. JAYAPURA (PP)' }}
        </td>
    </tr>
    <tr style="border: 1px solid black;">
        <td style="border: 1px solid black; padding: 8px; vertical-align: top;">
            8. a. Lamanya perjalanan dinas<br>
            b. Tanggal berangkat<br>
            c. Tanggal harus kembali
        </td>
        <td style="border: 1px solid black; padding: 8px; vertical-align: top;">
            a. {{ $data->sppd->lama_perjalanan ?? '5 (LIMA) HARI' }}<br>
            b. {{ $data->sppd->tanggal_berangkat ? \Carbon\Carbon::parse($data->sppd->tanggal_berangkat)->isoFormat('D MMMM YYYY') : 'KESEMPATAN PERTAMA' }}<br>
            c. {{ $data->sppd->tanggal_kembali ? \Carbon\Carbon::parse($data->sppd->tanggal_kembali)->isoFormat('D MMMM YYYY') : 'SELESAI DINAS' }}
        </td>
    </tr>
    <tr style="border: 1px solid black;">
        <td style="border: 1px solid black; padding: 8px; vertical-align: top;">9. Pengikut</td>
        <td style="border: 1px solid black; padding: 8px; vertical-align: top;">
            {{ $data->sppd->pengikut ?? '===' }}
        </td>
    </tr>
    <tr style="border: 1px solid black;">
        <td style="border: 1px solid black; padding: 8px; vertical-align: top;">
            10. Pembebanan Anggaran<br>
            a. Instansi<br>
            b. Mata Anggaran
        </td>
        <td style="border: 1px solid black; padding: 8px; vertical-align: top;">
            a. {{ $data->sppd->instansi_pembebanan ?? '' }}<br>
            b. {{ $data->sppd->mata_anggaran ?? '' }}
        </td>
    </tr>
    <tr style="border: 1px solid black;">
        <td style="border: 1px solid black; padding: 8px; vertical-align: top;">11. Keterangan lain-lain</td>
        <td style="border: 1px solid black; padding: 8px; vertical-align: top;">{{ $data->sppd->keterangan_lain ?? '' }}</td>
    </tr>
    </tbody>
</table>

{{-- ================= FOOTER / TANDA TANGAN ================= --}}
<div style="width: 45%; margin-left: auto; margin-top: 20px; text-align: left;">
    <p style="margin: 2px 0;">Dikeluarkan di : JAYAPURA</p>
    <p style="margin: 2px 0;">Pada tanggal &nbsp;&nbsp;&nbsp;: {{ $data->sppd->dasar_tanggal ? \Carbon\Carbon::parse($data->sppd->dasar_tanggal)->isoFormat('D MMMM YYYY') : '' }}</p>
    <div style="text-align: center; margin-top: 15px; height: 80px;">
        SEKRETARIS DPR PAPUA
    </div>
    <div style="text-align: center;">
        <span style="font-weight: bold; text-decoration: underline;">DR. JULIANA J. WAROMI, SE.,M.Si.</span><br>
        PEMBINA UTAMA MADYA<br>
        NIP. 19660314 198603 2 012
    </div>
</div>

{{-- ================= HALAMAN 2 - FORM PERJALANAN DINAS ================= --}}
<div class="page-2" style="margin-top: 20px;"> <!-- Menghapus page-break dan menambahkan margin-top -->
    <!-- Form Table -->
    <table class="form-table">
        <!-- Row 1 -->
        <tr>
            <td style="width: 50%;" class="form-row">

            </td>
            <td style="width: 50%;" class="form-row">
                <strong>Berangkat dari :</strong><br>
                <strong>(Tempate Kedudukan)</strong><br>
                <strong>Ke &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>Pada Tanggal &nbsp;&nbsp;&nbsp;:</strong><br>
            </td>
        </tr>

        <!-- Row 2 -->
        <tr>
            <td class="form-row">
                <strong>II. Tiba di &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kepala &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <br>
                <div class="signature-area">
                    (...................................)<br>
                    NIP.
                </div>
            </td>
            <td class="form-row">
                <strong>Berangkat dari :</strong><br>
                <strong>Ke &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>Pada Tanggal &nbsp;&nbsp;:</strong><br>
                <strong>Kepala</strong><br>
                <div class="signature-area">
                    (...................................)<br>
                    NIP.
                </div>
            </td>
        </tr>

        <!-- Row 3 -->
        <tr>
            <td class="form-row">
                <strong>III. Tiba di &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kepala &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <br>
                <div class="signature-area">
                    (...................................)<br>
                    NIP.
                </div>
            </td>
            <td class="form-row">
                <strong>Berangkat dari :</strong><br>
                <strong>Ke &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>Pada Tanggal &nbsp;&nbsp;:</strong><br>
                <strong>Kepala</strong><br>
                <div class="signature-area">
                    (...................................)<br>
                    NIP.
                </div>
            </td>
        </tr>

        <!-- Row 4 -->
        <tr>
            <td class="form-row">
                <strong>IV. Tiba di &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kepala &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <br>
                <div class="signature-area">
                    (...................................)<br>
                    NIP.
                </div>
            </td>
            <td class="form-row">
                <strong>Berangkat dari :</strong><br>
                <strong>Ke &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>Pada Tanggal &nbsp;&nbsp;:</strong><br>
                <strong>Kepala</strong><br>
                <div class="signature-area">
                    (...................................)<br>
                    NIP.
                </div>
            </td>
        </tr>

        <!-- Row 5 -->
        <tr>
            <td class="form-row">
                <strong>V. Tiba di &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>&nbsp;&nbsp;&nbsp;&nbsp;Pada Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>&nbsp;&nbsp;&nbsp;&nbsp;Kepala &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <br>
                <div class="signature-area">
                    (...................................)<br>
                    NIP.
                </div>
            </td>
            <td class="form-row">
                <strong>Berangkat dari :</strong><br>
                <strong>Ke &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>Pada Tanggal &nbsp;&nbsp;:</strong><br>
                <strong>Kepala</strong><br>
                <div class="signature-area">
                    (...................................)<br>
                    NIP.
                </div>
            </td>
        </tr>

        <!-- Row 6 -->
        <tr>
            <td class="form-row-tall">
                <strong>VI. Tiba di &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Tempat Kedudukan)</strong><br>
                <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pejabat yang berwenang/Pejabat yang ditunjuk</strong><br>
                <br>
                <br>
                <div class="signature-area-tall">
                    (...................................)<br>
                    NIP.
                </div>
            </td>
            <td class="form-row-tall">
                <div style="text-align: justify-all">
                    <strong>Telah diperiksa dengan keterangan bahwa perjalanan tersebut atas perintahnya dan semata-mata untuk kepentingan jabatan dalam waktu yang sesingkat-singkatnya.Pejabat yang berwenang/Pejabat lainnya yang ditunjuk</strong><br>
                    <br>
                </div>
                <div class="signature-area-tall">
                    (...................................)<br>
                    NIP.
                </div>
            </td>
        </tr>

        <!-- Row 7 -->
        <tr>
            <td style="padding: 8px;" colspan="2">
                <strong>VII. Catatan Lain-lain</strong>
            </td>
        </tr>
    </table>

    <!-- Footer Section -->
    <div style=" line-height: 1.4;">
        <strong>VIII. PERHATIAN:</strong><br>
        <div style="margin-top: 5px; text-align: justify;">
            Pejabat yang berwenang menerbitkan SPPD, Pegawai yang melakukan perjalanan dinas, pejabat yang mengesahkan tanggal berangkat/tiba, serta bendahara bertanggung jawab berdasarkan peraturan-peraturan Keuangan Negara apabila terjadi rugi akibat kesalahan, kelalaian, dan kealpaannya.
        </div>
    </div>
</div>

{{-- ================= HALAMAN 3 - RINCIAN BIAYA ================= --}}
<div class="page-3" style="margin-top: 20px;"> <!-- Menghapus page-break dan menambahkan margin-top -->
    <div class="container">
        {{-- Bagian Header --}}
        <div class="header">
            <h1>DEWAN PERWAKILAN RAKYAT PAPUA</h1>
            <p>Rincian Kode Rekening : {{ $data->sppd->mata_anggaran ?? 'N/A' }}</p>
        </div>

        {{-- Tabel Rincian Biaya --}}
        <table class="content-table">
            <tbody>
            <tr>
                <td class="label-column">Nama</td>
                <td class="colon-column">:</td>
                <td>
                    <strong>{{ $data->sppd->pegawai->nama_pegawai ?? 'N/A' }}</strong><br>
                    {{ $data->sppd->pegawai->jabatan ?? 'N/A' }}
                </td>
                <td></td>
            </tr>
            <tr>
                <td class="label-column">Tujuan</td>
                <td class="colon-column">:</td>
                <td>{{ $data->sppd->tempat_berangkat }} - {{ $data->sppd->tempat_tujuan }} (PP)</td>
                <td></td>
            </tr>
            {{-- Rincian Tiket --}}
            @php
                $total_tiket_pergi = $data->harga_tiket_pergi * $data->jumlah_tiket_pergi;
                $total_tiket_pulang = $data->harga_tiket_pulang * $data->jumlah_tiket_pulang;
                $subtotal_tiket = $data->total_tiket; // Mengambil dari database
            @endphp
            <tr>
                <td class="label-column">Tiket</td>
                <td class="colon-column">:</td>
                <td>
                    Tiket Pergi ({{ $data->jumlah_tiket_pergi }} org x 1 kali)<br>
                    Tiket Pulang ({{ $data->jumlah_tiket_pulang }} org x 1 kali)<br>
                    <strong style="border-top: 1px solid black; padding-top: 5px; display: block; margin-top: 5px;">Jumlah Tiket</strong>
                </td>
                <td class="amount-column">
                    <div class="amount-line"><span>Rp.</span><span>{{ number_format($total_tiket_pergi, 0, ',', '.') }},-</span></div>
                    <div class="amount-line"><span>Rp.</span><span>{{ number_format($total_tiket_pulang, 0, ',', '.') }},-</span></div>
                    <strong style="border-top: 1px solid black; padding-top: 5px; display:block; margin-top: 5px;">
                        <div class="amount-line"><span>Rp.</span><span>{{ number_format($subtotal_tiket, 0, ',', '.') }},-</span></div>
                    </strong>
                </td>
            </tr>
            {{-- Rincian Transportasi --}}
            @php $total_transportasi = $data->harga_transportasi_lokal * $data->jumlah_hari_transportasi; @endphp
            <tr>
                <td class="label-column">Transport Lokal</td>
                <td class="colon-column">:</td>
                <td>{{ $data->jumlah_hari_transportasi }} hari x Rp. {{ number_format($data->harga_transportasi_lokal, 0, ',', '.') }},-</td>
                <td class="amount-column">
                    <div class="amount-line"><span>Rp.</span><span>{{ number_format($total_transportasi, 0, ',', '.') }},-</span></div>
                </td>
            </tr>
            {{-- Rincian Penginapan --}}
            @php $total_penginapan = $data->harga_penginapan * $data->jumlah_penginapan_hari; @endphp
            <tr>
                <td class="label-column">Penginapan</td>
                <td class="colon-column">:</td>
                <td>{{ $data->jumlah_penginapan_hari }} hari x Rp. {{ number_format($data->harga_penginapan, 0, ',', '.') }},-</td>
                <td class="amount-column">
                    <div class="amount-line"><span>Rp.</span><span>{{ number_format($total_penginapan, 0, ',', '.') }},-</span></div>
                </td>
            </tr>
            {{-- Rincian Uang Saku --}}
            @php $total_uang_saku = $data->harga_uang_saku * $data->jumlah_uang_saku; @endphp
            <tr>
                <td class="label-column">Uang Saku / Uang Makan</td>
                <td class="colon-column">:</td>
                <td>{{ $data->jumlah_uang_saku }} hari x Rp. {{ number_format($data->harga_uang_saku, 0, ',', '.') }},-</td>
                <td class="amount-column">
                    <div class="amount-line"><span>Rp.</span><span>{{ number_format($total_uang_saku, 0, ',', '.') }},-</span></div>
                </td>
            </tr>
            <tr class="total-row">
                <td colspan="2"></td>
                <td>Total Rincian .....</td>
                <td class="amount-column">
                    <div class="amount-line"><span>Rp.</span><span>{{ number_format($data->total_rincian, 0, ',', '.') }},-</span></div>
                </td>
            </tr>
            <tr>
                <td class="label-column">Terbilang</td>
                <td colspan="2" class="terbilang-cell">: {{\Terbilang::make($data->total_rincian, ' rupiah') }}</td>
            </tr>
            </tbody>
        </table>

        {{-- Bagian Tanda Tangan --}}
        <div class="signature-section">
            <div>Jayapura, {{ $data->created_at->isoFormat('D MMMM YYYY') }}</div>
            <div>MENGETAHUI :</div>
            <div>a.n. SEKRETARIS DPR PAPUA</div>
            <div class="signature-space"></div>
            <div class="signature-name">DR. JULIANA J. WAROMI, SE., M.Si.</div>
        </div>
    </div>
</div>

</body>
</html>
