<?php
session_start();
?>

<nav class="bg-[#3b206b] fixed w-full z-20 top-0 start-0 shadow-lg">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="images/logo.png" class="h-8" alt="Logo">
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

            <?php if (isset($_SESSION['login'])) { ?>
                <div>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-yellow-500 md:p-0 md:w-auto">
                        <i class="fas fa-user"></i>
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                        <ul class="py-2 text-sm text-black" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                            </li>
                            <li>
                                <a href="pages/users/riwayat_transaksi.php" class="block px-4 py-2 hover:bg-gray-100">
                                    Riwayat Transaksi
                                </a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="services/logout.php" class="block px-4 py-2 text-sm text-red-700 hover:bg-red-100">Sign out</a>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <a href="login.php" type="button" class="text-white bg-yellow-500 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2 text-center">Masuk</a>
            <?php } ?>

            <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent text-black md:text-white">
                <li>
                    <a href="index.php#" class="block py-2 px-3 text-slate-900 bg-yellow-500 rounded md:bg-transparent md:text-yellow-500 font-bold md:p-0" aria-current="page">Beranda</a>
                </li>
                <li>
                    <a href="#product" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-yellow-500 md:p-0">Produk</a>
                </li>
                <li>
                    <a href="#transaction" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-yellow-500 md:p-0">Transaksi</a>
                </li>
                <li>
                    <a href="#contact" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-yellow-500 md:p-0">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
</nav>