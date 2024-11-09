 <!--   Core JS Files   -->
 <script src="../assets/js/core/popper.min.js"></script>
 <script src="../assets/js/core/bootstrap.min.js"></script>
 <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
 <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
 <script src="../assets/js/plugins/chartjs.min.js"></script>
 <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    var ctx2 = document.getElementById("chart-line").getContext("2d");

var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);
gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)');

var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);
gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)');

new Chart(ctx2, {
   type: "line",
   data: {
       labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
       datasets: [
           {
               label: "Approved Applications",
               tension: 0.4,
               borderWidth: 0,
               pointRadius: 0,
               borderColor: "#cb0c9f",
               borderWidth: 3,
               backgroundColor: gradientStroke1,
               fill: true,
               data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
               maxBarThickness: 6
           },
           {
               label: "Rejected Applications",
               tension: 0.4,
               borderWidth: 0,
               pointRadius: 0,
               borderColor: "#3A416F",
               borderWidth: 3,
               backgroundColor: gradientStroke2,
               fill: true,
               data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
               maxBarThickness: 6
           },
       ],
   },
   options: {
       responsive: true,
       maintainAspectRatio: false,
       plugins: {
           legend: {
               display: false,
           }
       },
       interaction: {
           intersect: false,
           mode: 'index',
       },
       scales: {
           y: {
               grid: {
                   drawBorder: false,
                   display: true,
                   drawOnChartArea: true,
                   drawTicks: false,
                   borderDash: [5, 5]
               },
               ticks: {
                   display: true,
                   padding: 10,
                   color: '#b2b9bf',
                   font: {
                       size: 11,
                       family: "Open Sans",
                       style: 'normal',
                       lineHeight: 2
                   },
               }
           },
           x: {
               grid: {
                   drawBorder: false,
                   display: false,
                   drawOnChartArea: false,
                   drawTicks: false,
                   borderDash: [5, 5]
               },
               ticks: {
                   display: true,
                   color: '#b2b9bf',
                   padding: 20,
                   font: {
                       size: 11,
                       family: "Open Sans",
                       style: 'normal',
                       lineHeight: 2
                   },
               }
           },
       },
   },
});

</script>

 <script>
     var win = navigator.platform.indexOf('Win') > -1;
     if (win && document.querySelector('#sidenav-scrollbar')) {
         var options = {
             damping: '0.5'
         }
         Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
     }
 </script>

 <!-- Github buttons -->
 <script async defer src="https://buttons.github.io/buttons.js"></script>
 <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
 <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
 <!-- DataTables JS (only needed if not already included in head) -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js" defer></script>


