<?php
if (!isset($_GET['page'])) {
	$page = 1;
} else {
	$page = $_GET['page'];
}
?>
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue layout-top-nav">
	<div class="wrapper">

		<?php include 'includes/navbar.php'; ?>

		<div class="content-wrapper">
			<div class="container">

				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-sm-12">
							<?php
							if (isset($_SESSION['error'])) {
								echo "
	        					<div class='alert alert-danger'>
	        						" . $_SESSION['error'] . "
	        					</div>
	        				";
								unset($_SESSION['error']);
							}
							?>
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="background-color:black;">
								<ol class="carousel-indicators">
									<li data-target="#carousel-example-generic" data-slide-to="0" style="color:black;" class="active"></li>
									<li data-target="#carousel-example-generic" data-slide-to="1" style="color:black;" class=""></li>
									<li data-target="#carousel-example-generic" data-slide-to="2" style="color:black;" class=""></li>
								</ol>
								<div class="carousel-inner">
									<div class="item active">
										<img src="images/jappystore.png" class="img-fluid" style="width: 100%; height: 300px;" alt="First slide">
									</div>
									<div class="item">
										<img src="images/jappy111.jpg" class="img-fluid" style="width: 100%; height: 300px;" alt="First slide">
									</div>
									<div class="item">
										<img src="images/japp22.jpg" class="img-fluid" style="width: 100%; height: 300px;" alt="First slide">
									</div>

								</div>
								<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
									<span class="fa fa-angle-left" </span>
								</a>
								<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
									<span class="fa fa-angle-right" </span>
								</a>
							</div>
							<h2>Jappy Store</h2>




							<?php



							$month = date('m');
							$conn = $pdo->open();

							try {
								$inc = 3;





								$count = $conn->prepare("Select count(*) From products");
								$count->execute();
								$number_of_results = $count->fetchColumn();
								$results_per_page = 10;
								// print_r($number_of_results);
								// $number_of_pages = ceil($results_per_page / $number_of_results );

								$number_of_pages = ceil( $number_of_results / $results_per_page);

								// echo " $pages_number";
								$this_page_first_result = ($page - 1) * $results_per_page;
								$sql = $conn->prepare("Select * From products ORDER BY id DESC LIMIT " . $this_page_first_result . ',' . $results_per_page . "   "   );

								// $stmt = $conn->prepare("SELECT *, SUM(quantity) AS total_qty FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE MONTH(sales_date) = '$month' GROUP BY details.product_id ORDER BY total_qty DESC LIMIT 6");
								$sql->execute();
								// $number_of_page = ceil($row_count / $results_per_page);
								foreach ($sql as $row) {
									$image = (!empty($row['photo'])) ? 'images/' . $row['photo'] : 'images/noimage.jpg';
									$inc = ($inc == 3) ? 1 : $inc + 1;
									if ($inc == 1) echo "<div class='row'>";
									echo "




	       							<div class='col-sm-4'>
	       								<div class='box box-solid'>
		       								<div class='box-body prod-body'>
		       									<img src='" . $image . "' width='100%' height='230px' class='thumbnail'>
		       									<h5><a href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a></h5>
		       									<p class='small'>Available Size: <b>" . $row['size'] . "</b></p>
		       								</div>
		       								<div class='box-footer'>
		       									<b> &#8369; " . number_format($row['price'], 2) . "</b>

		       								</div>

	       								</div>
	       							</div>
	       						";
									if ($inc == 3) echo "</div>";
								}
								if ($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>";
								if ($inc == 2) echo "<div class='col-sm-4'></div></div>";
							} catch (PDOException $e) {
								echo "There is some problem in connection: " . $e->getMessage();
							}
							?>
							<nav aria-label="Page navigation example">
								<ul class="pagination">
									<?php
									for ($page = 1; $page <= $number_of_pages; $page++) {




										echo " <li class='page-item'><a class='page-link' href='index.php?page=$page'>$page</a></li>";



										// echo '<a href="index.php?page=' . $page  .  '">'  .  $page . ' </a> ';
									}
?>
								</ul>
							</nav>
							<?php
							$pdo->close();

							?>

						</div><?php /*
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div> */ ?>
					</div>
				</section>

			</div>
		</div>
		<?php
		for ($page = 1; $page <= $number_of_page; $page++) {
			echo '<a href = "index.php?page=' . $page . '">' . $page . ' </a>';
		}
		?>
		<?php include 'includes/footer.php'; ?>
	</div>
	<script>
		$(document).ready(function() {
			$('#data').DataTable();
		});
	</script>
	<?php include 'includes/scripts.php'; ?>
</body>

</html>