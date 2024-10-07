<?php
session_start();
require 'connect.php';

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../index.php");
    exit();
}

// Ambil ID produk yang akan diupdate
if (isset($_POST['id_produk'])) {
    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $diskon = $_POST['diskon'];

    // update
    $sql = "UPDATE produk SET nama_produk = '$nama_produk', harga = $harga, diskon = $diskon WHERE id_produk = $id_produk";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../products.php?updated=update_product_success");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    header("Location: ../products.php?error=update_product_failed");
    exit();
}
