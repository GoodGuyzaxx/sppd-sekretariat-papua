@extends('layouts.dashboard')

@section('contents')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Data Akun</li>
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
                            <h5 class="card-title">Data Akun Pengguna</h5>
                            <a href="{{ route('admin.users.create') }}" class="btn btn-md btn-primary mb-3">TAMBAH DATA</a>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama </th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1 ?>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role_name }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Pegawai belum Tersedia.
                                    </div>
                                @endforelse
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                            {{--  {{ $pegawai->links() }}  --}}
                        </div>
                    </div>

                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>
@endsection
