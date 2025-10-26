<?php $crs = 0;
foreach ($saving as $row) {
  if ($row->typeid == 1) {
    $crs = $crs + $row->amount_deducted;
  }
  //  echo $row->typeid."-". $row->amount_deducted."<br />";
}

$compulsory_saving = $crs - $share->share;
$this->session->set_userdata('saving', $compulsory_saving);
// loan status
if ($status) {
  $_SESSION['loan_status'] = 1;
} else {
  $_SESSION['loan_status'] = 0;
}


?>


<!doctype html>
<html lang="en">



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
  <title><?php echo $this->session->userdata("page"); ?></title>


</head>

<body>
  <!-- ============================================================== -->
  <!-- main wrapper -->
  <!-- ============================================================== -->
  <div class="dashboard-main-wrapper">
    <!-- ============================================================== -->
    <!-- Top header default -->
    <!-- ============================================================== -->
    <?php $this->load->view("header"); ?>
    <!-- ============================================================== -->
    <!-- Top header default -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
    <?php $this->load->view("member/sidebar"); ?>
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
      <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
          <!-- ============================================================== -->
          <!-- pageheader  -->
          <!-- ============================================================== -->
          <!-- <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="page-header">
                <h2 class="pageheader-title">My Dashboard</h2>
                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris
                  facilisis faucibus at enim quis massa lobortis rutrum.</p>
                <div class="page-breadcrumb">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Admin Profile</li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div> -->
          <!-- ============================================================== -->
          <!-- end pageheader  -->
          <!-- ============================================================== -->
          <div class="ecommerce-widget">
            <div class="row">
              <!-- ============================================================== -->
              <!-- sales  -->
              <!-- ============================================================== -->
              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-4">
                <div class="card border-top-primary shadow-sm h-100">
                  <div class="card-body">
                    <h5 class="text-muted mb-4">My CRS</h5>
                    <div class="d-flex justify-content-between">
                      <div class="metric-value">


                        <h1 class="font-weight-bold">N<?php

                                                      echo number_format($compulsory_saving, 2, ".", ",");

                                                      ?></h1>
                      </div>
                      <div class="metric-label text-success font-weight-bold align-self-center">
                        <!-- <span class="icon-shape icon-xs rounded-circle text-success bg-success-light"><i
                            class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5.86%</span> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- ============================================================== -->
              <!-- end sales  -->
              <!-- ============================================================== -->
              <!-- ============================================================== -->
              <!-- new customer  -->
              <!-- ============================================================== -->
              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-4">
                <div class="card border-top-primary shadow-sm h-100">
                  <div class="card-body">
                    <h5 class="text-muted mb-4">My Share</h5>
                    <div class="d-flex justify-content-between">
                      <div class="metric-value">
                        <h1 class="font-weight-bold">

                          N<?php echo number_format($share->share, 2, ".", ","); ?>
                        </h1>
                      </div>
                      <div class="metric-label align-self-center text-success font-weight-bold">
                        <span class="icon-shape icon-xs rounded-circle text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1"><?php echo $share->percentage; ?>%</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- ============================================================== -->
              <!-- end new customer  -->
              <!-- ============================================================== -->
              <!-- ============================================================== -->
              <!-- visitor  -->
              <!-- ============================================================== -->
              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-4">
                <div class="card border-top-primary shadow-sm h-100">
                  <div class="card-body">
                    <h5 class="text-muted mb-4">Total Savings</h5>
                    <div class="d-flex justify-content-between">
                      <div class="metric-value">
                        <h1 class="font-weight-bold">
                          N<?php echo number_format($crs, 2, ".", ","); ?>
                        </h1>
                      </div>
                      <div class="metric-label align-self-center text-success font-weight-bold">
                        <!-- <span class="icon-shape icon-xs rounded-circle text-success bg-success-light"><i
                            class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5%</span> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- ============================================================== -->
              <!-- end visitor  -->
              <!-- ============================================================== -->
              <!-- ============================================================== -->
              <!-- total orders  -->
              <!-- ============================================================== -->
              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-4">
                <div class="card border-top-primary shadow-sm h-100">
                  <div class="card-body">
                    <h5 class="text-muted mb-4">Loan</h5>
                    <div class="d-flex justify-content-between">
                      <div class="metric-value">
                        <h1 class="font-weight-bold">

                          <?php
                          $total = $crs / 3;
                          echo "N" . number_format($total, 2, ".", ",");
                          ?>
                        </h1>
                      </div>
                      <div class="metric-label align-self-center text-danger font-weight-bold">

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- ============================================================== -->
              <!-- end total orders  -->
              <!-- ============================================================== -->
            </div>

            <div class="row">
              <!-- ============================================================== -->
              <!-- recent orders  -->
              <!-- ============================================================== -->

              <!-- ============================================================== -->
              <!-- end recent orders  -->
              <!-- ============================================================== -->

            </div>


            <div class="row">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
                <!-- ============================================================== -->
                <!-- social source  -->
                <!-- ============================================================== -->
                <div class="card shadow-sm h-100">
                  <h5 class="card-header">Deductions</h5>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table id='example2' class="table table-striped table-bordered first">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Amount Requested</th>
                            <th>Amount Deducted</th>
                            <th>Status</th>
                            <th>Month</th>
                            <th>Year</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1;
                          foreach ($saving as $row) { ?>
                            <tr>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $row->type; ?></td>
                              <td><?php echo $row->amount_requested; ?></td>
                              <td><?php echo $row->amount_deducted; ?></td>
                              <td><?php echo $row->status; ?></td>
                              <td><?php echo $row->month; ?></td>
                              <td><?php echo $row->year; ?></td>
                            </tr>
                          <?php } ?>
                          </tfoot>
                      </table>
                    </div>

                  </div>

                </div>
                <!-- ============================================================== -->
                <!-- end social source  -->
                <!-- ============================================================== -->
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <div class="footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            2023 © FUBK-SMCS - Designed and Developed by<a href="#" target="_blank" class="ml-1">FUBK-MIS</a>.
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="text-md-right footer-links d-none d-sm-block">
              <a href="javascript: void(0);">About</a>
              <a href="javascript: void(0);">Support</a>
              <a href="javascript: void(0);">Contact Us</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- end wrapper  -->
  <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- end main wrapper  -->
  <!-- ============================================================== -->
  <!-- Optional JavaScript -->


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
  <script src="../../../../cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>







  <!-- Theme JS -->
  <script src="<?php echo base_url(); ?>assets/js/theme.min.js"></script>

</body>



</html>