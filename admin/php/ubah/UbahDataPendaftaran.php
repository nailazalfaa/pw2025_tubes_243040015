<?php
session_start();
include '../database.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0; 
$pendaftaran = select("SELECT * FROM data_pendaftaran WHERE id = $id");

if (!$pendaftaran) {
    echo "<script>alert('Data tidak ditemukan!');window.location.href='../DataPendaftaran.php';</script>";
    exit;
}

$pendaftaran = $pendaftaran[0];

// Proses logout
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: ../../login.php");
    exit;
}

if (isset($_POST['ubah'])) {
    if (ubah_pendaftaran($_POST, $id) > 0) {
        echo "<script>alert('Data pendaftaran berhasil diubah.');window.location.href='../DataPendaftaran.php';</script>";
    } else {
        echo "<script>alert('Data pendaftaran gagal diubah.');</script>";
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

            <!-- card ubah data pendaftaran -->
            <div class="container d-flex align-items-center justify-content-center" style="min-height:100vh;">
                <div class="card p-4 shadow" style="width: 500px;" data-aos="zoom-in">
                    <h3 class="mb-4 text-center">Ubah Data Pendaftaran</h3>
                    <form method="post" autocomplete="off">
                        <input type="hidden" name="id" value="<?= $pendaftaran['id']; ?>">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input id="username" name="username" required class="form-control" placeholder="Masukkan username" type="text" value="<?= htmlspecialchars($pendaftaran['username']) ?>" />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" name="email" required class="form-control" placeholder="Masukkan email" type="email" value="<?= htmlspecialchars($pendaftaran['email']) ?>"/>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" name="password" class="form-control" placeholder="Masukkan password baru" type="password" />
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                        </div>
                        <button class="btn btn-success w-100" type="submit" name="ubah">Submit</button>
                    </form>
                </div>
            </div>
            <!-- akhir card ubah data pendaftaran -->

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
