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

function create_menu($data) {
 global $db;
 $nama_makanan = $data['nama_makanan'];
 $deskripsi = $data['deskripsi'];
 $harga = $data['harga'];
 $kategori = $data['kategori'];
 $status_ketersediaan = $data['status_ketersediaan'];
 $query = "INSERT INTO data_menu2 VALUES (null, '$nama_makanan', '$deskripsi', '$harga', '$kategori', '$status_ketersediaan')";
 mysqli_query($db, $query);

 return mysqli_affected_rows($db);

}

function create_pesanan($data) {
 global $db;
 $nama_pelanggan = $data['nama_pelanggan'];
 $menu = $data['menu'];
 $jumlah = $data['jumlah'];
 $harga = $data['harga'];
 $query = "INSERT INTO data_pesanan VALUES (null, '$nama_pelanggan', '$menu', '$jumlah', '$harga')";
 mysqli_query($db, $query);

 return mysqli_affected_rows($db);

}

?>