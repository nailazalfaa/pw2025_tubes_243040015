<?php
session_start();
include './admin/php/database.php';

$error = ""; // Inisialisasi variabel error

// Cek apakah tombol login ditekan
if (isset($_POST['login'])) {
    global $db;

    // Jika login sebagai admin
    if ($_POST["username"] == "admin d'pas" && $_POST["password"] == "admin123") {
        $_SESSION['login'] = true;
        $_SESSION['username'] = "admin d'pas";
        header("Location: ./admin/php/dasboard.php");
        exit;
    }

    // Pastikan koneksi database tersedia
    if (!$db) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    // Ambil input username dan password dengan sanitasi
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // Cek username di database
    $result = mysqli_query($db, "SELECT * FROM data_pendaftaran WHERE username = '$username'");

    if (!$result) {
        die("Query gagal: " . mysqli_error($db));
    }

    // Jika username ditemukan
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);

        if ($password === $data['password']) {
            // Set session (tanpa menyimpan password)
            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['email'] = $data['email'];

            // Redirect ke halaman utama
            header("Location: ./public/php/home.php");
            exit(); // Menghentikan eksekusi kode setelah redirect
        } else {
            $error = "Password salah!";
        }
       
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login admin</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/login.css">
</head>
<style>
    .pendaftarn a {
        text-decoration: none;
        color: #0d6efd;
    }
</style>
<body >
    <div class="container d-flex align-items-center justify-content-center" style="min-height:100vh;">
        <div class="card p-4 shadow-lg" style="width: 22rem;" data-aos="fade-up" data-aos-duration="800" data-aos-easing="ease-in-out">
            <h2 class="text-center mb-3" data-aos="fade-down" data-aos-delay="200">Login admin</h2>
            <img src="img/nasi oncom.jpg" class="logo mb-3 mx-auto d-block rounded-circle shadow" alt="Logo" style="width:100px;" data-aos="zoom-in" data-aos-delay="400">
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger text-center py-2" data-aos="fade-in" data-aos-delay="200"><?= $error ?></div>
            <?php endif; ?>
            <form method="post" data-aos="fade-up" data-aos-delay="400">
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input id="username" name="username" required type="text" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input id="password" name="password" required type="password" class="form-control">
                </div>
                <button class="btn btn-success w-100" type="submit" data-aos="zoom-in" data-aos-delay="600"  name="login">Login</button>
            </form>
            <hr data-aos="fade-in" data-aos-delay="600">
            <div class="pendaftarn text-center" data-aos="fade-up" data-aos-delay="800">
                <p>Belum punya akun?
                <a href="Pendaftaran.php">Daftar Akun</a></p>
            </div>
        </div>
    </div>
</body>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    once: true,
    duration: 1000,
    easing: 'ease-in-out',
  });
</script>
</html>