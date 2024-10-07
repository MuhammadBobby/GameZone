<?php
session_start();
require 'connect.php';

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../index.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE transaksi SET status = 'batal', tanggal = NOW() WHERE id_transaksi = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../transactions.php?cancel=true");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    header("Location: ../transactions.php?error=confirm_failed");
    exit();
}
