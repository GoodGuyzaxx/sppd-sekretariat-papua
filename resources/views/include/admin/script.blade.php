<!-- Vendor JS Files -->
{{-- File JS Bootstrap sudah ada di sini, jadi versi CDN dihapus untuk menghindari konflik --}}
<script src="{{ asset('NiceAdmin') }}/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="{{ asset('NiceAdmin') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('NiceAdmin') }}/assets/vendor/chart.js/chart.umd.js"></script>
<script src="{{ asset('NiceAdmin') }}/assets/vendor/echarts/echarts.min.js"></script>
<script src="{{ asset('NiceAdmin') }}/assets/vendor/quill/quill.min.js"></script>
<script src="{{ asset('NiceAdmin') }}/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="{{ asset('NiceAdmin') }}/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="{{ asset('NiceAdmin') }}/assets/vendor/php-email-form/validate.js"></script>
<!-- Template Main JS File -->
<script src="{{ asset('NiceAdmin') }}/assets/js/main.js"></script>

<script>
    // Atur beberapa opsi default untuk Toastr (opsional)
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right", // Posisi notifikasi
    };

    // Tampilkan pesan notifikasi dari session
    @if(session()->has('success'))
    toastr.success("{{ session('success') }}", 'BERHASIL!');
    @elseif(session()->has('error'))
    toastr.error("{{ session('error') }}", 'GAGAL!');
    @endif
</script>
