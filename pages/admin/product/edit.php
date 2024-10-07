<!-- Main modal -->
<div id="edit-product-modal-<?= $product['id_produk'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full p-4">
        <div class="relative bg-[#3b206b] rounded-lg shadow">
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-white">
                    Edit Product
                </h3>
                <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg ms-auto hover:bg-gray-600 hover:text-white" data-modal-toggle="edit-product-modal-<?= $product['id_produk'] ?>">
                    <!-- Close button SVG -->
                </button>
            </div>
            <form action="services/update_product.php" method="POST" class="p-4 px-5 mx-5 md:p-5 max-w-2/3">
                <input type="hidden" name="id_produk" id="id_produk" value="">
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="col-span-2 mx-2">
                        <label for="nama_produk" class="block mb-2 text-sm font-medium text-white">Name Product</label>
                        <input type="text" name="nama_produk" id="nama_produk" class=" text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5 bg-white border-gray-500 placeholder-gray-800 text-black " placeholder="Name Product" required="">
                    </div>
                    <div class="col-span-2 mx-2">
                        <label for="harga" class="block mb-2 text-sm font-medium text-white">Price</label>
                        <input type="number" min="1000" name="harga" id="harga" class=" text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5 bg-white border-gray-500 placeholder-gray-800 text-black" placeholder="Harga" required="">
                    </div>
                    <div class="col-span-2 mx-2">
                        <label for="diskon" class="block mb-2 text-sm font-medium text-white">Discount</label>
                        <input type="number" min="0" name="diskon" id="diskon" class=" text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5 bg-white border-gray-500 placeholder-gray-800 text-black" value="0" required="">
                    </div>
                    <button type="submit" class="text-white inline-flex items-center gap-0 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-yellow-500 hover:bg-yellow-600 focus:ring-yellow-700 m-5">
                        Updated
                    </button>
            </form>
        </div>
    </div>
</div>