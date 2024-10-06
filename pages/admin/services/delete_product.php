<?php
session_start();
require 'connect.php';

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../index.php");
    exit();
}

// Ambil ID produk yang akan dihapus
$id_produk = $_GET['id']; // Pastikan Anda mengirimkan ID produk melalui GET

// Cek apakah ID produk valid
if (isset($id_produk) && is_numeric($id_produk)) {
    // Ambil nama gambar dari database
    $sql = "SELECT image FROM produk WHERE id_produk = $id_produk";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imagePath = '../../../images/' . $row['image'];

        // Hapus file gambar dari server
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Hapus data produk dari database
        $deleteSql = "DELETE FROM produk WHERE id_produk = $id_produk";
        if ($conn->query($deleteSql) === TRUE) {
            header("Location: ../products.php?delete=delete_product_success");
            exit();
        } else {
            echo "Error: " . $deleteSql . "<br>" . $conn->error;
        }
    } else {
        header("Location: ../products.php?error=product_not_found");
        exit();
    }
} else {
    echo "ID produk tidak valid.";
}

// Tutup koneksi
$conn->close();
