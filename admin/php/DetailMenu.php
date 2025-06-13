<?php
session_start();
include 'database.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0; 
$menu = select("SELECT * FROM data_menu WHERE id = $id");

if (!$menu) {
    echo "<script>alert('Data tidak ditemukan!');window.location.href='../DataMenu.php';</script>";
    exit;
}

$menu = $menu[0];

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuliner Khas Sunda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/ubah.css">
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
                    <a href="../DataPesanan.php" class="nav-link">
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
                                <form method="POST" class="d-inline">
                                    <button type="submit" name="logout" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- card ubah data menu -->
            <div class="container d-flex align-items-center justify-content-center" style="min-height:100vh;">
                <div class="card p-4 shadow-lg rounded-4" style="width: 650px; background: linear-gradient(135deg, #f8fafc 70%, #e0f7fa 100%);" data-aos="zoom-in">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-success mb-1">Detail Data Menu</h2>
                        <span class="badge bg-primary fs-6"><?= htmlspecialchars($menu['kategori']) ?></span>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-5 text-center">
                            <?php if (!empty($menu['foto_menu'])): ?>
                                <img src="../img/<?= htmlspecialchars($menu['foto_menu']) ?>" alt="Foto menu" class="img-fluid rounded-3 border shadow-sm" style="max-height:180px;">
                            <?php else: ?>
                                <div class="d-flex align-items-center justify-content-center bg-light rounded-3" style="height:180px;">
                                    <span class="text-muted">Tidak ada foto</span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-7">
                            <table class="table table-borderless mb-0">
                                <tr>
                                    <th class="text-secondary" style="width: 45%;">Nama Makanan</th>
                                    <td class="fw-semibold"><?= htmlspecialchars($menu['nama']) ?></td>
                                </tr>
                                <tr>
                                    <th class="text-secondary">Harga</th>
                                    <td class="fw-semibold text-success">Rp <?= number_format($menu['harga'], 0, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <th class="text-secondary">Jumlah</th>
                                    <td><?= htmlspecialchars($menu['jumlah']) ?></td>
                                </tr>
                                <tr>
                                    <th class="text-secondary">Status Ketersediaan</th>
                                    <td>
                                        <?php if (strtolower($menu['status_ketersediaan']) == 'tersedia'): ?>
                                            <span class="badge bg-success">Tersedia</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Habis</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <a href="../php/DataMenu.php" class="btn btn-outline-success w-100 mt-2">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
            <!-- akhir card ubah data menu -->

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
