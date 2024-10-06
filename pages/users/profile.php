<div id="profile-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-[#3b206b] rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                <h3 class="text-xl font-semibold text-white">
                    Profile
                </h3>
                <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto" data-modal-hide="profile-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 space-y-4 md:p-5">
                <p class="text-base leading-relaxed text-gray-400">
                    <span class="font-semibold text-yellow-500">Name :</span> <?= ucwords($user['name']) ?>
                </p>
                <p class="text-base leading-relaxed text-gray-400">
                    <span class="font-semibold text-yellow-500">Email :</span> <?= $user['email'] ?>
                </p>
                <p class="text-base leading-relaxed text-gray-400">
                    <span class="font-semibold text-yellow-500">Role :</span> <?= ucwords($user['role']) ?>
                </p>
                <p class="text-base leading-relaxed text-gray-400">
                    Data lainnya masih kami sembunyikan, silahkan hubungi CS untuk dapat mengakses data anda.
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                <button type="button" data-modal-hide="profile-modal" data-modal-target="edit-profile-modal" data-modal-toggle="edit-profile-modal" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Ubah Data Profile</button>
            </div>
        </div>
    </div>
</div>