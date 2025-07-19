@extends('layouts.staff_dashboard')

@section('contents')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('staff') }}">Home</a></li>
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
                            <a href="{{ route('staff.sppd.create') }}" class="btn btn-md btn-primary mb-3">TAMBAH DATA</a>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nomor SPPD </th>
                                    <th scope="col">Nama Pegawai</th>
                                    <th scope="col">Keperluan SPPD</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1 ?>
                                @forelse ($data as $sppd)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $sppd->nomor_sppd }}</td>
                                        <td>{{ $sppd->pegawai->nama_pegawai }}</td>
                                        <td>{{ $sppd->maksud_perjalanan }}</td>
                                        <td><span class="badge bg-{{ ($sppd->status == 'terima' ? 'success' : ($sppd->status == 'tolak' ? 'danger' : ($sppd->status == 'mengajukan' ? 'warning' : ($sppd->status == 'selesai' ? 'success' : ($sppd->status == 'Terverifikasi' ? 'primary': ''))))) }}">{{ $sppd->status }}</span></td>
                                        <td>{{ $sppd->created_at }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('staff.sppd.destroy', $sppd->id) }}" method="POST">
                                                <a href="{{ route('staff.sppd.show', $sppd->id) }}" class="btn btn-sm btn-primary">SHOW</a>
                                                <a href="{{ route('staff.sppd.edit', $sppd->id) }}" class="btn btn-sm btn-warning">EDIT</a>
                                                <a href="{{ route('staff.sppd.pdf', $sppd->id) }}" class="btn btn-sm btn-success">DOWNLOAD</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
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
{{--                              {{ $sppd->links() }}--}}
                        </div>
                    </div>

                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>
@endsection
