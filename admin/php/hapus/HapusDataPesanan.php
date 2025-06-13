<?php 
include '../database.php';

$id = (int)$_GET['id'];

if (hapus_pesanan($id) > 0) {
    echo "<script>alert('Data menu berhasil dihapus.'); window.location.href='../DataPesanan.php';</script>";
} else {
    echo "<script>alert('Data menu gagal dihapus.');</script>";
}
?>