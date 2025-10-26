<?php $crs = 0;
  foreach ($saving as $row) {
    if ($row->typeid == 1) {
      $crs = $crs + $row->amount_requested;
    }
    //  echo $row->typeid."-". $row->amount_deducted."<br />";
  }


  if (!$share) {
    $myshare = 0;
  } else {
    $myshare = $share->share;
  }


  $compulsory_saving = $crs; //- $myshare;
  $this->session->set_userdata('saving', $compulsory_saving);

  // loan status
  if ($status) {
    $_SESSION['loan_status'] = 1;
  } else {
    $_SESSION['loan_status'] = 0;
  }
  //var_dump($myloans); exit;
  $total_loans = 0;
  foreach ($collected_loans as $loans) {
    $total_loans += $loans->amount;
  }
  $repay = 0;
  foreach ($repayment as $r) {
    $repay += $r->amount_requested;
  }
if($special_cases_negative){
  $amount_to_deduct = 0;
	foreach ($special_cases_negative as $sc) {
		$amount_to_deduct += $sc->amount;
	}
  // var_dump($amount); exit;
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
            <!-- Member Profile Summary -->
            <div class="row mb-4">
              <div class="col-12">
                <div class="card bg-gradient-primary text-white">
                  <div class="card-body py-4">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <div class="avatar-circle">
                          <i class="fas fa-user-circle fa-4x"></i>
                        </div>
                      </div>
                      <div class="col">
                        <h4 class="mb-1">Welcome back, <?php echo $this->session->userdata('fname')." ".$this->session->userdata('sname'); ?></h4>
                        <p class="mb-0">Staff ID: <?php echo $this->session->userdata('membershipNo'); ?></p>
                      </div>
                      <div class="col-auto">
                        <button class="btn btn-light btn-sm">
                          <i class="fas fa-cog"></i> Settings
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Financial Summary Cards -->
            <div class="row">
              <!-- RCS Card -->
              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="d-flex flex-column">
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="icon-circle bg-gradient-info text-white">
                          <i class="fas fa-piggy-bank"></i>
                        </div>
                        <div class="badge badge-soft-info">RCS</div>
                      </div>
                      <h5 class="text-muted text-uppercase mb-2">Regular Contribution</h5>
                      <h2 class="mb-0">N<?php echo number_format($compulsory_saving, 2, ".", ","); ?></h2>
                      <div class="mt-2 small text-success">
                        <i class="fas fa-arrow-up"></i> Growing steadily
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Share Card -->
              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="d-flex flex-column">
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="icon-circle bg-gradient-success text-white">
                          <i class="fas fa-chart-pie"></i>
                        </div>
                        <div class="badge badge-soft-success">Shares</div>
                      </div>
                      <h5 class="text-muted text-uppercase mb-2">My Share Capital</h5>
                      <h2 class="mb-0">N<?php echo number_format($myshare, 2, ".", ","); ?></h2>
                      <div class="mt-2 small text-success">
                        <i class="fas fa-chart-line"></i> <?php echo !$share ? "0" : $share->percentage;  ?>% Share ratio
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Total Savings Card -->
              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="d-flex flex-column">
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="icon-circle bg-gradient-primary text-white">
                          <i class="fas fa-wallet"></i>
                        </div>
                        <div class="badge badge-soft-primary">Total</div>
                      </div>
                      <h5 class="text-muted text-uppercase mb-2">Total Savings</h5>
                      <h2 class="mb-0">N<?php 
                      
                      if(!isset($amount_to_deduct)){
                        $amount_to_deduct = 0;
                      }
                      echo number_format($crs + $myshare - $amount_to_deduct, 2, ".", ","); ?></h2>
                      <div class="mt-2 small text-primary">
                        <i class="fas fa-shield-alt"></i> Secure Growth
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Loan Balance Card -->
              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="d-flex flex-column">
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="icon-circle bg-gradient-warning text-white">
                          <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <div class="badge badge-soft-warning">Loan</div>
                      </div>
                      <h5 class="text-muted text-uppercase mb-2">Outstanding Loan</h5>
                      <h2 class="mb-0">
                        N<?php
                          $total = $total_loans - $repay;
                          echo number_format($total, 2, ".", ",");
                        ?>
                      </h2>
                      <div class="mt-2 small <?php echo $total > 0 ? 'text-warning' : 'text-success'; ?>">
                        <i class="fas <?php echo $total > 0 ? 'fa-clock' : 'fa-check-circle'; ?>"></i>
                        <?php echo $total > 0 ? 'Active loan balance' : 'No active loans'; ?>
                      </div>
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
              .badge-soft-primary { background-color: #eaecf4; color: #4e73df; }
              .badge-soft-success { background-color: #e0f3ea; color: #1cc88a; }
              .badge-soft-info { background-color: #e3f3f5; color: #36b9cc; }
              .badge-soft-warning { background-color: #fdf3d8; color: #f6c23e; }
              .icon-circle {
                height: 48px;
                width: 48px;
                border-radius: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
              }
              .avatar-circle {
                height: 64px;
                width: 64px;
                border-radius: 100%;
                background: rgba(255,255,255,0.2);
                display: flex;
                align-items: center;
                justify-content: center;
              }
              .card {
                border: none;
                border-radius: 15px;
                box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
              }
              .badge {
                padding: 0.5em 1em;
                font-size: 0.75em;
                font-weight: 600;
                border-radius: 0.375rem;
              }
              .timeline-steps {
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
              }
              .timeline-step {
                text-align: center;
                flex: 1;
                position: relative;
              }
              .timeline-step:not(:last-child):after {
                content: '';
                position: absolute;
                top: 20px;
                right: -50%;
                width: 100%;
                border-top: 2px dashed #e0e6ed;
                z-index: 0;
              }
              .timeline-step .timeline-content {
                position: relative;
                z-index: 1;
              }
              .inner-circle {
                width: 40px;
                height: 40px;
                border-radius: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: #eaecf4;
                color: #4e73df;
                margin: 0 auto;
              }
              .bg-soft-primary { background-color: #eaecf4; }
              .dot {
                width: 8px;
                height: 8px;
                border-radius: 100%;
                display: inline-block;
              }
              .dot-primary { background-color: #4e73df; }
              .dot-success { background-color: #1cc88a; }
              .dot-info { background-color: #36b9cc; }
              .dot-warning { background-color: #f6c23e; }
              .fw-semibold { font-weight: 600; }
              .fw-bold { font-weight: 700; }
              table.table-hover tbody tr:hover {
                background-color: #f8f9fc;
              }
              .table thead th {
                background-color: #f8f9fc;
                border-bottom: 2px solid #e3e6f0;
                font-weight: 600;
                text-transform: uppercase;
                font-size: 0.75rem;
                letter-spacing: 0.08em;
                color: #858796;
                padding: 1rem;
              }
              .table td {
                padding: 1rem;
                vertical-align: middle;
                border-bottom: 1px solid #e3e6f0;
              }
              .table tbody tr:last-child td {
                border-bottom: none;
              }
              .bg-light {
                background-color: #f8f9fc !important;
              }
              .font-weight-medium {
                font-weight: 500 !important;
              }
              .table-hover tbody tr:hover {
                background-color: #f8f9fc;
                transition: all 0.2s ease;
              }
              .gap-2 > * {
                margin-left: 0.5rem;
              }
              .gap-2 > *:first-child {
                margin-left: 0;
              }
              .dropdown-item {
                display: flex;
                align-items: center;
                padding: 0.5rem 1rem;
                font-size: 0.875rem;
              }
              .dropdown-item i {
                margin-right: 0.5rem;
                font-size: 1rem;
                width: 1rem;
                text-align: center;
              }
            </style>

            <div class="row">
              <!-- ============================================================== -->
              <!-- recent orders  -->
              <!-- ============================================================== -->

              <!-- ============================================================== -->
              <!-- end recent orders  -->
              <!-- ============================================================== -->

            </div>


            <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
                <div class="card">
                  <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <div>
                      <h5 class="mb-0 text-primary">Deduction History</h5>
                      <p class="text-muted mb-0 small">Regular Monthly Deductions Record</p>
                    </div>
                    <div class="d-flex gap-2">
                      <button type="button" class="btn btn-outline-primary btn-sm mr-2">
                        <i class="fas fa-download mr-1"></i> Export
                      </button>
                      <button type="button" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-filter mr-1"></i> Filter
                      </button>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table id='example2' class="table table-hover mb-0">
                        <thead>
                          <tr>
                            <th class="pl-4" width="5%">#</th>
                            <th width="20%">Type</th>
                            <th width="25%">Amount</th>
                            <th width="30%">Period</th>
                            <th class="pr-4" width="20%">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1;
                          foreach ($saving as $row) { ?>
                            <tr>
                              <td class="pl-4 align-middle"><?php echo $i++; ?></td>
                              <td class="align-middle">
                                <span class="badge badge-soft-<?php echo $row->type == 'CRS' ? 'info' : 'success'; ?> px-3 py-2">
                                  <?php echo $row->type; ?>
                                </span>
                              </td>
                              <td class="align-middle">
                                <div class="d-flex align-items-center">
                                  <!-- <span class="text-dark font-weight-medium">₦<?php //echo number_format($row->amount_requested, 2); ?></span> -->
                                </div>
                              </td>
                              <td class="align-middle">
                                <div class="d-flex align-items-center">
                                  <div class="icon-circle bg-light mr-2" style="width: 32px; height: 32px;">
                                    <span class="small font-weight-bold">
                                      <?php
                                        $months = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
                                        echo $months[$row->month - 1];
                                      ?>
                                    </span>
                                  </div>
                                  <div class="d-flex flex-column">
                                    <span class="font-weight-medium"><?php echo $row->year; ?></span>
                                    <!-- <small class="text-muted">Monthly Deduction</small> -->
                                  </div>
                                </div>
                              </td>
                              <td class="pr-4 align-middle">
                                <span class="badge badge-pill badge-soft-success d-inline-flex align-items-center px-3 py-2">
                                  ₦<?php echo number_format($row->amount_requested, 2); ?>
                                  <!-- <i class="fas fa-check-circle mr-1"></i> Completed -->
                                </span>
                              </td> 
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
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
                <!-- Upcoming Deductions Card -->
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                      <h5 class="mb-0 text-primary">Upcoming Deductions</h5>
                      <p class="text-muted mb-0 small">Next 3 Months Forecast</p>
                    </div>
                    <span class="badge badge-soft-warning"><i class="fas fa-clock mr-1"></i> Scheduled</span>
                  </div>
                  <div class="card-body">
                    <?php if (!$upcoming) { ?>
                      <div class="text-center py-4">
                        <img src="<?php echo base_url(); ?>assets/images/illustrations/empty.svg" alt="No deductions" style="width: 120px;">
                        <p class="text-muted mt-3 mb-0">No upcoming deductions scheduled</p>
                      </div>
                    <?php } else { ?>
                      <div class="timeline-steps">
                        <div class="timeline-step">
                          <div class="timeline-content">
                            <div class="inner-circle bg-soft-primary">
                              <i class="fas fa-calendar-alt"></i>
                            </div>
                            <p class="h6 mt-3 mb-1"><?php echo $upcoming->first_month ?></p>
                            <p class="h5 text-primary mb-0">₦<?php echo number_format($upcoming->first_month_amount, 2) ?></p>
                          </div>
                        </div>
                        <div class="timeline-step">
                          <div class="timeline-content">
                            <div class="inner-circle bg-soft-primary">
                              <i class="fas fa-calendar-alt"></i>
                            </div>
                            <p class="h6 mt-3 mb-1"><?php echo $upcoming->second_month ?></p>
                            <p class="h5 text-primary mb-0">₦<?php echo number_format($upcoming->second_month_amount, 2) ?></p>
                          </div>
                        </div>
                        <div class="timeline-step">
                          <div class="timeline-content">
                            <div class="inner-circle bg-soft-primary">
                              <i class="fas fa-calendar-alt"></i>
                            </div>
                            <p class="h6 mt-3 mb-1"><?php echo $upcoming->third_month ?></p>
                            <p class="h5 text-primary mb-0">₦<?php echo number_format($upcoming->third_month_amount, 2) ?></p>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                </div>

                <!-- Special Cases Card -->
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                      <h5 class="mb-0 text-primary">Special Cases</h5>
                      <p class="text-muted mb-0 small">Exception Transactions & Adjustments</p>
                    </div>
                  </div>
                  <div class="card-body px-0">
                    <div class="table-responsive">
                      <table class="table table-hover mb-0">

                        <?php
                        if (!$special_cases) { ?>
                          <tr>
                            <td colspan="5" class="text-center py-4">
                              <img src="<?php echo base_url(); ?>assets/images/illustrations/empty.svg" alt="No cases" style="width: 80px;">
                              <p class="text-muted mt-2 mb-0">No special cases recorded</p>
                            </td>
                          </tr>
                        <?php } else { 
                          $i=1;
                          foreach($special_cases as $row){ ?>
                          <tr>
                            <td class="pl-4"><?php echo $i++; ?></td>
                            <td>
                              <span class="badge badge-soft-<?php 
                                echo $row->type == 'Adjustment' ? 'warning' : 
                                     ($row->type == 'Exception' ? 'danger' : 'info'); 
                              ?>"><?php echo $row->type; ?></span>
                            </td>
                            <!-- <td>
                              <span class="text-dark"><?php echo $row->purpose; ?></span>
                            </td> -->
                            <td>
                              <span class="fw-semibold">₦<?php echo number_format($row->amount, 2); ?></span>
                            </td>
                            <td class="pr-4">
                              <small class="text-muted">
                                <i class="fas fa-calendar-day mr-1"></i>
                                <?php echo date('M d, Y', strtotime($row->date)); ?>
                              </small>
                            </td>
                          </tr>
                        <?php }
                        } ?>
                      </table>
                    </div>
                  </div>
                </div>

                <!-- Loan History Card -->
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                      <h5 class="mb-0 text-primary">Loan History</h5>
                      <p class="text-muted mb-0 small">Loan & Supply Records</p>
                    </div>
                    <div class="dropdown">
                      <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                        <i class="fas fa-clock mr-1"></i> All Time
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Last 3 Months</a>
                        <a class="dropdown-item" href="#">Last 6 Months</a>
                        <a class="dropdown-item" href="#">This Year</a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                      <table class="table table-hover mb-0">
                        <?php if (count($myloans) == 0) { ?>
                          <tr>
                            <td colspan="5" class="text-center py-4">
                              <img src="<?php echo base_url(); ?>assets/images/illustrations/empty.svg" alt="No loans" style="width: 80px;">
                              <p class="text-muted mt-2 mb-0">No loan history available</p>
                            </td>
                          </tr>
                        <?php } else { ?>
                          <thead>
                            <tr>
                              <th class="pl-4">#</th>
                              <th>Amount</th>
                              <th>Type</th>
                              <th>Duration</th>
                              <th class="pr-4">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $i = 1;
                          foreach ($myloans as $loans) { 
                            $loanType = '';
                            $typeClass = '';
                            
                            switch($loans->type) {
                              case 11:
                                $loanType = "Long-term Loan";
                                $typeClass = "primary";
                                break;
                              case 2:
                                $loanType = "Main Supply";
                                $typeClass = "success";
                                break;
                              case 3:
                                $loanType = "Ramadan Supply";
                                $typeClass = "info";
                                break;
                              case 4:
                                $loanType = "Sallah Supply";
                                $typeClass = "warning";
                                break;
                            }
                          ?>
                            <tr>
                              <td class="pl-4"><?php echo $i++; ?></td>
                              <td>
                                <span class="fw-semibold">₦<?php echo number_format($loans->amount, 2); ?></span>
                              </td>
                              <td>
                                <span class="badge badge-soft-<?php echo $typeClass; ?>">
                                  <?php echo $loanType; ?>
                                </span>
                              </td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <i class="fas fa-clock text-muted mr-2"></i>
                                  <span><?php echo $loans->repayment_period / 12 . " Years"; ?></span>
                                </div>
                              </td>
                              <td class="pr-4">
                                <?php 
                                  $statusClass = '';
                                  switch(strtolower($loans->approval_status)) {
                                    case 'approved':
                                      $statusClass = 'success';
                                      $icon = 'check-circle';
                                      break;
                                    case 'pending':
                                      $statusClass = 'warning';
                                      $icon = 'clock';
                                      break;
                                    case 'rejected':
                                      $statusClass = 'danger';
                                      $icon = 'times-circle';
                                      break;
                                    default:
                                      $statusClass = 'secondary';
                                      $icon = 'info-circle';
                                  }
                                ?>
                                <span class="badge badge-pill badge-soft-<?php echo $statusClass; ?>">
                                  <i class="fas fa-<?php echo $icon; ?> mr-1"></i>
                                  <?php echo ucfirst($loans->approval_status); ?>
                                </span>
                              </td>
                            </tr>
                          <?php } ?>
                        <?php } ?>
                      </table>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ============================================================== -->
      <!-- footer -->
      <!-- ============================================================== 
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