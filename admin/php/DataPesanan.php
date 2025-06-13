<?php
session_start();
include 'database.php';

if (isset($_POST['submit'])) {
  if(create_pesanan($_POST) > 0) {
    echo "<script>alert('data pesanan berhasil ditambahkan.'); window.location.href='DataPesanan.php';</script>";
    exit;
  } else {
    echo "<script>alert('data pesan gagal ditambahkan.');</script>";
  }
} 

$data_pelanggan = select("SELECT * FROM data_pesanan");
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
      <a href="DataPendaftaran.php" class="nav-link ">
      <i class="bi bi-person-plus me-2"></i>Data Pendaftaran
      </a>
    </li>
    <li>
      <a href="DataMenu.php" class="nav-link ">
      <i class="bi bi-egg-fried me-2"></i>Data Menu
      </a>
    </li>
    <li>
      <a href="DataPesanan.php" class="nav-link satu">
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
      <img src="https://ui-avatars.com/api/?name=<?php echo urlencode(substr('nailazalfa',0,1)); ?>&background=198754&color=fff" class="avatar" alt="avatar">
      <span class="me-2 fw-semibold"><?php echo htmlspecialchars('nailazalfa'); ?></span>
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
      Daftar Pesanan
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambahPesanan">
      <i class="bi bi-plus-circle"></i> Tambah Pesanan
      </button>
    </h3>
    <div class="table-responsive">
      <table class="table table-hover table-striped align-middle" id="table">
      <thead class="table-success">
        <tr>
        <th style="width: 5%;">No</th>
        <th style="width: 20%;">Nama</th>
        <th style="width: 15%;">Menu</th>
        <th style="width: 15%;">Jumlah</th>
        <th style="width: 15%;">Harga</th>
        <th style="width: 20%;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($data_pelanggan)): ?>
        <?php $no = 1; ?>
        <?php foreach ($data_pelanggan as $pelanggan): ?>
          <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo htmlspecialchars($pelanggan['nama_pelanggan']); ?></td>
          <td><?php echo htmlspecialchars($pelanggan['menu']); ?></td>
          <td><?php echo htmlspecialchars($pelanggan['jumlah']); ?></td>
          <td><?php echo htmlspecialchars($pelanggan['harga']); ?></td>
          <td>
            <!-- Ubah Pesanan -->
            <a href="ubah/UbahDataPesanan.php?id=<?php echo urlencode($pelanggan['id']); ?>"
            class="btn btn-outline-success btn-sm me-1" title="Ubah Data">
            <i class="bi bi-pencil-square"></i>
            </a>
            <!-- Hapus Pesanan -->
            <a href="hapus/HapusDataPesanan.php?id=<?php echo urlencode($pelanggan['id']); ?>"
            class="btn btn-outline-danger btn-sm me-1"
            onclick="return confirm('Yakin ingin menghapus data?')"  title="Hapus Data">
            <i class="bi bi-trash"></i>
            </a>
          </td>
          </tr>
        <?php endforeach; ?>
        <?php else: ?>
        <tr>
          <td colspan="6" class="text-center text-muted">Belum ada data pelanggan.</td>
        </tr>
        <?php endif; ?>
      </tbody>
      </table>
    </div>
    </div>
  </div>

  <!-- Modal Tambah Pesanan -->
  <div class="modal fade" id="modalTambahPesanan" tabindex="-1" aria-labelledby="modalTambahPesananLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form method="POST" class="modal-content" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTambahPesananLabel">Tambah Data Pesanan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required>
          </div>
          <div class="mb-3">
            <label for="menu" class="form-label">Menu</label>
            <input type="text" class="form-control" id="menu" name="menu" required>
          </div>
          <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" required>
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" min="0" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success" name="submit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
    </div>
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
