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
