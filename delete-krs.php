<?php
include 'koneksi.php';
$id = $_GET['id'];

if (!empty($id)) {
    $query = "DELETE FROM krs WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Data berhasil dihapus!');window.location='edit.php';</script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
