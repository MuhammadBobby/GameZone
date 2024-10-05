<!-- Main modal -->
<div id="pembayaran-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-lg max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-[#3b206b] rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-white">
                    Lakukan Pembayaran
                </h3>
                <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg ms-auto hover:bg-gray-600 hover:text-white" data-modal-toggle="pembayaran-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <div class="p-4 text-white md:p-5">
                <p>QRIS Pembayaran senilai : <span class="font-bold text-yellow-500">Rp <?= number_format($item['total'], 0, ',', '.') ?></span></p>
                <img src="../../images/qris.jpg" alt="QRIS" class="object-contain w-full h-auto mx-auto md:w-2/3">
                <p class="text-sm font-semibold text-red-500">Note: jika terjadi kesalahan pembayaran silahkan hubungi CS</p>
            </div>
            <!-- Modal body -->
            <form action="../../services/upload_bukti.php" method="POST" enctype="multipart/form-data" class="px-4 pb-5 md:px-5">
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="col-span-2">
                        <label for="bukti" class="block mb-2 text-sm font-medium text-white">Masukkan bukti pembayaran</label>
                        <input type="file" name="bukti" id="bukti" class=" text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-white border-gray-500 placeholder-gray-800 text-black focus:ring-primary-500 focus:border-primary-500" required="" accept="image/*">
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center gap-0focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-yellow-500 hover:bg-yellow-600 focus:ring-yellow-700">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>