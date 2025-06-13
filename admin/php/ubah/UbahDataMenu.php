<?php
include '../database.php';

$id = (int)$_GET['id'];
$menu = select("SELECT * FROM data_menu WHERE id = $id");

$menu = $menu[0];

if (isset($_POST['login'])) {
    if (ubah_menu($_POST, $id) > 0) {
        echo "<script>
            alert('Data menu berhasil diubah.');
            window.location.href = '../DataMenu.php';
        </script>";
    } else {
        echo "<script>alert('Data menu gagal diubah.');</script>";
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
                    <a href="dasboard.php" class="nav-link ">
                        <i class="bi bi-graph-up-arrow me-2"></i>Dasboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="DataPendaftaran.php" class="nav-link">
                        <i class="bi bi-person-plus me-2"></i>Data Pendaftaran
                    </a>
                </li>
                <li>
                    <a href="DataMenu.php" class="nav-link active">
                        <i class="bi bi-egg-fried me-2"></i>Data Menu
                    </a>
                </li>
                <li>
                    <a href="DataPesanan.php" class="nav-link">
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
                                    <button type="submit" name="ubah" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- card ubah menu -->
            <div class="container d-flex align-items-center justify-content-center" style="min-height:100vh;">
                <div class="card p-4 shadow" style="width: 500px;" data-aos="zoom-in">
                    <h3 class="mb-4 text-center">Ubah Menu</h3>
                    <form method="post" autocomplete="off" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $menu['id']; ?>">
                        <div class="mb-3">
                            <label for="nama_makanan" class="form-label">Nama Makanan</label>
                            <input id="nama_makanan" name="nama" required class="form-control" placeholder="Masukkan nama makanan" type="text" value="<?= $menu['nama'] ?>" />
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <input id="kategori" name="kategori" required class="form-control" placeholder="Masukkan kategori" type="text" value="<?= $menu['kategori'] ?>"/>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input id="harga" name="harga" required min="0" class="form-control" placeholder="Masukkan harga" type="number" step="0.01" value="<?= $menu['harga'] ?>"/>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input id="jumlah" name="jumlah" required class="form-control" placeholder="Jumlah" type="number" min="0" value="<?= $menu['jumlah'] ?>"/>
                        </div>
                           <div class="mb-3">
                                <label for="foto_menu" class="form-label">Foto Menu</label>
                                 <input id="foto_menu" name="foto_menu" required min="0" class="form-control" placeholder="Masukkan foto" type="file" onchange="priviewImage(event)"/>
                       </div>
                        <div class="mb-3">
                            <label for="status_ketersediaan" class="form-label">Status Ketersediaan</label>
                            <select id="status_ketersediaan" name="status_ketersediaan" value="<?= $menu['status_ketersediaan'] ?>" required class="form-control">
                                <option value="">Pilih status</option>
                                <option value="Tersedia">Tersedia</option>
                                <option value="Habis">Tidak Tersedia</option>
                            </select>
                        </div>
                        <button class="btn btn-success w-100" type="submit" name="login">Submit</button>
                    </form>
                </div>
            </div>
            <!-- akhir card menu -->

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
