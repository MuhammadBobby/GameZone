   <aside id="nav" class="relative hidden w-64 min-h-screen shadow-xl bg-sidebar sm:block">
       <div>
           <div class="p-6">
               <a href="../../index.php">
                   <img src="../../images/logo.png" alt="LOGO" class="object-contain w-2/3 h-auto">
               </a>
               <button type="button" data-modal-target="add-product-modal" data-modal-toggle="add-product-modal" class="flex items-center justify-center w-full py-2 mt-5 font-semibold bg-white rounded-tr-lg rounded-bl-lg rounded-br-lg shadow-lg cta-btn hover:shadow-xl hover:bg-gray-300">
                   <i class="mr-3 fas fa-plus"></i> New Product
               </button>

               <!-- modal add -->
               <?php include 'product/add.php'; ?>

           </div>
           <nav class="pt-3 text-base font-semibold text-white">
               <a href="dashboard.php" class="flex items-center py-4 pl-6 text-white active-nav-link nav-item">
                   <i class="mr-3 fas fa-tachometer-alt"></i>
                   Dashboard
               </a>
               <a href="products.php" class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 nav-item">
                   <i class="mr-3 fas fa-sticky-note"></i>
                   Products
               </a>
               <a href="transactions.php" class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 nav-item">
                   <i class="mr-3 fas fa-align-left"></i>
                   Transactions
               </a>
               <a href="users.php" class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 nav-item">
                   <i class="mr-3 fas fa-table"></i>
                   Users
               </a>
           </nav>
       </div>
   </aside>