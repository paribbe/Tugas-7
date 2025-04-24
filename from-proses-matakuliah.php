<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodemk = mysqli_real_escape_string($conn, $_POST['kodemk']);
    $nama_matakuliah = mysqli_real_escape_string($conn, $_POST['nama_matakuliah']);
    $jumlah_sks = mysqli_real_escape_string($conn, $_POST['jumlah_sks']);

    if (!empty($kodemk) && !empty($nama_matakuliah) && !empty($jumlah_sks)) {
        $query = "INSERT INTO matakuliah (kodemk, nama_matakuliah, jumlah_sks) VALUES ('$kodemk', '$nama_matakuliah', $jumlah_sks)";

        if (mysqli_query($conn, $query)) {
            // Redirect ke tampilkan_matakuliah.php
            header("Location: tampilan-matakuliah.php");
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
