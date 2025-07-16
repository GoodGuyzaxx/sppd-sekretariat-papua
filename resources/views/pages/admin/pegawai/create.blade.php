@extends('layouts.dashboard')

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

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tambah Data Pegawai</h5>

                            <form action="{{ route('admin.pegawai.store') }}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <div class="form-group">
                                    <label class="font-weight-bold">Nama Pegawai</label>
                                    <input type="text" class="form-control @error('nama_pegawai') is-invalid @enderror" name="nama_pegawai" value="{{ old('nama_pegawai') }}" placeholder="Masukkan Pegawai">

                                    <!-- error message untuk name -->
                                    @error('nama_pegawai')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">NIP</label>
                                    <input type="number" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ old('nip') }}" placeholder="Masukkan NIP">

                                    <!-- error message untuk nip -->
                                    @error('nip')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Jabatan</label>
                                    <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" placeholder="Masukkan Jabatan">

                                    <!-- error message untuk password -->
                                    @error('jabatan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Golongan</label>
                                    <input type="text" class="form-control @error('golongan') is-invalid @enderror" name="golongan" placeholder="Masukkan Golongan">

                                    <!-- error message untuk password -->
                                    @error('golongan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-md btn-primary mt-3">SIMPAN</button>
                                <button type="reset" class="btn btn-md btn-warning mt-3">RESET</button>
                                <a href="{{ route('admin.pegawai.index') }}" class="btn btn-md btn-secondary mt-3">KEMBALI</a>

                            </form>

                        </div>
                    </div>

                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>
@endsection
