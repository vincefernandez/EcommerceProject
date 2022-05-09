<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Cash On Delivery List
        </h1>
        <ol class="breadcrumb">
          <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Sales</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header with-border">
                <div class="pull-right">

                </div>
              </div>
              <div class="box-body">
                <table id="example" class="table table-bordered">
                  <thead>

                    <th>Item</th>
                    <th>Buyer Name</th>
                    <th>Total</th>
                    <th>Product Name</th>
                    <th>Sizes</th>
                    <th>Address</th>
                    <th>Cellphone #</th>
                  </thead>
                  <tbody>


                    <?php
                    $conn = $pdo->open();

                    try {
                      $total = 0;
                      $stmt = $conn->prepare("SELECT * from orders");
                      $stmt->execute();
                      foreach ($stmt as $row) {
                        $image = (!empty($row['product_image'])) ? '../images/' . $row['product_image'] : '../images/noimage.jpg';


                        echo "
                                <tr>

                                    <td><img src='" . $image . "' width='30px' height='30px'></td>
                                    <td>" . $row['Name'] . "</td>
                                    <td>&#8369;" . $row['product_price'] . "</td>
                                    <td>" . $row['product_name'] . "</td>


                                    <td>" . $row['product_size'] . "</td>
                                    <td>" . $row['address'] . "</td>
                                    <td>" . $row['contact_number'] . "</td>
                                </tr>
                            ";
                      }
                    } catch (PDOException $e) {
                      $output .= $e->getMessage();
                    }

                    $pdo->close();
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>
    <?php include 'includes/footer.php'; ?>
    <?php include '../includes/profile_modal.php'; ?>

  </div>
  <!-- ./wrapper -->

  <?php include 'includes/scripts.php'; ?>
  <!-- Date Picker -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script>
    $(function() {
      //Date picker
      $('#datepicker_add').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
      })
      $('#datepicker_edit').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
      })

      //Timepicker
      $('.timepicker').timepicker({
        showInputs: false
      })

      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        format: 'MM/DD/YYYY h:mm A'
      })
      //Date range as a button
      $('#daterange-btn').daterangepicker({
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function(start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )

    });
  </script>
  <script>
    $(function() {
      $(document).on('click', '.transact', function(e) {
        e.preventDefault();
        $('#transaction').modal('show');
        var id = $(this).data('id');
        $.ajax({
          type: 'POST',
          url: 'transact.php',
          data: {
            id: id
          },
          dataType: 'json',
          success: function(response) {
            $('#date').html(response.date);
            $('#transid').html(response.transaction);
            $('#detail').prepend(response.list);
            $('#total').html(response.total);
          }
        });
      });

      $("#transaction").on("hidden.bs.modal", function() {
        $('.prepend_items').remove();
      });
    });

    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>
</body>

</html>