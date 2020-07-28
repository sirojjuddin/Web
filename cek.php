<?php 
if(isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	include 'config/config.php';
	session_start();

	$login = mysqli_query($mysqli,"SELECT * FROM user WHERE username='$username' AND password='$password'");

	$cek = mysqli_num_rows($login);

	if ($cek > 0) {
		$data = mysqli_fetch_assoc($login);

		$_SESSION['user'] = $data['username'];
		$_SESSION['login'] = 1;

		header("location:home/");
	}
	else{
  	header("location:index.php?pesan=gagal");
	}

}
else{
  	header("location:index.php?pesan=gagal");
}

 ?>