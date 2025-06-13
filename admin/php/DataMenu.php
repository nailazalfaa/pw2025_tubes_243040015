<?php
session_start();
include 'database.php';

// Penanganan logout
if (isset($_POST['logout'])) {
  session_destroy();
  header("Location: login.php");
  exit;
}

$data_menu = select("SELECT * FROM data_menu");

// Penanganan tambah menu
if (isset($_POST['submit'])) {
  if (create_menu($_POST) > 0) {
    echo "<script>alert('data menu berhasil ditambahkan.'); window.location.href='DataMenu.php';</script>";
    exit;
  } else {
    echo "<script>alert('data menu gagal ditambahkan.');</script>";
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
  <link rel="stylesheet" href="../css/data.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
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
        <a href="DataMenu.php" class="nav-link satu ">
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
    <img src="https://ui-avatars.com/api/?name=<?= urlencode(substr('nailazalfa',0,1)) ?>&background=198754&color=fff" class="avatar" alt="avatar">
    <span class="me-2 fw-semibold"><?= htmlspecialchars('nailazalfa'); ?></span>
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

    <!-- Content -->
    <div class="container py-4">
      <h3 class="mb-4 fw-bold d-flex justify-content-between align-items-center">
        Daftar Menu
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambahMenu">
          <i class="bi bi-plus-circle"></i> Tambah Menu
        </button>
      </h3>
      <div class="table-responsive">
        <table id="table" class="table table-striped table-bordered">
          <thead class="table-success">
            <tr>
              <th style="width: 5%;">No</th>
              <th style="width: 20%;">Nama Makanan</th>
              <th style="width: 15%;">Kategori</th>
              <th style="width: 15%;">Harga</th>
              <th style="width: 15%;">Jumlah</th>
              <th style="width: 15%;">Status Ketersediaan</th>
              <th style="width: 20%;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($data_menu)): ?>
              <?php $no = 1; ?>
              <?php foreach ($data_menu as $menu): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= htmlspecialchars($menu['nama']); ?></td>
                  <td><?= htmlspecialchars($menu['kategori']); ?></td>
                  <td><?= htmlspecialchars($menu['harga']); ?></td>
                  <td><?= htmlspecialchars($menu['jumlah']); ?></td>
                  <td><?= htmlspecialchars($menu['status_ketersediaan']); ?></td>
                  <td>
                    <a href="ubah/UbahDataMenu.php?id=<?= urlencode($menu['id']); ?>"
                       class="btn btn-outline-success btn-sm me-1" title="Ubah Data">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                    <a href="hapus/HapusDataMenu.php?id=<?= urlencode($menu['id']); ?>"
                       class="btn btn-outline-danger btn-sm me-1"
                       onclick="return confirm('Yakin ingin menghapus data')" title="Hapus Data">
                      <i class="bi bi-trash"></i>
                    </a>
                    <a href="DetailMenu.php?id=<?= urlencode($menu['id']); ?>"
                       class="btn btn-outline-info btn-sm" title="Detail">
                      <i class="bi bi-info-circle"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="7" class="text-center text-muted">Belum ada data menu.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah Menu -->
<div class="modal fade" id="modalTambahMenu" tabindex="-1" aria-labelledby="modalTambahMenuLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="" method="POST" class="modal-content" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahMenuLabel">Tambah Data Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Makanan</label>
          <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
          <label for="kategori" class="form-label">Kategori</label>
          <select class="form-select" id="kategori" name="kategori" required>
            <option value="" selected disabled>Pilih Kategori</option>
            <option value="Makanan Berat">Makanan</option>
            <option value="Makanan Ringan">Cemilan</option>
            <option value="Minuman">Minuman</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="harga" class="form-label">Harga</label>
          <input type="number" class="form-control" id="harga" name="harga" min="0" required>
        </div>
        <div class="mb-3">
          <label for="jumlah" class="form-label">Jumlah</label>
          <input type="number" class="form-control" id="jumlah" name="jumlah" min="0" required>
        </div>
        <div class="mb-3">
          <label for="status_ketersediaan" class="form-label">Status Ketersediaan</label>
          <select class="form-select" id="status_ketersediaan" name="status_ketersediaan" required>
            <option value="" selected disabled>Pilih Status</option>
            <option value="Tersedia">Tersedia</option>
            <option value="Habis">Habis</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="foto_menu" class="form-label">Foto Menu</label>
          <input id="foto_menu" name="foto_menu" class="form-control" type="file" accept="image/*" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>
<script>
  $(document).ready(function() {
    $('#table').DataTable();
  });
</script>
</body>
</html>
