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

// ambil data produk
$sql_products = "SELECT * FROM produk";
$products = $conn->query($sql_products);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameZone.ML - Products</title>
    <?php include 'components/style.php'; ?>
</head>

<body class="flex bg-gray-100">
    <?php include 'components/aside.php' ?>
    <?php include 'components/alert.php'; ?>

    <main class="relative w-full max-h-full p-4">
        <!-- Header -->
        <?php include 'components/header.php'; ?>

        <div class="w-full mt-12">
            <p class="flex items-center pb-3 text-xl">
                <i class="mr-3 fas fa-list"></i> Table of Products
            </p>
            <div class="overflow-auto bg-white">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
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
                                Discount
                            </th>
                            <th
                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <!-- product -->
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">
                                            <img class="w-full h-full rounded-full"
                                                src="../../images/<?= $product['image'] ?>"
                                                alt=<?= $product['nama_produk'] ?> />
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?= $product['nama_produk'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <!-- price -->
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">Rp <?= number_format($product['harga'], 0, ',', '.') ?></p>
                                </td>
                                <!-- discount -->
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-red-500 whitespace-no-wrap">
                                        <?= $product['diskon'] ?>%
                                    </p>
                                </td>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <!-- edit -->
                                    <button type="button"
                                        data-modal-target="edit-product-modal-<?= $product['id_produk'] ?>"
                                        data-modal-toggle="edit-product-modal-<?= $product['id_produk'] ?>"
                                        data-id="<?= $product['id_produk'] ?>"
                                        data-nama="<?= $product['nama_produk'] ?>"
                                        data-harga="<?= $product['harga'] ?>"
                                        data-diskon="<?= $product['diskon'] ?>"
                                        class="px-3 py-2 mr-2 text-black bg-yellow-500 rounded hover:bg-yellow-600">Edit</button>

                                    <!-- delete -->
                                    <a href="services/delete_product.php?id=<?= $product['id_produk'] ?>" class="px-3 py-2 text-white bg-red-500 rounded hover:bg-red-600" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                                </td>

                                <!-- modal edit -->
                                <?php include 'product/edit.php'; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <?php include 'components/js.php'; ?>
    <script>
        document.querySelectorAll('button[data-modal-toggle^="edit-product-modal"]').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-id');
                const productName = this.getAttribute('data-nama');
                const productPrice = this.getAttribute('data-harga');
                const productDiscount = this.getAttribute('data-diskon');

                // Cari modal terkait berdasarkan product ID
                const modal = document.querySelector(`#edit-product-modal-${productId}`);

                // Isi nilai default form modal
                modal.querySelector('#id_produk').value = productId;
                modal.querySelector('#nama_produk').value = productName;
                modal.querySelector('#harga').value = productPrice;
                modal.querySelector('#diskon').value = productDiscount;

                // Buka modal
                modal.classList.remove('hidden');
            });
        });
    </script>
</body>

</html>