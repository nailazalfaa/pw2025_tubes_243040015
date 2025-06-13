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
    <nav class="navbar navbar-expand-lg navbar-dark mb-4 py-2 sticky-top shadow-sm" data-aos="fade-down">
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
    <section class="container mb-5" data-aos="fade-up">
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
              <li><a class="dropdown-item custom-dropdown-item" href="#makanan-ringan">Cemilan</a></li>
              <li><a class="dropdown-item custom-dropdown-item" href="#minuman">Minuman</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Daftar Menu dengan AOS dan Tampilan Lebih Modern -->
    <section class="container mb-5" id="daftar-menu" data-aos="fade-up">
      <div class="container mb-4">
 
</div>
<div id="menuResult"></div>
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

      $iconKategori = [
        'Makanan' => 'fa-bowl-food',
        'Makanan Ringan' => 'fa-cookie-bite',
        'Minuman' => 'fa-mug-hot'
      ];

      foreach ($kategori_menu as $kategori => $items):
        $anchor = strtolower(str_replace(' ', '-', $kategori));
        if ($anchor == 'makanan-ringan' || $anchor == 'makanan ringan') $anchor = 'makanan-ringan';
        $icon = isset($iconKategori[$kategori]) ? $iconKategori[$kategori] : 'fa-utensils';
      ?>
        <div class="mb-5">
          <div class="d-flex align-items-center  mb-4" data-aos="fade-right">
            <i class="fa-solid <?= $icon ?> fa-2x me-2 text-success"></i>
            <h2 class="fw-bold m-0" id="<?= $anchor ?>" style="color:#388e3c;"><?= htmlspecialchars($kategori) ?></h2>
            <div class="flex-grow-1 ms-3" style="height:2px;background:linear-gradient(90deg,#388e3c 40%,#fffde7 100%);"></div>
          </div>
          <div class="row g-4">
            <?php foreach ($items as $i => $produk): ?>
            <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="<?= $i * 100 ?>">
              <div class="card h-100 shadow border-0 rounded-4 overflow-hidden menu-card">
                <div class="position-relative">
                  <img src="../../admin/img/<?= htmlspecialchars($produk['foto_menu']) ?>" class="card-img-top" alt="<?= htmlspecialchars($produk['nama']) ?>" style="height:220px;object-fit:cover;">
                  <span class="badge bg-success position-absolute top-0 end-0 m-2 px-3 py-2 fs-6 shadow-sm" style="border-radius: 1rem 0 1rem 1rem;">
                    <?= htmlspecialchars($kategori) ?>
                  </span>
                </div>
                <div class="card-body text-center">
                  <h5 class="card-title fw-bold" style="color:#388e3c;"><?= htmlspecialchars($produk['nama']) ?></h5>
                  <span class="fw-bold text-success fs-5">Rp<?= number_format($produk['harga'],0,',','.') ?>.000</span>
                  <form action="pesan.php" method="get" class="mt-3">
                    <input type="hidden" name="menu_id" value="<?= htmlspecialchars($produk['id']) ?>">
                    <button type="submit" class="btn btn-outline-success rounded-pill px-4 shadow-sm">Pesan</button>
                  </form>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </section>
    <!-- AOS JS & CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
      AOS.init({ duration: 900, once: true });
    </script>
    <style>
    .menu-card {
      transition: transform .2s, box-shadow .2s;
      border: 2px solid #e8f5e9;
      background: linear-gradient(135deg, #fff 80%, #e8f5e9 100%);
    }
    .menu-card:hover {
      transform: translateY(-8px) scale(1.03);
      box-shadow: 0 8px 32px rgba(56,142,60,0.12);
      border-color: #388e3c;
    }
    .menu-card .card-title {
      font-family: 'Montserrat', sans-serif;
    }
    </style>
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