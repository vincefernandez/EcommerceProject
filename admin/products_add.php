<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$slug = slugify($name);
		$category = $_POST['category'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$filename = $_FILES['photo']['name'];
		$Size = $_POST['Size'];
		$Quantity = $_POST['Quantity'];
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM products WHERE slug=:slug");
		$stmt->execute(['slug'=>$slug]);
		$row = $stmt->fetch();

	// foreach($Size as $Sizes)
 //   {
 //      $items .= $Sizes. " ";

   // }



		if($row['numrows'] > 100){
			$_SESSION['error'] = 'Product already exist';
		}
		else{
			if(!empty($filename)){
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				$new_filename = $slug.'.'.$ext;
				move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$new_filename);
			}
			else{
				$new_filename = '';
			}

			try{

    	// $items .= $Sizes. " ";
				$stmt = $conn->prepare("INSERT INTO products (category_id, name, description, slug, price, photo,size,prodquantity) VALUES (:category, :name, :description, :slug, :price, :photo, :size, :prodquantity)");
				$stmt->execute(['category'=>$category, 'name'=>$name, 'description'=>$description, 'slug'=>$slug, 'price'=>$price, 'photo'=>$new_filename, 'size'=>$Size, 'prodquantity' => $Quantity]);
				$_SESSION['success'] = 'prducts added successfully';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

		}


		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up product form first';
	}

	header('location: products.php');

?>