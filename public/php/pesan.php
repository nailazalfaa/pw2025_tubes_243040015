<?php include '../../admin/php/database.php' ?>

<?php 
if (isset($_POST['pesan'])) {
    if(create_pesanan($_POST) > 0) {
        echo "<script>alert('data menu berhasil ditambahkan.'); </script>";
    } else {
        echo "<script>alert('data menu gagal ditambahkan.'); </script>";
    }
}
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
                        <a class="nav-link" href="home.php"><i class="fa-solid fa-house"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu.php"><i class="fa-solid fa-utensils"></i> Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="pesan.php"><i class="fa-solid fa-envelope"></i> Pesan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->

    <!-- form pemesanan -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    <div class="card-header text-center p-4" style="background: linear-gradient(90deg, #8B4513 , #388e3c , #8B4513 )">
                        <h2 class="mb-1 text-white" style="font-family: 'Pacifico', cursive; letter-spacing:2px;">
                            <i class="fa-solid fa-bowl-food me-2"></i>Pesan Menu Favoritmu!
                        </h2>
                        <p class="mb-0 text-white-50" style="font-family: 'Montserrat', sans-serif; font-size:1.1rem;">
                            Nikmati hidangan lezat & minuman segar dari Dapur Pasundan
                        </p>
                    </div>
                    <div class="card-body p-5 bg-light">
                        <form action="pesan.php" method="POST" autocomplete="off">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="nama" class="form-label fw-semibold">
                                        <i class="fa-solid fa-user"></i> Nama Pemesan
                                    </label>
                                    <input type="text" class="form-control rounded-3 shadow-sm" id="nama" name="nama_pelanggan" placeholder="Masukkan nama Anda" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="menu" class="form-label fw-semibold">
                                        <i class="fa-solid fa-utensils"></i> Pilih Menu
                                    </label>
                                    <?php
                                    $menuList = [
                                        "Nasi Timbel",
                                        "Sate Maranggi",
                                        "Karedok", 
                                        "Sop Iga",
                                        "Gurame Goreng",
                                        "Ayam Bakar",
                                        "Pepes Ikan Mas",
                                        "Lotek",
                                        "Empat Gepuk",
                                        "Tahu Sumedang", 
                                        "Cireng",
                                        "Combro",
                                        "Misro",
                                        "Gehu",
                                        "Pisang Goreng", 
                                        "Batagor", 
                                        "Es Cendol", 
                                        "Bajigur",
                                        "Teh Poci",
                                        "Es Goyobod", 
                                        "Bandrek",
                                        "Es Doger",
                                        "Es Jeruk", 
                                        "Kopi Tubruk"
                                    ];
                                    ?>
                                    <input class="form-control rounded-3 shadow-sm" list="menuList" id="menu" name="menu" placeholder="Ketik atau pilih menu" required>
                                    <datalist id="menuList">
                                        <?php foreach($menuList as $menu): ?>
                                            <option value="<?= htmlspecialchars($menu) ?>">
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                                <div class="col-md-6">
                                    <label for="jumlah" class="form-label fw-semibold">
                                        <i class="fa-solid fa-sort-numeric-up"></i> Jumlah
                                    </label>
                                    <input type="number" class="form-control rounded-3 shadow-sm" id="jumlah" name="jumlah" min="1" placeholder="Jumlah" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="harga" class="form-label fw-semibold">
                                        <i class="fa-solid fa-money-bill-wave"></i> Harga (Rp)
                                    </label>
                                    <input type="number" class="form-control rounded-3 shadow-sm" id="harga" name="harga" min="0" placeholder="Harga satuan" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="catatan" class="form-label fw-semibold">
                                        <i class="fa-solid fa-pen"></i> Catatan Tambahan
                                    </label>
                                    <textarea class="form-control rounded-3 shadow-sm" id="catatan" name="catatan" rows="2" placeholder="Contoh: tanpa sambal, level pedas, dll."></textarea>
                                </div>
                            </div>
                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-success btn-lg rounded-pill shadow" name="pesan">
                                    <i class="fa-solid fa-paper-plane"></i> Pesan Sekarang
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center bg-white border-0 py-3">
                        <small class="text-muted">
                            Terima kasih telah memesan di <span class="fw-bold" style="color:#388e3c;">Dapur Pasundan</span>!
                            <i class="fa-solid fa-heart text-danger"></i>
                            <br>
                            <span style="font-size:0.95em;">Kami akan segera menghubungi Anda untuk konfirmasi pesanan.</span>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir form pemesanan -->

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
