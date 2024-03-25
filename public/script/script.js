
// Buat Check Password
function togglePasswordVisibility(inputId, eyeIconId) {
    const input = document.getElementById(inputId);
    const eyeIcon = document.getElementById(eyeIconId);
    if (input.type === "password") {
        input.type = "text";
        eyeIcon.innerHTML = `
            <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4 6-9 6s-9-4.8-9-6c0-1.2 4-6 9-6s9 4.8 9 6Z"/>
            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>   
        `;
    } else {
        input.type = "password";
        eyeIcon.innerHTML = `
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 14c-.5-.6-.9-1.3-1-2 0-1 4-6 9-6m7.6 3.8A5 5 0 0 1 21 12c0 1-3 6-9 6h-1m-6 1L19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
        `;
    }
}

// Buat Profile bisa berubah
function previewImage(input) {
    const imagePreview = document.getElementById('imagePreview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            imagePreview.src = e.target.result;
        }

        reader.readAsDataURL(input.files[0]);
    }
}

// Fungsi untuk menghitung durasi antara dua waktu
document.addEventListener("DOMContentLoaded", function() {
    function hitungDurasi() {
        var awal = new Date(document.getElementById('tgl_awal').value);
        var akhir = new Date(document.getElementById('tgl_akhir').value);

        // Cek apakah kedua input memiliki nilai yang valid
        if (isNaN(awal.getTime()) || isNaN(akhir.getTime())) {
            document.getElementById('lama_kegiatan').value = "0 jam 0 menit";
            return;
        }

        var selisih = akhir.getTime() - awal.getTime();
        var jam = Math.floor(selisih / (1000 * 60 * 60));
        var menit = Math.floor((selisih % (1000 * 60 * 60)) / (1000 * 60));

        document.getElementById('lama_kegiatan').value = jam + " jam " + menit + " menit";
    }

    document.getElementById('tgl_awal').addEventListener('change', hitungDurasi);
    document.getElementById('tgl_akhir').addEventListener('change', hitungDurasi);

    // Hitung durasi awal saat halaman dimuat
    hitungDurasi();
});
