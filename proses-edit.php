<?php
include 'koneksi.php';
$npm = $_GET['npm'];

// Ambil data mahasiswa berdasarkan NPM
$sql = "SELECT * FROM mahasiswa WHERE npm='$npm'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_mahasiswa = mysqli_real_escape_string($conn, $_POST['nama_mahasiswa']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

    // Update data mahasiswa
    $sql = "UPDATE mahasiswa SET nama_mahasiswa='$nama_mahasiswa', jurusan='$jurusan', alamat='$alamat' WHERE npm='$npm'";

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
    <title>Mahasiswa</title>
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
        <h2 style="text-align:center; color:#fff">Edit Mahasiswa</h2>
        <form action="" method="post" class="mt-3">
            <div class="form-group">
                <label style="color:#fff" for="nama_mahasiswa">Nama Mahasiswa:</label>
                <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa"
                    value="<?php echo htmlspecialchars($row['nama_mahasiswa']); ?>" required>
            </div>
            <div class="form-group">
                <label style="color:#fff" for="jurusan">Jurusan:</label>
                <select class="form-control" id="jurusan" name="jurusan">
                    <option value="Teknik Informatika" <?php echo $row['jurusan'] == 'Teknik Informatika' ? 'selected' : ''; ?>>Teknik Informatika</option>
                    <option value="Sistem Informasi" <?php echo $row['jurusan'] == 'Sistem Informasi' ? 'selected' : ''; ?>>Sistem Informasi</option>
                </select>
            </div>
            <div class="form-group">
                <label style="color:#fff" for="alamat">Alamat:</label>
                <textarea class="form-control" id="alamat" name="alamat"
                    rows="3"><?php echo htmlspecialchars($row['alamat']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3 ">Update</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>