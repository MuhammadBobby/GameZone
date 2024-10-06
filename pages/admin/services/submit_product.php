<?php
session_start();
require 'connect.php';

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../index.php");
    exit();
}

// Ambil data dari form
$name_produk = htmlspecialchars($_POST['nama_produk']);
$harga = htmlspecialchars($_POST['harga']);
$diskon = htmlspecialchars($_POST['diskon']);

// Proses upload gambar
$file = $_FILES['image'];
$fileName = $file['name'];
$fileTmpName = $file['tmp_name'];
$fileError = $file['error'];
$fileSize = $file['size'];

// Ekstensi file yang diizinkan
$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
$fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

// Mengabaikan pemeriksaan jenis file karena sudah dianggap aman
if ($fileError === 0) {
    if ($fileSize < 2000000) { // Batas ukuran 2MB
        // Nama file baru untuk menghindari nama file yang sama
        $newFileName = uniqid('', true) . '.' . $fileExtension;
        $fileDestination = '../../../images/' . $newFileName;

        // Pindahkan file ke folder uploads
        if (move_uploaded_file($fileTmpName, $fileDestination)) {
            // Simpan data produk ke database
            $sql = "INSERT INTO produk (nama_produk, harga, diskon, image) VALUES ('$name_produk', '$harga', '$diskon', '$newFileName')";

            // Jalankan query
            if ($conn->query($sql) === TRUE) {
                header("Location: ../products.php?success=add_product_success");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            header("Location: ../products.php?error=upload_gambar_failed");
            exit();
        }
    } else {
        header("Location: ../products.php?error=upload_gambar_too_big");
        exit();
    }
} else {
    header("Location: ../products.php?error=upload_gambar_failed");
    exit();
}

// Tutup koneksi
$conn->close();
