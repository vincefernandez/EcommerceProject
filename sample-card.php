<?php
include 'includes/session.php';
$conn = $pdo->open();

if (isset($_POST['COD'])) {
  if (isset($_SESSION['user'])) {
    if (isset($_SESSION['cart'])) {
      $stmt = $conn->prepare("SELECT *, cart.id AS cartid FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user");
      $stmt->execute(['user' => $user['id']]);
      foreach ($stmt as $row) {
        $image = (!empty($row['photo'])) ? 'images/' . $row['photo'] : 'images/noimage.jpg';
        $subtotal = $row['price'] * $row['quantity'];
        $total += $subtotal;
        $product_image = $row['image'];
        $product_name = $row['name'];
        $product_price = $row['price'];
        $product_size = $row['Sizes'];
        $product_quantity = $row['quantity'];

        $stmt1 = $conn->prepare("INSERT INTO orders (user_id, product_image, product_name,product_price,product_size,product_quantity,contact_number,address) VALUES (:user_id, :product_image, :product_name, :product_price, :product_quantity, contact_number,address)");
        $stmt1->execute(['user_id' => $user['id'], 'product_image' => $product_image, 'product_name' => $product_name, 'product_price' => $product_price, 'product_size' => $product_size, 'product_quantity' => $product_quantity, 'contact_number' => 'Sample', 'address' => 'Sample']);
        if ($stmt1->execute()) {
          echo "nice";
        } else {
          echo "error";
        }
      }
    }
  }
}
//  $stmt = $conn->prepare("SELECT * FROM cart WHERE id=:id");
// 			$stmt->execute(['id'=>$_SESSION['user']]);

//   while($user = $stmt->fetch(PDO::FETCH_ASSOC)){
//   $fullname = $user['firstname'] . $user['lastname'];
//   $address = $user['address'];
//   $contact_no = $user['contact_info'];
//   $img = $user['photo'];

// echo "$user[frstname]";


?>


</body>

</html>