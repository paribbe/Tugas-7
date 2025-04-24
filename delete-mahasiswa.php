<?php
include 'koneksi.php';
$npm = $_GET['npm'];

if (!empty($npm)) {
    $query = "DELETE FROM mahasiswa WHERE npm='$npm'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Data berhasil dihapus!');window.location='edit.php';</script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
