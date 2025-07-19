@extends('layouts.staff_dashboard')

@section('contents')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('staff.sppd.index') }}">Data SPPD</a></li>
                <li class="breadcrumb-item"><a href="{{ route('staff.rincian.index') }}">Rincian Biaya</a></li>
                <li class="breadcrumb-item active">Tambah Rincian</li>
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
                            <h5 class="card-title">Tambah Rincian Biaya SPPD</h5>

                            <!-- Form -->
                            <form action="{{ route('staff.rincian.store') }}" method="POST" class="row g-3">
                                @csrf

                                <!-- Pilih SPPD -->
                                <div class="col-md-12">
                                    <label for="id_sppd" class="form-label">Pilih SPPD <span class="text-danger">*</span></label>
                                    <select class="form-select @error('id_sppd') is-invalid @enderror" id="id_sppd" name="id_sppd" required>
                                        <option value="">-- Pilih SPPD --</option>
                                        @foreach($sppd as $item)
                                            <option value="{{ $item->id }}" {{ old('id_sppd') == $item->id ? 'selected' : '' }}>
                                                {{ $item->nomor_sppd }} - {{ $item->pegawai->nama_pegawai }} ({{ $item->maksud_perjalanan }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_sppd')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tiket Pergi -->
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="card-title mb-0"><i class="bi bi-airplane-engines"></i> Tiket Pergi</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="harga_tiket_pergi" class="form-label">Harga Tiket Pergi <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">Rp</span>
                                                        <input type="number" class="form-control @error('harga_tiket_pergi') is-invalid @enderror"
                                                               id="harga_tiket_pergi" name="harga_tiket_pergi"
                                                               value="{{ old('harga_tiket_pergi') }}"
                                                               placeholder="0" required>
                                                        @error('harga_tiket_pergi')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="jumlah_tiket_pergi" class="form-label">Jumlah Tiket Pergi <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control @error('jumlah_tiket_pergi') is-invalid @enderror"
                                                           id="jumlah_tiket_pergi" name="jumlah_tiket_pergi"
                                                           value="{{ old('jumlah_tiket_pergi', 1) }}"
                                                           placeholder="1" required>
                                                    @error('jumlah_tiket_pergi')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="biaya_tiket_pergi" class="form-label">Total Biaya Tiket Pergi</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">Rp</span>
                                                        <input type="hidden" id="biaya_tiket_pergi_hidden" name="biaya_tiket_pergi" value="{{ old('biaya_tiket_pergi') }}">
                                                        <input type="text" class="form-control bg-light"
                                                               id="biaya_tiket_pergi_display"
                                                               value="{{ old('biaya_tiket_pergi') ? number_format(old('biaya_tiket_pergi'), 0, ',', '.') : '0' }}"
                                                               readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tiket Pulang -->
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="card-title mb-0"><i class="bi bi-airplane-engines-fill"></i> Tiket Pulang</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="harga_tiket_pulang" class="form-label">Harga Tiket Pulang <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">Rp</span>
                                                        <input type="number" class="form-control @error('harga_tiket_pulang') is-invalid @enderror"
                                                               id="harga_tiket_pulang" name="harga_tiket_pulang"
                                                               value="{{ old('harga_tiket_pulang') }}"
                                                               placeholder="0" required>
                                                        @error('harga_tiket_pulang')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="jumlah_tiket_pulang" class="form-label">Jumlah Tiket Pulang <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control @error('jumlah_tiket_pulang') is-invalid @enderror"
                                                           id="jumlah_tiket_pulang" name="jumlah_tiket_pulang"
                                                           value="{{ old('jumlah_tiket_pulang', 1) }}"
                                                           placeholder="1" required>
                                                    @error('jumlah_tiket_pulang')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="biaya_tiket_pulang" class="form-label">Total Biaya Tiket Pulang</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">Rp</span>
                                                        <input type="hidden" id="biaya_tiket_pulang_hidden" name="biaya_tiket_pulang" value="{{ old('biaya_tiket_pulang') }}">
                                                        <input type="text" class="form-control bg-light"
                                                               id="biaya_tiket_pulang_display"
                                                               value="{{ old('biaya_tiket_pulang') ? number_format(old('biaya_tiket_pulang'), 0, ',', '.') : '0' }}"
                                                               readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Transportasi Lokal -->
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="card-title mb-0"><i class="bi bi-bus-front"></i> Transportasi Lokal</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="harga_transportasi_lokal" class="form-label">Biaya Transportasi per Hari <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">Rp</span>
                                                        <input type="number" class="form-control @error('harga_transportasi_lokal') is-invalid @enderror"
                                                               id="harga_transportasi_lokal" name="harga_transportasi_lokal"
                                                               value="{{ old('harga_transportasi_lokal') }}"
                                                               placeholder="0" required>
                                                        @error('harga_transportasi_lokal')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="jumlah_hari_transportasi" class="form-label">Jumlah Hari Transportasi <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control @error('jumlah_hari_transportasi') is-invalid @enderror"
                                                           id="jumlah_hari_transportasi" name="jumlah_hari_transportasi"
                                                           value="{{ old('jumlah_hari_transportasi', 1) }}"
                                                           placeholder="1" required>
                                                    @error('jumlah_hari_transportasi')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="biaya_transportasi_lokal" class="form-label">Total Biaya Transportasi</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">Rp</span>
                                                        <input type="hidden" id="biaya_transportasi_lokal_hidden" name="biaya_transportasi_lokal" value="{{ old('biaya_transportasi_lokal') }}">
                                                        <input type="text" class="form-control bg-light"
                                                               id="biaya_transportasi_lokal_display"
                                                               value="{{ old('biaya_transportasi_lokal') ? number_format(old('biaya_transportasi_lokal'), 0, ',', '.') : '0' }}"
                                                               readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Penginapan -->
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="card-title mb-0"><i class="bi bi-building"></i> Penginapan</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="harga_penginapan" class="form-label">Biaya Penginapan per Hari <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">Rp</span>
                                                        <input type="number" class="form-control @error('harga_penginapan') is-invalid @enderror"
                                                               id="harga_penginapan" name="harga_penginapan"
                                                               value="{{ old('harga_penginapan') }}"
                                                               placeholder="0" required>
                                                        @error('harga_penginapan')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="jumlah_penginapan_hari" class="form-label">Jumlah Hari Penginapan <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control @error('jumlah_penginapan_hari') is-invalid @enderror"
                                                           id="jumlah_penginapan_hari" name="jumlah_penginapan_hari"
                                                           value="{{ old('jumlah_penginapan_hari', 1) }}"
                                                           placeholder="1" required>
                                                    @error('jumlah_penginapan_hari')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <label for="biaya_penginapan" class="form-label">Total Biaya Penginapan</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">Rp</span>
                                                        <input type="hidden" id="biaya_penginapan_hidden" name="biaya_penginapan" value="{{ old('biaya_penginapan') }}">
                                                        <input type="text" class="form-control bg-light"
                                                               id="biaya_penginapan_display"
                                                               value="{{ old('biaya_penginapan') ? number_format(old('biaya_penginapan'), 0, ',', '.') : '0' }}"
                                                               readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Uang Saku -->
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="card-title mb-0"><i class="bi bi-wallet2"></i> Uang Saku</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="harga_uang_saku" class="form-label">Uang Saku per Hari <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">Rp</span>
                                                        <input type="number" class="form-control @error('harga_uang_saku') is-invalid @enderror"
                                                               id="harga_uang_saku" name="harga_uang_saku"
                                                               value="{{ old('harga_uang_saku') }}"
                                                               placeholder="0" required>
                                                        @error('harga_uang_saku')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="jumlah_uang_saku" class="form-label">Jumlah Hari Uang Saku <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control @error('jumlah_uang_saku') is-invalid @enderror"
                                                           id="jumlah_uang_saku" name="jumlah_uang_saku"
                                                           value="{{ old('jumlah_uang_saku', 1) }}"
                                                           placeholder="1" required>
                                                    @error('jumlah_uang_saku')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <label for="biaya_uang_saku" class="form-label">Total Uang Saku</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">Rp</span>
                                                        <input type="hidden" id="biaya_uang_saku_hidden" name="biaya_uang_saku" value="{{ old('biaya_uang_saku') }}">
                                                        <input type="text" class="form-control bg-light"
                                                               id="biaya_uang_saku_display"
                                                               value="{{ old('biaya_uang_saku') ? number_format(old('biaya_uang_saku'), 0, ',', '.') : '0' }}"
                                                               readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Total Rincian -->
                                <div class="col-12">
                                    <div class="card border-primary">
                                        <div class="card-header bg-primary text-white">
                                            <h6 class="card-title mb-0"><i class="bi bi-calculator"></i> Total Rincian</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="total_rincian" class="form-label">Total Seluruh Biaya</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">Rp</span>
                                                        <input type="hidden" id="total_rincian_hidden" name="total_rincian" value="{{ old('total_rincian') }}">
                                                        <input type="text" class="form-control bg-light fw-bold"
                                                               id="total_rincian_display"
                                                               value="{{ old('total_rincian') ? number_format(old('total_rincian'), 0, ',', '.') : '0' }}"
                                                               readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary me-2">
                                        <i class="bi bi-check-circle"></i> Simpan
                                    </button>
                                    <a href="{{ route('staff.rincian.index') }}" class="btn btn-secondary">
                                        <i class="bi bi-x-circle"></i> Batal
                                    </a>
                                </div>
                            </form>
                            <!-- End Form -->

                        </div>
                    </div>

                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>

    <script>
        // Auto calculate functions
        function formatNumber(num) {
            return new Intl.NumberFormat('id-ID').format(num);
        }

        function calculateTicketPergi() {
            const harga = parseFloat(document.getElementById('harga_tiket_pergi').value) || 0;
            const jumlah = parseInt(document.getElementById('jumlah_tiket_pergi').value) || 0;
            const total = harga * jumlah;

            document.getElementById('biaya_tiket_pergi_hidden').value = total;
            document.getElementById('biaya_tiket_pergi_display').value = formatNumber(total);
            calculateTotal();
        }

        function calculateTicketPulang() {
            const harga = parseFloat(document.getElementById('harga_tiket_pulang').value) || 0;
            const jumlah = parseInt(document.getElementById('jumlah_tiket_pulang').value) || 0;
            const total = harga * jumlah;

            document.getElementById('biaya_tiket_pulang_hidden').value = total;
            document.getElementById('biaya_tiket_pulang_display').value = formatNumber(total);
            calculateTotal();
        }

        function calculatePenginapan() {
            const harga = parseFloat(document.getElementById('harga_penginapan').value) || 0;
            const jumlah = parseInt(document.getElementById('jumlah_penginapan_hari').value) || 0;
            const total = harga * jumlah;

            document.getElementById('biaya_penginapan_hidden').value = total;
            document.getElementById('biaya_penginapan_display').value = formatNumber(total);
            calculateTotal();
        }

        function calculateUangSaku() {
            const harga = parseFloat(document.getElementById('harga_uang_saku').value) || 0;
            const jumlah = parseInt(document.getElementById('jumlah_uang_saku').value) || 0;
            const total = harga * jumlah;

            document.getElementById('biaya_uang_saku_hidden').value = total;
            document.getElementById('biaya_uang_saku_display').value = formatNumber(total);
            calculateTotal();
        }

        function calculateTransportasi() {
            const harga = parseFloat(document.getElementById('harga_transportasi_lokal').value) || 0;
            const jumlah = parseInt(document.getElementById('jumlah_hari_transportasi').value) || 0;
            const total = harga * jumlah;

            document.getElementById('biaya_transportasi_lokal_hidden').value = total;
            document.getElementById('biaya_transportasi_lokal_display').value = formatNumber(total);
            calculateTotal();
        }

        function calculateTotal() {
            const biayaTicketPergi = parseFloat(document.getElementById('biaya_tiket_pergi_hidden').value) || 0;
            const biayaTicketPulang = parseFloat(document.getElementById('biaya_tiket_pulang_hidden').value) || 0;
            const biayaTransportasi = parseFloat(document.getElementById('biaya_transportasi_lokal_hidden').value) || 0;
            const biayaPenginapan = parseFloat(document.getElementById('biaya_penginapan_hidden').value) || 0;
            const biayaUangSaku = parseFloat(document.getElementById('biaya_uang_saku_hidden').value) || 0;

            const total = biayaTicketPergi + biayaTicketPulang + biayaTransportasi + biayaPenginapan + biayaUangSaku;

            document.getElementById('total_rincian_hidden').value = total;
            document.getElementById('total_rincian_display').value = formatNumber(total);
        }

        // Event listeners
        document.getElementById('harga_tiket_pergi').addEventListener('input', calculateTicketPergi);
        document.getElementById('jumlah_tiket_pergi').addEventListener('input', calculateTicketPergi);
        document.getElementById('harga_tiket_pulang').addEventListener('input', calculateTicketPulang);
        document.getElementById('jumlah_tiket_pulang').addEventListener('input', calculateTicketPulang);
        document.getElementById('harga_transportasi_lokal').addEventListener('input', calculateTransportasi);
        document.getElementById('jumlah_hari_transportasi').addEventListener('input', calculateTransportasi);
        document.getElementById('harga_penginapan').addEventListener('input', calculatePenginapan);
        document.getElementById('jumlah_penginapan_hari').addEventListener('input', calculatePenginapan);
        document.getElementById('harga_uang_saku').addEventListener('input', calculateUangSaku);
        document.getElementById('jumlah_uang_saku').addEventListener('input', calculateUangSaku);

        // Calculate on page load if old values exist
        document.addEventListener('DOMContentLoaded', function() {
            // Initial calculations to display old values if they exist
            calculateTicketPergi();
            calculateTicketPulang();
            calculateTransportasi();
            calculatePenginapan();
            calculateUangSaku();
        });
    </script>
@endsection
