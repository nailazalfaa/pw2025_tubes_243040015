<?php
session_start();

$error = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'] ?? "";
    $password = $_POST['password'] ?? "";

    if ($username === "nailazalfa" && $password === "naila1407") {
        $_SESSION['username'] = $username;
        header("Location: 6cAdmin.php");
        exit();
    } else {
        $error = "Username atau Password salah!!";
    }
}
?>