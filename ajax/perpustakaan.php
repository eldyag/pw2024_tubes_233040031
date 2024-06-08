<?php
require '../function.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM perpustakaan WHERE
        judul LIKE '%$keyword%' OR 
        tgl_peminjaman LIKE '%$keyword%' OR 
        tgl_pengembalian LIKE '%$keyword%' OR
        harga LIKE '%$keyword%'
    "; 
$perpustakaan = query($query);

?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Judul</th>
            <th scope="col">Tanggal Peminjaman</th>
            <th scope="col">tanggal Pengembalian </th>
            <th scope="col">Harga</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($perpustakaan as $ptk) : ?>
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
                <td>
                    <a href="edit.php?id=<?= $ptk["id"]; ?>" class="badge text-bg-secondary text-decoration-none">Edit</a>
                    <a href="delete.php?id=<?= $ptk["id"]; ?>" class="badge text-bg-danger text-decoration-none" onclick="return confirm('yakin?');">Delete</a>
                </td>
            </tr>
            <?php $i++ ?>
        <?php endforeach; ?>
    </tbody>
</table>