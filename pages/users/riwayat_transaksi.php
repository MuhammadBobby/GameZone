<?php
session_start();
require '../../services/connect.php';

// Pastikan pengguna sudah login
if (!isset($_SESSION['login']) && !isset($_SESSION['email'])) {
    header("Location: ../../login.php");
    exit();
}

// ambil data produk dari db sesuai dengan id
$email = $_SESSION['email'];
$sql_riwayat = "SELECT * FROM transaksi WHERE email = '$email'";
$riwayat = $conn->query($sql_riwayat);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameZone.ML - Riwayat Transaksi</title>
    <link rel="icon" href="images/logo.png" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../src/style.css">
    <!-- tailwind css -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="overflow-x-hidden">
    <div class="container mx-5 my-10">

        <main>
            <h1 class="text-3xl font-bold md:text-4xl">Riwayat Transaksi</h1>

            <?php if ($riwayat->num_rows > 0) : ?>
                <div class="relative mt-5 overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 rounded-sm shadow-lg rtl:text-right">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID Account
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Server
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Product
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($riwayat as $item) : ?>
                                <tr class="border-b odd:bg-white even:bg-gray-50">
                                    <th scope="row" class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap">
                                        <?= $item['id'] ?>
                                    </th>
                                    <td class="px-6 py-4">
                                        <?= $item['server'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php $sql_nama_produk = "SELECT * FROM produk WHERE id_produk = '$item[produk]'";
                                        $result_nama_produk = $conn->query($sql_nama_produk);
                                        $row_nama_produk = $result_nama_produk->fetch_assoc();
                                        echo $row_nama_produk['nama_produk']; ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <!-- currency -->
                                        Rp <?= number_format($item['total'], 0, ',', '.') ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $item['email'] ?>
                                    </td>
                                    <td class="px-6 py-4 font-semibold">
                                        <?= $item['tanggal'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#">
                                            <button class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700">Laporkan</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else : ?>
                <p class="my-10 text-center text-red-500">Tidak ada riwayat transaksi</p>
            <?php endif; ?>
        </main>

        <div class="mt-10">
            <p class="text-lg font-medium text-center">Jika terjadi kendala hubungi Layanan CS</p>
            <?php include '../../footer.php' ?>
        </div>
    </div>

    <a href="../../index.php" class="fixed p-3 transition-all border-2 border-yellow-500 rounded-full bottom-10 right-10 hover:scale-105">
        <img src="../../images/home.png" alt="home" title="Home">
    </a>
</body>

</html>