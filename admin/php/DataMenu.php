<?php include 'database.php'?>



<?php $data_pelanggan = select ("SELECT * FROM data_menu2");?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kuliner Khas Sunda</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../css/style.css">
  <style>
    body { background: #f8fafc; }
    .sidebar {
      min-width: 220px;
     
      color: #fff;
      min-height: 100vh;
    }
    .sidebar .nav-link {
      color: #e9ecef;
      font-weight: 500;
    }
    .sidebar .nav-link.active, .sidebar .nav-link:hover {
      background: #157347;
      color: #fff;
    }
    .navbar {
      box-shadow: 0 2px 8px rgba(0,0,0,0.03);
    }
    .avatar {
      width: 32px; height: 32px;
      border-radius: 50%;
      object-fit: cover;
      margin-right: 8px;
    }
    .btn-custom {
      min-width: 70px;
    }
    .table-striped > tbody > tr:nth-of-type(odd) {
      background-color: #f3f6f9;
    }
  </style>
</head>
<body>
  <div class="d-flex">
    <!-- Sidebar -->
    <nav class="sidebar d-flex flex-column p-3"> 
      <a class="navbar-brand mb-4 fs-4 fw-bold text-white" href="#">
        <i class="bi bi-egg-fried"></i> Kuliner Sunda
      </a>
        <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="DataPendaftaran.php" class="nav-link "><i class="bi bi-house-door me-2"></i>Data Pendaftaran</a>
        </li>
        <li><a href="DataMenu.php" class="nav-link active"><i class="bi bi-list-ul me-2"></i>Data Menu</a></li>
        <li><a href="DataPesanan.php" class="nav-link"><i class="bi bi-basket me-2"></i>Data Pesanan</a></li>
      </ul>
    </nav>

    <!-- Main Content -->
    <div class="flex-grow-1 d-flex flex-column min-vh-100">
      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white border-bottom">
        <div class="container-fluid justify-content-end">
          <div class="dropdown">
            <img src="https://ui-avatars.com/api/?name=<?= urlencode($_SESSION['username'][0] ?? 'U') ?>&background=198754&color=fff" class="avatar" alt="avatar">
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

      <!-- Content -->
      <div class="container py-4">
        <h3 class="mb-4 fw-bold">Daftar Menu</h3>
        <div class="table-responsive">
          <table class="table table-hover table-striped align-middle">
            <thead class="table-success">
              <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 20%;">Nama_Makanan</th>
                <th style="width: 15%;">Deskripsi</th>
                <th style="width: 15%;">Harga</th>
                <th style="width: 15%;">Kategori</th>
                <th style="width: 15%;">status_ketersediaan</th>
                <th style="width: 20%;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($data_pelanggan)): ?>
                <?php $no = 1; ?>
                <?php foreach ($data_pelanggan as $pelanggan): ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $pelanggan['nama']; ?></td>
                    <td><?= $pelanggan['deskripsi']; ?></td>
                    <td><?= $pelanggan['harga']; ?></td>
                    <td><?= $pelanggan['kategori']; ?></td>
                    <td><?= $pelanggan['status_ketersediaan']; ?></td>
                   
                    <td>
                      <a href="ubah_pelanggan.php?id=<?= urlencode($pelanggan['id']); ?>"
                        class="btn btn-success btn-sm btn-custom me-1" title="Ubah Data">
                        <i class="bi bi-pencil-square"></i> Ubah
                      </a>
                      <a href="hapus_pelanggan.php?id=<?= urlencode($pelanggan['id']); ?>"
                        class="btn btn-danger btn-sm btn-custom"
                        onclick="return confirm('Yakin ingin menghapus data ini?');" title="Hapus Data">
                        <i class="bi bi-trash"></i> Hapus
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
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
