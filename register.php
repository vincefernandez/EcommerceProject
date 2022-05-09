<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	include 'includes/session.php';

	if(isset($_POST['signup'])){
		

		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];

		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['email'] = $email;
		$conn = $pdo->open();
		
		
		$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");

		$stmt->execute(['email'=>$email]);
$row = $stmt->fetch();
		if($password != $repassword){
			$_SESSION['error'] = 'Passwords did not match';
			header('location: signup.php');
		}
		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Email already taken';
				header('location: signup.php');
		}
		$now = date('Y-m-d');
		$password = password_hash($password, PASSWORD_DEFAULT);

		//generate code
		$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$code=substr(str_shuffle($set), 0, 12);

				
		$stmt = $conn->prepare("INSERT INTO users (email, password, firstname, lastname, activate_code, created_on) VALUES (:email, :password, :firstname, :lastname, :code, :now)");
		$stmt->execute(['email'=>$email, 'password'=>$password, 'firstname'=>$firstname, 'lastname'=>$lastname, 'code'=>$code, 'now'=>$now]);
		$userid = $conn->lastInsertId();
		header('location: login.php');

}else{
		$_SESSION['error'] = 'Fill up signup form first';
		header('location: signup.php');
}
	
				



?>