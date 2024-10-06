<header x-data="{ isOpen: false }" class="w-full px-6 py-5 bg-sidebar sm:hidden">
    <div class="flex items-center justify-between">
        <a href="../../index.php">
            <img src="../../images/logo.png" alt="LOGO" class="object-contain w-2/3 h-auto">
        </a>
        <button @click="isOpen = !isOpen" class="text-3xl text-white focus:outline-none">
            <i x-show="!isOpen" class="fas fa-bars"></i>
            <i x-show="isOpen" class="fas fa-times"></i>
        </button>
    </div>

    <!-- Dropdown Nav -->
    <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
        <a href="dashboard.php" class="flex items-center py-2 pl-4 text-white active-nav-link nav-item">
            <i class="mr-3 fas fa-tachometer-alt"></i>
            Dashboard
        </a>
        <a href="products.php" class="flex items-center py-2 pl-4 text-white opacity-75 hover:opacity-100 nav-item">
            <i class="mr-3 fas fa-sticky-note"></i>
            Products
        </a>
        <a href="transactions.php" class="flex items-center py-2 pl-4 text-white opacity-75 hover:opacity-100 nav-item">
            <i class="mr-3 fas fa-align-left"></i>
            Transactions
        </a>
        <a href="users.php" class="flex items-center py-2 pl-4 text-white opacity-75 hover:opacity-100 nav-item">
            <i class="mr-3 fas fa-table"></i>
            Users
        </a>
        <button type="button" data-modal-target="add-product-modal" data-modal-toggle="add-product-modal" class="flex items-center justify-center w-full py-2 mt-5 font-semibold bg-white rounded-tr-lg rounded-bl-lg rounded-br-lg shadow-lg cta-btn hover:shadow-xl hover:bg-gray-300">
            <i class="mr-3 fas fa-plus"></i>
            Add Product
        </button>
    </nav>
</header>