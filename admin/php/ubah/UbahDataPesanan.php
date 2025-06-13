<?php
session_start();
include '../database.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$pesanan = select("SELECT * FROM data_pesanan WHERE id = $id");
if (!$pesanan) {
    echo "<script>alert('Data pesanan tidak ditemukan.');location.href='../DataPesanan.php';</script>";
    exit;
}
$pesanan = $pesanan[0];

if (isset($_POST['ubah'])) {
    if (ubah_pesanan($_POST, $id) > 0) {
        echo "<script>alert('Data pesanan berhasil diubah.');location.href='../DataPesanan.php';</script>";
    } else {
        echo "<script>alert('Data pesanan gagal diubah.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuliner Khas Sunda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../css/ubah.css">
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="sidebar d-flex flex-column p-3"> 
            <a class="navbar-brand mb-4 fs-4 fw-bold text-white" href="#">
                <i class="bi bi-egg-fried"></i> Kuliner Sunda
            </a>
            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="../dasboard.php" class="nav-link ">
                        <i class="bi bi-graph-up-arrow me-2"></i>Dasboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../DataPendaftaran.php" class="nav-link">
                        <i class="bi bi-person-plus me-2"></i>Data Pendaftaran
                    </a>
                </li>
                <li>
                    <a href="../DataMenu.php" class="nav-link">
                        <i class="bi bi-egg-fried me-2"></i>Data Menu
                    </a>
                </li>
                <li>
                    <a href="../DataPesanan.php" class="nav-link active">
                        <i class="bi bi-bag-check me-2"></i>Data Pesanan
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="flex-grow-1 d-flex flex-column min-vh-100">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white border-bottom">
                <div class="container-fluid justify-content-end">
                    <div class="dropdown">
                        <span class="me-2 fw-semibold"><?= htmlspecialchars($_SESSION['username'] ?? 'User'); ?></span>
                        <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ▼
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Ubah Password</a></li>
                            <li>
                                <a class="dropdown-item" href="../../logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- card ubah pesanan -->
            <div class="container d-flex align-items-center justify-content-center" style="min-height:100vh;">
                <div class="card p-4 shadow" style="width: 500px;" data-aos="zoom-in">
                    <h3 class="mb-4 text-center">Ubah Pesanan</h3>
                    <form method="post" autocomplete="off">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($pesanan['id']); ?>">
                        <div class="mb-3">
                            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                            <input id="nama_pelanggan" name="nama_pelanggan" required class="form-control" placeholder="Masukkan nama pelanggan" type="text" value="<?= htmlspecialchars($pesanan['nama_pelanggan']); ?>" />
                        </div>
                        <div class="mb-3">
                            <label for="menu" class="form-label">Nama Menu</label>
                            <input id="menu" name="menu" required class="form-control" placeholder="Masukkan nama menu" type="text" value="<?= htmlspecialchars($pesanan['menu']); ?>" />
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input id="jumlah" name="jumlah" required class="form-control" placeholder="Jumlah" type="number" min="1" value="<?= htmlspecialchars($pesanan['jumlah']); ?>" />
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Total Harga</label>
                            <input id="harga" name="harga" required class="form-control" placeholder="Total harga" type="number" min="0" value="<?= htmlspecialchars($pesanan['harga']); ?>" />
                        </div>
                        <button class="btn btn-success w-100" type="submit" name="ubah">Submit</button>
                    </form>
                </div>
            </div>
            <!-- akhir card pesanan -->

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
