// Watermark: Khoirun Nisak-202432028 | Sistem Informasi ITPLN

// A. Tampilkan pesan sambutan saat halaman selesai dimuat (window.onload)
window.onload = function() {
    const welcomeBox = document.getElementById('welcomeBox');
    welcomeBox.classList.remove('hidden'); // Memunculkan pesan sambutan
};

// B. Fungsi 1: Menghitung Nilai Akhir berdasarkan bobot (Tugas: 30%, UTS: 30%, UAS: 40%)
function hitungNilaiAkhir(tugas, uts, uas) {
    return (tugas * 0.3) + (uts * 0.3) + (uas * 0.4);
}

// C. Fungsi 2: Menentukan Huruf Grade sesuai ketentuan batas nilai di modul
function tentukanGrade(nilai) {
    if (nilai >= 80) return 'A';
    if (nilai >= 70) return 'B';
    if (nilai >= 60) return 'C';
    if (nilai >= 50) return 'D';
    return 'E';
}

// D. Fungsi 3: Validasi input (cek apakah kosong, bukan angka, atau di luar 0-100)
function validasiInput(nilai, nama) {
    if (nilai === "" || isNaN(nilai)) {
        return `Nilai ${nama} tidak boleh kosong dan harus berupa angka!`;
    }
    const num = parseFloat(nilai);
    if (num < 0 || num > 100) {
        return `Nilai ${nama} harus berada di dalam rentang rentang 0 - 100!`;
    }
    return null; // Mengembalikan null jika input valid tanpa error
}

// E. Event Listener untuk Tombol Hitung (Bukan pakai atribut onclick di HTML)
document.getElementById('btnHitung').addEventListener('click', function() {
    // Ambil nilai mentah dari input HTML
    const rawTugas = document.getElementById('tugas').value;
    const rawUts = document.getElementById('uts').value;
    const rawUas = document.getElementById('uas').value;

    const errorBox = document.getElementById('errorBox');
    const hasilBox = document.getElementById('hasilBox');

    // Tampilkan data mentah di console browser untuk log debugging aslab
    console.log("--- LOG DEBUGGING INPUT MENTAH ---");
    console.log("Nilai Input Tugas:", rawTugas);
    console.log("Nilai Input UTS:", rawUts);
    console.log("Nilai Input UAS:", rawUas);

    // Lakukan validasi satu per satu
    let errorMsg = validasiInput(rawTugas, "Tugas");
    if (!errorMsg) errorMsg = validasiInput(rawUts, "UTS");
    if (!errorMsg) errorMsg = validasiInput(rawUas, "UAS");

    // Jika ada error validasi
    if (errorMsg !== null) {
        errorBox.innerText = errorMsg;
        errorBox.classList.remove('hidden'); // Munculkan box error
        hasilBox.classList.add('hidden');    // Sembunyikan box hasil jika sebelumnya ada
        return; // Hentikan eksekusi program
    }

    // Jika aman lolos validasi, sembunyikan pesan error
    errorBox.classList.add('hidden');

    // Ubah nilai string menjadi angka float
    const nTugas = parseFloat(rawTugas);
    const nUts = parseFloat(rawUts);
    const nUas = parseFloat(rawUas);

    // Jalankan fungsi perhitungan & penentuan grade
    const nilaiAkhir = hitungNilaiAkhir(nTugas, nUts, nUas);
    const grade = tentukanGrade(nilaiAkhir);

    // Cetak hasil akhir ke console untuk debugging tambahan
    console.log("--- HASIL PROSES ---");
    console.log("Nilai Akhir Dihitung:", nilaiAkhir);
    console.log("Grade Ditentukan:", grade);

    // Manipulasi DOM untuk menampilkan hasil ke layar HTML
    document.getElementById('txtNilaiAkhir').innerText = nilaiAkhir.toFixed(2);
    
    const txtGrade = document.getElementById('txtGrade');
    txtGrade.innerText = grade;

    // Bersihkan class grade lama dan tambahkan class baru sesuai warna dinamis per grade
    txtGrade.className = "grade-badge"; 
    txtGrade.classList.add(`grade-${grade}`); // Menjadi class grade-A, grade-B, dst.

    // Tampilkan box hasil akhir ke layar pengguna
    hasilBox.classList.remove('hidden');
});