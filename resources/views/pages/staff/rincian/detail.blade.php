@extends('layouts.staff_dashboard')

@section('contents')
<div class="pagetitle">
    <h1>Detail Rincian Biaya Perjalanan Dinas</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('staff.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('staff.rincian.index') }}">Rincian Biaya</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title pt-3">Rincian untuk SPPD No: {{ $rincian->sppd->nomor_sppd }}</h5>
                        <div>
                            {{-- Tombol ini akan merujuk ke route yang memuat file PDF --}}
                                    <a href="{{ route('staff.rincian.pdf', $rincian->id_rincian) }}" class="btn btn-success btn-sm" target="_blank"><i class="bi bi-printer"></i> Cetak PDF</a>
{{--                                    <a href="{{ route('staff.rincian.edit', $rincian->id_rincian) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>--}}
                        </div>
                    </div>

                    {{-- DATA UMUM --}}
                    <div class="row mb-3">
                        <h6 class="card-subtitle mb-2 text-muted">Informasi Umum</h6>
                        <dl class="row">
                            <dt class="col-sm-3">Nomor SPPD</dt>
                            <dd class="col-sm-9">: {{ $rincian->sppd->nomor_sppd ?? '-' }}</dd>

                            <dt class="col-sm-3">Nama Pegawai</dt>
                            <dd class="col-sm-9">: {{ $rincian->sppd->pegawai->nama_pegawai ?? 'N/A' }}</dd>

                            <dt class="col-sm-3">Maksud Perjalanan</dt>
                            <dd class="col-sm-9">: {{ $rincian->sppd->maksud_perjalanan ?? '-' }}</dd>
                        </dl>
                    </div>
                    <hr>

                    {{-- DETAIL BIAYA --}}
                    <div class="row">
                        <h6 class="card-subtitle mb-3 text-muted">Rincian Biaya</h6>
                        <table class="table table-bordered">
                            <thead class="table-light">
                            <tr>
                                <th>Keterangan</th>
                                <th class="text-end">Harga Satuan</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-end">Total Biaya</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{-- Tiket --}}
                            @php
                                $total_tiket_pergi = $rincian->harga_tiket_pergi * $rincian->jumlah_tiket_pergi;
                                $total_tiket_pulang = $rincian->harga_tiket_pulang * $rincian->jumlah_tiket_pulang;
                                $subtotal_tiket = $total_tiket_pergi + $total_tiket_pulang;
                            @endphp
                            <tr>
                                <td>Biaya Tiket Pergi</td>
                                <td class="text-end">Rp {{ number_format($rincian->harga_tiket_pergi, 0, ',', '.') }}</td>
                                <td class="text-center">{{ $rincian->jumlah_tiket_pergi }}</td>
                                <td class="text-end">Rp {{ number_format($total_tiket_pergi, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td>Biaya Tiket Pulang</td>
                                <td class="text-end">Rp {{ number_format($rincian->harga_tiket_pulang, 0, ',', '.') }}</td>
                                <td class="text-center">{{ $rincian->jumlah_tiket_pulang }}</td>
                                <td class="text-end">Rp {{ number_format($total_tiket_pulang, 0, ',', '.') }}</td>
                            </tr>

                            {{-- Transportasi Lokal --}}
                            @php
                                $total_transportasi = $rincian->harga_transportasi_lokal * $rincian->jumlah_hari_transportasi;
                            @endphp
                            <tr>
                                <td>Biaya Transportasi Lokal</td>
                                <td class="text-end">Rp {{ number_format($rincian->harga_transportasi_lokal, 0, ',', '.') }}</td>
                                <td class="text-center">{{ $rincian->jumlah_hari_transportasi }} hari</td>
                                <td class="text-end">Rp {{ number_format($total_transportasi, 0, ',', '.') }}</td>
                            </tr>

                            {{-- Penginapan --}}
                            @php
                                $total_penginapan = $rincian->harga_penginapan * $rincian->jumlah_penginapan_hari;
                            @endphp
                            <tr>
                                <td>Biaya Penginapan</td>
                                <td class="text-end">Rp {{ number_format($rincian->harga_penginapan, 0, ',', '.') }}</td>
                                <td class="text-center">{{ $rincian->jumlah_penginapan_hari }} hari</td>
                                <td class="text-end">Rp {{ number_format($total_penginapan, 0, ',', '.') }}</td>
                            </tr>

                            {{-- Uang Saku --}}
                            @php
                                $total_uang_saku = $rincian->harga_uang_saku * $rincian->jumlah_uang_saku;
                            @endphp
                            <tr>
                                <td>Uang Saku</td>
                                <td class="text-end">Rp {{ number_format($rincian->harga_uang_saku, 0, ',', '.') }}</td>
                                <td class="text-center">{{ $rincian->jumlah_uang_saku }} hari</td>
                                <td class="text-end">Rp {{ number_format($total_uang_saku, 0, ',', '.') }}</td>
                            </tr>
                            </tbody>
                            <tfoot class="table-primary">
                            <tr>
                                <th colspan="3" class="fs-5">GRAND TOTAL</th>
                                <th class="text-end fs-5">Rp {{ number_format($rincian->total_rincian, 0, ',', '.') }}</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="text-end mt-4">
                        <a href="{{ route('staff.rincian.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
