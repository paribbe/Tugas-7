<?php
include 'koneksi.php';  // Memasukkan koneksi database

// kondisi sumbit
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $npm = mysqli_real_escape_string($conn, $_POST['npm']);
    $nama_mahasiswa = mysqli_real_escape_string($conn, $_POST['nama_mahasiswa']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

    // Memastikan tidak ada inputan yg kosong
    if (!empty($npm) && !empty($nama_mahasiswa) && !empty($jurusan)) {
        $query = "INSERT INTO mahasiswa (npm, nama_mahasiswa, jurusan, alamat) VALUES ('$npm', '$nama_mahasiswa', '$jurusan', '$alamat')";

        if (mysqli_query($conn, $query)) {
            // pindah halaman saat berhasil ditambahkan
            header("Location: from-krs.php");
            exit(); 
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Semua field harus diisi.";
    }
} else {
    echo "Tombol submit belum ditekan.";
}
?>
