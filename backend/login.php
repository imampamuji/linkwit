<?php 
session_start();
require 'functions.php';

// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan username
	if( $key === hash('sha256', $row['username']) ) {
		$_SESSION['login'] = true;
	}


}

if( isset($_SESSION["login"]) ) {
	header("Location: dashboard.php");
	exit;
}


if( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	// cek username
	if( mysqli_num_rows($result) === 1 ) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
			// set session
			$_SESSION["login"] = true;

			// cek remember me
			if( isset($_POST['remember']) ) {
				// buat cookie
				setcookie('id', $row['id'], time()+60);
				setcookie('key', hash('sha256', $row['username']), time()+60);
			}

			header("Location: dashboard.php");
			exit;
		}
	}

	$error = true;

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	<script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
	
<div class="mx-auto max-w-md mt-10">
		<h1 class="text-2xl font-bold mb-5">Halaman Login</h1>

		<?php if( isset($error) ) : ?>
			<p class="text-red-500 italic mb-5">username / password salah</p>
		<?php endif; ?>

		<form action="" method="post" class="mb-5">
			<ul>
				<li class="mb-3">
					<label for="username" class="block text-gray-700 font-bold mb-2">Username :</label>
					<input type="text" name="username" id="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
				</li>
				<li class="mb-3">
					<label for="password" class="block text-gray-700 font-bold mb-2">Password :</label>
					<input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
				</li>
				<li class="mb-3">
					<input type="checkbox" name="remember" id="remember" class="mr-2">
					<label for="remember" class="text-gray-700 font-bold">Remember me</label>
				</li>
				<li>
					<button type="submit" name="login" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">
						Login
					</button>
					<a href="registrasi.php" class="text-gray-700 font-bold">Daftar</a>
				</li>
			</ul>
			
		</form>
	</div>
</body>
</html>