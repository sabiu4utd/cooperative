<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none text-white" href="">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">

                    <li class="nav-item ">
                        <a class="nav-link active" href="<?=site_url('member/landingPage'); ?>"><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                            
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("member/deductions"); ?>"  data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Deductions</a>
                        <div id="submenu-2" class="collapse submenu">
                           
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("member/myloans"); ?>"  aria-controls="submenu-2"><i class="fa fa-fw fa-home"></i>My Loans</a>
                        <div id="submenu-2" class="collapse submenu">
                           
                        </div>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>My Request</a>
                        <div id="submenu-3" class="collapse submenu">
                           
                        </div>
                    </li> -->
                    <li class="nav-item ">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Forms</a>
                        <div id="submenu-4" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="modal" data-target="#loanApplication">Loan Application</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="modal" data-target="#mainSupply">Main Supply</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="#">Toton Supply</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url("member/load_ramdan_supply"); ?>">Festivity Supply</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url("member/load_supply"); ?>">Shopping</a>
                                </li> -->
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="#">Withdrawal From Saving</a>
                                </li> -->

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("member/crs"); ?>"  data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>My CRS</a>
                        <div id="submenu-5" class="collapse submenu">
                            <!-- <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link" href="pages/general-table.html">General Tables</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/data-tables.html">Data Tables</a>
                    </li>
                  </ul> -->
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("auth/logout"); ?>"><i class="fas fa-power-off mr-2"></i>Logout</a>

                    </li>



                </ul>
            </div>
        </nav>
    </div>
</div>

<!--Loan Application-->
<div class="modal" id="loanApplication">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">[Loan Application Form]</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="alert alert-warning" style="font-size:12pt; font-weight:bold; text-align:center">       
                     
                    <?php 
                        if($_SESSION['loan_status']== 1){
                            echo "<i class='fas fa-ban' style='font-size:72pt; color:maroon;'></i> <br />";
                            echo "<strong style='color:maroon; font-size:20pt'>You are not eligible for a loan/supply until your current loan/supply is settled, thank you.</strong>";
                          
                            $total_allow = 0;
                        } else {
                        $total_allow = $this->session->userdata('saving')*2;
                        echo "<strong style='color:red'> The Maximum Loan you can collect is N".number_format($total_allow, 2, ".",",")."</strong>";
                        }
                    ?>
                </div>
                <?php if($_SESSION['loan_status']== 0 ){ ?> 
                <form action="<?php echo site_url("member/loan_application"); ?>" method="POST">
                      
                    <div class="form-group">
                        <!-- <label for="inputUserName">Membership No.</label> -->
                        <input id="inputUserName" type="text" name="membershipNo" parsley-trigger="change"  value="<?php echo $this->session->userdata('membershipNo');  ?>" readonly autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <!-- <label for="inputPassword">First Name</label> -->
                        <?php  $fullname =$this->session->userdata('fname')." ".$this->session->userdata('sname')." ".$this->session->userdata('oname'); ?>
                        <input id="inputPassword" name="fname" type="text" value="<?php echo $_SESSION['loan_status']== 0 ? $fullname : "";  ?>" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <!-- <label for="inputRepeatPassword">Other Name</label> -->
                        <input type="number" name="amount"   <?php //echo $_SESSION['loan_status']== 0 ? "readonly" : "";  ?> value="<?php echo $total_allow; ?>"  min="2" max="<?php echo $total_allow; ?>" class="form-control">
                    </div>
                   
                    <div class="row">
                        <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                            <input type="submit" value="Apply" class="btn btn-space btn-primary"  <?php echo $_SESSION['loan_status']== 0 ? "disable" : "";  ?>>
                            <!-- <button type="submit" >Apply</button> -->
                            <button class="btn btn-space btn-secondary">Cancel</button>

                        </div>
                        <div class="col-sm-6 pl-0">

                        </div>
                    </div>
                </form>
                <?php } ?>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!--End loan Application->

<!--Main Supply Application-->
<div class="modal" id="mainSupply">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">[Main Supply]</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="alert alert-warning" style="font-size:12pt; font-weight:bold; text-align:center">       
                     
                    <?php 
                        if($_SESSION['loan_status']== 1){
                            echo "<i class='fas fa-ban' style='font-size:72pt; color:maroon;'></i> <br />";
                            echo "<strong style='color:maroon; font-size:20pt'>You are not eligible for a loan/supply until your current loan/supply is settled, thank you.</strong>";
                          
                            $total_allow = 0;
                        } else {
                        $total_allow = $this->session->userdata('saving')*3;
                        echo "<strong style='color:red'>Amount Eligible N".number_format($total_allow, 2, ".",",")."</strong>";
                        }
                    ?>
                </div>
                <?php if($_SESSION['loan_status']== 0 ){ ?> 
                <form action="<?php echo site_url("member/supply_application"); ?>" method="POST">
                      
                    <div class="form-group">
                        <!-- <label for="inputUserName">Membership No.</label> -->
                        <input id="inputUserName" type="text" name="membershipNo" parsley-trigger="change"  value="<?php echo $this->session->userdata('membershipNo');  ?>" readonly autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <!-- <label for="inputPassword">First Name</label> -->
                        <?php  $fullname =$this->session->userdata('fname')." ".$this->session->userdata('sname')." ".$this->session->userdata('oname'); ?>
                        <input id="inputPassword" name="fname" type="text" value="<?php echo $_SESSION['loan_status']== 0 ? $fullname : "";  ?>" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <!-- <label for="inputRepeatPassword">Other Name</label> -->
                        <input type="number" name="amount"   <?php //echo $_SESSION['loan_status']== 0 ? "readonly" : "";  ?> value="<?php echo $total_allow; ?>"  min="2" max="<?php echo $total_allow; ?>" class="form-control">
                    </div>
                     <div class="form-group">
                        <label for="inputRepeatPassword">Description of Supply</label>
                        <textarea name="supply_description" class="form-control"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                            <input type="submit" value="Apply" class="btn btn-space btn-primary"  <?php echo $_SESSION['loan_status']== 0 ? "disable" : "";  ?>>
                            <!-- <button type="submit" >Apply</button> -->
                            <button class="btn btn-space btn-secondary">Cancel</button>

                        </div>
                        <div class="col-sm-6 pl-0">

                        </div>
                    </div>
                </form>
                <?php } ?>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!--End Main Supply Application->