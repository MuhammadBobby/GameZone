<?php
session_start();
require 'services/connect.php';

$disabled = true;

if (isset($_SESSION['login']) && isset($_SESSION['id_user'])) {
    $disabled = false;

    $id_user = $_SESSION['id_user'];
    // ambil data user dari db sesuai dengan id
    $sql_user = "SELECT * FROM user WHERE id_user = '$id_user'";
    $result_user = $conn->query($sql_user);
    $user = $result_user->fetch_assoc();
}

// ambil data produk dari db
$sql_products = "SELECT * FROM produk";
$products = $conn->query($sql_products);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameZone.ML</title>
    <link rel="icon" href="images/logo.png" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="src/style.css">
    <!-- tailwind css -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <!-- pengecekan alert -->
    <?php if (isset($_GET['berhasil'])) {
        $nama_produk = $_GET['product']; ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: 'Berhasil melakukan pembelian Produk <?= $nama_produk ?>! \nCek Akun Anda dan cek riwayat transaksi!',
            }).then((result) => {
                // reset params
                if (result.isConfirmed) {
                    window.location.href = 'pages/users/riwayat_transaksi.php';
                }
            })
        </script>
    <?php } else if (isset($_GET['success']) == 'update_profile_success') { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: 'Data Profil berhasil diupdate!',
            }).then((result) => {
                // reset params
                if (result.isConfirmed) {
                    window.location.href = 'index.php';
                }
            })
        </script>
    <?php } else if (isset($_GET['error']) == 'email_exist') { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Email sudah terdaftar!',
            }).then((result) => {
                // reset params
                if (result.isConfirmed) {
                    window.location.href = 'index.php';
                }
            })
        </script>
    <?php } else if (isset($_GET['cek']) == 'transaction_exist') { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Kamu harus menyelesaikan transaksi sebelumnya terlebih dahulu!',
            }).then((result) => {
                // reset params
                if (result.isConfirmed) {
                    window.location.href = 'pages/users/riwayat_transaksi.php';
                }
            })
        </script>
        <?php } ?>?>

        <!-- Bagian Navbar -->
        <?php include 'navbar.php'; ?>
        <?php include 'pages/users/profile.php'; ?>
        <?php include 'pages/users/edit_profile.php'; ?>

        <!-- Bagian Konten -->
        <div class="mt-20 main-content">
            <img alt="Promotional Banner" height="400" src="images/bacground.jpg" width="1200" class="object-cover m-auto" />
            <div class="flex flex-col game-info md:flex-row">
                <img alt="Mobile Legends" src="images/banner.png" class="object-contain w-32" />
                <div class="details">
                    <h2>MOBILE LEGENDS</h2>
                    <p>Moonton</p>
                    <div class="features">
                        <i class="fas fa-bolt"></i> Proses Cepat
                        <i class="fas fa-headset" style="margin-left: 20px;"></i> Layanan Chat 24/7
                        <i class="fas fa-globe" style="margin-left: 20px;"></i> Region Indonesia
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagian Best Sellers -->
        <div class="container" id="product">
            <div class="title" id="best-sellers">
                <i class="fas fa-fire"></i> Best Sellers
            </div>
            <div class="flex flex-wrap justify-center w-full gap-2">
                <!-- Card produk -->
                <?php foreach ($products as $product) :
                    // Penghitungan old price
                    $old_price = $product['harga'] + round($product['harga'] * $product['diskon'] / 100);
                ?>
                    <div class="card w-full md:w-[32%]">
                        <div class="details">
                            <div><?= $product['nama_produk'] ?></div>
                            <div class="price">Rp <?= number_format($product['harga'], 0, ',', '.') ?></div>
                            <div class="old-price">Rp <?= number_format($old_price, 0, ',', '.') ?></div>
                        </div>
                        <img src="images/<?= $product['image'] ?>" alt="<?= $product['nama_produk'] ?>" width="50" height="50" />
                        <div class="discount"><?= $product['diskon'] ?>% OFF</div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Bagian Transaksi -->
        <div id="transaction">
            <div class="transaction-container">
                <div class="transaction-header">Deskripsi dan Cara Melakukan Transaksi</div>
                <div class="flex flex-wrap justify-between transaction-body">
                    <div class="w-full transaction-content md:w-1/3">
                        <p>Beli top up ML diamond Mobile Legends & Weekly Diamond Pass MLBB harga paling murah, aman, cepat, dan terpercaya.</p>
                        <p class="warning"><i class="fas fa-exclamation-triangle"></i> Varian Mobile Legends Global hanya bisa dibeli oleh akun Mobile Legends Region Global</p>
                        <p>Cara topup:</p>
                        <ol class="steps">
                            <li>Masukkan Data Akun</li>
                            <li>Pilih Nominal</li>
                            <li>Pilih Pembayaran</li>
                            <li>Masukkan Kode Promo (jika ada)</li>
                            <li>Isi Detail Kontak</li>
                            <li>Klik Pesan Sekarang dan lakukan Pembayaran</li>
                            <li>Selesai</li>
                        </ol>
                        <p>Top up dan layanan CS OPEN 24 Jam Non Stop</p>
                    </div>
                    <form action="services/transaksi.php" method="POST" id="transactionForm" class="w-full md:w-2/3">
                        <div class="form-group">
                            <label for="id">ID:</label>
                            <input type="text" id="id" name="id" required>
                        </div>
                        <div class="form-group">
                            <label for="server">Server:</label>
                            <input type="text" id="server" name="server" required>
                        </div>
                        <div class="form-group">
                            <label for="produk">Produk:</label>
                            <select name="produk" id="produk" class="w-full p-2.5 rounded-md border-none bg-[#4b1a9b] text-white outline-none">
                                <option value="" disabled selected>Pilih Produk</option>
                                <?php foreach ($products as $product) : ?>
                                    <option value="<?= $product['id_produk'] ?>"><?= $product['nama_produk'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah:</label>
                            <input type="number" min="1" max="100" id="jumlah" name="jumlah" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="<?= isset($user['email']) ? $user['email'] : '' ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="whatsapp">No WhatsApp:</label>
                            <input type="text" id="whatsapp" name="whatsapp" required>
                        </div>
                        <button <?= $disabled ? 'disabled' : '' ?> type="submit" class="bg-blue-500 btn-submit hover:bg-blue-300 disabled:bg-gray-300">Kirim</button>
                    </form>
                </div>
                <!-- Bagian Footer -->
                <div id="contact">
                    <?php include 'footer.php'; ?>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>