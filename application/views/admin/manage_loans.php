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
                            <h2 class="pageheader-title">Members</h2>

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
                                <a href="<?php echo site_url('admin/getLoanApplicant/Pending') ?>" class="btn btn-primary">Not Approved</a>
                                <a href="<?php echo site_url('admin/getLoanApplicant/Partially Approved') ?>" class="btn btn-primary">Partially Approved</a>
                                <a href="<?php echo site_url('admin/getLoanApplicant/Fully Approved') ?>" class="btn btn-success">Fully Approved</a>
                                <a href="<?php echo site_url('admin/getLoanApplicant/Decline') ?>" class="btn btn-danger">Declined</a>
                                <a href="<?php echo site_url('admin/getLoanApplicant/Paid') ?>" class="btn btn-danger">Paid</a>
                                <a href="<?php echo site_url('admin/getLoanApplicant/Unpaid') ?>" class="btn btn-danger">Collected</a>
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered " style="width:100%; font-size:10pt">
                                        <thead>
                                            <tr>
                                                <th>Membership No/Name/Phone</th>
                                                <th>Amount</th>
                                                <th>type</th>
                                                <th>Date Applied</th>
                                                <th>Upload ?</th>
                                                <th>Approval</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php 
                                            if(count($loan)==0){
                                                echo "<tr><td colspan=5> No Loan Application is available </td></tr>";
                                            }
                                            foreach ($loan as $m) { ?>
                                                <tr>
                                                    <td><?php echo "<font color='maroon'>[" . $m->membershipNo . "] </font><br />" . $m->title . " " . $m->fname . " " . $m->sname . " " . $m->oname . " <br /><font color='green'> [" . $m->phone . "]</font>"; ?>
                                                    </td>
                                                    <td><?php echo $m->amount; ?></td>
                                                    <td>
                                                        <?php
                                                            if($m->type == 2){echo "Main Supply"; }
                                                            if($m->type == 3){echo "Ramadan Supply"; }
                                                            if($m->type == 4){echo "Sallah Supply"; }
                                                            if($m->type == 11){echo "Longterm Loan"; }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $m->date_applied; ?></td>
                                                    <td><?php
                                                            if($m->payslip_status == "Yes")
                                                            {
                                                                echo  "<a href=".base_url()."assets/uploads/".$m->payslip." target='_blank'>Payslip? " . $m->payslip_status . "</a><br />";
                                                            } else {
                                                                echo "Payslip? " . $m->payslip_status . "<br />";

                                                            }
                                                        
                                                            if($m->surety_status == "Yes")
                                                            {
                                                                echo  "<a href=".base_url()."assets/uploads/".$m->surety." target='_blank'>Surety? " . $m->surety_status . "</a><br />";
                                                                //echo  "<a href='#'>Surety? " . $m->surety_status . "</a><br />";
                                                            } else {
                                                                echo "Surety? " . $m->surety_status . "<br />";
                                                            }
                                                        

                                                        ?>
                                                    </td>

                                                    <td>
                                                        <?php if($m->approval_status == "Unpaid"){ echo "Loan Issued"; } else{ ?>
                                                        <a href="" data-toggle="modal" data-target="#loan<?php echo $m->id; ?>"><i class="fa fa-fw fa-eye"></i></a>
                                                        <?php } ?>
                                                    </td>

                                                    <div class="modal" id="loan<?php echo $m->id; ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <!-- Modal Header -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">[Loan Approval]</h4>
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                </div>

                                                                <!-- Modal body -->
                                                                <div class="modal-body">
                                                                    <form action="<?php echo site_url("admin/loan_approval"); ?>" method="POST">
                                                                        <div class="form-group">
                                                                            <input  type="text" name="membershipNo" parsley-trigger="change" value="<?php echo $m->membershipNo." - ".$m->fname." ".$m->sname." ".$m->oname;  ?>" readonly autocomplete="off" class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="text" name="amount" value="<?php echo $m->amount;  ?>"   class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                        <select class="form-control" name="repayment_period">
                                                                                <option value="12">1 Year</option>
                                                                                <option value="24">2 Years</option>
                                                                                <option value="36">3 Years</option>
                                                                                <option value="48">4 Years</option>
                                                                                <option value="60">5 Years</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <select class="form-control" name="approval">
                                                                                <option value="Partially Approved">Partial Approval</option>
                                                                                <option value="Fully Approved">Final Approval</option>
                                                                                <option value="Unpaid">Disbursed</option>
                                                                                <option value="Decline">Decline</option>

                                                                            </select>
                                                                        </div>
                                                                        
                                                                       
                                                                            <input type="hidden" name="id" value="<?php echo $m->id  ?>" >
                                                                        
                                                                        <div class="row">
                                                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                                                <input type="submit" value="Save" class="btn btn-space btn-primary">
                                                                            </div>
                                                                            <div class="col-sm-6 pl-0">

                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                                <!-- Modal footer -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        
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