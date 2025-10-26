<?php
//echo $loan->amount; exit;
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

            <!-- ============================================================== -->
            <!-- end sales  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- new customer  -->
            <!-- ============================================================== -->



            <div class="row">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
                <!-- ============================================================== -->
                <!-- social source  -->
                <!-- ============================================================== -->
                <div class="card shadow-sm h-100">
                  <h5 class="card-header">Ramadan Supply</h5>
                  <?php if (!$orders) { ?>
                  <div class="card-body p-0">
                    <form id="ramadanSupplyForm" method="post" action="<?php echo base_url('member/save_ramadan_supply'); ?>">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Item</th>
                              <th>Price</th>
                              <th>Quantity</th>
                              <th>Total</th>
                              <th>Select</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $i = 1;
                            foreach ($ramdan_items as $row) { ?>
                              <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->item; ?></td>
                                <td>
                                  <input type="hidden" class="unit-price" value="<?php echo $row->unit_price; ?>">
                                  N<?php echo $row->unit_price."/".$row->unit; ?>
                                </td>
                                <td>
                                  <select name="quantity[]" class="form-control quantity" disabled>
                                    <option value="0.25">Quarter</option>
                                    <option value="0.5">Half</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                  </select>
                                </td>
                                <td>
                                  <span class="item-total">N0.00</span>
                                  <input type="hidden" name="total[]" class="total-input" value="0">
                                </td>
                                <td>
                                  <input type="checkbox" name="selected_items[]" class="item-select" value="<?php echo $row->id; ?>">
                                  <input type="hidden" name="item_names[]" value="<?php echo $row->item; ?>">
                                </td>
                              </tr>
                            <?php } ?>
                          </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="4" class="text-right"><strong>Grand Total:</strong></td>
                              <td><span id="grandTotal">N0.00</span></td>
                              <td></td>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="submitBtn" disabled>Submit Order</button>
                      </div>
                    </form>
                  </div>
                  <?php } else { ?>
                    <div class="card-body">
                      <h5>Your Ramadan Supply Order for <?php echo $this->session->userdata('active_year'); ?> has been placed successfully!</h5>
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Item</th>
                              <th>Quantity</th>
                              <th>Unit Price</th>
                              <th>Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $i = 1;
                            $total_amount = 0;
                            foreach ($orders as $order): 
                              $total_amount += $order->price;
                            ?>
                              <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo htmlspecialchars($order->item); ?></td>
                                <td><?php echo htmlspecialchars($order->quantity." ".$order->unit); ?></td>
                                <td>N<?php echo number_format($order->price/$order->quantity, 2); ?></td>
                                <td>N<?php echo number_format($order->price, 2); ?></td>
                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="4" class="text-right"><strong>Grand Total:</strong></td>
                              <td><strong>N<?php echo number_format($total_amount, 2); ?></strong></td>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                      <div class="mt-3">
                        <a href="<?php echo base_url('member/landingPage'); ?>" class="btn btn-primary">Back to Dashboard</a>
                      </div>
                    </div>
                    <?php } ?>
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

  <!-- Custom JS for Ramadan Supply -->
  <script>
    $(document).ready(function() {
      // Function to calculate totals
      function calculateTotals() {
        let grandTotal = 0;
        
        $('.item-select').each(function() {
          const row = $(this).closest('tr');
          const isChecked = $(this).prop('checked');
          const quantitySelect = row.find('.quantity');
          const unitPrice = parseFloat(row.find('.unit-price').val());
          const quantity = parseFloat(quantitySelect.val() || 0.25); // Default to 0.25 if not set
          
          // Enable/disable quantity select based on checkbox
          quantitySelect.prop('disabled', !isChecked);
          
          if (isChecked) {
            // Set default quantity if disabled
            if (quantitySelect.prop('disabled') === false && !quantitySelect.val()) {
              quantitySelect.val('0.25');
            }
            const total = unitPrice * quantity;
            row.find('.item-total').text('N' + total.toFixed(2));
            row.find('.total-input').val(total.toFixed(2));
            grandTotal += total;
          } else {
            row.find('.item-total').text('N0.00');
            row.find('.total-input').val('0');
          }
        });
        
        $('#grandTotal').text('N' + grandTotal.toFixed(2));
        
        // Enable submit button if at least one item is selected
        const hasSelection = $('.item-select:checked').length > 0;
        $('#submitBtn').prop('disabled', !hasSelection);
      }
      
      // Bind events
      $('.item-select').on('change', function() {
        const row = $(this).closest('tr');
        const quantitySelect = row.find('.quantity');
        const isChecked = $(this).prop('checked');
        
        // Enable/disable and set default value
        quantitySelect.prop('disabled', !isChecked);
        if (isChecked) {
          quantitySelect.val('0.25'); // Set default value when checked
        }
        calculateTotals();
      });
      
      $('.quantity').on('change', calculateTotals);
      
      // Initialize calculations
      calculateTotals();
    });
  </script>
</body>

</html>