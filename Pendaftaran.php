<?php include 'database2.php'?>

<?php 
if (isset($_POST['pendaftaran'])) {
    if(create_pendaftaran($_POST) > 0) {
        echo "<script>alert('data akun berhasil ditambahkan.'); </script>";
    } else {
        echo "<script>alert('data akun gagal ditambahkan.'); </script>";
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
<body class="container d-flex align-items-center justify-content-center" style="min-height:100vh;">
    
        <div class="card p-4" style="width: 500px;" data-aos="zoom-in">
            
            <form method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Nama:</label>
                    <input id="username" name="nama" required type="nama" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input id="username" name="username" required type="text" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Email:</label>
                    <input id="username" name="email" required type="text" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input id="password" name="password" required type="password" class="form-control">
                </div>
                <button class="btn btn-success w-100" type="submit" name="pendaftaran">Sumbit</button>
            </form>
            <hr>
            <div class="pendaftarn text-center">
                <p>Udah punya akun?
                <a href="index.php">Login</a></p>
            </div>
        </div>
</body>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>

</html>
