<?php 
include 'connect.php';
session_start();
$email = $_POST['email'];
$password = $_POST['password'];
$query = mysqli_query($conn,"SELECT * FROM user");


foreach ($query as $akun) {
	if ($email == $akun['email'] && $password == $akun['password']) {
		$_SESSION['login'] = true;
		$_SESSION['nama'] =  $akun['nama'];
		$_SESSION['message']  = 'Berhasil login';

		header("Location: dashboard.php");
	} else if ($email == $akun['email'] && $password != $akun['password']) {
		$_SESSION['error']  = 'Password Salah';
		header('Location: login.php');
	} else if ($email != $akun['email'] && $password == $akun['password']) {
		$_SESSION['error']  = 'Email Salah';
		header('Location: login.php');
	} 
}



 ?>