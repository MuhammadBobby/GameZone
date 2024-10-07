<?php
session_start();
require '../../services/connect.php';

$id_user = $_SESSION['id_user'];

// cek apakah user sudah login
if (!isset($_SESSION['login']) && !isset($_SESSION['email'])) {
    header("Location: ../../login.php");
    exit();
} else if ($_SESSION['role'] !== 'admin') {
    header("Location: ../../index.php");
    exit();
}

// Ambil parameter GET
$tanggal_awal = isset($_GET['tanggal_awal']) ? $_GET['tanggal_awal'] : null;
$tanggal_akhir = isset($_GET['tanggal_akhir']) ? $_GET['tanggal_akhir'] : null;

// Periksa apakah kedua tanggal valid
if ($tanggal_awal && $tanggal_akhir) {
    // Pastikan tanggal dalam format yang benar (YYYY-MM-DD)
    $tanggal_awal = date('Y-m-d', strtotime($tanggal_awal));
    $tanggal_akhir = date('Y-m-d', strtotime($tanggal_akhir));

    // Modifikasi query SQL untuk menyertakan filter tanggal
    $sql_transactions = "SELECT * FROM transaksi WHERE status = 'sukses' AND tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY tanggal DESC";
} else {
    header("Location: transactions.php?error=invalid_date");
    exit();
}

// Eksekusi query transaksi
$transctions = $conn->query($sql_transactions);

// user
$sql_user = "SELECT name FROM user WHERE id_user = '$id_user'";
$user = $conn->query($sql_user)->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Report</title>
    <?php include 'components/style.php'; ?>
    <style>
        @media print {
            @page {
                size: landscape;
                /* Ubah ke landscape */
            }
        }
    </style>
</head>

<body class="px-10">
    <header class="my-10">
        <h1 class="text-3xl font-bold md:text-4xl text-[#3b206b]">Transaction Report</h1>
        <hr>
        <p class="my-2 text-sm"><span class="font-semibold">Periode : </span><?= date_format(new DateTime($tanggal_awal), 'd F Y') ?> - <?= date_format(new DateTime($tanggal_akhir), 'd F Y') ?></p>
        <p class="my-2 text-sm"><span class="font-semibold">Waktu : </span> <?= date('H:i:s') ?> WIB</p>
        <p class="my-2 text-sm"><span class="font-semibold">Jumlah Transaksi : </span> <?= $transctions->num_rows ?></p>
    </header>
    <div class="overflow-hidden bg-white  mx-auto shadow-2xl shadow-[#3b206b] rounded-lg">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th
                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left  uppercase bg-[#3b206b] text-white border-b-2 border-gray-200">
                        ID Account
                    </th>
                    <th
                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left  uppercase bg-[#3b206b] text-white border-b-2 border-gray-200">
                        Server
                    </th>
                    <th
                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left  uppercase bg-[#3b206b] text-white border-b-2 border-gray-200">
                        Product
                    </th>
                    <th
                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left  uppercase bg-[#3b206b] text-white border-b-2 border-gray-200">
                        Price
                    </th>
                    <th
                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left  uppercase bg-[#3b206b] text-white border-b-2 border-gray-200">
                        Email
                    </th>
                    <th
                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left  uppercase bg-[#3b206b] text-white border-b-2 border-gray-200">
                        WhatsApp
                    </th>
                    <th
                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left  uppercase bg-[#3b206b] text-white border-b-2 border-gray-200">
                        Bukti Pembayaran
                    </th>
                    <th
                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left  uppercase bg-[#3b206b] text-white border-b-2 border-gray-200">
                        Date
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php if ($transctions->num_rows > 0) : ?>
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
                            <!-- server -->
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    <?= $transaction['server'] ?>
                                </p>
                            </td>
                            <!-- produk -->
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="font-bold text-gray-900 whitespace-no-wrap">
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
                                <p class="font-bold text-red-500 whitespace-no-wrap">
                                    Rp <?= number_format($transaction['total'], 0, ',', '.') ?>
                                </p>
                            </td>
                            <!-- email -->
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    <?= $transaction['email'] ?>
                                </p>
                            </td>
                            <!-- wa -->
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    <?= $transaction['whatsapp'] ?>
                                </p>
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
                            <!-- tanggal -->
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="font-semibold text-gray-900 whitespace-no-wrap">
                                    <?= $transaction['tanggal'] ?>
                                </p>
                            </td>
                        </tr>
                    <?php endforeach;
                else : ?>
                    <tr>
                        <td colspan="6" class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">Tidak ada transaksi.</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <footer class="flex items-start justify-between mt-10 mb-5">
        <div>
            <br>
            <h3 class="text-lg font-semibold">Dicetak pada <?= date('d F Y') ?></h3>
            <br><br><br>
            <hr>
            <p class="text-lg font-bold text-center">(<?= ucwords($user['name']) ?>)</p>
        </div>
        <div>
            <h3 class="text-lg font-semibold">Mengetahui,</h3>
            <p>Pimpinan Game Zone</p>
            <br><br><br>
            <hr>
            <p class="text-lg font-bold text-center">(....................................)</p>
        </div>
    </footer>

    <?php include 'components/js.php' ?>

    <!-- cetak pdf -->
    <script>
        // Fungsi yang akan dijalankan ketika halaman siap
        window.onload = function() {
            // Fungsi untuk memantau setelah print selesai
            window.onafterprint = function() {
                // Redirect ke halaman transaksi
                window.history.back();
            };

            // Jalankan print
            window.print();
        };
    </script>
</body>

</html>