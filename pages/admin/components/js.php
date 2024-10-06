 <!-- AlpineJS -->
 <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
 <!-- Flowbite JS -->
 <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
 <!-- ChartJS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

 <script>
     var chartOne = document.getElementById('chartOne');
     var myChart = new Chart(chartOne, {
         type: 'bar',
         data: {
             labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
             datasets: [{
                 label: '# of Votes',
                 data: [12, 19, 3, 5, 2, 3],
                 backgroundColor: [
                     'rgba(255, 99, 132, 0.2)',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                     'rgba(255, 159, 64, 0.2)'
                 ],
                 borderColor: [
                     'rgba(255, 99, 132, 1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)',
                     'rgba(153, 102, 255, 1)',
                     'rgba(255, 159, 64, 1)'
                 ],
                 borderWidth: 1
             }]
         },
         options: {
             scales: {
                 yAxes: [{
                     ticks: {
                         beginAtZero: true
                     }
                 }]
             }
         }
     });

     var chartTwo = document.getElementById('chartTwo');
     var myLineChart = new Chart(chartTwo, {
         type: 'line',
         data: {
             labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
             datasets: [{
                 label: '# of Votes',
                 data: [12, 19, 3, 5, 2, 3],
                 backgroundColor: [
                     'rgba(255, 99, 132, 0.2)',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                     'rgba(255, 159, 64, 0.2)'
                 ],
                 borderColor: [
                     'rgba(255, 99, 132, 1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)',
                     'rgba(153, 102, 255, 1)',
                     'rgba(255, 159, 64, 1)'
                 ],
                 borderWidth: 1
             }]
         },
         options: {
             scales: {
                 yAxes: [{
                     ticks: {
                         beginAtZero: true
                     }
                 }]
             }
         }
     });
 </script>

 <!-- aside -->
 <script>
     const navItems = document.querySelectorAll("#nav .nav-item");

     // Fungsi untuk menghapus dan menambahkan class active-nav-link
     function setActiveNavItem(item) {
         navItems.forEach((navItem) => {
             navItem.classList.remove("active-nav-link");
             navItem.classList.add("opacity-75", "hover:opacity-100");
         });
         item.classList.add("active-nav-link");
         item.classList.remove("opacity-75", "hover:opacity-100");
     }

     // Event listener untuk setiap item navigasi
     navItems.forEach((navItem) => {
         navItem.addEventListener("click", function(e) {
             // Menghapus class aktif dari semua nav item
             setActiveNavItem(navItem);

             // Simpan state halaman yang dipilih di localStorage
             localStorage.setItem("activeNavItem", this.getAttribute("href"));
         });
     });

     // Memeriksa state aktif dari localStorage saat halaman dimuat
     const activePage = localStorage.getItem("activeNavItem");

     if (activePage) {
         const activeItem = document.querySelector(`#nav a[href='${activePage}']`);
         if (activeItem) {
             setActiveNavItem(activeItem);
         }
     }
 </script>