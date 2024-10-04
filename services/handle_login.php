<?php
session_start();
require 'connect.php';

// Ambil data dari form login
$email = $_POST['email'];
$pass = $_POST['password'];

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

        // Redirect ke halaman user.html
        header("Location: ../index.php");
        exit();
    } else {
        echo "Invalid password.";
    }
} else {
    header("Location: ../login.php?error=login_failed");
    exit();
}

// Tutup koneksi
$conn->close();
