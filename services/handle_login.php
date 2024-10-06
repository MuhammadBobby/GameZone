<?php
session_start();
require 'connect.php';

// Ambil data dari form login
$email = htmlspecialchars($_POST['email']);
$pass = htmlspecialchars($_POST['password']);

// Query untuk mencari pengguna berdasarkan email
$sql = "SELECT * FROM user WHERE email='$email'";
$result = $conn->query($sql);

// Periksa apakah pengguna ditemukan
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Periksa password
    if ($pass === $row['password']) { // Cek apakah password cocok
        // Set session
        $_SESSION['login'] = true;
        $_SESSION['email'] = $row['email'];
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['role'] = $row['role'];

        // Redirect ke halaman yang sesuai
        if ($row['role'] === 'admin') {
            header("Location: ../pages/admin/dashboard.php");
            exit();
        } else if ($row['role'] === 'member') {
            header("Location: ../index.php");
            exit();
        }
    } else {
        header("Location: ../login.php?error=login_failed");
        exit();
    }
} else {
    header("Location: ../login.php?error=login_failed");
    exit();
}

// Tutup koneksi
$conn->close();
