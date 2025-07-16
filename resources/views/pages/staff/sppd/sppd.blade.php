<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Perjalanan Dinas - {{ $sppd->pegawai->nama_pegawai ?? 'Nama Pegawai' }}</title>
    <style>
        @page {
            /* Ukuran F4 atau Folio */
            size: 21.5cm 33cm;
            /* Margin standar untuk dokumen resmi */
            margin: 2.5cm 2cm;
        }
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            color: black;
        }
        /* Hapus style yang tidak perlu karena sudah diatur @page */
    </style>
</head>
<body>

    {{-- ================= HEADER ================= --}}
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
                        <td>{{ $sppd->lembar_ke ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Kode No.</td>
                        <td style="padding: 0 5px;">:</td>
                        <td>{{ $sppd->kode_no ?? '090' }}</td>
                    </tr>
                    <tr>
                        <td>Nomor</td>
                        <td style="padding: 0 5px;">:</td>
                        <td>{{ $sppd->nomor_sppd ?? '' }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <h3 style="text-align: center; text-decoration: underline; margin-top: 10px; margin-bottom: 20px;">
        SURAT PERJALANAN DINAS
    </h3>

    {{-- ================= TABEL UTAMA ================= --}}
    <table style="width: 100%; border-collapse: collapse;">
        <tbody>
        <tr style="border: 1px solid black;">
            <td style="width: 40%; border: 1px solid black; padding: 8px; vertical-align: top;">1. Pejabat berwenang yang memberi perintah</td>
            <td style="width: 60%; border: 1px solid black; padding: 8px; vertical-align: top;">{{ $sppd->pejabat_pemberi_perintah ?? 'SEKRETARIS DPR PAPUA' }}</td>
        </tr>
        <tr style="border: 1px solid black;">
            <td style="border: 1px solid black; padding: 8px; vertical-align: top;">2. Nama Anggota/Pegawai yang diperintahkan</td>
            <td style="border: 1px solid black; padding: 8px; vertical-align: top;">{{ $sppd->pegawai->nama_pegawai ?? 'N/A' }}</td>
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
                a. {{ $sppd->pangkat ?? '' }}<br>
                b. {{ $sppd->pegawai->jabatan ?? 'N/A' }}<br>
                c. {{ $sppd->gaji_pokok ?? '' }}<br>
                d. {{ $sppd->tingkat_perjalanan ?? '' }}
            </td>
        </tr>
        <tr style="border: 1px solid black;">
            <td style="border: 1px solid black; padding: 8px; vertical-align: top;">4. Dasar</td>
            <td style="border: 1px solid black; padding: 8px; vertical-align: top;">
                SURAT PERINTAH TUGAS PIMPINAN DEWAN<br>
                <div style="padding-left: 15px;">
                    NOMOR &nbsp;&nbsp;&nbsp;: {{ $sppd->dasar_perintah_tugas ?? '' }}<br>
                    TANGGAL : {{ $sppd->dasar_tanggal ? \Carbon\Carbon::parse($sppd->dasar_tanggal)->isoFormat('D MMMM YYYY') : '' }}
                </div>
            </td>
        </tr>
        <tr style="border: 1px solid black;">
            <td style="border: 1px solid black; padding: 8px; vertical-align: top;">5. Maksud Perjalanan Dinas</td>
            <td style="border: 1px solid black; padding: 8px; vertical-align: top;">{{ $sppd->maksud_perjalanan ?? '' }}</td>
        </tr>
        <tr style="border: 1px solid black;">
            <td style="border: 1px solid black; padding: 8px; vertical-align: top;">6. Alat Angkutan yang digunakan</td>
            <td style="border: 1px solid black; padding: 8px; vertical-align: top;">{{ $sppd->alat_angkutan ?? 'ANGKUTAN DARAT' }}</td>
        </tr>
        <tr style="border: 1px solid black;">
            <td style="border: 1px solid black; padding: 8px; vertical-align: top;">
                7. a. Tempat berangkat<br>
                b. Tempat tujuan
            </td>
            <td style="border: 1px solid black; padding: 8px; vertical-align: top;">
                a. {{ $sppd->tempat_berangkat ?? 'JAYAPURA' }}<br>
                b. {{ $sppd->tempat_tujuan ?? 'KAB. JAYAPURA (PP)' }}
            </td>
        </tr>
        <tr style="border: 1px solid black;">
            <td style="border: 1px solid black; padding: 8px; vertical-align: top;">
                8. a. Lamanya perjalanan dinas<br>
                b. Tanggal berangkat<br>
                c. Tanggal harus kembali
            </td>
            <td style="border: 1px solid black; padding: 8px; vertical-align: top;">
                a. {{ $sppd->lama_perjalanan ?? '5 (LIMA) HARI' }}<br>
                b. {{ $sppd->tanggal_berangkat ? \Carbon\Carbon::parse($sppd->tanggal_berangkat)->isoFormat('D MMMM YYYY') : 'KESEMPATAN PERTAMA' }}<br>
                c. {{ $sppd->tanggal_kembali ? \Carbon\Carbon::parse($sppd->tanggal_kembali)->isoFormat('D MMMM YYYY') : 'SELESAI DINAS' }}
            </td>
        </tr>
        <tr style="border: 1px solid black;">
            <td style="border: 1px solid black; padding: 8px; vertical-align: top;">9. Pengikut</td>
            <td style="border: 1px solid black; padding: 8px; vertical-align: top;">
                {{ $sppd->pengikut ?? '===' }}
            </td>
        </tr>
        <tr style="border: 1px solid black;">
            <td style="border: 1px solid black; padding: 8px; vertical-align: top;">
                10. Pembebanan Anggaran<br>
                a. Instansi<br>
                b. Mata Anggaran
            </td>
            <td style="border: 1px solid black; padding: 8px; vertical-align: top;">
                a. {{ $sppd->instansi_pembebanan ?? '' }}<br>
                b. {{ $sppd->mata_anggaran ?? '' }}
            </td>
        </tr>
        <tr style="border: 1px solid black;">
            <td style="border: 1px solid black; padding: 8px; vertical-align: top;">11. Keterangan lain-lain</td>
            <td style="border: 1px solid black; padding: 8px; vertical-align: top;">{{ $sppd->keterangan_lain ?? '' }}</td>
        </tr>
        </tbody>
    </table>

    {{-- ================= FOOTER / TANDA TANGAN ================= --}}
    <div style="width: 45%; margin-left: auto; margin-top: 20px; text-align: left;">
        <p style="margin: 2px 0;">Dikeluarkan di : JAYAPURA</p>
        <p style="margin: 2px 0;">Pada tanggal &nbsp;&nbsp;&nbsp;: {{ $sppd->dasar_tanggal ? \Carbon\Carbon::parse($sppd->dasar_tanggal)->isoFormat('D MMMM YYYY') : '' }}</p>
        <div style="text-align: center; margin-top: 15px; height: 80px;">
            SEKRETARIS DPR PAPUA
        </div>
        <div style="text-align: center;">
            <span style="font-weight: bold; text-decoration: underline;">DR. JULIANA J. WAROMI, SE.,M.Si.</span><br>
            PEMBINA UTAMA MADYA<br>
            NIP. 19660314 198603 2 012
        </div>
    </div>

</body>
</html>
