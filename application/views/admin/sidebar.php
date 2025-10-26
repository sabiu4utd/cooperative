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

                    <li class="nav-item ">
                        <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-1" aria-controls="submenu-1"><i
                                class="fa fa-fw fa-user-circle"></i>Dashboard
                            <span class="badge badge-success"></span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo site_url("admin/members"); ?>"><i
                                class="fa fa-fw fa-users"></i>Members
                            <span class="badge badge-success"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-2" aria-controls="submenu-2"><i
                                class="fa fa-fw fa-rocket"></i>Request</a>
                        <div id="submenu-2" class="collapse submenu">
                            <ul class="nav flex-column">

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('admin/getLoanApplicant/Pending'); ?>">Loan Applications</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('admin/getFestivitySupplyRequest'); ?>">Festivity Supply Request</a>
                                </li>
                                <!--<li class="nav-item">
                                    <a class="nav-link" href="pages/listgroup.html">Request 3</a>
                                </li> -->

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-3" aria-controls="submenu-3"><i
                                class="fas fa-fw fa-chart-pie"></i>Upload</a>
                        <div id="submenu-3" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="" data-toggle="modal" data-target="#monthlyDeductionUpload">Monthly Deduction Upload</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">Upcoming Deductions</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="modal" data-target="#shareModal">Share</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('admin/manageUpload') ?>">Manage Uplods</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-5" aria-controls="submenu-3"><i
                                class="fas fa-fw fa-chart-pie"></i>Supplies</a>
                        <div id="submenu-5" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url("admin/manage_season"); ?>">Manage Season</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url("admin/regItem"); ?>"> Add Items(+)</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url("admin/manage_supplies"); ?>">Manage Supplies</a>
                                </li>
                               
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">Tonton</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-4" aria-controls="submenu-4"><i
                                class="fab fa-fw fa-wpforms"></i>Forms</a>
                        <div id="submenu-4" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link"href="<?php echo site_url("admin/registration"); ?>">Registration Form</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url("admin/special_cases"); ?>">Special Cases</a>
                                </li>
                               
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="pages/datepicker.html">Form 4</a>
                                </li> -->

                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("auth/logout"); ?>"><i
                                class="fas fa-power-off mr-2"></i>Logout</a>
                    </li>



                </ul>
            </div>
        </nav>
    </div>
</div>




<!--Upcoming Deduction-->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Upcoming Deduction Uploads</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <a href="<?php echo base_url()?>assets/templates/template1.csv" target="_blank">Download Template</a> |
        <a href="<?php echo base_url()?>assets/templates/template1.csv" target="_blank">Manage Upload</a> <br /><br />
        <form action="<?php echo site_url("admin/upcoming_deductions") ?>" method="post" enctype="multipart/form-data">
            <input type="file" name="filetoupload" class="form-control">
            <input type="submit" value="Save" class="btn btn-primary mt-3">
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!--End of Upcoming Deduction Modal->


<!--Monthly Deductions-->
<div class="modal" id="shareModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Share Uploads</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <a href="<?php echo base_url()?>assets/templates/template3.csv" target="_blank" >Download Template</a>|
        <!-- <a href="<?php echo base_url()?>assets/templates/template2.csv" target="_blank" >Manage Uploads</a> <br /><br /> -->
        <form action="<?php echo site_url("admin/share_uploads") ?>" method="post" enctype="multipart/form-data">
            <input type="file" name="filetoupload" class="form-control">
            <input type="submit" value="Save" class="btn btn-primary mt-3">
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!--End of Monthly Deduction Modal-->


<!--Monthly Deductions-->
<div class="modal" id="monthlyDeductionUpload">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Monthly Deduction Uploads</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <a href="<?php echo base_url()?>assets/templates/template2.csv" target="_blank" >Download Template</a>|
        <a href="<?php echo base_url()?>assets/templates/template2.csv" target="_blank" >Manage Uploads</a> <br /><br />
        <form action="<?php echo site_url("admin/monthly_deductions") ?>" method="post" enctype="multipart/form-data">
            <input type="file" name="filetoupload" class="form-control">
            <input type="submit" value="Save" class="btn btn-primary mt-3">
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

