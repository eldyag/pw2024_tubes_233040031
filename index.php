<?php
// session_start();

// if (!isset($_SESSION['login'])) {
//   header("Location: login.php ");
//   exit;
// }
require 'function.php';
// pagination
// konfigurasi

// $jumlahDataPerHalaman = 2;
// $jumlahData = count(query("SELECT * FROM sport"));
// $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
// $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
// $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
// // halaman = 2, awalData = 4
// // halaman = 3, awalData = 4 


$perpustakan = query("SELECT * FROM perpustakaan");
// // $awalData, $jumlahDataPerHalaman


//tombol cari diklik
if (isset($_POST["cari"])) {
  $ptk= cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PerpustakaAn</title>
  <link rel="stylesheet" href="../css/font.css">
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a href="logout.php" class="btn btn-secondry logout">Logout</a>
          </li>
        </ul>
        <form action="" method="post" class="d-flex" role="search">
          <input class="form-control me-2 from-cari" type="text" name="keyword" autofocus placeholder="Search" autocomplete="off" id="keyword">
          <button class="btn btn-outline-dark" type="submit" name="cari" id="tombol-cari">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <!-- akhir navbar -->

  <!-- table -->
  <div id="container">   
    <h1>perpustakan</h1>
    <a href="tambah.php" class="btn btn-dark tambah">Tambah Data</a>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Judul</th>
          <th scope="col">Gambar</th>
          <th scope="col">Tanggal Peminjaman</th>
          <th scope="col">Tanggal Pengembalian</th>
          <th scope="col">Harga</th>
          <th scope="col">Detail</th>
          <th scope="col" class="aksi">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($perpustakan as $ptk) : ?>
          <tr>
            <th scope="row"><?= $i; ?></th>
            <td><?= $ptk['judul']; ?></td>
            <td><img src="img/<?= $ptk["gambar"]; ?>" width="150"></td>
            <td><?= $ptk['tgl_peminjaman']; ?></td>
            <td><?= $ptk['tgl_pengembalian']; ?></td>
            <td><?= $ptk['harga']; ?></td>
            <td class="aksi">
              <a href="detail.php?id=<?= $ptk["id"]; ?>" class="badge text-bg-secondary text-decoration-none">Detail</a>
            </td>
            <td class="aksi">
              <a href="edit.php?id=<?= $ptk["id"]; ?>" class="badge text-bg-secondary text-decoration-none">Edit</a>
              <a href="delete.php?id=<?= $ptk["id"]; ?>" class="badge text-bg-danger text-decoration-none" onclick="return confirm('yakin?');">Delete</a>
            </td>
          </tr>
          <?php $i++ ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    <!-- akhir table -->
  </div>
  <!-- java script -->
  <script src="script.js"></script>
</body>
</html>