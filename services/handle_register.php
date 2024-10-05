<?php
session_start();
require 'connect.php';

// Ambil data dari form signup
$email = htmlspecialchars($_POST['email']);
$pass = htmlspecialchars($_POST['password']);
$pass_confirm = htmlspecialchars($_POST['password_confirm']);

// Cek apakah password dan password confirm cocok
if ($pass !== $pass_confirm) {
    header("Location: ../register.php?error=pass_not_match");
    exit();
}

// Query untuk memeriksa apakah email sudah ada
$sql = "SELECT * FROM user WHERE email='$email'";
$result = $conn->query($sql);

// Jika email belum terdaftar, lakukan pendaftaran
if ($result->num_rows === 0) {
    // Query untuk menambahkan pengguna baru
    $sql = "INSERT INTO user (email, password) VALUES ('$email', '$pass')";

    if ($conn->query($sql) === TRUE) {

        header("Location: ../login.php?success=register_success");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Email sudah terdaftar.";
}

// Tutup koneksi
$conn->close();
