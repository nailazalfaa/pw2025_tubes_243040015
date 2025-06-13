  <?php
  include '../../admin/php/database.php';
  $menu = select("SELECT * FROM data_menu");
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapur Pasundan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/menu.css">
    <style>
      .dropdown-menu .custom-dropdown-item:hover,
      .dropdown-menu .custom-dropdown-item:focus {
        background-color: #388e3c !important;
        color: #fff !important;
      }
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark mb-4 py-2 sticky-top shadow-sm">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center me-4" href="/php/home.php">
          <img src="../img/logo.png" alt="Logo" class="img-fluid">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fw-bold">
            <li class="nav-item">
              <a class="nav-link" href="home.php"><i class="fa-solid fa-house"></i> Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="menu.php"><i class="fa-solid fa-utensils"></i> Menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pesan.php"><i class="fa-solid fa-envelope"></i> Pesan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../index.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <!-- Banner Menu -->
    <section class="container mb-5">
      <div class="row justify-content-center align-items-center bg-white rounded-4 shadow p-4" style="background: linear-gradient(90deg, #e8f5e9 60%, #fffde7 100%);">
        <div class="col-md-8 text-center">
          <h1 class="display-5 fw-bold" style="font-family: 'Pacifico', cursive; color: #388e3c;">
            Menu Dapur Pasundan
          </h1>
          <p class="lead mt-3" style="color: #388e3c;">
            Temukan beragam hidangan khas Sunda yang lezat, sehat, dan menggugah selera. Semua menu kami dibuat dengan bahan segar dan resep tradisional terbaik!
          </p>
          <!-- Dropdown button untuk memilih kategori -->
          <div class="dropdown mt-2 d-inline-block">
            <button class="btn btn-success btn-lg px-4 rounded-pill shadow-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              Lihat Menu
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <li><a class="dropdown-item custom-dropdown-item" href="#makanan">Makanan</a></li>
              <li><a class="dropdown-item custom-dropdown-item" href="#makanan-ringan">Makanan Ringan</a></li>
              <li><a class="dropdown-item custom-dropdown-item" href="#minuman">Minuman</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Daftar Menu -->
    <section class="container mb-5" id="daftar-menu">
      <?php
      // Kelompokkan menu berdasarkan kategori
      $kategori_menu = [];
      foreach ($menu as $item) {
        $kategori = $item['kategori'];
        if (!isset($kategori_menu[$kategori])) {
          $kategori_menu[$kategori] = [];
        }
        $kategori_menu[$kategori][] = $item;
      }

      foreach ($kategori_menu as $kategori => $items):
        $anchor = strtolower(str_replace(' ', '-', $kategori));
        if ($anchor == 'makanan-ringan' || $anchor == 'makanan ringan') $anchor = 'makanan-ringan';
      ?>
        <h2 class="fw-bold mb-4" id="<?= $anchor ?>" style="color:#388e3c;"><?= htmlspecialchars($kategori) ?></h2>
        <div class="row g-4 mb-5">
          <?php foreach ($items as $produk): ?>
          <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm border-0">
              <img src="../../admin/img/<?= htmlspecialchars($produk['foto_menu']) ?>" class="card-img-top" alt="<?= htmlspecialchars($produk['nama']) ?>" style="height:200px;object-fit:cover;">
              <div class="card-body text-center">
                <h5 class="card-title"><?= htmlspecialchars($produk['nama']) ?></h5>
                <span class="fw-bold text-success">Rp<?= number_format($produk['harga'],0,',','.') . '.000' ?></span>
                <form action="pesan.php" method="get" class="mt-3">
                  <input type="hidden" name="menu_id" value="<?= htmlspecialchars($produk['id']) ?>">
                  <button type="submit" class="btn btn-success btn-sm rounded-pill px-4">Pesan</button>
                </form>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </section>
    <!-- End Menu -->

    <!-- Footer -->
    <footer class="text-center py-3 mt-4">
      <span>&copy; <?= date('Y') ?> Dapur Pasundan. All rights reserved.</span>
      <div class="footer-social">
        <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
        <a href="#" title="Facebook"><i class="fab fa-facebook"></i></a>
        <a href="#" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
  </html>
