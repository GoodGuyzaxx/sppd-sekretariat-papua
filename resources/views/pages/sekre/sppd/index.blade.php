@extends('layouts.sekre_dashboard')

@section('contents')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Data SPPD</li>
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
                            <h5 class="card-title">Data SPPD</h5>
{{--                            <a href="{{ route('staff.sppd.create') }}" class="btn btn-md btn-primary mb-3">TAMBAH DATA</a>--}}

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nomor SPPD </th>
                                    <th scope="col">Nama Pegawai</th>
                                    <th scope="col">Keperluan SPPD</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Tanggal Di Ajukan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1 ?>
                                @forelse ($data as $value)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $value->sppd->nomor_sppd }}</td>
                                        <td>{{ $value->sppd->pegawai->nama_pegawai }}</td>
                                        <td>{{ $value->sppd->maksud_perjalanan }}</td>
                                        <td><span class="badge bg-{{ ($value->sppd->status == 'terima' ? 'success' : ($value->sppd->status == 'tolak' ? 'danger' : ($value->sppd->status == 'mengajukan' ? 'warning' : 'secondary'))) }}">{{ $value->sppd->status }}</span></td>
                                        <td>{{ $value->sppd->created_at->isoFormat('D MMMM YYYY') }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('staff.sppd.destroy', $value->sppd->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <a href="{{route('sekretaris.sppd.pdf',$value->id_rincian)}}" class="btn btn-sm btn-primary">Show</a>
                                                <a href="{{ route('sekretaris.sppd.terima', $value->id_rincian) }}" class="btn btn-sm btn-success">Verifikasi</a>
                                                <a href="{{ route('sekretaris.sppd.tolak', $value->id_rincian) }}" class="btn btn-sm btn-danger">Tolak</a>
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>--}}
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Belum ada Data Pengajuan SPPD
                                    </div>
                                @endforelse
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
{{--                              {{ $value->sppd->links() }}--}}
                        </div>
                    </div>

                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>
@endsection
