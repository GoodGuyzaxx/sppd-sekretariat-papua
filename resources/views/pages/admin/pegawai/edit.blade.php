@extends('layouts.dashboard')

@section('contents')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Data Pegawai</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div><section class="section dashboard">
        <div class="row">

            <div class="col-lg-12">
                <div class="row">

                    <div class="card">
                        <div class="card-body">
                            {{-- UBAH JUDUL --}}
                            <h5 class="card-title">Edit Data Pegawai</h5>

                            {{-- UBAH ACTION DAN TAMBAHKAN @method('PUT') --}}
                            <form action="{{ route('admin.pegawai.update', $pegawai->id_pegawai) }}" method="POST" enctype="multipart/form-data">

                                @csrf
                                @method('PUT')

                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">Nama Pegawai</label>
                                    {{-- UBAH VALUE INPUT --}}
                                    <input type="text" class="form-control @error('nama_pegawai') is-invalid @enderror" name="nama_pegawai" value="{{ old('nama_pegawai', $pegawai->nama_pegawai) }}" placeholder="Masukkan Pegawai">

                                    @error('nama_pegawai')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">NIP</label>
                                    {{-- UBAH VALUE INPUT --}}
                                    <input type="number" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ old('nip', $pegawai->nip) }}" placeholder="Masukkan NIP">

                                    @error('nip')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">Jabatan</label>
                                    {{-- UBAH VALUE INPUT --}}
                                    <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" value="{{ old('jabatan', $pegawai->jabatan) }}" placeholder="Masukkan Jabatan">

                                    @error('jabatan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">Golongan</label>
                                    {{-- UBAH VALUE INPUT --}}
                                    <input type="text" class="form-control @error('golongan') is-invalid @enderror" name="golongan" value="{{ old('golongan', $pegawai->golongan) }}" placeholder="Masukkan Golongan">

                                    @error('golongan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-md btn-primary mt-3">UPDATE</button>
                                <a href="{{ route('admin.pegawai.index') }}" class="btn btn-md btn-secondary mt-3">KEMBALI</a>

                            </form>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection
