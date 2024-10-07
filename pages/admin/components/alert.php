 <!-- alert -->
 <!-- pengecekan alert -->
 <?php if (isset($_GET['success']) == "add_product_success") { ?>
     <script>
         Swal.fire({
             icon: 'success',
             title: 'Sukses',
             text: 'Produk berhasil ditambahkan!',
         }).then((result) => {
             // reset params
             if (result.isConfirmed) {
                 window.location.href = 'products.php';
             }
         })
     </script>
 <?php } else if (isset($_GET['updated']) == 'update_product_success') { ?>
     <script>
         Swal.fire({
             icon: 'success',
             title: 'Sukses',
             text: 'Produk berhasil diupdate!',
         }).then((result) => {
             // reset params
             if (result.isConfirmed) {
                 window.location.href = 'products.php';
             }
         })
     </script>
 <?php } else if (isset($_GET['delete']) == 'delete_product_success') { ?>
     <script>
         Swal.fire({
             icon: 'success',
             title: 'Sukses',
             text: 'Produk berhasil dihapus!',
         }).then((result) => {
             // reset params
             if (result.isConfirmed) {
                 window.location.href = 'products.php';
             }
         })
     </script>
 <?php } else if (isset($_GET['error']) == 'upload_gambar_failed') { ?>
     <script>
         Swal.fire({
             icon: 'error',
             title: 'Gagal',
             text: 'Gambar Product gagal diupload!',
         }).then((result) => {
             // reset params
             if (result.isConfirmed) {
                 window.location.href = 'products.php';
             }
         })
     </script>
 <?php } else if (isset($_GET['error']) == 'upload_gambar_too_big') { ?>
     <script>
         Swal.fire({
             icon: 'error',
             title: 'Gagal',
             text: 'Gambar Product terlalu besar!',
         }).then((result) => {
             // reset params
             if (result.isConfirmed) {
                 window.location.href = 'products.php';
             }
         })
     </script>
 <?php } else if (isset($_GET['error']) == 'upload_gambar_invalid') { ?>
     <script>
         Swal.fire({
             icon: 'error',
             title: 'Gagal',
             text: 'Gambar Product tidak sesuai!',
         }).then((result) => {
             // reset params
             if (result.isConfirmed) {
                 window.location.href = 'products.php';
             }
         })
     </script>
 <?php } else if (isset($_GET['error']) == 'product_not_found') { ?>
     <script>
         Swal.fire({
             icon: 'error',
             title: 'Gagal',
             text: 'Produk tidak ditemukan! Klik tombol "Refresh" untuk memuat ulang halaman!',
         }).then((result) => {
             // reset params
             if (result.isConfirmed) {
                 window.location.href = 'products.php';
             }
         })
     </script>
 <?php } else if (isset($_GET['error']) == 'update_product_failed') { ?>
     <script>
         Swal.fire({
             icon: 'error',
             title: 'Gagal',
             text: 'Produk gagal diupdate!',
         }).then((result) => {
             // reset params
             if (result.isConfirmed) {
                 window.location.href = 'products.php';
             }
         })
     </script>
 <?php } ?>