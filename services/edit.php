<?php
session_start();
require 'connect.php';

// Pastikan pengguna sudah login
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Ambil data dari form edit
$new_email = $_POST['email'];
$new_pass = $_POST['password'];
$current_email = $_SESSION['email'];

// Query untuk memperbarui email dan password
$sql = "UPDATE user SET email='$new_email', password='$new_pass' WHERE email='$current_email'";

if ($conn->query($sql) === TRUE) {
    // Update session email
    $_SESSION['email'] = $new_email;
    echo "Profil berhasil diperbarui.";
    // Redirect atau tampilkan pesan sukses
    header("Location: user.html");
    exit();
} else {
    echo "Error updating record: " . $conn->error;
}

// Tutup koneksi
$conn->close();
