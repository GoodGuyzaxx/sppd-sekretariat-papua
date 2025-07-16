@extends('layouts.dashboard')

{{--@php--}}
{{--    $pegawai = 0;--}}
{{--    $surat_masuk = 0;--}}
{{--    if (\App\Models\Pegawai::whereNotNull('nama_pegawai')->orderBy('id', 'DESC')) {--}}
{{--        $pegawai = \App\Models\Pegawai::whereNotNull('nama_pegawai')->orderBy('id', 'DESC')->count();--}}
{{--    }--}}
{{--    if (\App\Models\Suratmasuk::whereYear('tgl_surat_masuk', date('Y'))->orderBy('id', 'DESC')) {--}}
{{--        $surat_masuk = \App\Models\Suratmasuk::whereYear('tgl_surat_masuk', date('Y'))->orderBy('id', 'DESC')->count();--}}
{{--    }--}}
{{--@endphp--}}

@section('contents')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Total Pegawai</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
{{--                                        <h6>--}}
{{--                                            <span data-counter="counterup" data-value="7800">{{ $pegawai }}</span>--}}
{{--                                            <small class="font-green-sharp"></small>--}}
{{--                                        </h6>--}}
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                    </div><!-- End Sales Card -->

                    <!-- Sales Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Total Surat Masuk</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                    <div class="ps-3">
{{--                                        <h6>--}}
{{--                                            <span data-counter="counterup" data-value="7800">{{ $surat_masuk }}</span>--}}
{{--                                            <small class="font-green-sharp"></small>--}}
{{--                                        </h6>--}}
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                    </div><!-- End Sales Card -->


                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>
@endsection
