@extends('layouts.staff_dashboard')

@section('contents')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('kasubag') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('kasubag.laporan.index') }}">Data SPPD</a></li>
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
                            <h5 class="card-title">Laporan Pengajuan SPPD / SPT </h5>
                            {{--                            <a href="{{ route('staff.rincian.create') }}" class="btn btn-md btn-primary mb-3">TAMBAH RINCIAN</a>--}}

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nomor SPPD</th>
                                    <th scope="col">Nama Pegawai</th>
                                    <th scope="col">Maksud Perjalanan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Di Verifikasi Pada</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1 ?>
                                @forelse ($data as $rincian)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $rincian->sppd->nomor_sppd }}</td>
                                        <td>{{ $rincian->sppd->pegawai->nama_pegawai }}</td>
                                        <td><strong>Rp {{ number_format($rincian->total_rincian, 0, ',', '.') }}</strong></td>
                                        <td><span class="badge bg-success">{{ $rincian->sppd->status }}</span></td>
                                        <td>{{$rincian->updated_at->isoFormat('D MMMM YYYY')}}</td>
                                        <td class="text-center">
                                            <a href="{{route('staff.laporan.pdf', $rincian->id_rincian)}}" class="btn btn-sm btn-success">Cetak</a>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data SPPD Terverifikasi belum Tersedia.
                                    </div>
                                @endforelse
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>

                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>
@endsection
