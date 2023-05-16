<?php 
require 'functions.php';

if( isset($_POST["register"]) ) {

	if( registrasi($_POST) > 0 ) {
		echo "<script>
				alert('user baru berhasil ditambahkan!');
				document.location.href = 'login.php';
			  </script>";
	} else {
		echo mysqli_error($conn);
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Registrasi</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css">

	<style>
		label {
			display: block;
		}
	</style>
</head>
<body>
<div class="container mx-auto max-w-md mt-10">
		<h1 class="text-3xl text-center font-bold mb-5">Halaman Registrasi</h1>
		
		<form action="" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
			<ul>
				<li class="mb-4">
					<label for="username" class="block text-gray-700 font-bold mb-2">Username :</label>
					<input type="text" name="username" id="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
				</li>
				<li class="mb-4">
					<label for="password" class="block text-gray-700 font-bold mb-2">Password :</label>
					<input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
				</li>
				<li class="mb-4">
					<label for="password2" class="block text-gray-700 font-bold mb-2">Konfirmasi Password :</label>
					<input type="password" name="password2" id="password2" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
				</li>
				<li class="mb-4">
					<button type="submit" name="register" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Register!</button>
				</li>
			</ul>
		</form>
		
		<p class="text-center text-gray-500 text-xs">
			Sudah punya akun? <a href="login.php" class="text-blue-500">Login</a>
		</p>
	</div>

</body>
</html>