<?php
// session_start();

// if(!isset($_SESSION['login'])){
//   header( "Location: login.php ");
//   exit;
// }

require 'function.php';
if (isset($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'index.php';
        </script>
        "; 
    } else {
        echo "  
        <script>
            alert('data gagal ditambahkan!');
            document.location.href = 'index.php';
        </script>";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container col-8">
        <h1>Tambah Data Perpustakan</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="judul" class="form-label">judul</label>
                <input type="text" class="form-control" id="judul" name="judul" require>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
            </div>
            <div class="mb-3">
                <label for="tgl_peminjaman" class="form-label">tanggal peminjaman</label>
                <input type="date" class="form-control" id="tgl_peminjaman" name="tgl_peminjaman">
            </div>
            <div class="mb-3">
                <label for="tgl_pengembalian" class="form-label">tanggal pengembalian</label>
                <input type="date" class="form-control" id="tgl_pengembalian" name="tgl_pengembalian">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">harga</label>
                <input type="text" class="form-control" id="harga" name="harga">
            </div>
            <button type="submit" name="submit" class="btn btn-dark">Tambah</button>
        </form>
</body>
</html>