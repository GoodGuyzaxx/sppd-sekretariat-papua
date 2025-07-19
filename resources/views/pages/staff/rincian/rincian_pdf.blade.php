<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rincian Biaya Perjalanan Dinas</title>
    <style>
        /*
         * CSS ini dioptimalkan untuk konversi PDF ukuran F4.
         */

        /* Mendefinisikan ukuran halaman dan margin untuk F4 */
        @page {
            /* Ukuran F4 atau Folio */
            size: 21.5cm 33cm;
            /* Margin standar untuk dokumen resmi, disesuaikan agar lebih banyak ruang */
            margin: 2.5cm 2cm;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            line-height: 1.4;
        }

        /* Hilangkan margin default body karena sudah diatur di @page */
        body, html {
            margin: 0; /* Pastikan tidak ada margin tambahan */
            padding-left: 50px;
            padding-right: 50px;

        }

        .container {
            width: 100%;
        }

        .header {
            text-align: center;
            font-weight: bold; /* Tetap bold */
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
            margin-top: 20px; /* Sedikit margin atas untuk tabel */
        }

        .content-table td {
            padding: 3px 8px; /* Kurangi padding untuk baris tabel */
            vertical-align: top;

        .label-column {
            width: 25%;
        }

        .colon-column {
            width: 3%;
        }

        .amount-column {
            width: 22%;
            vertical-align: top;
        } */

        .amount-line {
            display: flex;
            justify-content: space-between;
        }

        /* Kelas .detail-item tidak lagi diperlukan dengan struktur tabel yang lebih sederhana */
        .total-row td {
            font-weight: bold;
            border-top: 1.5px solid black;
            padding-top: 5px; /* Kurangi padding atas untuk total */
        }

        .terbilang-cell {
            font-style: italic;
            font-weight: bold;
            padding-top: 15px !important;
        }

        /* Mencegah blok tanda tangan terpotong di halaman berbeda */
        .signature-section {
            margin-top: 40px;
            width: 48%; /* Sedikit lebarkan area tanda tangan */
            margin-left: 52%; /* Geser sedikit ke kiri agar lebih proporsional */
            text-align: center;
            page-break-inside: avoid; /* Penting! */
        } */

        .signature-space {
            height: 70px;
        }

        .signature-name {
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    {{-- Bagian Header --}}
    <div class="header">
        <h1>DEWAN PERWAKILAN RAKYAT PAPUA</h1>
        <p>Rincian Kode Rekening : {{ $rincian->sppd->mata_anggaran ?? 'N/A' }}</p>
    </div>

    {{-- Tabel Rincian Biaya --}}
    <table class="content-table">
        <tbody>
        <tr>
            <td class="label-column">Nama</td>
            <td class="colon-column">:</td>
            <td>
                <strong>{{ $rincian->sppd->pegawai->nama_pegawai ?? 'N/A' }}</strong><br>
                {{ $rincian->sppd->pegawai->jabatan ?? 'N/A' }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td class="label-column">Tujuan</td>
            <td class="colon-column">:</td>
            <td>{{ $rincian->sppd->tempat_berangkat }} - {{ $rincian->sppd->tempat_tujuan }} (PP)</td>
            <td></td>
        </tr>
        {{-- Rincian Tiket --}}
        @php
            $total_tiket_pergi = $rincian->harga_tiket_pergi * $rincian->jumlah_tiket_pergi;
            $total_tiket_pulang = $rincian->harga_tiket_pulang * $rincian->jumlah_tiket_pulang;
            $subtotal_tiket = $rincian->total_tiket; // Mengambil dari database
        @endphp
        <tr>
            <td class="label-column">Tiket</td>
            <td class="colon-column">:</td>
            <td>
                Tiket Pergi ({{ $rincian->jumlah_tiket_pergi }} org x 1 kali)<br>
                Tiket Pulang ({{ $rincian->jumlah_tiket_pulang }} org x 1 kali)<br>
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
        @php $total_transportasi = $rincian->harga_transportasi_lokal * $rincian->jumlah_hari_transportasi; @endphp
        <tr>
            <td class="label-column">Transport Lokal</td>
            <td class="colon-column">:</td>
            <td>{{ $rincian->jumlah_hari_transportasi }} hari x Rp. {{ number_format($rincian->harga_transportasi_lokal, 0, ',', '.') }},-</td>
            <td class="amount-column">
                <div class="amount-line"><span>Rp.</span><span>{{ number_format($total_transportasi, 0, ',', '.') }},-</span></div>
            </td>
        </tr>
        {{-- Rincian Penginapan --}}
        @php $total_penginapan = $rincian->harga_penginapan * $rincian->jumlah_penginapan_hari; @endphp
        <tr>
            <td class="label-column">Penginapan</td>
            <td class="colon-column">:</td>
            <td>{{ $rincian->jumlah_penginapan_hari }} hari x Rp. {{ number_format($rincian->harga_penginapan, 0, ',', '.') }},-</td>
            <td class="amount-column">
                <div class="amount-line"><span>Rp.</span><span>{{ number_format($total_penginapan, 0, ',', '.') }},-</span></div>
            </td>
        </tr>
        {{-- Rincian Uang Saku --}}
        @php $total_uang_saku = $rincian->harga_uang_saku * $rincian->jumlah_uang_saku; @endphp
        <tr>
            <td class="label-column">Uang Saku / Uang Makan</td>
            <td class="colon-column">:</td>
            <td>{{ $rincian->jumlah_uang_saku }} hari x Rp. {{ number_format($rincian->harga_uang_saku, 0, ',', '.') }},-</td>
            <td class="amount-column">
                <div class="amount-line"><span>Rp.</span><span>{{ number_format($total_uang_saku, 0, ',', '.') }},-</span></div>
            </td>
        </tr>
        <tr class="total-row">
            <td colspan="2"></td>
            <td>Total Rincian .....</td>
            <td class="amount-column">
                <div class="amount-line"><span>Rp.</span><span>{{ number_format($rincian->total_rincian, 0, ',', '.') }},-</span></div>
            </td>
        </tr>
        <tr>
            <td class="label-column">Terbilang</td>
            <td colspan="2" class="terbilang-cell">: {{\Terbilang::make($rincian->total_rincian, ' rupiah') }}</td>
        </tr>
        </tbody>
    </table>

    {{-- Bagian Tanda Tangan --}}
    <div class="signature-section">
        <div>Jayapura, {{ $rincian->created_at->isoFormat('D MMMM YYYY') }}</div>
        <div>MENGETAHUI :</div>
        <div>a.n. SEKRETARIS DPR PAPUA</div>
        <div class="signature-space" style="height: 60px;"></div> {{-- Kurangi tinggi spasi tanda tangan --}}
        <div class="signature-name">DR. JULIANA J. WAROMI, SE., M.Si.</div>
    </div>
</div>

</body>
</html>
