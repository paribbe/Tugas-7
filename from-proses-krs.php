<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mahasiswa_npm = mysqli_real_escape_string($conn, $_POST['mahasiswa_npm']);
    $matakuliah_kodemk = mysqli_real_escape_string($conn, $_POST['matakuliah_kodemk']);

    if (!empty($mahasiswa_npm) && !empty($matakuliah_kodemk)) {
        $query = "INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES ('$mahasiswa_npm', '$matakuliah_kodemk')";

        if (mysqli_query($conn, $query)) {
            // Redirect ke tampilkan_data.php
            header("Location: edit.php");
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
