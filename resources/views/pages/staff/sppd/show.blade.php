@extends('layouts.staff_dashboard')

@section('contents')
        <div class="pagetitle">
            <h1>Detail Surat Perjalanan Dinas (SPPD)</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('staff.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('staff.sppd.index') }}">Data SPPD</a></li>
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
                                <h5 class="card-title pt-3">Detail untuk SPPD No: {{ $sppd->nomor_sppd }}</h5>
                                <div>
                                    {{-- Tombol aksi disatukan di sini --}}
                                    <a href="{{ route('staff.sppd.pdf', $sppd->id) }}" class="btn btn-success btn-sm" target="_blank"><i class="bi bi-printer"></i> Cetak PDF</a>
                                    <a href="{{ route('staff.sppd.edit', $sppd->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('staff.sppd.destroy', $sppd->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Hapus</button>
                                    </form>
                                </div>
                            </div>

                            {{-- DATA UMUM SPPD --}}
                            <div class="row mb-3">
                                <h6 class="card-subtitle mb-2 text-muted">Data Umum SPPD</h6>
                                <dl class="row">
                                    <dt class="col-sm-3">Nomor SPPD</dt>
                                    <dd class="col-sm-9">: {{ $sppd->nomor_sppd ?? '-' }}</dd>

                                    <dt class="col-sm-3">Kode No.</dt>
                                    <dd class="col-sm-9">: {{ $sppd->kode_no ?? '-' }}</dd>

                                    <dt class="col-sm-3">Lembar Ke</dt>
                                    <dd class="col-sm-9">: {{ $sppd->lembar_ke ?? '-' }}</dd>

                                    <dt class="col-sm-3">Status</dt>
                                    <dd class="col-sm-9">: <span class="badge bg-{{ ($sppd->status == 'terima' ? 'success' : ($sppd->status == 'tolak' ? 'danger' : ($sppd->status == 'mengajukan' ? 'warning' : 'secondary'))) }}">{{ $sppd->status }}</span></dd>
                                </dl>
                            </div>
                            <hr>

                            {{-- DATA PEGAWAI --}}
                            <div class="row mb-3">
                                <h6 class="card-subtitle mb-2 text-muted">Data Pegawai Yang Berangkat</h6>
                                <dl class="row">
                                    <dt class="col-sm-3">Nama Pegawai</dt>
                                    <dd class="col-sm-9">: {{ $sppd->pegawai->nama_pegawai ?? 'N/A' }}</dd>

                                    <dt class="col-sm-3">NIP</dt>
                                    <dd class="col-sm-9">: {{ $sppd->pegawai->nip ?? 'N/A' }}</dd>

                                    <dt class="col-sm-3">Jabatan</dt>
                                    <dd class="col-sm-9">: {{ $sppd->pegawai->jabatan ?? 'N/A' }}</dd>

                                    <dt class="col-sm-3">Pangkat dan Golongan</dt>
                                    <dd class="col-sm-9">: {{ $sppd->pangkat ?? '-' }}</dd>

                                    <dt class="col-sm-3">Tingkat Perjalanan Dinas</dt>
                                    <dd class="col-sm-9">: {{ $sppd->tingkat_perjalanan ?? '-' }}</dd>
                                </dl>
                            </div>
                            <hr>

                            {{-- DASAR & MAKSUD PERJALANAN --}}
                            <div class="row mb-3">
                                <h6 class="card-subtitle mb-2 text-muted">Dasar & Maksud Perjalanan</h6>
                                <dl class="row">
                                    <dt class="col-sm-3">Dasar Surat Perintah</dt>
                                    <dd class="col-sm-9">: {{ $sppd->dasar_perintah_tugas ?? '-' }}</dd>

                                    <dt class="col-sm-3">Tanggal Surat Perintah</dt>
                                    <dd class="col-sm-9">: {{ $sppd->dasar_tanggal ? \Carbon\Carbon::parse($sppd->dasar_tanggal)->isoFormat('D MMMM YYYY') : '-' }}</dd>

                                    <dt class="col-sm-3">Maksud Perjalanan</dt>
                                    <dd class="col-sm-9">: {{ $sppd->maksud_perjalanan ?? '-' }}</dd>
                                </dl>
                            </div>
                            <hr>

                            {{-- DETAIL PERJALANAN --}}
                            <div class="row mb-3">
                                <h6 class="card-subtitle mb-2 text-muted">Detail Perjalanan</h6>
                                <dl class="row">
                                    <dt class="col-sm-3">Alat Angkutan</dt>
                                    <dd class="col-sm-9">: {{ $sppd->alat_angkutan ?? '-' }}</dd>

                                    <dt class="col-sm-3">Tempat Berangkat</dt>
                                    <dd class="col-sm-9">: {{ $sppd->tempat_berangkat ?? '-' }}</dd>

                                    <dt class="col-sm-3">Tempat Tujuan</dt>
                                    <dd class="col-sm-9">: {{ $sppd->tempat_tujuan ?? '-' }}</dd>

                                    <dt class="col-sm-3">Lama Perjalanan</dt>
                                    <dd class="col-sm-9">: {{ $sppd->lama_perjalanan ?? '-' }}</dd>

                                    <dt class="col-sm-3">Tanggal Berangkat</dt>
                                    <dd class="col-sm-9">: {{ $sppd->tanggal_berangkat ? \Carbon\Carbon::parse($sppd->tanggal_berangkat)->isoFormat('D MMMM YYYY') : '-' }}</dd>

                                    <dt class="col-sm-3">Tanggal Kembali</dt>
                                    <dd class="col-sm-9">: {{ $sppd->tanggal_kembali ? \Carbon\Carbon::parse($sppd->tanggal_kembali)->isoFormat('D MMMM YYYY') : '-' }}</dd>
                                </dl>
                            </div>
                            <hr>

                            {{-- ANGGARAN & PENGIKUT --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="card-subtitle mb-2 text-muted">Anggaran</h6>
                                    <dl class="row">
                                        <dt class="col-sm-5">Instansi Pembebanan</dt>
                                        <dd class="col-sm-7">: {{ $sppd->instansi_pembebanan ?? '-' }}</dd>

                                        <dt class="col-sm-5">Mata Anggaran</dt>
                                        <dd class="col-sm-7">: {{ $sppd->mata_anggaran ?? '-' }}</dd>
                                    </dl>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="card-subtitle mb-2 text-muted">Pengikut & Keterangan</h6>
                                    <dl class="row">
                                        <dt class="col-sm-3">Pengikut</dt>
                                        <dd class="col-sm-9">: {!! nl2br(e($sppd->pengikut ?? '-')) !!}</dd>

                                        <dt class="col-sm-3">Keterangan</dt>
                                        <dd class="col-sm-9">: {{ $sppd->keterangan_lain ?? '-' }}</dd>
                                    </dl>
                                </div>
                            </div>

                            <div class="text-end mt-4">
                                <a href="{{ route('staff.sppd.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
