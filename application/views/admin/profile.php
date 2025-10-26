<!doctype html>
<html lang="en">

<?php
  $senior = $staff_stats->senior;
  $junior = $staff_stats->junior;
  $total = $staff_stats->junior + $staff_stats->senior;
  $senior_percent = round(($senior / $total) * 100, 2);
  $junior_percent = round(($junior / $total) * 100,2);


  $pending = $request_stats->pending;
  $approved =  $request_stats->partially_approved + $request_stats->fully_approved;
  $all_requests = $request_stats->total;
  $approved_percent = round(($approved / $all_requests) * 100, 2);
  $pending_percent = round(($pending / $all_requests) * 100, 2);

?>


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
    <?php $this->load->view("admin/sidebar"); ?>
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
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="page-header">
                <h2 class="pageheader-title">Admin Dashboard</h2>
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
          </div>
          <!-- ============================================================== -->
          <!-- end pageheader  -->
          <!-- ============================================================== -->
          <div class="ecommerce-widget">
            <!-- Summary Cards Row -->
            <div class="row">
              <!-- Total Members Card -->
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card bg-gradient-primary text-white h-100">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <h6 class="text-uppercase mb-2">Total Members</h6>
                        <h2 class="display-4 mb-0 font-weight-bold"><?php echo $total; ?></h2>
                      </div>
                      <div class="icon-circle bg-white-translucent">
                        <i class="fas fa-users fa-2x text-white"></i>
                      </div>
                    </div>
                    <div class="mt-3">
                      <div class="progress bg-white-translucent" style="height: 5px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                      </div>
                      <small class="mt-2 d-block text-white-50">Active cooperative members</small>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Senior Staff Card -->
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card bg-gradient-success text-white h-100">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <h6 class="text-uppercase mb-2">Senior Staff</h6>
                        <h2 class="display-4 mb-0 font-weight-bold"><?php echo $senior; ?></h2>
                      </div>
                      <div class="icon-circle bg-white-translucent">
                        <i class="fas fa-user-tie fa-2x text-white"></i>
                      </div>
                    </div>
                    <div class="mt-3">
                      <div class="progress bg-white-translucent" style="height: 5px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: <?php echo $senior_percent; ?>%"></div>
                      </div>
                      <small class="mt-2 d-block text-white-50"><?php echo $senior_percent; ?>% of total members</small>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Junior Staff Card -->
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card bg-gradient-info text-white h-100">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <h6 class="text-uppercase mb-2">Junior Staff</h6>
                        <h2 class="display-4 mb-0 font-weight-bold"><?php echo $junior; ?></h2>
                      </div>
                      <div class="icon-circle bg-white-translucent">
                        <i class="fas fa-user-friends fa-2x text-white"></i>
                      </div>
                    </div>
                    <div class="mt-3">
                      <div class="progress bg-white-translucent" style="height: 5px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: <?php echo $junior_percent; ?>%"></div>
                      </div>
                      <small class="mt-2 d-block text-white-50"><?php echo $junior_percent; ?>% of total members</small>
                    </div>
                  </div>
                </div>
              </div>

              <!-- New Members Today -->
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card bg-gradient-warning text-white h-100">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <h6 class="text-uppercase mb-2">New Today</h6>
                        <h2 class="display-4 mb-0 font-weight-bold">0</h2>
                      </div>
                      <div class="icon-circle bg-white-translucent">
                        <i class="fas fa-user-plus fa-2x text-white"></i>
                      </div>
                    </div>
                    <div class="mt-3">
                      <div class="progress bg-white-translucent" style="height: 5px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 0%"></div>
                      </div>
                      <small class="mt-2 d-block text-white-50">New registrations today</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <style>
              .bg-gradient-primary { background: linear-gradient(45deg, #4e73df, #224abe); }
              .bg-gradient-success { background: linear-gradient(45deg, #1cc88a, #13855c); }
              .bg-gradient-info { background: linear-gradient(45deg, #36b9cc, #258391); }
              .bg-gradient-warning { background: linear-gradient(45deg, #f6c23e, #dda20a); }
              .bg-white-translucent { background: rgba(255,255,255,0.2); }
              .icon-circle {
                height: 60px;
                width: 60px;
                border-radius: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
              }
              .progress {
                border-radius: 10px;
                overflow: hidden;
              }
              .card {
                border: none;
                border-radius: 15px;
                box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
              }
            </style>
              <!-- ============================================================== -->
              <!-- end visitor  -->
              <!-- ============================================================== -->
              <!-- ============================================================== -->
              <!-- total orders  -->
              <!-- ============================================================== -->
              <!-- <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-4">
                <div class="card border-top-primary shadow-sm h-100">
                  <div class="card-body">
                    <h5 class="text-muted mb-4">Female Staff</h5>
                    <div class="d-flex justify-content-between">
                      <div class="metric-value">
                        <h1 class="font-weight-bold">300</h1>
                      </div>
                      <div class="metric-label align-self-center text-danger font-weight-bold">
                        <span class="icon-shape icon-xs rounded-circle text-danger bg-danger-light bg-danger-light "><i
                            class="fa fa-fw fa-arrow-down"></i></span><span class="ml-1">4%</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
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
            <!-- Requests Overview Section -->
            <div class="row mb-4">
              <div class="col-12">
                <div class="card shadow-sm">
                  <div class="card-header bg-white border-bottom-0">
                    <h5 class="font-weight-bold text-primary mb-0">Requests Overview</h5>
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <!-- All Requests -->
                      <div class="col-xl-4 col-md-4">
                        <div class="p-4 border-right border-light">
                          <div class="d-flex align-items-center mb-3">
                            <div class="mr-3">
                              <div class="icon-circle bg-gradient-primary text-white">
                                <i class="fas fa-clipboard-list"></i>
                              </div>
                            </div>
                            <div>
                              <h4 class="mb-0"><?php echo $all_requests; ?></h4>
                              <p class="text-muted mb-0">Total Requests</p>
                            </div>
                          </div>
                          <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"></div>
                          </div>
                        </div>
                      </div>

                      <!-- Approved Requests -->
                      <div class="col-xl-4 col-md-4">
                        <div class="p-4 border-right border-light">
                          <div class="d-flex align-items-center mb-3">
                            <div class="mr-3">
                              <div class="icon-circle bg-gradient-success text-white">
                                <i class="fas fa-check-circle"></i>
                              </div>
                            </div>
                            <div>
                              <h4 class="mb-0"><?php echo $approved; ?></h4>
                              <p class="text-muted mb-0">Approved</p>
                            </div>
                          </div>
                          <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $approved_percent; ?>%"></div>
                          </div>
                        </div>
                      </div>

                      <!-- Pending Requests -->
                      <div class="col-xl-4 col-md-4">
                        <div class="p-4">
                          <div class="d-flex align-items-center mb-3">
                            <div class="mr-3">
                              <div class="icon-circle bg-gradient-warning text-white">
                                <i class="fas fa-clock"></i>
                              </div>
                            </div>
                            <div>
                              <h4 class="mb-0"><?php echo $pending; ?></h4>
                              <p class="text-muted mb-0">Pending</p>
                            </div>
                          </div>
                          <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $pending_percent; ?>%"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Activity Timeline -->
            <div class="row mb-4">
              <div class="col-12">
                <div class="card shadow-sm">
                  <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="font-weight-bold text-primary mb-0">Recent Activities</h5>
                    <button class="btn btn-sm btn-outline-primary">View All</button>
                  </div>
                  <div class="card-body p-0">
                    <div class="timeline p-4">
                      <!-- Timeline Item -->
                      <div class="timeline-item">
                        <div class="timeline-item-marker">
                          <div class="timeline-item-marker-text">27 min</div>
                          <div class="timeline-item-marker-indicator bg-success"></div>
                        </div>
                        <div class="timeline-item-content">
                          New loan request approved
                          <span class="text-muted">- Staff ID: 12345</span>
                        </div>
                      </div>
                      <!-- Timeline Item -->
                      <div class="timeline-item">
                        <div class="timeline-item-marker">
                          <div class="timeline-item-marker-text">1 hr</div>
                          <div class="timeline-item-marker-indicator bg-primary"></div>
                        </div>
                        <div class="timeline-item-content">
                          New member registration
                          <span class="text-muted">- Department of Computer Science</span>
                        </div>
                      </div>
                      <!-- Timeline Item -->
                      <div class="timeline-item">
                        <div class="timeline-item-marker">
                          <div class="timeline-item-marker-text">2 hrs</div>
                          <div class="timeline-item-marker-indicator bg-warning"></div>
                        </div>
                        <div class="timeline-item-content">
                          Festivity supply request pending review
                          <span class="text-muted">- 3 items</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <style>
              /* Timeline Styles */
              .timeline {
                position: relative;
              }
              .timeline-item {
                display: flex;
                margin-bottom: 1.5rem;
              }
              .timeline-item:last-child {
                margin-bottom: 0;
              }
              .timeline-item-marker {
                display: flex;
                flex-direction: column;
                align-items: center;
                margin-right: 1rem;
              }
              .timeline-item-marker-text {
                font-size: 0.8rem;
                color: #a7aeb8;
                margin-bottom: 0.25rem;
              }
              .timeline-item-marker-indicator {
                height: 12px;
                width: 12px;
                border-radius: 100%;
              }
              .timeline-item-content {
                padding-top: 0.25rem;
              }
            </style>
              <!-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
                <div class="card shadow-sm h-100">
                  <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                      <h5 class="text-muted">Revenue Generated</h5>
                      <div class="metric-value d-inline-block">
                        <h1 class="mb-1">N200M</h1>
                      </div>
                    </div>
                    <div class="metric-label d-inline-block text-secondary font-weight-bold">
                      <span>-2.00%</span>
                    </div>
                  </div>
                  <div id="sparkline-revenue4"></div>
                </div>
              </div> -->
            </div>
            
             <!-- <div class="row">
              <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12 mb-4">
               ============================================================== -->
                <!-- social source  -->
                <!-- ============================================================== 
                <div class="card shadow-sm h-100">
                  <h5 class="card-header"> Sales By Social Source</h5>
                  <div class="card-body p-0">
                    <ul class="social-sales list-group list-group-flush">
                      <li class="list-group-item d-flex align-items-center">
                        <span class="icon-shape icon-lg rounded-circle text-white bg-facebook mr-2"><i
                            class="fab fa-facebook-f"></i></span><span class="">Facebook</span>

                        <span class="ml-auto text-dark">120 Sales</span>
                      </li>
                      <li class="list-group-item d-flex align-items-center"><span
                          class="icon-shape icon-lg rounded-circle text-white bg-twitter mr-2"><i
                            class="fab fa-twitter"></i></span><span class="">Twitter</span><span
                          class="ml-auto text-dark">99 Sales</span>
                      </li>
                      <li class="list-group-item d-flex align-items-center"><span
                          class="icon-shape icon-lg rounded-circle text-white bg-instagram mr-2"><i
                            class="fab fa-instagram"></i></span><span class="">Instagram</span><span
                          class="ml-auto text-dark">76 Sales</span>
                      </li>
                      <li class="list-group-item d-flex align-items-center"><span
                          class="icon-shape icon-lg rounded-circle text-white bg-pinterest mr-2"><i
                            class="fab fa-pinterest-p"></i></span><span class="">Pinterest</span><span
                          class="ml-auto text-dark">56 Sales</span>
                      </li>
                      <li class="list-group-item d-flex align-items-center"><span
                          class="icon-shape icon-lg rounded-circle text-white bg-googleplus mr-2"><i
                            class="fab fa-google-plus-g"></i></span><span class="">Google Plus</span><span
                          class="ml-auto text-dark">36 Sales</span>
                      </li>
                    </ul>
                  </div>
                  <div class="card-footer text-center">
                    <a href="#" class="btn-primary-link">View Details</a>
                  </div>
                </div>
                <!-- ============================================================== -->
                <!-- end social source  -->
                <!-- ============================================================== 
              </div>
              <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 mb-4">
                <!-- ============================================================== -->
                <!-- sales traffice source  -->
                <!-- ============================================================== 
                <div class="card shadow-sm h-100">
                  <h5 class="card-header"> Sales By Traffic Source</h5>
                  <div class="card-body p-0">
                    <ul class="traffic-sales list-group list-group-flush">
                      <li class="list-group-item d-flex align-items-center pt-3 pb-3"><span
                          class="traffic-sales-name">Direct</span><span class="ml-auto">$4000.00 <span
                            class="icon-shape icon-xs rounded-circle text-success ml-4 bg-success-light"><i
                              class="fa fa-fw fa-arrow-up"></i></span>
                          <span class="ml-1 text-success">5.86%</span>
                        </span>
                      </li>
                      <li class="list-group-item d-flex align-items-center pt-3 pb-3"><span
                          class="traffic-sales-name">Search</span><span class="ml-auto">$3123.00 <span
                            class="icon-shape icon-xs rounded-circle text-success ml-4 bg-success-light"><i
                              class="fa fa-fw fa-arrow-up"></i></span>
                          <span class="ml-1 text-success">5.86%</span>
                        </span>

                      </li>
                      <li class="list-group-item d-flex align-items-center pt-3 pb-3"><span
                          class="traffic-sales-name">Social</span><span class="ml-auto">$3099.00 <span
                            class="icon-shape icon-xs rounded-circle text-success ml-4 bg-success-light"><i
                              class="fa fa-fw fa-arrow-up"></i></span>
                          <span class="ml-1 text-success">5.86%</span>
                        </span>

                      </li>
                      <li class="list-group-item d-flex align-items-center pt-3 pb-3"><span
                          class="traffic-sales-name">Referrals</span><span class="ml-auto">$2220.00 <span
                            class="icon-shape icon-xs rounded-circle text-danger ml-4 bg-danger-light"><i
                              class="fa fa-fw fa-arrow-down"></i></span>
                          <span class="ml-1 text-danger">4.02%</span>
                        </span>

                      </li>
                      <li class="list-group-item d-flex align-items-center pt-3 pb-3 "><span
                          class="traffic-sales-name">Email</span><span class="ml-auto">$1567.00 <span
                            class="icon-shape icon-xs rounded-circle text-danger ml-4 bg-danger-light"><i
                              class="fa fa-fw fa-arrow-down"></i></span>
                          <span class="ml-1 text-danger">3.86%</span>
                        </span>

                      </li>
                    </ul>
                  </div>
                  <div class="card-footer text-center">
                    <a href="#" class="btn-primary-link">View Details</a>
                  </div>
                </div>
              </div>
              <!-- ============================================================== -->
              <!-- end sales traffice source  -->
              <!-- ============================================================== -->
              <!-- ============================================================== -->
              <!-- sales traffic country source  -->
              <!-- ==============================================================
              <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
                <div class="card shadow-sm h-100">
                  <h5 class="card-header">Sales By Country Traffic Source</h5>
                  <div class="card-body p-0">
                    <ul class="country-sales list-group list-group-flush">
                      <li class="country-sales-content list-group-item pt-3 pb-3"><span class="mr-2"><i
                            class="flag-icon flag-icon-us" title="us" id="us"></i> </span>
                        <span class="">United States</span><span class="float-right text-dark">78%</span>
                      </li>
                      <li class="list-group-item country-sales-content pt-3 pb-3"><span class="mr-2"><i
                            class="flag-icon flag-icon-ca" title="ca" id="ca"></i></span><span
                          class="">Canada</span><span class="float-right text-dark">7%</span>
                      </li>
                      <li class="list-group-item country-sales-content pt-3 pb-3"><span class="mr-2"><i
                            class="flag-icon flag-icon-ru" title="ru" id="ru"></i></span><span
                          class="">Russia</span><span class="float-right text-dark">4%</span>
                      </li>
                      <li class="list-group-item country-sales-content pt-3 pb-3"><span class=" mr-2"><i
                            class="flag-icon flag-icon-in" title="in" id="in"></i></span><span
                          class="">India</span><span class="float-right text-dark">12%</span>
                      </li>
                      <li class="list-group-item country-sales-content pt-3 pb-3"><span class=" mr-2"><i
                            class="flag-icon flag-icon-fr" title="fr" id="fr"></i></span><span
                          class="">France</span><span class="float-right text-dark">16%</span>
                      </li>
                    </ul>
                  </div>
                  <div class="card-footer text-center">
                    <a href="#" class="btn-primary-link">View Details</a>
                  </div>
                </div>
              </div>
              <!-- ============================================================== -->
              <!-- end sales traffice country source  -->
              <!-- ============================================================== 
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


<!-- Mirrored from preview.easetemplate.com/influence/html/influence/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2023 00:17:05 GMT -->
</html>