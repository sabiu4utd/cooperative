<!doctype html>
<html lang="en">

<?php
//var_dump($members);
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
        <?php $this->load->view("admin/sidebar"); ?>
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
                            <h2 class="pageheader-title">Festivity Supply Request</h2>

                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a>
                                        </li>
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


                <!-- Member Financial Summary -->
                <div class="row mb-4">
                    <!-- Monthly Savings Card -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="card border-left-primary shadow-sm h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Monthly Savings</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">N25,000.00</div>
                                        <div class="small text-muted mt-2">Started: Jan 2023</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-piggy-bank fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Savings Card -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="card border-left-success shadow-sm h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Savings</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">N850,000.00</div>
                                        <div class="small text-success mt-2">↑ 12% from last year</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-wallet fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Active Loans Card -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="card border-left-warning shadow-sm h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Active Loans</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">N250,000.00</div>
                                        <div class="small text-muted mt-2">Monthly Payment: N15,000</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Net Balance Card -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="card border-left-info shadow-sm h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Net Balance</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">N600,000.00</div>
                                        <div class="small text-muted mt-2">After all deductions</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-balance-scale fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detailed Financial Information -->
                <div class="row mb-4">
                    <!-- Loan History -->
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h6 class="m-0 font-weight-bold">Loan History</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Type</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2025-06-15</td>
                                                <td>Personal Loan</td>
                                                <td>N350,000.00</td>
                                                <td><span class="badge badge-success">Paid</span></td>
                                            </tr>
                                            <tr>
                                                <td>2025-01-10</td>
                                                <td>Car Loan</td>
                                                <td>N250,000.00</td>
                                                <td><span class="badge badge-warning">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td>2024-08-22</td>
                                                <td>Emergency Loan</td>
                                                <td>N100,000.00</td>
                                                <td><span class="badge badge-success">Paid</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Upcoming Deductions -->
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-warning text-white">
                                <h6 class="m-0 font-weight-bold">Upcoming Deductions (3 Months)</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <th>Month</th>
                                                <th>Savings</th>
                                                <th>Loan Payment</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>October 2025</td>
                                                <td>N25,000.00</td>
                                                <td>N15,000.00</td>
                                                <td><strong>N40,000.00</strong></td>
                                            </tr>
                                            <tr>
                                                <td>November 2025</td>
                                                <td>N25,000.00</td>
                                                <td>N15,000.00</td>
                                                <td><strong>N40,000.00</strong></td>
                                            </tr>
                                            <tr>
                                                <td>December 2025</td>
                                                <td>N25,000.00</td>
                                                <td>N15,000.00</td>
                                                <td><strong>N40,000.00</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- ============================================================== -->
                    <!-- data table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card shadow-sm mb-5">
                            <div class="card-header">
                                <h5 class="mb-0">Current Festivity Supply Request</h5>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered " style="width:100%; font-size:10pt">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Items</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Action</th>


                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $i = 1;
                                            $total = 0;
                                            foreach ($festivity_supply as $supply) {
                                                $total += $supply->price;
                                            ?>

                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $supply->item; ?></td>
                                                    <td><?php echo $supply->quantity . ' ' . $supply->unit; ?></td>
                                                    <td><?php echo number_format($supply->price, 2); ?></td>
                                                    <td>
                                                        <a href="<?php echo site_url('admin/view_festivity_request/' . $supply->staffNo . "/" . $supply->description . "/" . $supply->year); ?>"><i class="fa fa-fw fa-eye"></i></a>
                                                    </td>

                                                </tr>
                                               
                                            <?php } ?>
                                            <tr>
                                                    <td></td>
                                                    <td colspan="2" class="text-right"><strong>Total</strong></td>
                                                    <td><strong><?php echo number_format($total, 2); ?></strong></td>
                                                    <td></td>
                                                </tr>
                                        </tbody>

                                    </table>
                                </div>
                                <div class="card-footer">
                                    <div class="row justify-content-center mt-3">
                                        <div class="col-md-4 text-center">
                                            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#approveModal">
                                                <i class="fas fa-check-circle"></i> Approve Request
                                            </button>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#amendModal">
                                                <i class="fas fa-edit"></i> Amend Request
                                            </button>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#declineModal">
                                                <i class="fas fa-times-circle"></i> Decline Request
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end data table  -->
                    <!-- ============================================================== -->
                </div>

                <!-- Approve Modal -->
                <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="approveModalLabel">Approve Festivity Request</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?php echo base_url('admin/approve_festivity_request'); ?>" method="POST">
                                <div class="modal-body">
                                    <input type="hidden" name="staff_no" value="<?php echo $supply->staffNo; ?>">
                                    <input type="hidden" name="description" value="<?php echo $supply->description; ?>">
                                    <input type="hidden" name="year" value="<?php echo $supply->year; ?>">
                                    <p>Are you sure you want to approve this festivity supply request?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success">Approve</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Amend Modal -->
                <div class="modal fade" id="amendModal" tabindex="-1" role="dialog" aria-labelledby="amendModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="amendModalLabel">Amend Festivity Request</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?php echo base_url('admin/amend_festivity_request'); ?>" method="POST">
                                <div class="modal-body">
                                    <input type="hidden" name="staff_no" value="<?php echo $supply->staffNo; ?>">
                                    <input type="hidden" name="description" value="<?php echo $supply->description; ?>">
                                    <input type="hidden" name="year" value="<?php echo $supply->year; ?>">
                                    <div class="form-group">
                                        <label for="amendment_note">Amendment Note</label>
                                        <textarea class="form-control" id="amendment_note" name="amendment_note" rows="4" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-warning">Send Amendment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Decline Modal -->
                <div class="modal fade" id="declineModal" tabindex="-1" role="dialog" aria-labelledby="declineModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="declineModalLabel">Decline Festivity Request</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?php echo base_url('admin/decline_festivity_request'); ?>" method="POST">
                                <div class="modal-body">
                                    <input type="hidden" name="staff_no" value="<?php echo $supply->staffNo; ?>">
                                    <input type="hidden" name="description" value="<?php echo $supply->description; ?>">
                                    <input type="hidden" name="year" value="<?php echo $supply->year; ?>">
                                    <div class="form-group">
                                        <label for="decline_reason">Reason for Declining</label>
                                        <textarea class="form-control" id="decline_reason" name="decline_reason" rows="4" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Decline</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <div class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                2020 © Influence - Designed and Developed by<a href="https://themeforest.net/user/jitu/portfolio" target="_blank" class="ml-1">Jituchuahan</a>.
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
        <script src="<?php echo base_url(); ?>assets/libs/chartist-plugin-threshold/dist/chartist-plugin-threshold.min.js">
        </script>
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
        <script src="<?php echo base_url(); ?>assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js">
        </script>
        <script src="<?php echo base_url(); ?>assets/libs/%40claviska/jquery-minicolors/jquery.minicolors.min.js">
        </script>
        <script src="<?php echo base_url(); ?>assets/libs/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js">
        </script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-rowgroup/js/dataTables.rowGroup.min.js">
        </script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js">
        </script>
        <script src="<?php echo base_url(); ?>assets/libs/daterangepicker/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/daterangepicker/daterangepicker.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js">
        </script>
        <script src="<?php echo base_url(); ?>assets/libs/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js">
        </script>
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



</html>