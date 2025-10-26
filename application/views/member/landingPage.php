<!doctype html>
<html lang="en">


<!-- Mirrored from preview.easetemplate.com/influence/html/influence/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2023 00:17:50 GMT -->

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/x-icon">


    <!-- Libs CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/fullcalendar/main.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/quill/dist/quill.snow.css">




    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme.min.css">
    <title>FUBK-SMCS</title>

</head>

<body class="bg-light">
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="min-vh-100 d-flex align-items-center">
        <div class="splash-container">
            <div class="card shadow-sm">
                <div class="card-header text-center">


                    <?php if ($this->session->flashdata('success') != "") {
                           $_SESSION['username'] =  $this->session->userdata('username');
                           $_SESSION['password'] =  $this->session->userdata('password');
                        
                        ?>
                      <i class="fas fa-thumbs-up" style="font-size:72pt; color:green"></i>
                        <?php echo "<h1>".$this->session->flashdata('success')."</h1>"; 
                            header( "refresh:2;url=".site_url('auth/authentication') );
                        ?>
                    
                    <?php } else { 
                         $_SESSION['username'] =  $this->session->userdata('username');
                         $_SESSION['password'] =  $this->session->userdata('password');
                        ?>
                        
                       
                        
                        <i class="fas fa-ban" style="font-size:72pt; color:maroon"></i>
                        <?php echo "<h1>".$this->session->flashdata('failure')."</h1>"; 
                             header( "refresh:2;url=".site_url('auth/authentication') );
                        ?>
                       
                    <?php } ?>


                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- end login page  -->
        <!-- ============================================================== -->
        <!-- Libs JS -->
        <script src="<?php echo base_url(); ?>assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/chartist/dist/chartist.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/chartist-plugin-threshold/dist/chartist-plugin-threshold.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/raphael/raphael.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/morris.js/morris.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/gaugeJS/dist/gauge.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/chart.js/dist/Chart.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/c3/c3.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/d3/dist/d3.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/inputmask/dist/jquery.inputmask.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/parsleyjs/dist/parsley.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/select2/dist/js/select2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/multiselect/js/jquery.multi-select.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/fullcalendar/main.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/cropperjs/dist/cropper.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/sortablejs/Sortable.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/jquery-nestable/jquery.nestable.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/jquery-asGradient/dist/jquery-asGradient.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/%40claviska/jquery-minicolors/jquery.minicolors.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-rowgroup/js/dataTables.rowGroup.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/daterangepicker/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/daterangepicker/daterangepicker.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/jvectormap-next/jquery-jvectormap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/ika.jvectormap/jquery-jvectormap-us-aea-en.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/cd-jvectormap/world-mill.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/gmaps/gmaps.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/quill/dist/quill.min.js"></script>


        <!-- clipboard -->
        <script src="cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>







        <!-- Theme JS -->
        <script src="<?php echo base_url(); ?>assets/js/theme.min.js"></script>


</body>

</html>