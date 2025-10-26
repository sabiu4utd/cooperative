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
                                <h2 class="pageheader-title">Add Items (+)</h2>
                               
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Add Items (+)
                                            </li>
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

                        <div class="row">
                            <!-- ============================================================== -->
                            <!-- basic form -->
                            <!-- ============================================================== -->
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="card mb-5 shadow-sm">
                                    <?php if ($this->session->flashdata("msg")) { ?>
                                        <div class="alert alert-info"> <?php echo $this->session->flashdata("msg"); ?></div>
                                    <?php } ?>
                                    <h5 class="card-header">Add Items (+)</h5>
                                    <div class="card-body">
                                        <form action="<?php echo site_url("admin/update_item"); ?>" method="post" id="form" data-parsley-validate="">
                                            <div class="form-group">
                                                <!-- <label for="inputUserName">Membership No.</label> -->
                                                <input id="inputUserName" type="text" name="item" parsley-trigger="change" required="" value="<?php echo $item->item ?>" autocomplete="off" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <!-- <label for="inputEmail">Staff No.</label> -->
                                                <input id="inputEmail" type="text" name="qty" parsley-trigger="change" required="" value="<?php echo $item->qty ?>" autocomplete="off" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <select name="unit" required class="form-control">
                                                    <option value="<?php echo $item->unit ?>" selected><?php echo $item->unit ?></option>
                                                    <option value="Pieces">Pieces</option>
                                                    <option value="Bags">Bags</option>
                                                    <option value="Yard">Yard</option>
                                                    <option value="Gallon">Gallon</option>
                                                    <option value="Measures">Measures</option>
                                                    <option value="Meters">Meters</option>
                                                    <option value="Packets">Packets</option>
                                                    <option value="Sachet">Sachet</option>
                                                    <option value="Tins">Tins</option>
                                                    <option value="Carton">Carton</option>
                                                    <option value="Numbers">Numbers</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <!-- <label for="inputEmail">Staff No.</label> -->
                                                <input id="inputEmail" type="text" name="unit_price" parsley-trigger="change" required="" value="<?php echo $item->unit_price; ?>" autocomplete="off" class="form-control">
                                            </div>
                                            <div class="form-group">
                                            <select name="type" required class="form-control">
                                                    <option selected ><?php echo $item->type; ?></option>
                                                    <option>Ramadan Supply</option>
                                                    <option>Sallah Supply 1</option>
                                                    <option>Sallah Supply 2</option>
                                                    <option>Christmas</option>
                                            </select>
                                            </div>
                                            <div class="form-group">
                                            <select name="year" required class="form-control">
                                                    <option value="<?php echo date('Y') ?>"> <?php echo date('Y') ?></option>
                                                    <option value="<?php echo date('Y') ?>"><?php echo date('Y') ?></option>
                                                    
                                            </select>
                                            <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                    <button type="submit" class="btn btn-space btn-primary">Update</button>
                                                    
                                                </div>
                                                <div class="col-sm-6 pl-0">

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                <div class="card mb-5 shadow-sm">
                                    <?php if ($this->session->flashdata("msg")) { ?>
                                        <div class="alert alert-info"> <?php echo $this->session->flashdata("msg"); ?></div>
                                    <?php } ?>
                                    <h5 class="card-header">Manage Items (-)</h5>
                                    <div class="card-body">
                                        <table class="table table-hover">
                                        <tr>
                                            <th>#</th>
                                            <th>Supply</th>
                                            <th>Item</th>
                                            <th>Qty</th>
                                            <th>Unit Price</th>
                                            <th>Delete</th>
                                            <th>Update</th>

                                        </tr>
                                        <?php $i=1; foreach($items as $row){?>

                                            <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row->year." ".$row->type; ?></td>
                                            <td><?php echo $row->item; ?></td>
                                            <td><?php echo $row->qty." ".$row->unit; ?></td>
                                            <td><?php echo $row->unit_price; ?></td>
                                            <td><a href="<?php echo site_url('admin/getItemById/'.$row->id); ?>"><i class="fas fa-fw fa-edit"></i></a></td>
                                            <td><a href=""><i class="fas fa-fw fa-trash"></i></a></td>
                                            
                                            
                                            
                                        </tr>
                                            <?php } ?>
                                        </table>
                                      
                                    </div>
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
    <script src="../../../../cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>







    <!-- Theme JS -->
    <script src="<?php echo base_url(); ?>assets/js/theme.min.js"></script>

</body>


<!-- Mirrored from preview.easetemplate.com/influence/html/influence/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2023 00:17:05 GMT -->

</html>