<?php
session_start();

$error = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'] ?? "";
    $password = $_POST['password'] ?? "";

    if ($username === "nailazalfa" && $password === "12345") {
        $_SESSION['username'] = $username;
        header("Location: ./admin/php/DataPesanan.php");
        exit();
    } else {
        $error = "Username atau Password salah!!";
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
        <div class="card p-4 shadow-lg" style="width: 22rem;" data-aos="fade-up" data-aos-duration="1200" data-aos-easing="ease-in-out">
            <h2 class="text-center mb-3" data-aos="fade-down" data-aos-delay="200">Login admin</h2>
            <img src="img/nasi oncom.jpg" class="logo mb-3 mx-auto d-block rounded-circle shadow" alt="Logo" style="width:100px;" data-aos="zoom-in" data-aos-delay="400">
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger text-center py-2" data-aos="fade-in" data-aos-delay="600"><?= $error ?></div>
            <?php endif; ?>
            <form method="post" data-aos="fade-up" data-aos-delay="800">
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input id="username" name="username" required type="text" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input id="password" name="password" required type="password" class="form-control">
                </div>
                <button class="btn btn-success w-100" type="submit" data-aos="zoom-in" data-aos-delay="1000">Login</button>
            </form>
            <hr data-aos="fade-in" data-aos-delay="1200">
            <div class="pendaftarn text-center" data-aos="fade-up" data-aos-delay="1400">
                <p>Belum punya akun?
                <a href="Pendaftaran.php" >Daftar Akun</a></p>
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