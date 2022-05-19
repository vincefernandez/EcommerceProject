<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php






$total = 0;

$stmt = $conn->prepare("SELECT *, cart.id AS cartid FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user");
// $stmt = $conn->prepare("Select *, cart.id AS cartid FROM cart JOIN products ON products.id=cart.product_id JOIN users ON users.id = product_id Where user_id=:user");
$stmt->execute(['user' => $user['id']]);

foreach ($stmt as $row) {
	$image = (!empty($row['photo'])) ? 'images/' . $row['photo'] : 'images/noimage.jpg';
	$subtotal = $row['price'] * $row['quantity'];
	$total += $subtotal;
	$product_image = $row['photo'];
	$product_name = $row['name'];
	$product_price = $subtotal;
	$product_size = $row['Sizes'];
	$product_quantity = $row['quantity'];
	// $address = "Bagong Silang Caloocan";
	// $contact_number = "09301798988";
}


// echo $address;
// $stmt3 = $conn->prepare("SELECT * FROM users WHERE id=:id");
// $stmt3->execute(['id' => $_SESSION['user']]);
// while($user = $stmt3->fetch(PDO::FETCH_ASSOC)){

//   $fullname = $user['firstname'] . $user['lastname'];
//   $address1 = $user['address'];
//   $contact_no = $user['contact_info'];
//   $img = $user['photo'];

// }


if (isset($_POST['COD'])) {
	$selectquery = $conn->prepare("Select * From users WHERE id=:id");
	$selectquery->execute(['id' => $_SESSION['user']]);
	foreach ($selectquery as $value) {
		$address = $value['address'];
		$contact_number = $value['contact_info'];
		$name = $value['firstname'] . ' ' . $value['lastname'];
	}


	try {
		$stmt1 = $conn->prepare("INSERT INTO orders (user_id, product_image, product_name,product_price,product_size,product_quantity,Name,contact_number,address) VALUES (:user_id, :product_image, :product_name, :product_price, :product_size, :product_quantity,:name, :contact_number, :address)");
		$stmt1->execute(['user_id' => $user['id'], 'product_image' => $product_image, 'product_name' => $product_name, 'product_price' => $product_price, 'product_size' => $product_size, 'product_quantity' => $product_quantity, 'name' => $name, 'contact_number' => $contact_number, 'address' => $address]);
	} catch (\Throwable $th) {
		echo "err";
	}
}


if (isset($_POST['Gcash'])) {
	$ReferenceNo = $_POST['ReferenceNo'];
	$selectquery1 = $conn->prepare("Select * From users WHERE id=:id");
	$selectquery1->execute(['id' => $_SESSION['user']]);
	foreach ($selectquery1 as $value) {
		$address = $value['address'];
		$contact_number = $value['contact_info'];
		$name = $value['firstname'] . ' ' . $value['lastname'];
	}
	try {
		$stmtGcash = $conn->prepare("INSERT INTO paymentgcash (user_id, product_image, product_name, product_price, product_size, product_quantity, Name,contact_number,address,ReferenceNumber) VALUES (:user_id, :product_image,  :product_name, :product_price, :product_size, :product_quantity, :name, :contact_number, :address, :ReferenceNumber)");
		$stmtGcash->execute(['user_id' => $user['id'],  'product_image' => $product_image, 'product_name' => $product_name, 'product_price' => $product_price, 'product_size' => $product_size, 'product_quantity' => $product_quantity, 'name' => $name, 'contact_number' => $contact_number, 'address' => $address, 'ReferenceNumber' => $ReferenceNo]);
		if ($stmtGcash) {
			echo "
		<div class='alert alert-success' role='alert'>
  <h4 class='alert-heading'>Well done!</h4>
  <p>Congrats, you have Send via Gcash</p>
  <hr>

  <p class='text-gray'>After Verify the Reference Number, The seller will now deliver the Item to your register Address</p>

</div>
";
		}
	} catch (\Throwable $th) {
		echo "err";
	}
}












?>

