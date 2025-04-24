<?php
include 'koneksi.php';
$id = $_GET['id'];

// Ambil data KRS berdasarkan ID
$sql = "SELECT * FROM krs WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Ambil data mahasiswa dan mata kuliah untuk dropdown
$mahasiswaQuery = "SELECT npm, nama_mahasiswa FROM mahasiswa";
$matakuliahQuery = "SELECT kodemk, nama_matakuliah FROM matakuliah";

$mahasiswaResult = mysqli_query($conn, $mahasiswaQuery);
$matakuliahResult = mysqli_query($conn, $matakuliahQuery);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mahasiswa_npm = mysqli_real_escape_string($conn, $_POST['mahasiswa_npm']);
    $matakuliah_kodemk = mysqli_real_escape_string($conn, $_POST['matakuliah_kodemk']);

    // Update data KRS
    $sql = "UPDATE krs SET mahasiswa_npm='$mahasiswa_npm', matakuliah_kodemk='$matakuliah_kodemk' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: edit.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Krs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body {
            font-family: "Poppins";
            background-color: #fff;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: rgba(90, 90, 90, 0.8);
            /* Mengatur transparansi latar belakang */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        footer {
            background-color: #FFB703;
            color: #f9f9f9;
            text-align: center;
            margin-top: 20px;
            padding: 10px 0;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid ">
    <a class="navbar-brand" href="#">KRS Mahasiswa</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="from-mahasiswa.php">Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="from-matakuliah.php">Mata Kuliah</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="from-krs.php">KRS</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="container mt-5">
        <h2 style="text-align: center; color:#fff">Edit KRS</h2>
        <form action="" method="post">
            <div class="form-group">
                <label style="color:#fff" for="mahasiswa_npm">Nama Mahasiswa:</label>
                <select name="mahasiswa_npm" id="mahasiswa_npm" class="form-control">
                    <?php while ($mahasiswa = mysqli_fetch_assoc($mahasiswaResult)) {
                        $selected = ($mahasiswa['npm'] == $row['mahasiswa_npm']) ? 'selected' : '';
                        echo "<option value='" . $mahasiswa['npm'] . "' $selected>" . $mahasiswa['nama_mahasiswa'] . "</option>";
                    } ?>
                </select>
            </div>
            <div class="form-group">
                <label style="color:#fff" for="matakuliah_kodemk">Nama Mata Kuliah:</label>
                <select name="matakuliah_kodemk" id="matakuliah_kodemk" class="form-control">
                    <?php while ($matakuliah = mysqli_fetch_assoc($matakuliahResult)) {
                        $selected = ($matakuliah['kodemk'] == $row['matakuliah_kodemk']) ? 'selected' : '';
                        echo "<option value='" . $matakuliah['kodemk'] . "' $selected>" . $matakuliah['nama_matakuliah'] . "</option>";
                    } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>