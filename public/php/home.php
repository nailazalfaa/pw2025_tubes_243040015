<?php
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
    <style>
        body {
            background: linear-gradient(135deg, #e8f5e9 0%, #fffde7 100%);
            min-height: 100vh;
            font-family: 'Montserrat', Arial, sans-serif;
        }
        .navbar {
            background: linear-gradient(90deg, #388e3c 60%, #43a047 100%) !important;
            box-shadow: 0 4px 16px rgba(46,125,50,0.13);
        }
        .navbar-brand img {
            width: 90px; height: 70px;
            filter: drop-shadow(0 2px 8px rgba(46,125,50,0.15));
        }
        .navbar-nav .nav-link {
            transition: background 0.2s, color 0.2s;
            border-radius: 8px;
            margin: 0 12px;
            padding: 8px 18px;
            font-size: 1.1rem;
        }
        .navbar-nav .nav-link:hover, 
        .navbar-nav .nav-link:focus, 
        .navbar-nav .nav-link.active {
            background: #fff;
            color: #388e3c !important;
            font-weight: bold;
        }
        /* Carousel fade effect */
        .carousel-fade .carousel-item {
            opacity: 0;
            transition: opacity 0.8s ease-in-out;
        }
        .carousel-fade .carousel-item.active {
            opacity: 1;
            z-index: 1;
        }
        .carousel-inner {
            max-width: 1200px;
            margin: 0 auto;
            border-radius: 24px;
            overflow: hidden;
            height: 340px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.10);
        }
        .carousel-item img {
            object-fit: cover;
            width: 100%;
            height: 340px;
            transition: transform 0.5s;
            filter: brightness(0.95) contrast(1.05);
        }
        .carousel-item img:hover {
            transform: scale(1.04) rotate(-1deg);
        }
        .carousel-caption {
            background: rgba(46,125,50,0.7);
            border-radius: 12px;
            padding: 1rem 2rem;
            color: #fff;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
            font-family: 'Montserrat', Arial, sans-serif;
        }
        /* Menu Card */
        .menu-card {
            border-radius: 24px;
            overflow: hidden;
            transition: transform 0.25s, box-shadow 0.25s;
            box-shadow: 0 2px 16px rgba(46,125,50,0.09);
            background: linear-gradient(120deg, #fff 80%, #e8f5e9 100%);
            position: relative;
        }
        .menu-card:hover {
            transform: translateY(-10px) scale(1.04) rotate(-1deg);
            box-shadow: 0 8px 32px rgba(46,125,50,0.18);
        }
        .menu-img {
            border-top-left-radius: 24px;
            border-top-right-radius: 24px;
            object-fit: cover;
            height: 220px;
            transition: filter 0.3s;
        }
        .menu-card:hover .menu-img {
            filter: brightness(0.93) blur(1px);
        }
        .menu-body {
            border-bottom-left-radius: 24px;
            border-bottom-right-radius: 24px;
            background: #fff;
            padding-bottom: 1.5rem;
        }
        .menu-icon {
            position: absolute;
            top: 12px;
            right: 18px;
            font-size: 2rem;
            color: #43a047;
            opacity: 0.7;
        }
        .badge-favorit {
            position: absolute;
            top: 16px;
            left: 16px;
            background: linear-gradient(90deg, #ffb300 0%, #ffd54f 100%);
            color: #fff;
            font-weight: bold;
            border-radius: 12px;
            padding: 4px 14px;
            font-size: 0.95rem;
            box-shadow: 0 2px 8px #ffd54f55;
            z-index: 2;
        }
        /* Informasi Section */
        .informasi-section {
            background: #fff url('https://www.transparenttextures.com/patterns/diagmonds-light.png');
            border-radius: 24px;
            box-shadow: 0 4px 24px rgba(46,125,50,0.09);
            padding: 48px 32px;
            margin-bottom: 48px;
            animation: fadeInUp 1.2s;
            position: relative;
            overflow: hidden;
        }
        .informasi-section::before {
            content: "";
            position: absolute;
            top: -40px; right: -40px;
            width: 180px; height: 180px;
            background: radial-gradient(circle, #e8f5e9 60%, transparent 100%);
            z-index: 0;
        }
        .informasi-title {
            color: #2e7d32;
            font-size: 1.2rem;
            letter-spacing: 1px;
            font-family: 'Pacifico', cursive;
        }
        .informasi-heading {
            color: #1b5e20;
            font-size: 2.8rem;
            font-weight: 700;
            font-family: 'Pacifico', cursive;
        }
        .informasi-desc {
            font-size: 1.15rem;
            color: #444;
        }
        .btn-gradient {
            background: linear-gradient(90deg, #43a047 0%, #81c784 100%);
            color: #fff;
            border: none;
            border-radius: 20px;
            padding: 10px 28px;
            font-weight: bold;
            transition: background 0.2s, transform 0.2s;
            box-shadow: 0 2px 8px rgba(46,125,50,0.13);
        }
        .btn-gradient:hover {
            background: linear-gradient(90deg, #388e3c 0%, #66bb6a 100%);
            transform: scale(1.05);
        }
        /* Footer */
        footer {
            background: #e8f5e9;
            color: #388e3c;
            font-weight: 500;
            font-size: 1.1rem;
        }
        .footer-social {
            margin-top: 8px;
        }
        .footer-social a {
            color: #388e3c;
            margin: 0 8px;
            font-size: 1.3rem;
            transition: color 0.2s;
        }
        .footer-social a:hover {
            color: #ffb300;
        }
        @media (max-width: 768px) {
            .carousel-inner, .carousel-item img {
                height: 180px;
            }
            .informasi-section {
                padding: 24px 8px;
            }
            .informasi-heading {
                font-size: 2rem;
            }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(40px);}
            to { opacity: 1; transform: translateY(0);}
        }
    </style>
</head>
<body>
    <!-- Awal Navbar -->
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
                        <a class="nav-link active" href="home.php"><i class="fa-solid fa-house"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu.php"><i class="fa-solid fa-utensils"></i> Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pesan.php"><i class="fa-solid fa-envelope"></i> Pesan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Awal Carousel -->
    <div id="mainCarousel" class="carousel slide carousel-fade container-fluid px-0 mt-5" data-bs-ride="carousel">
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
    <div class="container my-5" >
        <h2 class="mb-4 text-center fw-bold text-success" style="letter-spacing:1px;">
            <i class="fa-solid fa-star"></i> Menu Favorit
        </h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($menuFavorit as $menu): ?>
                <div class="col">
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
        <div class="text-center mt-4">
            <a href="menu.php" class="btn btn-gradient shadow"><i class="fa-solid fa-list"></i> Lihat Semua Menu</a>
        </div>
    </div>
    <!-- Akhir Menu Fav -->


    <!-- Awal Informasi -->
    <div class="container informasi-section">
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="text-success fw-bold mb-1 informasi-title text-center">Eksplorasi rasa dari tanah Pasundan!</p>
                <h1 class="fw-bold mb-3 informasi-heading text-center">Dapur Pasundan</h1>
                <p class="fw-semibold mb-3 informasi-desc" style="text-align: justify;">
                    D'Pas adalah restoran yang tidak hanya sekadar tempat makan, tetapi juga ruang nyaman untuk berkumpul bersama keluarga, teman, dan kolega. Dengan suasana yang hangat dan desain yang mengusung nuansa khas Sunda, restoran ini menghadirkan pengalaman bersantap yang lebih dari sekadar menikmati hidangan lezat.
                </p>
                <p class="mb-3 informasi-desc" style="text-align: justify;">
                    Ciri khas D'Pas adalah konsep tradisional yang berpadu dengan sentuhan modern, menciptakan atmosfer yang autentik dan menyenangkan. Pengunjung akan merasakan kehangatan budaya Sunda melalui dekorasi, musik, dan tentunya sajian khas seperti Nasi Liwet, Pepes Ikan, Karedok, dan Sate Maranggi.
                </p>
            </div>
            <div class="col-md-6 text-center">
                <img src="../img/logo.png" alt="logo" class="img-fluid" style="max-width: 400px; filter: drop-shadow(0 4px 24px #43a04733);">
            </div>
        </div>
    </div>
    </div>
    <!-- Akhir Informasi -->

    <!-- Awal Footer -->
    <footer class="text-center py-3 mt-4">
        <span>&copy; <?= date('Y') ?> Dapur Pasundan. All rights reserved.</span>
        <div class="footer-social">
            <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="#" title="Facebook"><i class="fab fa-facebook"></i></a>
            <a href="#" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
        </div>
    </footer>
    <!-- Akhir Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>