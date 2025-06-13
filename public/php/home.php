<?php
session_start();
// Data menu favorit
$menuFavorit = [
    [
        'img' => '../img/nasi tutug oncom.jpeg',
        'alt' => 'Menu 1',
        'icon' => 'fa-bowl-rice',
        'title' => 'Nasi Tutug Oncom',
        'desc' => 'Nasi yang dicampur dengan oncom bakar, sering disajikan dengan ikan asin dan lalapan.'
    ],
    [
        'img' => '../img/nasi liwet.jpeg',
        'alt' => 'Menu 2',
        'icon' => 'fa-bowl-food',
        'title' => 'Nasi Liwet',
        'desc' => 'Nasi gurih yang dimasak dengan santan dan rempah, disajikan dengan lauk seperti ayam goreng dan ikan asin.'
    ],
    [
        'img' => '../img/nasi timbel.jpg',
        'alt' => 'Menu 3',
        'icon' => 'fa-leaf',
        'title' => 'Nasi Timbel',
        'desc' => 'Nasi yang dibungkus daun pisang, biasanya disajikan dengan ayam goreng, tahu, tempe, dan sambal.'
    ]
];
?>
<?php
$carouselItems = [
    [
        'src' => '../img/1.png',
        'alt' => 'Slide 1'
    ],
    [
        'src' => '../img/2.jpeg',
        'alt' => 'Slide 2'
    ]
];
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
    <link rel="stylesheet" href="../css/home.css">
    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>
<body>
    <!-- Awal Navbar -->
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
                        <a class="nav-link active" href="home.php"><i class="fa-solid fa-house"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu.php"><i class="fa-solid fa-utensils"></i> Menu</a>
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
    <!-- Akhir Navbar -->

    <!-- Awal Carousel -->
    <div id="mainCarousel" class="carousel slide carousel-fade container-fluid px-0 mt-5" data-bs-ride="carousel" data-aos="fade-up">
        <div class="carousel-inner">
            <?php foreach ($carouselItems as $i => $item): ?>
                <div class="carousel-item position-relative<?= $i === 0 ? ' active' : '' ?>">
                    <img src="<?= htmlspecialchars($item['src']) ?>" class="d-block w-100 h-100" alt="<?= htmlspecialchars($item['alt']) ?>">
                </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Akhir Carousel -->

    <!-- Awal Menu Favorit -->
    <div class="container my-5" data-aos="fade-up" data-aos-delay="100">
        <h2 class="mb-4 text-center fw-bold text-success" style="letter-spacing:1px;" data-aos="zoom-in">
            <i class="fa-solid fa-star"></i> Menu Favorit
        </h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($menuFavorit as $idx => $menu): ?>
                <div class="col" data-aos="fade-up" data-aos-delay="<?= 200 + $idx * 100 ?>">
                    <div class="card menu-card h-100 border-0">
                        <span class="badge-favorit"><i class="fa-solid fa-crown"></i> Favorit</span>
                        <span class="menu-icon"><i class="fa-solid <?= htmlspecialchars($menu['icon']) ?>"></i></span>
                        <img src="<?= htmlspecialchars($menu['img']) ?>" class="card-img-top menu-img" alt="<?= htmlspecialchars($menu['alt']) ?>">
                        <div class="card-body menu-body">
                            <h5 class="card-title fw-bold text-success"><?= htmlspecialchars($menu['title']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($menu['desc']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-4" data-aos="fade-up" data-aos-delay="500">
            <a href="menu.php" class="btn btn-gradient shadow"><i class="fa-solid fa-list"></i> Lihat Semua Menu</a>
        </div>
    </div>
    <!-- Akhir Menu Fav -->


    <!-- Awal Informasi -->
    <div class="container informasi-section" data-aos="fade-up" data-aos-delay="200">
        <div class="row align-items-center">
            <div class="col-md-6" data-aos="fade-right" data-aos-delay="300">
                <p class="text-success fw-bold mb-1 informasi-title text-center">Eksplorasi rasa dari tanah Pasundan!</p>
                <h1 class="fw-bold mb-3 informasi-heading text-center">Dapur Pasundan</h1>
                <p class="fw-semibold mb-3 informasi-desc" style="text-align: justify;">
                    D'Pas adalah restoran yang tidak hanya sekadar tempat makan, tetapi juga ruang nyaman untuk berkumpul bersama keluarga, teman, dan kolega. Dengan suasana yang hangat dan desain yang mengusung nuansa khas Sunda, restoran ini menghadirkan pengalaman bersantap yang lebih dari sekadar menikmati hidangan lezat.
                </p>
                <p class="mb-3 informasi-desc" style="text-align: justify;">
                    Ciri khas D'Pas adalah konsep tradisional yang berpadu dengan sentuhan modern, menciptakan atmosfer yang autentik dan menyenangkan. Pengunjung akan merasakan kehangatan budaya Sunda melalui dekorasi, musik, dan tentunya sajian khas seperti Nasi Liwet, Pepes Ikan, Karedok, dan Sate Maranggi.
                </p>
            </div>
            <div class="col-md-6 text-center" data-aos="fade-left" data-aos-delay="400">
                <img src="../img/logo.png" alt="logo" class="img-fluid" style="max-width: 400px; filter: drop-shadow(0 4px 24px #43a04733);">
            </div>
        </div>
    </div>
    <!-- Akhir Informasi -->

    <!-- Awal Footer -->
    <footer class="text-center py-3 mt-4" data-aos="fade-up" data-aos-delay="600">
        <span>&copy; <?= date('Y') ?> Dapur Pasundan. All rights reserved.</span>
        <div class="footer-social">
            <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="#" title="Facebook"><i class="fab fa-facebook"></i></a>
            <a href="#" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
        </div>
    </footer>
    <!-- Akhir Footer -->

    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
      AOS.init({
        once: false, // ubah ke false agar animasi muncul setiap scroll
        duration: 800,
        offset: 80,
      });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>