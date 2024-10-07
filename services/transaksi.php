<?php
session_start();
require 'connect.php';
require 'function_cek_login.php';

// masukkan form data ke dalam table transaksi
// ambil data
$id = htmlspecialchars($_POST['id']);
$server = htmlspecialchars($_POST['server']);
$produk = htmlspecialchars($_POST['produk']);
$jumlah = htmlspecialchars($_POST['jumlah']);
$email = htmlspecialchars($_POST['email']);
$whatsapp = htmlspecialchars($_POST['whatsapp']);

// cek apakah user tidak melakukan transdaksi sebelum transaksi lain tidak pending
$sql_cek = "SELECT * FROM transaksi WHERE email = '$email' AND status = 'pending'";
$cek = $conn->query($sql_cek);
if ($cek->num_rows > 0) {
    header("Location: ../index.php?cek=transaction_exist");
    exit();
}

// total
// ambil data dari produk
$sql_product = "SELECT * FROM produk WHERE id_produk = '$produk'";
$result_product = $conn->query($sql_product);
$row_product = $result_product->fetch_assoc();
$price = $row_product['harga'];
$total = $price * $jumlah;

// query insert
$sql = "INSERT INTO transaksi (id, server, produk, jumlah, total, email, whatsapp, tanggal, status) VALUES ('$id', '$server', $produk, $jumlah, $total, '$email', '$whatsapp', NOW(), 'pending')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../index.php?berhasil=true&product=$row_product[nama_produk]");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
