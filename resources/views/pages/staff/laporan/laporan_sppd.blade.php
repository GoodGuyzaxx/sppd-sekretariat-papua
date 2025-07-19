<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Perjalanan Dinas - {{ $data->sppd->pegawai->nama_pegawai ?? 'Nama Pegawai' }}</title>
    <style>
        @page {
            /* Ukuran F4 atau Folio */
            size: 21.5cm 33cm;
            /* Margin standar untuk dokumen resmi */
            margin: 1.5cm;
        }
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            color: black;
            line-height: 1.4;
        }

        /* Page break untuk halaman */
        .page-break {
            page-break-before: always;
        }

        /* Styling umum untuk tabel */
        .custom-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #000;
        }
        .custom-table td {
            border: 1px solid #000;
            padding: 8px;
            vertical-align: top;
        }

        /* === HALAMAN 1: SPPD === */
        .sppd-table-font {
            font-size: 10pt;
        }
        .sppd-footer {
            width: 45%;
            margin-left: auto;
            margin-top: 20px;
            text-align: left;
        }
        .sppd-signature-space {
            text-align: center;
            margin-top: 15px;
            height: 80px;
        }
        .sppd-signature-name {
            text-align: center;
            font-weight: bold;
            text-decoration: underline;
        }

        /* === HALAMAN 2: FORM PERJALANAN DINAS === */
        .page-2 {
            font-size: 10pt;
        }
        .form-row { height: 100px; }
        .form-row-tall { height: 120px; } /* Increased height to accommodate content */
        .signature-area {
            margin-top: 15px; /* Reduced margin to save space */
            text-align: left; /* Changed to left for consistency */
        }
        .signature-area-tall {
            margin-top: 40px;
            text-align: start;
        }

        /* === HALAMAN 3: RINCIAN BIAYA === */
        .page-3-header {
            text-align: center;
            font-weight: bold;
            margin-bottom: 100px;
        }
        .page-3-header h1 { font-size: 14pt; margin: 0; text-transform: uppercase; }
        .page-3-header p { font-size: 12pt; margin: 0; font-weight: normal; }
        .content-table { width: 100%; border-collapse: collapse; }
        .content-table td { padding: 4px 8px; vertical-align: top; }
        .label-column { width: 25%; }
        .colon-column { width: 3%; }
        .amount-column { width: 22%; vertical-align: top; }
        .amount-line { display: flex; justify-content: space-between; }
        .total-row td { font-weight: bold; border-top: 1.5px solid black; padding-top: 8px; }
        .terbilang-cell { font-style: italic; font-weight: bold; padding-top: 15px !important; }
        .page-3-signature-section {
            margin-top: 40px;
            width: 45%;
            margin-left: 55%;
            text-align: center;
            page-break-inside: avoid;
        }
        .page-3-signature-space { height: 70px; }
        .page-3-signature-name { font-weight: bold; text-decoration: underline; }

        /* === HALAMAN 4: SPTJM === */
        .page-4 {
            font-size: 11pt;
            line-height: 1.3;
        }
        .sptjm-header { text-align: center; margin-bottom: 20px; }
        .sptjm-header h1 { font-size: 14pt; font-weight: bold; margin: 0; letter-spacing: 0.5px; }
        .sptjm-header p { font-size: 9pt; margin: 3px 0; }
        .sptjm-title { text-align: center; font-size: 12pt; font-weight: bold; text-decoration: underline; margin: 25px 0 20px 0; }
        .sptjm-content { text-align: justify; margin-bottom: 15px; }
        .sptjm-identity { margin: 15px 0 15px 40px; }
        .sptjm-identity-table { width: 100%; border-collapse: collapse; }
        .sptjm-identity-table td { padding: 2px 0; vertical-align: top; }
        .sptjm-identity-table td:first-child { width: 70px; }
        .sptjm-identity-table td:nth-child(2) { width: 15px; }
        .sptjm-cost-list { margin: 15px 0 15px 20px; padding-left: 20px; }
        .sptjm-cost-list ol { margin: 0; padding-left: 20px; }
        .sptjm-cost-list li { margin: 3px 0; }
        .sptjm-spd-section { margin: 15px 0; text-indent: 40px; text-align: justify; }
        .sptjm-spd-details { margin: 15px 0 15px 80px; }
        .sptjm-spd-table { border-collapse: collapse; }
        .sptjm-spd-table td { padding: 2px 0; vertical-align: top; }
        .sptjm-spd-table td:first-child { width: 70px; }
        .sptjm-spd-table td:nth-child(2) { width: 15px; }
        .sptjm-closing { margin: 15px 0; text-align: justify; text-indent: 40px; }
        .sptjm-signature-section { margin-top: 30px; text-align: right; padding-right: 80px; }
        .sptjm-signature-date { margin-bottom: 15px; }
        .sptjm-signature-area { text-align: center; margin-top: 20px; }
        .sptjm-signature-name { font-weight: bold; }

    </style>
