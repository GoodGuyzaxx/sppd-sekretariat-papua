@extends('layouts.staff_dashboard')

@section('contents')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Data Pegawai</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Formulir Edit Data SPPD</h5>

                        <form action="{{ route('staff.sppd.update', $data->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- DATA UMUM SPPD --}}
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="nomor_sppd" class="font-weight-bold">Nomor SPPD</label>
                                    <input type="text" class="form-control @error('nomor_sppd') is-invalid @enderror" name="nomor_sppd" value="{{ old('nomor_sppd', $data->nomor_sppd) }}" placeholder="Masukkan Nomor SPPD">
                                    @error('nomor_sppd')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="kode_no" class="font-weight-bold">Kode No.</label>
                                    <input type="text" class="form-control @error('kode_no') is-invalid @enderror" name="kode_no" value="{{ old('kode_no', $data->kode_no) }}" placeholder="Masukkan Kode No.">
                                    @error('kode_no')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="lembar_ke" class="font-weight-bold">Lembar Ke</label>
                                    <input type="text" class="form-control @error('lembar_ke') is-invalid @enderror" name="lembar_ke" value="{{ old('lembar_ke', $data->lembar_ke) }}" placeholder="Masukkan Lembar Ke">
                                    @error('lembar_ke')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            {{-- DATA PEGAWAI --}}
                            <h5 class="card-title mt-4">Data Pegawai Yang Berangkat</h5>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="id_pegawai" class="font-weight-bold">Nama Pegawai</label>
                                    <select name="id_pegawai" class="form-select @error('id_pegawai') is-invalid @enderror">
                                        <option value="">Pilih Pegawai</option>
                                        {{-- Asumsi variabel $pegawais di-pass dari controller --}}
                                        @foreach($pegawais as $item)
                                            <option value="{{ $item->id_pegawai }}" {{ old('id_pegawai', $data->id_pegawai) == $item->id_pegawai ? 'selected' : '' }}>
                                                {{ $item->nama_pegawai }} : {{ $item->id_pegawai }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_pegawai')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="pangkat" class="font-weight-bold">Pangkat dan Golongan</label>
                                    <input type="text" class="form-control @error('pangkat') is-invalid @enderror" name="pangkat" value="{{ old('pangkat', $data->pangkat) }}" placeholder="Cth: Penata Muda / III a">
                                    @error('pangkat')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="tingkat_perjalanan" class="font-weight-bold">Tingkat Perjalanan Dinas</label>
                                    <input type="text" class="form-control @error('tingkat_perjalanan') is-invalid @enderror" name="tingkat_perjalanan" value="{{ old('tingkat_perjalanan', $data->tingkat_perjalanan) }}" placeholder="Masukkan Tingkat Perjalanan">
                                    @error('tingkat_perjalanan')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            {{-- DASAR & MAKSUD PERJALANAN --}}
                            <h5 class="card-title mt-4">Dasar & Maksud Perjalanan</h5>
                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <label for="dasar_perintah_tugas" class="font-weight-bold">Dasar Surat Perintah Tugas</label>
                                    <input type="text" class="form-control @error('dasar_perintah_tugas') is-invalid @enderror" name="dasar_perintah_tugas" value="{{ old('dasar_perintah_tugas', $data->dasar_perintah_tugas) }}" placeholder="Masukkan Dasar Surat Perintah">
                                    @error('dasar_perintah_tugas')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="dasar_tanggal" class="font-weight-bold">Tanggal Surat Perintah</label>
                                    <input type="date" class="form-control @error('dasar_tanggal') is-invalid @enderror" name="dasar_tanggal" value="{{ old('dasar_tanggal', $data->dasar_tanggal) }}">
                                    @error('dasar_tanggal')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="maksud_perjalanan" class="font-weight-bold">Maksud Perjalanan Dinas</label>
                                <textarea name="maksud_perjalanan" class="form-control @error('maksud_perjalanan') is-invalid @enderror" rows="3" placeholder="Masukkan Maksud Perjalanan Dinas">{{ old('maksud_perjalanan', $data->maksud_perjalanan) }}</textarea>
                                @error('maksud_perjalanan')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                            </div>

                            {{-- DETAIL PERJALANAN --}}
                            <h5 class="card-title mt-4">Detail Perjalanan</h5>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="alat_angkutan" class="font-weight-bold">Alat Angkutan yang Digunakan</label>
                                    <input type="text" class="form-control @error('alat_angkutan') is-invalid @enderror" name="alat_angkutan" value="{{ old('alat_angkutan', $data->alat_angkutan) }}" placeholder="Cth: Kendaraan Dinas Roda 4">
                                    @error('alat_angkutan')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="lama_perjalanan" class="font-weight-bold">Lama Perjalanan Dinas</label>
                                    <input type="text" class="form-control @error('lama_perjalanan') is-invalid @enderror" name="lama_perjalanan" value="{{ old('lama_perjalanan', $data->lama_perjalanan) }}" placeholder="Cth: 5 (Lima) Hari">
                                    @error('lama_perjalanan')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="tempat_berangkat" class="font-weight-bold">Tempat Berangkat</label>
                                    <input type="text" class="form-control @error('tempat_berangkat') is-invalid @enderror" name="tempat_berangkat" value="{{ old('tempat_berangkat', $data->tempat_berangkat) }}" placeholder="Masukkan Tempat Berangkat">
                                    @error('tempat_berangkat')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="tempat_tujuan" class="font-weight-bold">Tempat Tujuan</label>
                                    <input type="text" class="form-control @error('tempat_tujuan') is-invalid @enderror" name="tempat_tujuan" value="{{ old('tempat_tujuan', $data->tempat_tujuan) }}" placeholder="Masukkan Tempat Tujuan">
                                    @error('tempat_tujuan')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="tanggal_berangkat" class="font-weight-bold">Tanggal Berangkat</label>
                                    <input type="date" class="form-control @error('tanggal_berangkat') is-invalid @enderror" name="tanggal_berangkat" value="{{ old('tanggal_berangkat', $data->tanggal_berangkat) }}">
                                    @error('tanggal_berangkat')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="tanggal_kembali" class="font-weight-bold">Tanggal Harus Kembali</label>
                                    <input type="date" class="form-control @error('tanggal_kembali') is-invalid @enderror" name="tanggal_kembali" value="{{ old('tanggal_kembali', $data->tanggal_kembali) }}">
                                    @error('tanggal_kembali')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            {{-- ANGGARAN & PENGIKUT --}}
                            <h5 class="card-title mt-4">Anggaran & Pengikut</h5>
                            <div class="form-group mb-3">
                                <label for="pengikut" class="font-weight-bold">Pengikut</label>
                                <textarea name="pengikut" class="form-control @error('pengikut') is-invalid @enderror" rows="3" placeholder="Nama pengikut, jika ada. Pisahkan dengan baris baru.">{{ old('pengikut', $data->pengikut) }}</textarea>
                                @error('pengikut')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                            </div>
                            <div class="row mb-3">
                                <div class="form-group">
                                    <label for="instansi_pembebanan" class="font-weight-bold">Pembebanan Anggaran (Instansi)</label>
                                    <input type="text" class="form-control @error('instansi_pembebanan') is-invalid @enderror" name="instansi_pembebanan" value="{{ old('instansi_pembebanan', $data->instansi_pembebanan) }}" placeholder="Masukkan Instansi Pembebanan Anggaran">
                                    @error('instansi_pembebanan')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="mata_anggaran" class="font-weight-bold">Mata Anggaran</label>
                                <textarea name="mata_anggaran" class="form-control @error('mata_anggaran') is-invalid @enderror" rows="2" placeholder="Masukkan Mata Anggaran">{{ old('mata_anggaran', $data->mata_anggaran) }}</textarea>
                                @error('mata_anggaran')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                            </div>

                            {{-- KETERANGAN LAIN --}}
                            <h5 class="card-title mt-4">Keterangan Lain</h5>
                            <div class="form-group mb-3">
                                <label for="keterangan_lain" class="font-weight-bold">Keterangan</label>
                                <textarea name="keterangan_lain" class="form-control @error('keterangan_lain') is-invalid @enderror" rows="3" placeholder="Masukkan Keterangan Lain, jika ada">{{ old('keterangan_lain', $data->keterangan_lain) }}</textarea>
                                @error('keterangan_lain')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">UPDATE</button>
                                <button type="reset" class="btn btn-warning">RESET</button>
                                <a href="{{ route('staff.sppd.index') }}" class="btn btn-secondary">KEMBALI</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