<body class="hold-transition skin-blue layout-top-nav">
	<div class="wrapper">

		<?php include 'includes/navbar.php'; ?>

		<div class="content-wrapper">
			<div class="container">
				<!-- MODAL -->


				<div class="modal fade" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<form action="cart_view.php" method="post">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<h4 class="modal-title" id="modalLabel">Payment Gcash</h4>
								</div>
								<div class="modal-body">
									Gcash Name: <b>Jappy Galicha Singson</b><br>
									GCash Number: <b>09957234115</b>
									<br><br>
									Upon sending the amount you really need to send the Reference No.
									For the Confrimation
									<br><br>
									Reference Number :<input type="text" name="ReferenceNo" class="form-control">
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-secondary" name="Gcash">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>

				<!-- END OF MODAL -->
				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-sm-12">
							<h1 class="page-header">YOUR CART</h1>
							<div class="box box-solid">
								<div class="box-body">
									<table class="table table-bordered">
										<thead>
											<th></th>
											<th>Photo</th>
											<th>Name</th>
											<th>Price</th>
											<th>Sizes</th>
											<th width="20%">Quantity</th>

											<th>Subtotal</th>
										</thead>
										<tbody id="tbody">
										</tbody>
									</table>

								</div>
							</div>



							<div class="row">



								<?php
								if (isset($_SESSION['user'])) {
									echo "
	        					<div class='col-md-3' id='paypal-button'></div>

	        				";
								?>



									<div class="col-md-3">
										<form action="cart_view.php" method="POST" onsubmit="return confirm('Cash on Delivery: Will notified the seller about the product you want to buy. \n Are you sure you want to continue?');">
											<input type="submit" class="btn btn-info" name="COD" value="Cash on Delivery">

										</form>
									</div>
									<div class="col-md-3">
										<button type="button" class="btn btn-info" data-toggle="modal" data-target="#flipFlop">
											Payment Via Gcash
										</button>
									</div>
									<div class="col-md-3">
									<button class="btn btn-info"><a href="https://web.facebook.com/profile.php?id=100076215019737" target="_blank" >Contact Via Facebook</button></a>
									</div>
							</div>







						<?php } else {
									echo "
	        					<h4>You need to <a href='login.php'>Login</a> to checkout.</h4>
	        				";
								}
						?>

						</div>
						<?php /*
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
				*/ ?>
					</div>


				</section>

			</div>
		</div>
		<?php $pdo->close(); ?>
		<?php include 'includes/footer.php'; ?>
	</div>

	<?php include 'includes/scripts.php'; ?>
	<script>
		var total = 0;
		$(function() {
			$(document).on('click', '.cart_delete', function(e) {
				e.preventDefault();
				var id = $(this).data('id');
				$.ajax({
					type: 'POST',
					url: 'cart_delete.php',
					data: {
						id: id
					},
					dataType: 'json',
					success: function(response) {
						if (!response.error) {
							getDetails();
							getCart();
							getTotal();
						}
					}
				});
			});

			$(document).on('click', '.minus', function(e) {
				e.preventDefault();
				var id = $(this).data('id');
				var qty = $('#qty_' + id).val();
				if (qty > 1) {
					qty--;
				}
				$('#qty_' + id).val(qty);
				$.ajax({
					type: 'POST',
					url: 'cart_update.php',
					data: {
						id: id,
						qty: qty,
					},
					dataType: 'json',
					success: function(response) {
						if (!response.error) {
							getDetails();
							getCart();
							getTotal();
						}
					}
				});
			});

			$(document).on('click', '.add', function(e) {
				e.preventDefault();
				var id = $(this).data('id');
				var qty = $('#qty_' + id).val();
				qty++;
				$('#qty_' + id).val(qty);
				$.ajax({
					type: 'POST',
					url: 'cart_update.php',
					data: {
						id: id,
						qty: qty,
					},
					dataType: 'json',
					success: function(response) {
						if (!response.error) {

							getDetails();
							getCart();
							getTotal();
						}
					}
				});
			});

			getDetails();

			getTotal();

		});

		function getDetails() {
			$.ajax({
				type: 'POST',
				url: 'cart_details.php',
				dataType: 'json',
				success: function(response) {
					$('#tbody').html(response);
					getCart();
				}
			});
		}


		function getTotal() {
			$.ajax({
				type: 'POST',
				url: 'cart_total.php',
				dataType: 'json',
				success: function(response) {
					total = response;
				}
			});
		}
	</script>
	<!-- Paypal Express -->
	<script>
		paypal.Button.render({
			env: 'sandbox', // change for production if app is live,

			client: {
				sandbox: 'AQW_JGHtD1OcSSwddROdKm1ThvUE7sKLzrf739-tgE9FNq9gCuD2f2tSSeImvgbwyi0wuirXfjj6kxjz',
				// sandbox:    'ASb1ZbVxG5ZFzCWLdYLi_d1-k5rmSjvBZhxP2etCxBKXaJHxPba13JJD_D3dTNriRbAv3Kp_72cgDvaZ',
				// production: 'AaBHKJFEej4V6yaArjzSx9cuf-UYesQYKqynQVCdBlKuZKawDDzFyuQdidPOBSGEhWaNQnnvfzuFB9SM'
			},

			commit: true, // Show a 'Pay Now' button

			style: {
				color: 'gold',
				size: 'small'
			},

			payment: function(data, actions) {
				return actions.payment.create({
					payment: {
						transactions: [{
							//total purchase
							amount: {
								total: total,
								currency: 'USD'
							}
						}]
					}
				});
			},

			onAuthorize: function(data, actions) {
				return actions.payment.execute().then(function(payment) {
					window.location = 'sales.php?pay=' + payment.id;
				});
			},

		}, '#paypal-button');

		// function confirmActiona() {
		// 	let message = "Cash on Delivery Will notify the user about your order and contact you for the confrmation. \n Are you sure you want Order?  :) ";
		// let confirmAction = confirm(message);

		//   }
	</script>
</body>

</html>