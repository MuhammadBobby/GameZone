<?php
session_start();
require 'connect.php';
require 'function_cek_login.php';

// Menangani upload gambar
$file = $_FILES['bukti'];
$fileName = $file['name'];
$fileTmpName = $file['tmp_name'];
$fileError = $file['error'];
$fileSize = $file['size'];

// Ekstensi file yang diizinkan
$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
$fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

if (in_array($fileExtension, $allowedExtensions)) {
    if ($fileError === 0) {
        if ($fileSize < 2000000) { // Batas ukuran 2MB
            // Nama file baru untuk menghindari nama file yang sama
            $newFileName = uniqid('', true) . '.' . $fileExtension;
            $fileDestination = '../images/uploads/' . $newFileName;

            // Pindahkan file ke folder uploads
            if (move_uploaded_file($fileTmpName, $fileDestination)) {
                // Simpan nama file dan ekstensi ke database
                $sql = "UPDATE transaksi SET bukti_pembayaran = '$newFileName', status = 'proses', tanggal = NOW() WHERE email = '" . $_SESSION['email'] . "' AND status = 'pending'";

                // Jalankan query
                if ($conn->query($sql) === TRUE) {
                    header("Location: ../pages/users/riwayat_transaksi.php?success=upload_bukti_success");
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                header("Location: ../pages/users/riwayat_transaksi.php?error=upload_bukti_failed");
                exit();
            }
        } else {
            header("Location: ../pages/users/riwayat_transaksi.php?error=upload_bukti_too_big");
            exit();
        }
    } else {
        header("Location: ../pages/users/riwayat_transaksi.php?error=upload_bukti_failed");
        exit();
    }
} else {
    header("Location: ../pages/users/riwayat_transaksi.php?error=upload_bukti_invalid");
    exit();
}

// Tutup koneksi
$conn->close();
