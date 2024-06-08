<?php
    $conn = mysqli_connect('localhost', 'root', '', 'pw2024_tubes_233040031');

    function query($query) {
        global $conn;
     $result = mysqli_query($conn, $query) ; 
    
    //  jika hasilnya hanya 1 data
     $rows = [];
      while($row = mysqli_fetch_assoc($result)) {
          $rows[] = $row;
      }
      return $rows;
    }

function tambah($data) {
    global $conn;

    $judul = htmlspecialchars($data["judul"]);
    // upload gambar
    $gambar = upload();
    if(!$gambar)  {
        return false;
    }

    $tgl_peminjaman = htmlspecialchars($data["tgl_peminjaman"]);
    $tgl_pengembalian = htmlspecialchars($data["tgl_pengembalian"]);
    $harga = htmlspecialchars($data["harga"]);

    $query = "INSERT INTO perpustakaan VALUES
            (NULL, '$judul', '$gambar', '$tgl_peminjaman', '$tgl_pengembalian', '$harga')
            ";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

function upload() {
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if( $error === 4) {
        echo "
        <script>
            alert('pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.' ,$namafile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "
        <script>
            alert('yang anda upload bukan gambar!');
        </script>";
        return false;
    }

    if( $ukuranfile > 1000000 ) {
        echo "
        <script>
            alert('yang anda upload bukan gambar!');
        </script>";
        return false;
    }

    $namafileBaru = uniqid();
    $namafileBaru .= '.';
    $namafileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namafile);

    return $namafile;
}

function hapus($id) {
    global $conn;
    
    $spt = query("SELECT * FROM perpustakaan WHERE id = $id");
    if($spt['gambar'] != 'nophoto.jpg') {

        unlink('../img/' . $spt['gambar']);
    }
    mysqli_query($conn, "DELETE FROM perpustakaan WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function edit($data) {
    global $conn;

    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    if($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    $tgl_peminjaman = htmlspecialchars($data["tgl_peminjaman"]);
    $tgl_pengembalian = htmlspecialchars($data["tgl_pengembalian"]);
    $harga = htmlspecialchars($data["harga"]);

    $query = "UPDATE perpustakaan  SET
            judul = '$judul',
            gambar = '$gambar',
            tgl_peminjaman = '$tgl_peminjaman',
            tgl_pengembalian = '$tgl_pengembalian',
            harga = '$harga'
            WHERE id  = '$id'
            ";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM perpustakaan WHERE
        judul LIKE '%$keyword%' OR 
        tgl_peminjaman LIKE '%$keyword%' OR 
        tgl_pengembalian LIKE '%$keyword%' OR
        harga LIKE '%$keyword%'
    "; 
    return query($query);
}

function login($data) {
    global $conn;

    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    
    // cek dulu username nya
    if ($user = query("SELECT * FROM user WHERE username = '$username'")[0]) {
        if(password_verify($password, $user['password'])) {

            $_SESSION['login'] = true;
            header('location: index.php');
            exit;
        }
    }
    }


function registrasi($data)  {
    global $conn;

    $username = htmlspecialchars(strtolower($data['username']));
    $password1= mysqli_real_escape_string($conn, $data['password1']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);


    if(empty($username) || empty($password1) || empty($password2) ) {
        echo "<script>
                alert('username /password tidak boleh kosong!')
                document.location.href = 'registrasi.php'
            </script>";
        return false;
    }

    // jika username sudah ad

    if(query("SELECT * FROM user WHERE username = '$username'")) {
        echo "<script>
                alert('username sudah terdaftar')
                document.location.href = 'registrasi.php'
            </script>";
        return false;
    }

    if ($password1 !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai')
                document.location.href = 'registrasi.php'
            </script>";
        return false;
    }

    // jika password < 5
    if(strlen($password1)< 5) {
        echo "<script>
                alert('password terlalu pendek')
                document.location.href = 'registrasi.php'
            </script>";
        return false;
    }

    // jika username & password sudah sesuai
    $password_baru = password_hash($password1, PASSWORD_DEFAULT);
    // insert ke tabel user
    $query = "INSERT INTO user VALUES
            (null, '$username', '$password_baru')";
    mysqli_query($conn, $query) or die (mysqli_error($conn));
    return mysqli_affected_rows($conn);
}
?>