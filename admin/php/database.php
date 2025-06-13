<?php
$db = mysqli_connect('localhost', 'root', '', 'd_pas');

function select($query) 
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// tambah pendaftaran
function create_pendaftaran($data) {
 global $db;
 $username = $data['username'];
 $email = $data['email'];
 $password = $data['password'];
 $query = "INSERT INTO data_pendaftaran VALUES (null, '$username', '$email', '$password')";
 mysqli_query($db, $query);

 return mysqli_affected_rows($db);

}

// tambah menu
function create_menu($data) {
 global $db;
 $nama = $data['nama'];
 $kategori = $data['kategori'];
 $harga = $data['harga'];
 $jumlah = $data['jumlah'];
 $foto_menu = upload_file(); 
 $query = "INSERT INTO data_menu (nama, kategori, harga, jumlah, foto_menu) VALUES ('$nama', '$kategori', '$harga', '$jumlah', '$foto_menu')";
 mysqli_query($db, $query);

 return mysqli_affected_rows($db);

}

// tambah pesanan
function create_pesanan($data) {
 global $db;
 $nama_pelanggan = $data['nama_pelanggan'];
 $menu = $data['menu'];
 $jumlah = $data['jumlah'];
 $harga = $data['harga'];
 $id_menu = $data['id_menu'];
//  $query = "INSERT INTO data_pesanan (nama_pelanggan, menu, jumlah, harga) VALUES ('$nama_pelanggan', '$menu', $jumlah, $harga)";
    $query = "INSERT INTO data_pesanan VALUES (null, '$nama_pelanggan', '$menu', '$id_menu', '$jumlah', '$harga')";

//  var_dump($query);
//  die;
 mysqli_query($db, $query);

 return mysqli_affected_rows($db);

}

// ubah menu
function ubah_menu($menu) {
    global $db;
    $id = $menu['id'];
    $nama = $menu['nama'];
    $kategori = $menu['kategori'];
    $harga = $menu['harga'];
    $jumlah = $menu['jumlah'];
    $foto_menu = uploade_file();

    $query = "UPDATE data_menu SET nama = '$nama', kategori = '$kategori', harga = '$harga', jumlah = '$jumlah', foto_menu = '$foto_menu' WHERE id = '$id'";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function uploade_file() {
    $namaFile = $_FILES['foto_menu']['name'];
    $ukuranFile = $_FILES['foto_menu']['size'];
    $error = $_FILES['foto_menu']['error'];
    $tmpName = $_FILES['foto_menu']['tmp_name'];

    // cek apakah ada gambar yang diupload
    if ($error === 4) {
        return 'default.jpg'; // jika tidak ada gambar, gunakan gambar default
    }

    // cek apakah yang diupload adalah gambar
   $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'];
   $ekstensiGambar = pathinfo($namaFile, PATHINFO_EXTENSION);
   $ekstensiGambar = strtolower($ekstensiGambar);


    
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>alert('Yang anda upload bukan gambar!');</script>";
        return false;
    }

    // cek jika ukuran file terlalu besar
    if ($ukuranFile > 5000000) {
        echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
        return false;
    }

    // generate nama file baru
    $namaFileBaru = uniqid() . '.' . $ekstensiGambar;
// fungsi upload_file sudah ada, fungsi uploade_file dihapus untuk menghindari duplikasi dan error

    // lolos pengecekan, gambar siap diupload
    move_uploaded_file($tmpName, '../../img/' . $namaFileBaru);

    return $namaFileBaru;
}

// fungsi untuk upload gambar menu
function upload_file() {
    $namaFile = $_FILES['foto_menu']['name'];
    $ukuranFile = $_FILES['foto_menu']['size'];
    $error = $_FILES['foto_menu']['error'];
    $tmpName = $_FILES['foto_menu']['tmp_name'];

    // cek apakah ada gambar yang diupload
    if ($error === 4) {
        return 'default.jpg'; // jika tidak ada gambar, gunakan gambar default
    }

    // cek apakah yang diupload adalah gambar
   $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'];
   $ekstensiGambar = pathinfo($namaFile, PATHINFO_EXTENSION);
   $ekstensiGambar = strtolower($ekstensiGambar);


    
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>alert('Yang anda upload bukan gambar!');</script>";
        return false;
    }

    // cek jika ukuran file terlalu besar
    if ($ukuranFile > 5000000) {
        echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
        return false;
    }

    // generate nama file baru
    $namaFileBaru = uniqid() . '.' . $ekstensiGambar;
// fungsi upload_file sudah ada, fungsi uploade_file dihapus untuk menghindari duplikasi dan error

    // lolos pengecekan, gambar siap diupload
    move_uploaded_file($tmpName, '../img/' . $namaFileBaru);

    return $namaFileBaru;
}

// hapus menu
function hapus_menu($id) {
    global $db;
    $query = "DELETE FROM data_menu WHERE id = $id";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// ubah pendaftaran
function ubah_pendaftaran($pendaftaran) {
    global $db;
    $id = $pendaftaran['id'];
    $username = $pendaftaran['username'];
    $email = $pendaftaran['email'];
    $password = $pendaftaran['password'];

    if ($password) {
        // Jika password diubah, update password
        $query = "UPDATE data_pendaftaran SET username = '$username', email = '$email', password = '$password' WHERE id = $id";
    } else {
        // Jika password tidak diubah, tetap gunakan password lama
        $query = "UPDATE data_pendaftaran SET username = '$username', email = '$email' WHERE id = $id";
    }

    mysqli_query($db, $query);
    
    return mysqli_affected_rows($db);
}

// Hapus pendaftaran
function hapus_pendaftaran($id) {
    global $db;
    $query = "DELETE FROM data_pendaftaran WHERE id = $id";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// ubah pesanan
function ubah_pesanan($pesanan) {
    global $db;
    $id = $pesanan['id'];
    $nama_pelanggan = $pesanan['nama_pelanggan'];
    $menu = $pesanan['menu'];
    $jumlah = $pesanan['jumlah'];
    $harga = $pesanan['harga'];

    $query = "UPDATE data_pesanan SET nama_pelanggan = '$nama_pelanggan', menu = '$menu', jumlah = '$jumlah', harga = '$harga' WHERE id = '$id'";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// hapus pesanan
function hapus_pesanan($id) {
    global $db;
    $query = "DELETE FROM data_pesanan WHERE id = $id";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

