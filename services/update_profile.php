<?php
session_start();
require 'connect.php';
require 'function_cek_login.php';

// Ambil data dari form edit
$new_name = htmlspecialchars($_POST['new_name']);
$new_email = htmlspecialchars($_POST['new_email']);

// cek apakah email sudah terdaftar
$sql = "SELECT * FROM user WHERE email = '$new_email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    header("Location: ../index.php?error=email_exist");
    exit();
}

// Query untuk memperbarui email dan password
$sql = "UPDATE user SET email='$new_email', name='$new_name' WHERE id_user = " . $_SESSION['id_user'];

if ($conn->query($sql) === TRUE) {
    // Update session email
    $_SESSION['email'] = $new_email;
    // Redirect atau tampilkan pesan sukses
    header("Location: ../index.php?success=update_profile_success");
    exit();
} else {
    echo "Error updating record: " . $conn->error;
}

// Tutup koneksi
$conn->close();
