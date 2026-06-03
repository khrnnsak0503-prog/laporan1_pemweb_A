<?php
// Watermark: Khoirun Nisak-202432028 | Sistem Informasi ITPLN

// 1. Inisialisasi variabel awal
$search_query = "";
$searched = false;
$found = false;

// Variabel untuk menyimpan data mata kuliah yang cocok nanti
$lab = "";
$nama_matkul = "";
$kode = "";
$sks = "";
$deskripsi = "";

// 2. Memproses form ketika tombol Cari ditekan
if (isset($_POST['cari'])) {
    $searched = true;
    if (isset($_POST['nama_input'])) {
        $search_query = trim($_POST['nama_input']);
        // Mengubah input menjadi huruf kecil semua sesuai instruksi modul
        $search_key = strtolower($search_query); 
        
        // 3. STRUKTUR IF / ELSEIF / ELSE UNTUK MENCUKUPI 8 MATA KULIAH
        if ($search_key == "pemrograman web") {
            $found = true;
            $lab = "Software Engineering Laboratory";
            $nama_matkul = "Pemrograman Web";
            $kode = "SEL-103";
            $sks = "3 SKS";
            $deskripsi = "Mempelajari pengembangan aplikasi berbasis web menggunakan HTML, CSS, PHP, dan database.";
        } 
        elseif ($search_key == "basis data" || $search_key == "sistem basis data") {
            $found = true;
            $lab = "Intelligent Computing Laboratory";
            $nama_matkul = "Sistem Basis Data";
            $kode = "SEL-102";
            $sks = "3 SKS";
            $deskripsi = "Mempelajari perancangan database, ERD, normalisasi, dan query SQL (DDL & DML).";
        } 
        elseif ($search_key == "struktur data") {
            $found = true;
            $lab = "Software Architecture And Quality Laboratory";
            $nama_matkul = "Struktur Data";
            $kode = "SEL-104";
            $sks = "3 SKS";
            $deskripsi = "Mempelajari implementasi array, objek, stack, queue, linked list, dan tree dalam pemrograman.";
        } 
        elseif ($search_key == "jaringan komputer" || $search_key == "jarkom") {
            $found = true;
            $lab = "Computer Network Laboratory";
            $nama_matkul = "Jaringan Komputer";
            $kode = "SEL-201";
            $sks = "3 SKS";
            $deskripsi = "Mempelajari topologi jaringan, subnetting IP Address, routing, VLAN, dan Cisco Packet Tracer.";
        } 
        elseif ($search_key == "sistem operasi") {
            $found = true;
            $lab = "Software Engineering Laboratory";
            $nama_matkul = "Sistem Operasi";
            $kode = "SEL-105";
            $sks = "2 SKS";
            $deskripsi = "Mempelajari manajemen memori, prosesor, file system, dan perintah dasar Linux Terminal.";
        } 
        elseif ($search_key == "keamanan siber" || $search_key == "cyber security") {
            $found = true;
            $lab = "Computer Network Laboratory";
            $nama_matkul = "Keamanan Siber";
            $kode = "SEL-302";
            $sks = "3 SKS";
            $deskripsi = "Mempelajari paket sniffing menggunakan Wireshark dan simulasi brute force attack.";
        } 
        elseif ($search_key == "rekayasa perangkat lunak" || $search_key == "rpl") {
            $found = true;
            $lab = "Software Engineering Laboratory";
            $nama_matkul = "Rekayasa Perangkat Lunak";
            $kode = "SEL-204";
            $sks = "3 SKS";
            $deskripsi = "Mempelajari siklus SDLC, pembuatan diagram UML, use case, dan manajemen project aplikasi.";
        } 
        elseif ($search_key == "data warehouse" || $search_key == "gudang data") {
            $found = true;
            $lab = "Intelligent Computing Laboratory";
            $nama_matkul = "Data Warehouse";
            $kode = "SEL-401";
            $sks = "3 SKS";
            $deskripsi = "Mempelajari arsitektur data warehouse, proses ETL, dan pengolahan data skala besar.";
        } 
        else {
            // Jika input tidak cocok dengan 8 mata kuliah di atas
            $found = false;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Mata Kuliah Laboratorium</title>
</head>
<body>

    <h2>Informasi Mata Kuliah Laboratorium</h2>
    
    <!-- Bagian Nama dan NIM Kamu Sesuai Instruksi Modul -->
    <p>
        Nama: Khoirun Nisak<br>
        Nim: 202432028
    </p>

    <!-- Form HTML dengan Method POST -->
    <form action="matkul.php" method="POST">
        <label for="nama_matkul">Nama Mata Kuliah :</label><br>
        <input type="text" id="nama_matkul" name="nama_input" placeholder="Contoh: Pemrograman Web" value="<?php echo htmlspecialchars($search_query); ?>"><br><br>
        <button type="submit" name="cari">Cari</button>
    </form>

    <br>

    <!-- Logika Output Tampilan -->
    <?php if ($searched): ?>
        <?php if ($found): ?>
            <!-- Jika ditemukan, tampilkan informasi lengkap di dalam fieldset -->
            <fieldset>
                <legend>Hasil Pencarian</legend>
                <?php
                echo "Laboratorium : " . $lab . "<br>";
                echo "Nama Mata Kuliah : " . $nama_matkul . "<br>";
                echo "Kode : " . $kode . "<br>";
                echo "SKS : " . $sks . "<br>";
                echo "Deskripsi : " . $deskripsi . "<br>";
                ?>
            </fieldset>
        <?php else: ?>
            <!-- Jika tidak ditemukan, tampilkan pesan error -->
            <p>Mata kuliah "<?php echo htmlspecialchars($search_query); ?>" tidak tersedia.</p>
        <?php endif; ?>
    <?php endif; ?>

</body>
</html>