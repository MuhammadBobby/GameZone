<!-- Main modal -->
<div id="add-product-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-[#3b206b] rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-white">
                    Add New Product
                </h3>
                <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg ms-auto hover:bg-gray-600 hover:text-white" data-modal-toggle="add-product-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="services/submit_product.php" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="col-span-2">
                        <label for="nama_produk" class="block mb-2 text-sm font-medium text-white">Name Product</label>
                        <input type="text" name="nama_produk" id="nama_produk" class=" text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5 bg-white border-gray-500 placeholder-gray-800 text-black " placeholder="Name Product" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="harga" class="block mb-2 text-sm font-medium text-white">Price</label>
                        <input type="number" min="1000" name="harga" id="harga" class=" text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5 bg-white border-gray-500 placeholder-gray-800 text-black" placeholder="Harga" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="diskon" class="block mb-2 text-sm font-medium text-white">Discount</label>
                        <input type="number" min="0" name="diskon" id="diskon" class=" text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5 bg-white border-gray-500 placeholder-gray-800 text-black" value="0" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="image" class="block mb-2 text-sm font-medium text-white">Image</label>
                        <input type="file" accept="image/*" name="image" id="image" class=" text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5 bg-white border-gray-500" required="">
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center gap-0focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-yellow-500 hover:bg-yellow-600 focus:ring-yellow-700">
                    <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>