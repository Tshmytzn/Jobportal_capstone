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


