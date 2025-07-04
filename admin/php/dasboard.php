<?php
include 'database.php';

// Ambil data total dari database
$total_pesanan = select("SELECT COUNT(*) as total FROM data_pesanan")[0]['total'] ?? 0;
$total_menu = select("SELECT COUNT(*) as total FROM data_menu")[0]['total'] ?? 0;
$total_pendaftaran = select("SELECT COUNT(*) as total FROM data_pendaftaran")[0]['total'] ?? 0;

// Mulai session jika belum
if (session_status() === PHP_SESSION_NONE) {
  session_start();
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
        <a href="dasboard.php" class="nav-link satu">
          <i class="bi bi-graph-up-arrow me-2"></i>Dasboard
        </a>
      </li>
      <li>
        <a href="DataPendaftaran.php" class="nav-link">
          <i class="bi bi-person-plus me-2"></i>Data Pendaftaran
        </a>
      </li>
      <li>
        <a href="DataMenu.php" class="nav-link">
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
  <!-- End Sidebar -->

   <!-- Main Content -->
  <div class="flex-grow-1 d-flex flex-column min-vh-100">
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white border-bottom">
    <div class="container-fluid justify-content-end">
      <div class="dropdown">
    <img src="https://ui-avatars.com/api/?name=<?= urlencode(substr('admin dpas', 0, 1)) ?>&background=198754&color=fff" class="avatar" alt="avatar">
    <span class="me-2 fw-semibold"><?= htmlspecialchars('admin dpas'); ?></span>
    <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      ▼
    </button>
    <ul class="dropdown-menu dropdown-menu-end">
      <li>
        <form method="POST" action="../../index.php" class="d-inline">
          <button type="submit" name="logout" class="dropdown-item">Logout</button>
        </form>
      </li>
    </ul
      </div>
    </div>
    </nav>
    <!-- End Topbar -->

    <!-- Dashboard Cards -->
    <div class="container py-4">
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card border-success shadow-sm">
            <div class="card-body d-flex align-items-center">
              <i class="bi bi-basket display-5 text-success me-3"></i>
              <div>
                <h5 class="card-title mb-1">Total Pesanan</h5>
                <h3 class="mb-0"><?= $total_pesanan ?></h3>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-primary shadow-sm">
            <div class="card-body d-flex align-items-center">
              <i class="bi bi-list-ul display-5 text-primary me-3"></i>
              <div>
                <h5 class="card-title mb-1">Total Menu</h5>
                <h3 class="mb-0"><?= $total_menu ?></h3>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-warning shadow-sm">
            <div class="card-body d-flex align-items-center">
              <i class="bi bi-person-check display-5 text-warning me-3"></i>
              <div>
                <h5 class="card-title mb-1">Total Pendaftaran</h5>
                <h3 class="mb-0"><?= $total_pendaftaran ?></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Dashboard Cards -->
  </div>
  <!-- End Main Content -->
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
