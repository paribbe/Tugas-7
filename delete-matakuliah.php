<?php
include 'koneksi.php';
$kodemk = $_GET['kodemk'];

if (!empty($kodemk)) {
    $query = "DELETE FROM matakuliah WHERE kodemk='$kodemk'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Data berhasil dihapus!');window.location='tampilan-matakuliah.php';</script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
