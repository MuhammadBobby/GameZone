<?php
session_start();
require '../../services/connect.php';

// cek apakah user sudah login
if (!isset($_SESSION['login']) && !isset($_SESSION['email'])) {
    header("Location: ../../login.php");
    exit();
} else if ($_SESSION['role'] !== 'admin') {
    header("Location: ../../index.php");
    exit();
}


// ambil data transaksi
$sql_transactions = "SELECT * FROM transaksi ORDER BY tanggal DESC";
$transctions = $conn->query($sql_transactions);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameZone.ML - Transaction</title>
    <?php include 'components/style.php'; ?>
</head>

<body class="flex bg-gray-100">
    <?php include 'components/aside.php' ?>


    <main class="relative w-full max-h-full p-4">
        <!-- Header -->
        <?php include 'components/header.php'; ?>


        <div class="w-full mt-12">
            <p class="flex items-center pb-3 text-xl">
                <i class="mr-3 fas fa-list"></i> Table of Transaction
            </p>
            <div class="overflow-auto bg-white">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                ID Account
                            </th>
                            <th
                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                Product
                            </th>
                            <th
                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                Price
                            </th>
                            <th
                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                Status
                            </th>
                            <th
                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                Bukti Pembayaran
                            </th>
                            <th
                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                Date
                            </th>
                            <th
                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transctions as $transaction) : ?>
                            <tr>
                                <!-- transaction -->
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?= $transaction['id'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <!-- produk -->
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        <?php
                                        // cari produk berdasarkan id produk
                                        $sql_product = "SELECT nama_produk FROM produk WHERE id_produk = " . $transaction['produk'];
                                        $product = $conn->query($sql_product)->fetch_assoc();
                                        echo $product['nama_produk'];
                                        ?>
                                    </p>
                                </td>
                                <!-- total -->
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-red-500 whitespace-no-wrap">
                                        Rp <?= number_format($transaction['total'], 0, ',', '.') ?>
                                    </p>
                                </td>
                                <!-- status -->
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <?php
                                    if ($transaction['status'] == 'pending') {
                                        $background = 'bg-yellow-200';
                                        $text = 'text-yellow-600';
                                    } else if ($transaction['status'] == 'sukses') {
                                        $background = 'bg-green-200';
                                        $text = 'text-green-600';
                                    } else if ($transaction['status'] == 'proses') {
                                        $background = 'bg-blue-200';
                                        $text = 'text-blue-600';
                                    } else {
                                        $background = 'bg-red-200';
                                        $text = 'text-red-600';
                                    }
                                    ?>
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold leading-tight <?= $text ?>">
                                        <span aria-hidden
                                            class="absolute inset-0 <?= $background ?> rounded-full opacity-50"></span>
                                        <span class="relative"><?= $transaction['status'] ?></span>
                                    </span>
                                </td>
                                <!-- bukti -->
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <a class="px-3 py-2 mr-2" href="../../images/uploads/<?= $transaction['bukti_pembayaran'] ?>" target="_blank" rel="noreferrer noopener">

                                        <?php if ($transaction['bukti_pembayaran'] != null) { ?>
                                            <img src="../../images/uploads/<?= $transaction['bukti_pembayaran'] ?>" alt="Bukti Pembayaran" class="object-contain w-24 h-auto">
                                        <?php } else {
                                            echo "-";
                                        } ?>
                                    </a>
                                </td>
                                <!-- total -->
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="font-semibold text-gray-900 whitespace-no-wrap">
                                        <?= $transaction['tanggal'] ?>
                                    </p>
                                </td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <a href="" class="px-3 py-2 mr-2 text-white bg-gray-500 rounded hover:bg-gray-600">Detail</a>
                                    <a href="" class="px-3 py-2 mr-2 text-black bg-yellow-500 rounded hover:bg-yellow-600">Edit</a>
                                    <a href="" class="px-3 py-2 text-white bg-red-500 rounded hover:bg-red-600">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <?php include 'components/js.php'; ?>
</body>

</html>