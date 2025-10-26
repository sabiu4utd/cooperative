<!doctype html>
<html lang="en">

<?php //var_dump($user); exit; ?>
<?php
    //summing all loans collected by member
    $total_loan = 0.0;
    foreach($user['loan'] as $l){
        $total_loan +=$l->amount;
    }

    //summing upcoming deductions
    if($user['upcoming_deductions']){
        $ud = $user['upcoming_deductions']->first_month_amount+$user['upcoming_deductions']->second_month_amount+$user['upcoming_deductions']->third_month_amount;
    }
    //current share of user
    if($user['shares']){
        $share = $user['shares']->share;
    }
    //summing all RCS deducted in respect of a member
    $total_rcs = 0.0;
    foreach($user['rcs'] as $r){
        $total_rcs +=$r->amount_requested;
    }
    //summing all loan repayment in respect of a member
    $total_repayment = 0.0;
    if($user['repayment']){
        foreach($user['repayment'] as $repay){
            $total_repayment +=$repay->amount_requested;
        }
    }
    

    
?>

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/x-icon">


    <!-- Libs CSS -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
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
                            <h2 class="pageheader-title">Member Details</h2>

                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#"
                                                class="breadcrumb-link"><?php echo $user['profile']->fname; ?></a></li>
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

                <!-- Beginning of first row  -->
                <div class="row">

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="card shadow-sm mb-5">

                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr style="border-top:0px" ;>
                                            <td colspan="4" style="font-weight: bolder; background-color:black; color:white">PERSONAL INFORMATION</td>
                                        </tr>
                                        <tr>
                                            <th>Fullname</th>
                                            <td><?php echo $user['profile']->fname." ".$user['profile']->sname." ".$user['profile']->oname ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Membership No</th>
                                            <td><?php echo $user['profile']->membershipNo; ?></td>
                                        </tr>
                                        <tr>
                                            <th>SP/JP No</th>
                                            <td><?php echo $user['profile']->staffId; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><?php echo $user['profile']->email; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Phone Number</th>
                                            <td><?php echo $user['profile']->phone; ?></td>
                                        </tr>
                                        <tr>
                                            <th>State</th>
                                            <td><?php echo $user['profile']->state_name; ?></td>
                                        </tr>
                                        <tr>
                                            <th>LGA</th>
                                            <td><?php echo $user['profile']->lga_name; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="card shadow-sm mb-5">

                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr style="border-top:0px" ;>
                                            <td colspan="4" style="font-weight: bolder; background-color:black; color:white">Summary</td>
                                        </tr>
                                       
                                        <tr>
                                            <th>Total CRS</th>
                                            <td>N<?php echo number_format($total_rcs, 2); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Share</th>
                                            <td>
                                                <?php
                                                    if($share){ echo "(%".$user['shares']->percentage.") ".number_format($share, 2); } else { echo "N0.0";}
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Total Upcoming Deduction</th>
                                            <td>
                                               <?php if(!$ud) {echo "N0.0"; } else{ echo "N". number_format($ud, 2); } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Pending Loan</th>
                                            <td>N<?php
                                            $amount_left = $total_loan - $total_repayment; 
                                            echo number_format($amount_left, 2); ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="card shadow-sm mb-5">

                            <div class="card-body">
                              
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr style="border-top:0px" ;>
                                            <td colspan="4" style="font-weight: bolder; background-color:black; color:white">RCS Deductions</td>
                                        </tr>
                                        <tr>
                                            <td>SNO.</td>
                                            <td>Month</td>
                                            <td>Year</td>
                                            <td>Deducated</td>
                                            
                                        </tr>
                                        <?php  $i=1; foreach( $user['rcs'] as $r){?>


                                        <tr>
                                            <td><?=$i++; ?></td>
                                            <td>
                                                <?php 
                                                if($r->month == 1) echo "JAN"; 
                                                if($r->month == 2) echo "FEB"; 
                                                if($r->month == 3) echo "MAR"; 
                                                if($r->month == 4) echo "APR"; 
                                                if($r->month == 5) echo "MAY"; 
                                                if($r->month == 6) echo "JUN"; 
                                                if($r->month == 7) echo "JUL"; 
                                                if($r->month == 8) echo "AUG"; 
                                                if($r->month == 9) echo "SEP"; 
                                                if($r->month == 10) echo "OCT"; 
                                                if($r->month == 11) echo "NOV"; 
                                                if($r->month == 12) echo "DEC"; 
                                                
                                                ?>
                                            </td>
                                            <td><?php echo $r->year; ?></td>
                                            <td><?php echo number_format($r->amount_requested, 2); ?></td>
                                            <!-- <td><?php //echo number_format($r->amount_deducted, 2); ?></td> -->
                                            <!-- <td><?php //echo number_format($r->balance, 2); ?></td> -->
                                            <!-- <td><?php //echo $r->status; ?></td> -->

                                        </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    
              
              
              
                </div>
                <!-- end of first row -->

                <!-- Beginning of second row  -->
                <div class="row">

                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                        <div class="card shadow-sm mb-5">

                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr style="border-top:0px" ;>
                                            <td colspan="4" style="font-weight: bolder; background-color:black; color:white">Loan History</td>
                                        </tr>
                                        <tr>
                                            <td>Amount Collected(N)</td>
                                            <!-- <th>Amount Left</th> -->
                                            <td>Repayment Period</td>
                                            <td>Payment Status</td>
                                            <!-- <th>Date Collected</th> -->
                                        </tr>
                                        <?php foreach($user['loan'] as $l){?>
                                        <td><?php echo number_format($l->amount, 2); ?></td>
                                        <!-- <td><?php //echo number_format($l->amount_left, 2); ?></td> -->
                                        <td><?php echo $l->repayment_period." Months"; ?></td>
                                        <td><?php echo $l->approval_status; ?></td>
                                        <!-- <td><?php //echo $l->date_collected; ?></td> -->

                                        <?php } ?>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr style="border-top:0px" ;>
                                            <td colspan="4" style="font-weight: bolder; background-color:black; color:white">Special Cases</td>
                                        </tr>
                                        <tr>
                                            <td>Amount(N)</td>
                                        
                                            <td>Type</td>
                                            <td>Date</td>
                                           
                                        </tr>
                                        <?php foreach($user['special_cases'] as $sp){?>
                                        <tr>
                                        <td><?php echo number_format($sp->amount, 2); ?></td>
                                        <!-- <td><?php //echo number_format($l->amount_left, 2); ?></td> -->
                                        <td><?php echo $sp->type; ?></td>
                                        <td><?php echo $sp->date; ?></td>
                                        <!-- <td><?php //echo $l->date_collected; ?></td> -->
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3col-md-3 col-sm-12 col-12">
                        <div class="card shadow-sm mb-5">

                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr style="border-top:0px" ;>
                                            <td colspan="4" style="font-weight: bolder; background-color:black; color:white">Upcoming Deductions</td>
                                        </tr>
                                        <?php if(!$user['upcoming_deductions']){?>
                                          
                                          <tr style="border-top:0px" ;>
                                          <td colspan="4" style="font-weight: bolder;">No Record Found</td>
                                      </tr>
                                            
                                        <?php } else{ ?>
                                        <tr>
                                            
                                        <th><?php echo $user['upcoming_deductions']->first_month; ?></th>
                                            <td><?php echo number_format($user['upcoming_deductions']->first_month_amount,2); ?>
                                            </td> 
                                        </tr>
                                        <tr>
                                            <th><?php echo $user['upcoming_deductions']->second_month; ?></th>
                                            <td><?php echo number_format($user['upcoming_deductions']->second_month_amount,2); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><?php echo $user['upcoming_deductions']->third_month; ?></th>
                                            <td><?php echo number_format($user['upcoming_deductions']->third_month_amount,2); ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="card shadow-sm mb-5">

                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr style="border-top:0px" ;>
                                            <td colspan="4" style="font-weight: bolder; background-color:black; color:white">Supply Deductions</td>
                                        </tr>
                                        <tr>
                                            <th>SNO.</th>
                                            <th>Month</th>
                                            <th>Year</th>
                                            <th>Deducted</th>
                                            <!-- <th>Amount Deducted</th> -->
                                            <!-- <th>Balance</th>
                                            <th>Deduction Status</th> -->
                                        </tr>
                                        <?php $i=1; foreach( $user['supply'] as $s){?>

                                        <tr>

                                        <td><?php echo $i++; ?></td>
                                        <td>
                                                <?php 
                                                if($r->month == 1) echo "JAN"; 
                                                if($r->month == 2) echo "FEB"; 
                                                if($r->month == 3) echo "MAR"; 
                                                if($r->month == 4) echo "APR"; 
                                                if($r->month == 5) echo "MAY"; 
                                                if($r->month == 6) echo "JUN"; 
                                                if($r->month == 7) echo "JUL"; 
                                                if($r->month == 8) echo "AUG"; 
                                                if($r->month == 9) echo "SEP"; 
                                                if($r->month == 10) echo "OCT"; 
                                                if($r->month == 11) echo "NOV"; 
                                                if($r->month == 12) echo "DEC"; 
                                                
                                                ?>
                                            </td>
                                            <td><?php echo $s->year; ?></td>
                                            <td><?php echo number_format($s->amount_requested, 2); ?></td>
                                            <!-- <td><?php //echo number_format($s->amount_deducted, 2); ?></td>
                                            <td><?php //echo number_format($s->balance, 2); ?></td>
                                            <td><?php //echo $s->status; ?></td> -->

                                        </tr>

                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- end of second row -->

                
                
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <div class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                2023 ©  - Designed and Developed by Sabiu Lawal
                                
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
        <script
            src="<?php echo base_url(); ?>assets/libs/chartist-plugin-threshold/dist/chartist-plugin-threshold.min.js">
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
        <script
            src="<?php echo base_url(); ?>assets/libs/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js">
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