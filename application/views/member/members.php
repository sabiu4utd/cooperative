<!doctype html>
<html lang="en">

<?php 
    //var_dump($members);
?>

<!-- Mirrored from preview.easetemplate.com/influence/html/influence/pages/data-tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2023 00:17:50 GMT -->
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
  <title>FUBK-SMCS Members</title>


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
    <div class="nav-left-sidebar sidebar-dark">
      <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
          <a class="d-xl-none d-lg-none text-white" href="#">Dashboard</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav flex-column">
              <li class="nav-divider">
                Menu
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1"
                  aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                <div id="submenu-1" class="collapse submenu">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link" href="index.html" data-toggle="collapse" aria-expanded="false"
                        data-target="#submenu-1-2" aria-controls="submenu-1-2">E-Commerce</a>
                      <div id="submenu-1-2" class="collapse submenu">
                        <ul class="nav flex-column">
                          <li class="nav-item">
                            <a class="nav-link" href="../index-2.html">E Commerce Dashboard</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="../dashboard/ecommerce-product.html">Product List</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="../dashboard/ecommerce-product-single.html">Product Single</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="../dashboard/ecommerce-product-checkout.html">Product Checkout</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="../dashboard/dashboard-finance.html">Finance</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="../dashboard/dashboard-sales.html">Sales</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                        data-target="#submenu-1-1" aria-controls="submenu-1-1">Infulencer</a>
                      <div id="submenu-1-1" class="collapse submenu">
                        <ul class="nav flex-column">
                          <li class="nav-item">
                            <a class="nav-link" href="../dashboard/dashboard-influencer.html">Influencer</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="../dashboard/influencer-finder.html">Influencer Finder</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="../dashboard/influencer-profile.html">Influencer Profile</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                        data-target="#submenu-1-3" aria-controls="submenu-1-3">Contacts</a>
                      <div id="submenu-1-3" class="collapse submenu">
                        <ul class="nav flex-column">
                          <li class="nav-item">
                            <a class="nav-link" href="../dashboard/dashboard-contact.html">Contacts</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="../dashboard/dashboard-contact-list.html">Contact List</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="../dashboard/dashboard-contact-cardlist.html">Contact Cardlist</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                        data-target="#submenu-1-4" aria-controls="submenu-1-4">Invoice</a>
                      <div id="submenu-1-4" class="collapse submenu">
                        <ul class="nav flex-column">
                          <li class="nav-item">
                            <a class="nav-link" href="../dashboard/dashboard-invoice.html">Invoice</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="../dashboard/dashboard-invoice-list.html">Invoice List</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="../dashboard/dashboard-invoice-form.html">Invoice Form</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="dashboard-invoice-sample.html">Invoice Form Sample</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2"
                  aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>UI Elements</a>
                <div id="submenu-2" class="collapse submenu">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link" href="cards.html">Cards</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="general.html">General</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="carousel.html">Carousel</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="listgroup.html">List Group</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="typography.html">Typography</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="accordions.html">Accordions</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="tabs.html">Tabs</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3"
                  aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Chart</a>
                <div id="submenu-3" class="collapse submenu">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link" href="chart-c3.html">C3 Charts</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="chart-chartist.html">Chartist Charts</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="chart-charts.html">Chart</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="chart-morris.html">Morris</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="chart-sparkline.html">Sparkline</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="chart-gauge.html">Guage</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4"
                  aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Forms</a>
                <div id="submenu-4" class="collapse submenu">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link" href="form-elements.html">Form Elements</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="form-validation.html">Parsely Validations</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="multiselect.html">Multiselect</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="datepicker.html">Date Picker</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="bootstrap-select.html">Bootstrap Select</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="bootstrap-touchspin.html">Bootstrap Touchspin</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false"
                  data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Tables</a>
                <div id="submenu-5" class="collapse submenu">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link" href="general-table.html">General Tables</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="data-tables.html">Data Tables</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-divider">
                Features
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6"
                  aria-controls="submenu-6"><i class="fas fa-fw fa-file"></i>Pages</a>
                <div id="submenu-6" class="collapse submenu">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link" href="blank-page.html">Blank Page</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="blank-page-header.html">Blank Page Header</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="login.html">Login</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="404-page.html">404 page</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="sign-up.html">Sign up Page</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="forgot-password.html">Forgot Password</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pricing.html">Pricing Tables</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="timeline.html">Timeline</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="calendar.html">Calendar</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="sortable-nestable-lists.html">Sortable/Nestable List</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="widgets.html">Widgets</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="media-object.html">Media Objects</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="cropper-image.html">Cropper</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="color-picker.html">Color Picker</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="tags-input.html">Tags Input</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7"
                  aria-controls="submenu-7"><i class="fas fa-fw fa-inbox"></i>Apps</a>
                <div id="submenu-7" class="collapse submenu">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link" href="inbox.html">Inbox</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="email-details.html">Email Detail</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="email-compose.html">Email Compose</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="message-chat.html">Message Chat</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="layouts.html"><i class="fas fa-fw fa-columns"></i>Layouts <span
                    class="badge badge-secondary">New</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8"
                  aria-controls="submenu-8"><i class="fas fa-fw fa-flag"></i>Icons</a>
                <div id="submenu-8" class="collapse submenu">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link" href="icon-fontawesome.html">FontAwesome Icons</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="icon-material.html">Material Icons</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="icon-simple-lineicon.html">Simpleline Icon</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="icon-themify.html">Themify Icon</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="icon-flag.html">Flag Icons</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="icon-weather.html">Weather Icon</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9"
                  aria-controls="submenu-9"><i class="fas fa-fw fa-map-marker-alt"></i>Maps</a>
                <div id="submenu-9" class="collapse submenu">
                  <ul class="nav flex-column">

                    <li class="nav-item">
                      <a class="nav-link" href="map-vector.html">Vector Maps</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../docs/index.html"><i class="fas fa-fw fa-clipboard"></i>Docs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-10"
                  aria-controls="submenu-10"><i class="fas fa-f fa-folder"></i>Menu Level</a>
                <div id="submenu-10" class="collapse submenu">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link" href="#">Level 1</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                        data-target="#submenu-11" aria-controls="submenu-11">Level 2</a>
                      <div id="submenu-11" class="collapse submenu">
                        <ul class="nav flex-column">
                          <li class="nav-item">
                            <a class="nav-link" href="#">Level 1</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Level 2</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Level 3</a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
      <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
              <h2 class="pageheader-title">Members</h2>
              
              <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Members</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
     
          
        <div class="row">
          <!-- ============================================================== -->
          <!-- data table  -->
          <!-- ============================================================== -->
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card shadow-sm mb-5">
              <div class="card-header">
                <h5 class="mb-0">Members</h5>
               
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="example" class="table table-striped table-bordered second" style="width:100%">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Membershi No</th>
                        <th>Staff No</th>
                        <th>Phone</th>
                        <th>email</th>
                        <th>CRS</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($members as $m){?>
                      <tr>
                        <td><?php echo $m->title." ".$m->fname." ".$m->sname." ".$m->oname; ?></td>
                        <td><?php echo $m->membershipNo; ?></td>
                        <td><?php echo $m->staffId; ?></td>
                        <td><?php echo $m->phone; ?></td>
                        <td><?php echo $m->email; ?></td>
                        <td>$<?php echo $m->crs; ?></td>
                      </tr>
                     <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- end data table  -->
          <!-- ============================================================== -->
        </div>

       
       
      <!-- ============================================================== -->
      <!-- footer -->
      <!-- ============================================================== -->
      <div class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
              2020 © Influence - Designed and Developed by<a href="https://themeforest.net/user/jitu/portfolio"
                target="_blank" class="ml-1">Jituchuahan</a>.
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
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
  </div>
  <!-- ============================================================== -->
  <!-- end main wrapper -->
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
  <script src="../../../../../cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>







  <!-- Theme JS -->
  <script src="<?php echo base_url(); ?>assets/js/theme.min.js"></script>


</body>


<!-- Mirrored from preview.easetemplate.com/influence/html/influence/pages/data-tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2023 00:17:50 GMT -->
</html>