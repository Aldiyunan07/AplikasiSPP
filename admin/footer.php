
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-right d-none d-sm-block">
                                    Aplikasi School Payment V.1.1
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->
<!-- Right Sidebar -->
<div class="right-bar">
            <div data-simplebar="" class="h-100">
                <div class="rightbar-title px-3 py-4">
                    <a href="javascript:void(0);" class="right-bar-toggle float-right">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                    <h5 class="m-0">Settings</h5>
                </div>

                <!-- Settings -->
                <hr class="mt-0">
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="assets\images\layouts\layout-1.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked="">
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets\images\layouts\layout-2.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsstyle="assets/css/bootstrap-dark.min.css" data-appstyle="assets/css/app-dark.min.css">
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets\images\layouts\layout-3.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-5">
                        <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appstyle="assets/css/app-rtl.min.css">
                        <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

            
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
                <script src="assets\libs\jquery\jquery.min.js"></script>
                <script src="assets\libs\bootstrap\js\bootstrap.bundle.min.js"></script>
                <script src="assets\libs\metismenu\metisMenu.min.js"></script>
                <script src="assets\libs\simplebar\simplebar.min.js"></script>
                <script src="assets\libs\node-waves\waves.min.js"></script>

                <!-- apexcharts -->
                <script src="assets\libs\apexcharts\apexcharts.min.js"></script>

                <script src="assets\js\pages\dashboard.init.js"></script>
                <!-- Required datatable js -->
                <script src="assets\libs\parsleyjs\parsley.min.js"></script>

                <script src="assets\js\pages\form-validation.init.js"></script>
                <script src="assets\libs\datatables.net\js\jquery.dataTables.min.js"></script>
                <script src="assets\libs\datatables.net-bs4\js\dataTables.bootstrap4.min.js"></script>
                <!-- Buttons examples -->
                <script src="assets\libs\datatables.net-buttons\js\dataTables.buttons.min.js"></script>
                <script src="assets\libs\datatables.net-buttons-bs4\js\buttons.bootstrap4.min.js"></script>
                <script src="assets\libs\jszip\jszip.min.js"></script>
                <script src="assets\libs\pdfmake\build\pdfmake.min.js"></script>
                <script src="assets\libs\pdfmake\build\vfs_fonts.js"></script>
                <script src="assets\libs\datatables.net-buttons\js\buttons.html5.min.js"></script>
                <script src="assets\libs\datatables.net-buttons\js\buttons.print.min.js"></script>
                <script src="assets\libs\datatables.net-buttons\js\buttons.colVis.min.js"></script>
                
                <!-- Responsive examples -->
                <script src="assets\libs\datatables.net-responsive\js\dataTables.responsive.min.js"></script>
                <script src="assets\libs\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js"></script>
                <script src="assets\libs\echarts\echarts.min.js"></script>
                <!-- echarts init -->
                <script src="assets\js\pages\echarts.init.js"></script>
                <!-- Datatable init js -->
                <script src="assets\js\pages\datatables.init.js"></script> 
                <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                <script src="assets\libs\admin-resources\rwd-table\rwd-table.min.js"></script>


        <!-- App js -->
        <script src="assets\js\app.js"></script>
        <script>
            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function() {
                $(".select2").select2({
                    placeholder: "pilih",
                    allowClear: true
                });
            });
        </script>
    </body>

</html>