</head>
<body>

{{-- ================= HALAMAN 1 - SPPD ================= --}}
<div>
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

    <table class="custom-table sppd-table-font">
        <tbody>
        <tr>
            <td style="width: 40%;">1. Pejabat berwenang yang memberi perintah</td>
            <td style="width: 60%;">{{ $data->sppd->pejabat_pemberi_perintah ?? 'SEKRETARIS DPR PAPUA' }}</td>
        </tr>
        <tr>
            <td>2. Nama Anggota/Pegawai yang diperintahkan</td>
            <td>{{ $data->sppd->pegawai->nama_pegawai ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>
                3. a. Pangkat dan golongan ruang gaji<br>
                &nbsp;&nbsp;&nbsp;&nbsp;menurut PP.6 Tahun 1997<br>
                b. Jabatan<br>
                c. Gaji pokok<br>
                d. Tingkat menurut peraturan perjalanan
            </td>
            <td>
                a. {{ $data->sppd->pangkat ?? '' }}<br>
                b. {{ $data->sppd->pegawai->jabatan ?? 'N/A' }}<br>
                c. {{ $data->sppd->gaji_pokok ?? '' }}<br>
                d. {{ $data->sppd->tingkat_perjalanan ?? '' }}
            </td>
        </tr>
        <tr>
            <td>4. Dasar</td>
            <td>
                SURAT PERINTAH TUGAS PIMPINAN DEWAN<br>
                <div style="padding-left: 15px;">
                    NOMOR &nbsp;&nbsp;&nbsp;: {{ $data->sppd->dasar_perintah_tugas ?? '' }}<br>
                    TANGGAL : {{ $data->sppd->dasar_tanggal ? \Carbon\Carbon::parse($data->sppd->dasar_tanggal)->isoFormat('D MMMM YYYY') : '' }}
                </div>
            </td>
        </tr>
        <tr>
            <td>5. Maksud Perjalanan Dinas</td>
            <td>{{ $data->sppd->maksud_perjalanan ?? '' }}</td>
        </tr>
        <tr>
            <td>6. Alat Angkutan yang digunakan</td>
            <td>{{ $data->sppd->alat_angkutan ?? 'ANGKUTAN DARAT' }}</td>
        </tr>
        <tr>
            <td>
                7. a. Tempat berangkat<br>
                b. Tempat tujuan
            </td>
            <td>
                a. {{ $data->sppd->tempat_berangkat ?? 'JAYAPURA' }}<br>
                b. {{ $data->sppd->tempat_tujuan ?? 'KAB. JAYAPURA (PP)' }}
            </td>
        </tr>
        <tr>
            <td>
                8. a. Lamanya perjalanan dinas<br>
                b. Tanggal berangkat<br>
                c. Tanggal harus kembali
            </td>
            <td>
                a. {{ $data->sppd->lama_perjalanan ?? '5 (LIMA) HARI' }}<br>
                b. {{ $data->sppd->tanggal_berangkat ? \Carbon\Carbon::parse($data->sppd->tanggal_berangkat)->isoFormat('D MMMM YYYY') : 'KESEMPATAN PERTAMA' }}<br>
                c. {{ $data->sppd->tanggal_kembali ? \Carbon\Carbon::parse($data->sppd->tanggal_kembali)->isoFormat('D MMMM YYYY') : 'SELESAI DINAS' }}
            </td>
        </tr>
        <tr>
            <td>9. Pengikut</td>
            <td>{{ $data->sppd->pengikut ?? '===' }}</td>
        </tr>
        <tr>
            <td>
                10. Pembebanan Anggaran<br>
                a. Instansi<br>
                b. Mata Anggaran
            </td>
            <td>
                a. {{ $data->sppd->instansi_pembebanan ?? '' }}<br>
                b. {{ $data->sppd->mata_anggaran ?? '' }}
            </td>
        </tr>
        <tr>
            <td>11. Keterangan lain-lain</td>
            <td>{{ $data->sppd->keterangan_lain ?? '' }}</td>
        </tr>
        </tbody>
    </table>

    <div class="sppd-footer">
        <p style="margin: 2px 0;">Dikeluarkan di : JAYAPURA</p>
        <p style="margin: 2px 0;">Pada tanggal &nbsp;&nbsp;&nbsp;: {{ $data->sppd->dasar_tanggal ? \Carbon\Carbon::parse($data->sppd->dasar_tanggal)->isoFormat('D MMMM YYYY') : '' }}</p>
        <div class="sppd-signature-space">
            SEKRETARIS DPR PAPUA
        </div>
        <div class="sppd-signature-name">
            DR. JULIANA J. WAROMI, SE.,M.Si.<br>
            <span style="font-weight: normal;">PEMBINA UTAMA MADYA</span><br>
            <span style="font-weight: normal;">NIP. 19660314 198603 2 012</span>
        </div>
    </div>
</div>

{{-- ================= HALAMAN 2 - FORM PERJALANAN DINAS ================= --}}
<div class="page-break page-2">
    <table class="custom-table">
        <tr>
            <td style="width: 50%;" class="form-row"></td>
            <td style="width: 50%;" class="form-row">
                <strong>Berangkat dari :</strong><br>
                <strong>(Tempate Kedudukan)</strong><br>
                <strong>Ke &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>Pada Tanggal &nbsp;&nbsp;&nbsp;:</strong>
            </td>
        </tr>
        <tr>
            <td class="form-row">
                <strong>II. Tiba di &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kepala &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <div class="signature-area" style="margin-top: 60px;">
                    (...................................)<br>
                    NIP.
                </div>
            </td>
            <td class="form-row">
                <strong>Berangkat dari :</strong><br>
                <strong>Ke &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>Pada Tanggal &nbsp;&nbsp;:</strong><br>
                <strong>Kepala</strong><br>
                <div class="signature-area" style="margin-top: 45px;">
                    (...................................)<br>
                    NIP.
                </div>
            </td>
        </tr>
        <tr>
            <td class="form-row">
                <strong>III. Tiba di &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kepala &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <div class="signature-area" style="margin-top: 60px;">
                    (...................................)<br>
                    NIP.
                </div>
            </td>
            <td class="form-row">
                <strong>Berangkat dari :</strong><br>
                <strong>Ke &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>Pada Tanggal &nbsp;&nbsp;:</strong><br>
                <strong>Kepala</strong><br>
                <div class="signature-area" style="margin-top: 45px;">
                    (...................................)<br>
                    NIP.
                </div>
            </td>
        </tr>
        <tr>
            <td class="form-row">
                <strong>IV. Tiba di &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kepala &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <div class="signature-area" style="margin-top: 60px;">
                    (...................................)<br>
                    NIP.
                </div>
            </td>
            <td class="form-row">
                <strong>Berangkat dari :</strong><br>
                <strong>Ke &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>Pada Tanggal &nbsp;&nbsp;:</strong><br>
                <strong>Kepala</strong><br>
                <div class="signature-area" style="margin-top: 45px;">
                    (...................................)<br>
                    NIP.
                </div>
            </td>
        </tr>
        <tr>
            <td class="form-row">
                <strong>V. Tiba di &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>&nbsp;&nbsp;&nbsp;&nbsp;Pada Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>&nbsp;&nbsp;&nbsp;&nbsp;Kepala &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <div class="signature-area" style="margin-top: 60px;">
                    (...................................)<br>
                    NIP.
                </div>
            </td>
            <td class="form-row">
                <strong>Berangkat dari :</strong><br>
                <strong>Ke &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>Pada Tanggal &nbsp;&nbsp;:</strong><br>
                <strong>Kepala</strong><br>
                <div class="signature-area" style="margin-top: 45px;">
                    (...................................)<br>
                    NIP.
                </div>
            </td>
        </tr>
        <tr>
            <td class="form-row-tall" style="padding-bottom: 0;">
                <strong>VI. Tiba di &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Tempat Kedudukan)</strong><br>
                <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><br>
                <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pejabat yang berwenang/Pejabat yang ditunjuk</strong><br>
                <div class="signature-area-tall">
                    (...................................)<br>
                    NIP.
                </div>
            </td>
            <td class="form-row-tall" style="padding-bottom: 0;">
                <div style="text-align: justify-all">
                    <strong>Telah diperiksa dengan keterangan bahwa perjalanan tersebut atas perintahnya dan semata-mata untuk kepentingan jabatan dalam waktu yang sesingkat-singkatnya.Pejabat yang berwenang/Pejabat lainnya yang ditunjuk</strong><br>
                </div>
                <div class="signature-area-tall">
                    (...................................)<br>
                    NIP.
                </div>
            </td>
        </tr>
        <tr>
            <td style="padding: 8px;" colspan="2">
                <strong>VII. Catatan Lain-lain</strong>
            </td>
        </tr>
    </table>
    <div>
        <strong>VIII. PERHATIAN:</strong><br>
        <div style="margin-top: 5px; text-align: justify;">
            Pejabat yang berwenang menerbitkan SPPD, Pegawai yang melakukan perjalanan dinas, pejabat yang mengesahkan tanggal berangkat/tiba, serta bendahara bertanggung jawab berdasarkan peraturan-peraturan Keuangan Negara apabila terjadi rugi akibat kesalahan, kelalaian, dan kealpaannya.
        </div>
    </div>
</div>


{{-- ================= HALAMAN 3 - RINCIAN BIAYA ================= --}}
<div class="page-break">
    <div class="container">
        <div class="page-3-header">
            <h1>DEWAN PERWAKILAN RAKYAT PAPUA</h1>
            <p>Rincian Kode Rekening : {{ $data->sppd->mata_anggaran ?? 'N/A' }}</p>
        </div>

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
                $subtotal_tiket = $data->total_tiket;
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

        <div class="page-3-signature-section">
            <div>Jayapura, {{ $data->sppd->created_at->isoFormat('D MMMM YYYY') }}</div>
            <div>MENGETAHUI :</div>
            <div>a.n. SEKRETARIS DPR PAPUA</div>
            <div class="page-3-signature-space"></div>
            <div class="page-3-signature-name">DR. JULIANA J. WAROMI, SE., M.Si.</div>
        </div>
    </div>
</div>

{{-- ================= HALAMAN 4 - SURAT PERNYATAAN TANGGUNG JAWAB MUTLAK (SPTJM) ================= --}}
<div class="page-break page-4">
    <div class="sptjm-header">
        <h1>DEWAN PERWAKILAN RAKYAT PAPUA</h1>
        <p>Jl. Dr. Sam Ratulangi No.2 Jayapura Telp. (0967) 533691 – 533580 – 523855 Fax. 531922</p>
    </div>

    <div class="sptjm-title">SURAT PERNYATAAN TANGGUNG JAWAB MUTLAK</div>

    <div class="sptjm-content">
        Saya yang bertanda tangan dibawah ini :
    </div>

    <div class="sptjm-identity">
        <table class="sptjm-identity-table">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $data->sppd->pegawai->nama_pegawai ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td>{{ $data->sppd->pegawai->jabatan ?? 'N/A' }}</td>
            </tr>
        </table>
    </div>

    <div class="sptjm-content">
        Dengan ini menyatakan bahwa saya bersedia mempertanggung jawabkan Biaya Perjalanan Dinas yang saya terima secara At Cost yaitu terdiri dari:
    </div>

    <div class="sptjm-cost-list">
        <ol>
            <li>Biaya Transportasi / Tiket</li>
            <li>Biaya Penginapan Luar / Dalam Daerah</li>
            <li>Uang Transportasi Lokal dan</li>
            <li>Uang Saku / Uang Makan di SPJ-kan secara Lumpsum</li>
        </ol>
    </div>

    <div class="sptjm-spd-section">
        Apabila SPJ tersebut diatas tidak sesuai ketentuan maka saya bersedia dituntut sesuai Peraturan dan Bersedia menyetor kembali secara utuh Biaya tersebut apabila tidak dapat dipertanggungJawabkan. Biaya yang saya terima sesuai SPD :
    </div>

    <div class="sptjm-spd-details">
        <table class="sptjm-spd-table">
            <tr>
                <td>Nomor</td>
                <td>:</td>
                <td>{{ $data->sppd->nomor_sppd ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td>{{ $data->sppd->dasar_tanggal ? \Carbon\Carbon::parse($data->sppd->dasar_tanggal)->isoFormat('D MMMM YYYY') : 'N/A' }}</td>
            </tr>
            <tr>
                <td>Tujuan</td>
                <td>:</td>
                <td>{{ $data->sppd->tempat_berangkat }} - {{ $data->sppd->tempat_tujuan }} (PP)</td>
            </tr>
            <tr>
                <td>Nilai</td>
                <td>:</td>
                <td>Rp. {{ number_format($data->total_rincian, 0, ',', '.') }},-</td>
            </tr>
        </table>
    </div>

    <div class="sptjm-closing">
        Demikian Pernyataan Tanggung Jawab Mutlak ini saya buat dengan sesungguhnya untuk dipergunakan sebagaimana mestinya.
    </div>

    <div class="sptjm-signature-section">
        <div class="sptjm-signature-date"">Jayapura, {{ $data->sppd->created_at->isoFormat('D MMMM YYYY') }}</div>
        <div class="sptjm-signature-area">
            <div style="height: 50px;"></div>
        </div>
        <div class="sptjm-signature-name" style="text-decoration: underline;">{{ $data->sppd->pegawai->nama_pegawai ?? 'N/A' }}</div>
    </div>
</div>

</body>
</html>
