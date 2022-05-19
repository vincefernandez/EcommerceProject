<?php
	include 'includes/session.php';

	$conn = $pdo->open();

	$output = array('error'=>false);
	$sizes = $_POST['Sizes'];
	$id = $_POST['id'];
	$quantity = $_POST['quantity'];

	if(isset($_SESSION['user'])){
		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM cart WHERE user_id=:user_id AND product_id=:product_id");
		$stmt->execute(['user_id'=>$user['id'], 'product_id'=>$id]);
		$row = $stmt->fetch();
		if($row['numrows'] < 1){
			try{
				// $stmt1 = $conn->prepare("Insert into cart (Sizes), Values('$sizes')");
				$stmt = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity,Sizes) VALUES (:user_id, :product_id, :quantity, :Sizes)");
				$stmt->execute(['user_id'=>$user['id'], 'product_id'=>$id, 'quantity'=>$quantity, 'Sizes' => $sizes]);
				// $stmt->execute(['user_id'=>$user['id'], 'product_id'=>$id, 'quantity'=>$quantity, 'Sizes'=>$sizes]);
				// $stmt1->execute();
				$output['message'] = 'Item added to cart';

			}
			catch(PDOException $e){
				$output['error'] = true;
				// $output['message'] = $e->getMessage();
				$output['message'] = "eerrror";
			}
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Product already in cart';
		}
	}
	else{
		if(!isset($_SESSION['cart'])){
			$_SESSION['cart'] = array();
		}

		$exist = array();

		foreach($_SESSION['cart'] as $row){
			array_push($exist, $row['productid'],$sizes);

		}

		if(in_array($id, $exist)){
			$output['error'] = true;
			$output['message'] = 'Product already in cart';
		}
		else{
			$data['productid'] = $id;
			$data['quantity'] = $quantity;
			$data['Sizes'] = $sizes;

			if(array_push($_SESSION['cart'], $data)){
				$output['message'] = 'Item added to cart';
			}
			else{
				$output['error'] = true;
				$output['message'] = 'Cannot add item to cart';
			}
		}

	}

	$pdo->close();
	echo json_encode($output);

?>