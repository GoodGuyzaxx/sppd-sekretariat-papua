@extends('layouts.dashboard')

@section('contents')
    <!DOCTYPE html>
<html lang="en">

<head>
    {{-- Bagian head sama persis dengan file create Anda --}}
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Edit Data Pegawai - NiceAdmin</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="{{ asset('NiceAdmin') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ asset('NiceAdmin') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="{{ asset('NiceAdmin') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('NiceAdmin') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('NiceAdmin') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('NiceAdmin') }}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('NiceAdmin') }}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="{{ asset('NiceAdmin') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ asset('NiceAdmin') }}/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <link href="{{ asset('NiceAdmin') }}/assets/css/style.css" rel="stylesheet">
</head>

<body>
<main id="main" class="main">

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

</main>{{-- Bagian script di bawah tidak perlu diubah --}}
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<script src="{{ asset('NiceAdmin') }}/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="{{ asset('NiceAdmin') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('NiceAdmin') }}/assets/vendor/chart.js/chart.umd.js"></script>
<script src="{{ asset('NiceAdmin') }}/assets/vendor/echarts/echarts.min.js"></script>
<script src="{{ asset('NiceAdmin') }}/assets/vendor/quill/quill.min.js"></script>
<script src="{{ asset('NiceAdmin') }}/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="{{ asset('NiceAdmin') }}/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="{{ asset('NiceAdmin') }}/assets/vendor/php-email-form/validate.js"></script>

<script src="{{ asset('NiceAdmin') }}/assets/js/main.js"></script>

</body>
</html>
@endsection
