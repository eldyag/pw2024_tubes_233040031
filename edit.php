<?php
// session_start();

// if(!isset($_SESSION['login'])){
//   header( "Location: login.php ");
//   exit;
// }

require 'function.php';
// ambil data url
$id = $_GET["id"];

// query data perpustkaan
$ptk = query("SELECT * FROM perpustakaan WHERE id = $id")[0];


if (isset($_POST["edit"])) {

    if (edit($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diedit!');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "  
        <script>
            alert('data gagal diedit!');
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
    <title>edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container col-8">
        <h1>Edit Data Perpustakaan</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $ptk["id"]; ?>">
           
            <div class="mb-3">
                <label for="judul" class="form-label">judul</label>
                <input type="text" class="form-control" id="judul" name="judul" require value="<?= $ptk["judul"]; ?>">
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" value="<?= $ptk["gambar"]; ?>">
            </div>
            <div class="mb-3">
                <label for="tgl_peminjaman" class="form-label">tgl_peminjaman</label>
                <input type="date" class="form-control" id="tgl_peminjaman" name="tgl_peminjaman" value="<?= $ptk["tgl_peminjaman"]; ?>">
            </div>
            <div class="mb-3">
                <label for="tgl_pengembalian" class="form-label">tgl_pengembalian</label>
                <input type="date" class="form-control" id="tgl_pengembalian" name="tgl_pengembalian" value="<?= $ptk["tgl_pengembalian"]; ?>">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">harga didirikan</label>
                <input type="text" class="form-control" id="harga" name="harga" value="<?= $ptk["harga"]; ?>">
            </div>
            <button type="submit" name="edit" class="btn btn-primary">edit</button>
        </form>
</body>
</html>