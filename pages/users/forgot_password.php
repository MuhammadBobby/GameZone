<!-- Main modal -->
<div id="forgot-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-[#3b206b] rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-white">
                    Forgot Password
                </h3>
                <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg ms-auto hover:bg-gray-600 hover:text-white" data-modal-toggle="forgot-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="services/forgot_password.php" method="POST" class="p-4 md:p-5">
                <p class="px-3 py-2 mb-8 text-white bg-red-500 rounded-md">Masukkan email yang terdaftar dan ingat password baru kamu!</p>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="col-span-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-white">Email</label>
                        <input type="email" name="email" id="email" class=" text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-white border-gray-500 placeholder-gray-800 text-black focus:ring-primary-500 focus:border-primary-500" placeholder="Email@example.com" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="password" class="block mb-2 text-sm font-medium text-white">New Password</label>
                        <input type="password" name="password" id="password" class=" text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-white border-gray-500 placeholder-gray-800 text-black focus:ring-primary-500 focus:border-primary-500" placeholder="••••••••" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="password_confirm" class="block mb-2 text-sm font-medium text-white">Confirm New Password</label>
                        <input type="password" name="password_confirm" id="password_confirm" class=" text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-white border-gray-500 placeholder-gray-800 text-black focus:ring-primary-500 focus:border-primary-500" placeholder="••••••••" required="">
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center gap-0focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-yellow-500 hover:bg-yellow-600 focus:ring-yellow-700">
                    <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                    Reset Password
                </button>
            </form>
        </div>
    </div>
</div>