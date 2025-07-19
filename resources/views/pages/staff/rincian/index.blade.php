@extends('layouts.staff_dashboard')

@section('contents')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('staff.sppd.index') }}">Data SPPD</a></li>
                <li class="breadcrumb-item active">Rincian Biaya</li>
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
                            <h5 class="card-title">Rincian Biaya SPPD</h5>
                            <a href="{{ route('staff.rincian.create') }}" class="btn btn-md btn-primary mb-3">TAMBAH RINCIAN</a>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nomor SPPD</th>
                                    <th scope="col">Nama Pegawai</th>
                                    <th scope="col">Total Rincian</th>
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
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('staff.rincian.destroy', $rincian->id_rincian)}}" method="POST">
                                                <a href="{{route('staff.rincian.show', $rincian->id_rincian)}}" class="btn btn-sm btn-primary">SHOW</a>
{{--                                                <a href="{{ route('staff.rincian.edit', $rincian->id_rincian) }}" class="btn btn-sm btn-warning">EDIT</a>--}}
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Rincian belum Tersedia.
                                    </div>
                                @endforelse
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                            <!-- Summary Card -->
                            @if($data->count() > 0)
                                <div class="card mt-4">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">Ringkasan Total Biaya</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #f0f8ff; color: #0066cc;">
                                                        <i class="bi bi-airplane"></i>
                                                    </div>
                                                    <div class="ps-3">
                                                        <h6>Total Tiket</h6>
                                                        <span class="text-success small pt-1 fw-bold">Rp {{ number_format($data->sum(function($item) { return $item->harga_tiket_pergi + $item->harga_tiket_pulang; }), 0, ',', '.') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #f0fff0; color: #00cc66;">
                                                        <i class="bi bi-building"></i>
                                                    </div>
                                                    <div class="ps-3">
                                                        <h6>Total Penginapan</h6>
                                                        <span class="text-success small pt-1 fw-bold">Rp {{ number_format($data->sum(function($item) { return $item->harga_penginapan * $item->jumlah_penginapan_hari; }), 0, ',', '.') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #fff8f0; color: #cc6600;">
                                                        <i class="bi bi-wallet2"></i>
                                                    </div>
                                                    <div class="ps-3">
                                                        <h6>Total Uang Saku</h6>
                                                        <span class="text-success small pt-1 fw-bold">Rp {{ number_format($data->sum(function ($item){return $item->harga_uang_saku * $item->jumlah_uang_saku;}), 0, ',', '.') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #fff0f0; color: #cc0066;">
                                                        <i class="bi bi-calculator"></i>
                                                    </div>
                                                    <div class="ps-3">
                                                        <h6>Grand Total</h6>
                                                        <span class="text-danger small pt-1 fw-bold">Rp {{ number_format($data->sum('total_rincian'), 0, ',', '.') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <!-- End Summary Card -->

                            {{--                              {{ $data->links() }}--}}
                        </div>
                    </div>

                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>
@endsection
